<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\DocumentsRepository;
use App\Repositories\DocumentsCategoryRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\CreateDocumentsRequest;
use App\Http\Requests\UpdateDocumentsRequest;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Repositories\RoleRepository;
use App\Repositories\DocumentHasUserRepository;
use App\Repositories\DocumentHasRoleRepository;
use App\Models\Documents;
use App\Models\MetaTag;
use Illuminate\Support\Facades\DB;

class DocumentsController extends AppBaseController
{
    

    /** @var DocumentRepository $documentRepository*/
    private $documentRepository;

    /** @var $userRepository UserRepository */
    private $userRepository;


    /** @var DocumentsCategoryRepository $documentsCategoryRepository*/
    private $documentsCategoryRepository;

    /** @var $roleRepository RoleRepository */
    private $roleRepository;

    private $documentHasUserRepository;

    private $documentHasRoleRepository;


    public function __construct(DocumentHasRoleRepository $documentHasRoleRepo, DocumentHasUserRepository $documentHasUserRepo, RoleRepository $roleRepo, DocumentsCategoryRepository $documentsCategoryRepo,DocumentsRepository $documentRepo,  UserRepository $userRepo)
    {
       
        $this->documentRepository = $documentRepo;
        $this->userRepository = $userRepo;
        $this->documentsCategoryRepository = $documentsCategoryRepo;
        $this->roleRepository = $roleRepo;
        $this->documentHasUserRepository = $documentHasUserRepo;
        $this->documentHasRoleRepository = $documentHasRoleRepo;
    }

    /**
     * Display a listing of the documents.
     */
    public function index(Request $request)
    {
        if (!checkPermission('read document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        
        $documents = $this->documentRepository->paginate(10);

        return view('documents.index', compact('documents'));
    }

    public function documentsByAudits()
    {
        if (!checkPermission('read document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        
        $documents = DB::table('documents_manager')
        ->join('audits', 'documents_manager.id', '=', 'audits.auditable_id')
        ->join('users', 'documents_manager.created_by', '=', 'users.id')
        ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
        ->select('documents_manager.*', 'audits.*', 'users.*', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name')
        ->where('audits.auditable_type', "App\Models\Documents")
        ->latest('documents_manager.created_at')
        ->paginate(10);

        return view('documents.document_audits', compact('documents'));
    }

    public function documentsByUsers()
    {
        if (!checkPermission('read document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        
        $documents = $this->documentRepository->paginate(10);

        return view('documents.document_user', compact('documents'));
    }

    public function documentsByRole(Request $request)
    {
        if (!checkPermission('read document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        
        $documents = $this->documentHasRoleRepository->paginate(10);

        return view('documents.document_role', compact('documents'));
    }

    /**
     * Display a listing of the Document assigned to a specific user.
     */
    public function viewDocumentAssignedToUser()
    {
        $user = Auth::user();
        $memos_has_user = $this->documentHasUserRepository->findByUser($user->id)->paginate(10);

        return view('documentmanager::memos.memos_assigned_to_user')
            ->with(['user' => $user, 'memos_has_user' => $memos_has_user]);
    }

    /**
     * Show the form for creating a new Memo.
     */
    public function create()
    {
        if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $categories = $this->documentsCategoryRepository->all()->pluck('name', 'id');
        //$roles = Role::pluck('name', 'id')->all();
        $roles = $this->roleRepository->all()->pluck('name', 'id');
       // $roles->prepend('Select role', '');
       // $departments->prepend('Select department', '');
        $users1 = $this->userRepository->all();

$userData = $users1->map(function ($user) {
    return [
        'id' => $user->id,
        'name' => $user->first_name . ' ' . $user->last_name,
    ];
});

        $users = $userData->pluck('name', 'id');
        //$users->prepend('Select user', '');
        return view('documents.create', compact(['categories','users','roles']));
    }

    /**
     * Store a newly created Memo in storage.
     */
    public function store(CreateDocumentsRequest $request)
    {
       
        if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $user = Auth::user();
        $input = $request->all();
        $input['created_by'] = $user->id;

        // Get folder and its parents. Create if path does not exist
        $path = "documents";


        

        // Check if document with title exist in the folder
        $title = $input['title']; // Assuming the title is provided in the input array

        // Check if a document with the given title already exists
        $existingDocument = Documents::where('title', $title)->first();
        
        if ($existingDocument !== null) {
            // Document with the same title already exists
            Flash::error('Document with the same name already exists');
            return redirect()->back();
        }
        

        // Prepare document input
        $document_input = [];

        
        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];
        $document_input['category_id'] = $input['category_id'];
        $document_input['created_by'] = $user->id;

       

        $path_folder = public_path($path);
        // Save file
        $file = $request->file('file');
        $title = str_replace(' ', '', $input['title']);
        $file_name = $title . '_' . 'v1' . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);
        $document_url = $path . "/" . $file_name;
        $document_input['document_url'] = $document_url;
        $document = $this->documentRepository->create($document_input);

        // Save document version

                // Assign to department(s)
        $roles = $input['roles'];
        if ($roles != null) {
            $this->_assignToRoles($roles, $document);
        }
        // Assign to user(s)
        $users = $input['users'];
        if ($users != null) {
            $this->_assignToUsers($users, $document);
        }

        // Retrieve meta tags from the request
        $metaTags = $request->input('meta_tags');
        // Iterate over each meta tag and save it to the database
    foreach ($metaTags as $tag) {
        MetaTag::create([
            'name' => $tag,
            'document_id' => $document->id,
        ]);
    }

        Flash::success('Document saved successfully.');

        return redirect(route('documents_manager.index'));
    }

    /**
     * Assign memo to users
     */

    public function assignToUsers(Request $request)
    {
        $input = $request->all();
        $memo_id = $input['memo_id'];
        $users = $input['users'];

        if (!checkPermission('assign memo to user')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->documentRepository->find($memo_id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $this->_assignToUsers($users, $memo);

        Flash::success('Memo assigned successfully to user(s).');

        return redirect(route('memos.index'));
    }

    /**
     * Assign memo to departments
     */

    public function assignToDepartments(Request $request)
    {
        $input = $request->all();
        $memo_id = $input['memo_id'];
        $departments = $input['departments'];

        if (!checkPermission('assign memo to department')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->documentRepository->find($memo_id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $this->_assignToRoles($departments, $memo);

        Flash::success('Memo assigned successfully to department(s).');

        return redirect(route('memos.index'));
    }

    /**
     * Display a listing of the assigned users to a Memo.
     */
    public function assignedUsers(Request $request, $id)
    {
        if (!checkPermission('read user-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $assigned_users = $memo->assignedUsers()->paginate();

        return view('documentmanager::memos.assigned_users')
            ->with(['memo' => $memo, 'assigned_users' => $assigned_users]);
    }

    /**
     * Display a listing of the assigned departments to a Memo.
     */
    public function assignedDepartments(Request $request, $id)
    {
        if (!checkPermission('read department-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $assigned_departments = $memo->assignedDepartments()->paginate();

        return view('documentmanager::memos.assigned_departments')
            ->with(['memo' => $memo, 'assigned_departments' => $assigned_departments]);
    }

    /**
     * Remove the specified department assignment from storage.
     *
     * @throws \Exception
     */
    public function deleteAssignedUser($user_id, $memo_id)
    {
        if (!checkPermission('delete user-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo_has_user = $this->memoHasUserRepository->findByUserAndMemo($user_id, $memo_id);

        if (empty($memo_has_user)) {
            Flash::error('Assignment not found');

            return redirect(route('memos.assignedUsers', $memo_id));
        }

        $this->memoHasUserRepository->delete($memo_has_user->id);

        Flash::success('Assignment deleted successfully.');

        return redirect(route('memos.assignedUsers', $memo_id));
    }

    /**
     * Remove the specified department assignment from storage.
     *
     * @throws \Exception
     */
    public function deleteAssignedDepartment($department_id, $memo_id)
    {
        if (!checkPermission('delete department-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo_has_department = $this->memoHasDepartmentRepository->findByDepartmentAndMemo($department_id, $memo_id);

        if (empty($memo_has_department)) {
            Flash::error('Assignment not found');

            return redirect(route('memos.assignedDepartments', $memo_id));
        }

        $this->memoHasDepartmentRepository->delete($memo_has_department->id);

        Flash::success('Assignment deleted successfully.');

        return redirect(route('memos.assignedDepartments', $memo_id));
    }

    /**
     * Display a listing of the Memo Versions.
     */
    public function memoVersions(Request $request, $id)
    {
        if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $memo_document = $this->documentRepository->find($memo->document_id);

        if (empty($memo_document)) {
            Flash::error("Memo's document not found");

            return redirect(route('memos.index'));
        }

        $memoVersions = $memo_document->documentVersions()->paginate(10);

        return view('documentmanager::memos.memo_versions.index')
            ->with(['memo' => $memo, 'memo_document' => $memo_document, 'documentVersions' => $memoVersions]);
    }


    /**
     * Display the specified Memo.
     */
    public function show($id)
    {
        if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        return view('documentmanager::memos.show')->with('memo', $memo);
    }

    /**
     * Show the form for editing the specified Document.
     */
    public function edit($id)
    {
        if (!checkPermission('update document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents_manager.index'));
        }

        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified Document in storage.
     */
    public function update($id, UpdateDocumentsRequest $request)
    {
        if (!checkPermission('update document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $input = $request->all();
        $document = $this->documentRepository->find($id);
        $document_id = $document->id;

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents_manager.index'));
        }

        
        if ($request->hasFile('file')) {
        $path = "documents";
        // Save file
        $path_folder = public_path($path);
        $file = $request->file('file');

        $title = str_replace(' ', '', $document->title);

        $file_name = $title . '_' . 'v' . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);

        $document_url = $path . "/" . $file_name;
        $document_input['document_url'] = $document_url;
       }

        // Save document

        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];
        $document_input['category_id'] = $input['category_id'];
        

        $document = $this->documentRepository->update($document_input, $document_id);


        Flash::success('Document updated successfully.');

        return redirect(route('documents_manager.index'));
    }

    /**
     * Remove the specified Document from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (!checkPermission('delete document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents_manager.index'));
        }

        $this->documentRepository->delete($id);

        Flash::success('Document deleted successfully.');

        return redirect(route('documents_manager.index'));
    }


    public function _assignToRoles($roles, $document)
    {
        $logged_in_user = Auth::user();
        foreach ($roles as $key => $role_id) {
            $input_fields['role_id'] = $role_id;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = $logged_in_user->id;


            $this->documentHasRoleRepository->create($input_fields);


            /* try {
                Notification::send($department->users, new MemoAssignedToDepartment($department, $memo));
            } catch (\Throwable $th) {
            } */
        }
    }

    public function _assignToUsers($users, $document)
    {
        $logged_in_user = Auth::user();
        foreach ($users as $key => $user_id) {
            $input_fields['user_id'] = $user_id;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = $logged_in_user->id;

        
            $this->documentHasUserRepository->create($input_fields);

            /* try {
                $user->notify(new MemoAssignedToUser($memo));
            } catch (\Throwable $th) {
            } */
        }
    }
}
