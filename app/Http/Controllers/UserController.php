<?php

namespace App\Http\Controllers;


use view;

use Response;
use App\Models\User;
use App\Mail\EBSMail;
use App\Models\Signature;
use Laracasts\Flash\Flash;
use App\Mail\BulkStaffEmail;
use Illuminate\Http\Request;
use App\Notifications\UserCreated;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\StaffRepository;
use Modules\Shared\Models\Department;
use Modules\UnitManager\Models\Region;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Modules\WorkflowEngine\Models\Staff;
use Illuminate\Support\Facades\Validator;
use Modules\HRMSystem\Models\Designation;
use Modules\HumanResource\Models\Ranking;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Notification;
use Modules\EmployerManager\Models\Employer;
use Modules\Shared\Repositories\BranchRepository;
use Modules\Shared\Repositories\DepartmentRepository;
use App\Imports\UsersImport; // Create this import class
use Modules\HumanResource\Repositories\RankingRepository;
use Illuminate\Support\Facades\Log;



class UserController extends AppBaseController
{
    /** @var $userRepository UserRepository */
    private $userRepository;

    /** @var $userRepository UserRepository */
    private $roleRepository;

    /** @var $branchRepository BranchRepository */
    private $branchRepository;

    /** @var $departmentRepository DepartmentRepository */
    private $departmentRepository;

    /** @var $staffRepository StaffRepository */
    private $staffRepository;

    /** @var $rankRepository RankingRepository */
    private $rankRepository;

    public function __construct(RankingRepository $rankRepo, UserRepository $userRepo, RoleRepository $roleRepo, BranchRepository $branchRepo, DepartmentRepository $departmentRepo, StaffRepository $staffRepo)
    {
        $this->userRepository = $userRepo;
        $this->roleRepository = $roleRepo;
        $this->branchRepository = $branchRepo;
        $this->departmentRepository = $departmentRepo;
        $this->staffRepository = $staffRepo;
        $this->rankRepository = $rankRepo;
    }


    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // Auth::check() && Auth::user()->hasRole('minister')
        // if ((Auth::check() && Auth::user()->hasRole('super-admin') || (Auth::check() && Auth::user()->hasRole('supervisor')&& Auth()->user()->staff->department_id=3) ) ) 
      if   (Auth::check() && (Auth::user()->hasRole('super-admin') || (Auth::user()->hasRole('SUPERVISOR') && Auth::user()->staff->department_id == 3)))
        {
         
            
      
            
            
         $userbranch_id=auth()->user()->staff->branch_id;



         if(Auth::user()->hasRole('super-admin')){

        $usersQuery = DB::table('users')
            ->join('staff', 'users.id', '=', 'staff.user_id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('departments', 'staff.department_id', '=', 'departments.id')
            ->join('branches', 'staff.branch_id', '=', 'branches.id')
            ->select('users.id', 'roles.name as role', 'users.first_name', 'users.middle_name', 'users.last_name', 'users.email', 'users.status', 'departments.department_unit', 'branches.branch_name');

        $noroleQuery = DB::table('users')
            ->leftJoin('staff', 'users.id', '=', 'staff.user_id')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->whereNull('model_has_roles.role_id')
            ->join('departments', 'staff.department_id', '=', 'departments.id')
            ->join('branches', 'staff.branch_id', '=', 'branches.id')
            ->select('users.id', DB::raw("NULL as role"), 'users.first_name', 'users.middle_name', 'users.last_name', 'users.email', 'users.status', 'departments.department_unit', 'branches.branch_name');
         
        }else{
            $usersQuery = DB::table('users')
            ->join('staff', 'users.id', '=', 'staff.user_id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('departments', 'staff.department_id', '=', 'departments.id')
            ->join('branches', 'staff.branch_id', '=', 'branches.id')
            ->where('staff.branch_id',$userbranch_id)
            ->select('users.id', 'roles.name as role', 'users.first_name', 'users.middle_name', 'users.last_name', 'users.email', 'users.status', 'departments.department_unit', 'branches.branch_name');

        $noroleQuery = DB::table('users')
            ->leftJoin('staff', 'users.id', '=', 'staff.user_id')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->whereNull('model_has_roles.role_id')
            ->join('departments', 'staff.department_id', '=', 'departments.id')
            ->join('branches', 'staff.branch_id', '=', 'branches.id')
            ->where('staff.branch_id',$userbranch_id)
            ->select('users.id', DB::raw("NULL as role"), 'users.first_name', 'users.middle_name', 'users.last_name', 'users.email', 'users.status', 'departments.department_unit', 'branches.branch_name');

         }

        $uid = Auth::user()->user_id;

        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';

            $usersQuery->where(function ($query) use ($searchTerm) {
                $query->where('first_name', 'like', $searchTerm)
                    ->orWhere('middle_name', 'like', $searchTerm)
                    ->orWhere('last_name', 'like', $searchTerm)
                    ->orWhere('email', 'like', $searchTerm);
            });

            $noroleQuery->where(function ($query) use ($searchTerm) {
                $query->where('first_name', 'like', $searchTerm)
                    ->orWhere('middle_name', 'like', $searchTerm)
                    ->orWhere('last_name', 'like', $searchTerm)
                    ->orWhere('email', 'like', $searchTerm);
            });
        }

        $users = $usersQuery->paginate(10);
        $norole = $noroleQuery->paginate(10);

        return view('users.index', compact('users', 'norole'));
              
    } else {
        flash::success('oops!....,you are not allowed ');
        return redirect()->route('home');
    }



    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('file')) {
            try {
                $file = $request->file('file');

                $import = new UsersImport();
                Excel::import($import, $file);

                // Flash success message
                flash('Bulk staff uploaded and data saved successfully.')->success();
            } catch (\Exception $e) {
                // Flash error message on exception
                flash('An error occurred during file processing: ' . $e->getMessage())->error();
                return redirect()->back();
            }
        } else {
            // Flash error message for no file uploaded
            flash('No file uploaded.')->error();
        }

        return redirect(route('users.index'));
    }


    public function bulkUpload()
    {

        return view('users.bulk');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('term');

        $users = User::where('first_name', 'like', '%' . $searchTerm . '%')
            ->get(['id', 'first_name']);

        return response()->json($users);
    }

    public function html_email()
    {
        /* $mailData = [
            'title' => 'Mail from nsitf.gov.ng',
            'body' => 'This is for testing email using smtp.'
        ];

        $send = Mail::to('tacticshustle@gmail.com')->send(new EBSMail($mailData));

        if ($send) {
            echo "Great!  mail successfully send!";
        } else {
            echo "Sorry!  mail not sent!";
        } */

        $email = "test1@nsitf.gov.ng";
             $password = "Testing1!";
             $add_url = "https://nsitf.gov.ng:2083/execute/Email/add_pop?email=" . urlencode($email) . "&password=" . urlencode($password) . "&domain=nsitf.gov.ng";
     
             $curl = curl_init();
     
             curl_setopt_array($curl, array(
                 CURLOPT_URL => $add_url,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_ENCODING => "",
                 CURLOPT_MAXREDIRS => 10,
                 CURLOPT_TIMEOUT => 30,
                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                 CURLOPT_CUSTOMREQUEST => "GET",
                 CURLOPT_HTTPHEADER => array(
                     "Authorization: cpanel nsitfmai:CBQGD88REZCOO15NI5VB64VEGQLPVOBQ",
                     "Cache-Control: no-cache",
                 ),
             ));
     
             $response = curl_exec($curl);
             $err = curl_error($curl);
     
             curl_close($curl);

             if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        // $rank=Ranking::pluck('name','id')->all();
        $rank = $this->rankRepository->all()->pluck('name', 'id');
        $roles = Role::pluck('name', 'id')->all();
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        $roles->prepend('Select role', '');
        $branch = $this->branchRepository->all()->pluck('branch_name', 'id');
      
      
        $department = $this->departmentRepository->all()->pluck('department_unit', 'id');
        return view('users.create', compact('roles', 'branch', 'department', 'rank'));
    }

    
    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */

     public function store(CreateUserRequest $request)
     {
         $input = $request->all();

         //$email = $input['email'];
     
         $input['plain_password'] = $input['password'];
     
         $input['password'] = Hash::make($input['password']);

         
         //Create a new user
         $user = $this->userRepository->create($input);
        
         // Retrieve the value of the checkbox
         $checkboxValue = $request->input('checkbox');
     
         // Check if the checkbox is checked
         if ($checkboxValue == 1) {
             // Checkbox is checked
             //Get user id from newly created user and assign it to user_id post input
             $input['user_id'] = $user->id;
             //Check for file upload and upload to public  directory
             if ($request->hasFile('profile_picture')) {
                 $file = $request->file('profile_picture');
                 $fileName = $file->hashName();
                 $path = $file->store('public');
                 $input['profile_picture'] = $fileName;
             }
     
             // Attempt to create email password
             $email = $input['email'];
             $password = $input['plain_password'];
             $add_url = "https://nsitf.gov.ng:2083/execute/Email/add_pop?email=" . urlencode($email) . "&password=" . urlencode($password) . "&domain=nsitf.gov.ng";
     
             $curl = curl_init();
     
             curl_setopt_array($curl, array(
                 CURLOPT_URL => $add_url,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_ENCODING => "",
                 CURLOPT_MAXREDIRS => 10,
                 CURLOPT_TIMEOUT => 30,
                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                 CURLOPT_CUSTOMREQUEST => "GET",
                 CURLOPT_HTTPHEADER => array(
                     "Authorization: cpanel nsitfmai:CBQGD88REZCOO15NI5VB64VEGQLPVOBQ",
                     "Cache-Control: no-cache",
                 ),
             ));
     
             $response = curl_exec($curl);
             $err = curl_error($curl);
     
             curl_close($curl);
     
             if ($err) {
                 // Email password creation failed
                 // You can show the error message to the user and redirect back
                 return redirect()->back()->with('error', 'Email password creation failed: ' . $err);
             }
     
             // Email password creation was successful
             // Continue with user data saving
             // Create a new staff
             
             $this->staffRepository->create($input);
         }
     
        //   //storing the rank
        //   $user->staff->rank->create($input['ranking_id']);
     
         $role = $this->roleRepository->getByUserRoles($input['roles']);
     
         if (empty($role)) {
             Flash::error('Role not found');
             return redirect(route('users.index'));
         }
     
         $user->assignRole($role);
         
         // Send notification to user about his account details
         //Notification::send($user, new UserCreated($input));
         try {
            Mail::to($input['alternative_email'])->send(new BulkStaffEmail($user, $input['alternative_email'], $password));
            
            Flash::success('User saved successfully.');
            return redirect(route('users.index'));
        } catch (\Exception $e) {
            // Handle the exception here
            Flash::error('Failed to send email: ' . $e->getMessage());
            // You might want to log the exception for further investigation
            Log::error('Failed to send email: ' . $e->getMessage());
            
            // Redirect back to the form or wherever you need
            return redirect(route('users.index'));
        }
     }
     
     public function showChangePasswordForm()
    {
        return view('users.change-email-password');

    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $newPassword = $request->input('password');

        $user->password = Hash::make($newPassword);
        $user->save();

        $email = Auth::user()->email;
        $addUrl = "https://nsitf.gov.ng:2083/execute/Email/passwd_pop?email=" . urlencode($email) . "&password=" . urlencode($newPassword) . "&domain=nsitf.gov.ng";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $addUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: cpanel nsitfmai:CBQGD88REZCOO15NI5VB64VEGQLPVOBQ",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
            Flash::error('Email password not changed. '.$err);
            return redirect(route('change.email.password'));
        }

        curl_close($curl);

        // Handle response and errors as needed
        Flash::error('Email password & EBS Password changed successfully. ');
        return redirect(route('change.email.password'));
    }

    public function saveSignature(Request $request)
    {
        $signatureData = $request->input('signature_data');
         
        //$staffId = Auth()->user()->staff->id;
        $userId = Auth()->id();

        $signature = Signature::find(1);
        if(!empty($signature)){
        $signature->user_id = $userId;
        $signature->signature_data = $signatureData;
        $signature->save();
        }
        if(empty($signature)){
            Signature::create(['user_id'=> $userId,'signature_data' => $signatureData]);
        }

        return response()->json(['message' => 'Signature saved successfully']);
    }

    public function changeSignature()
    {
        $signature = Signature::with('user')->find(1);

        return view('users.signature',compact("signature"));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mergedResults = $this->userRepository->getSomeTablesData($id);

        return view('users.show')->with('user', $mergedResults);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */




    //$rank= $this->rankRepository->all()->pluck('name','id');
    public function edit($id)
    {

        $user = $this->userRepository->getByUserId($id);

        $branch = $this->branchRepository->all()->pluck('branch_name', 'id');

        
        $department = $this->departmentRepository->all()->pluck('department_unit', 'id');


        $rank = Ranking::all()->pluck('name', 'id');

        if (empty($user)) {
            Flash::error('User not a staff so it can not be edited');

            return redirect(route('users.index'));
        }


        // $rol=Role::pluck('name','name')->all();
        // $myrole=$user->roles->pluck('name','name')->all();
        //$user['role_id'] = $user1->roles()->first()->id;

        // $roles = $this->roleRepository->all()->pluck('name', 'id');

        $roles=Role::all()->pluck('name','id')->all();
        $userrole=$user->roles->pluck('name','id')->all();
        // $roles->prepend('Select role', '');
        $single_user = User::find($id);

        return view('users.edit', compact('user','roles',
        'branch', 'department', 'id',
         'rank','userrole','single_user'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    //bring out icon for approve



    public function update($id, UpdateUserRequest $request)
    {
        //    dd($request->all());

        $user = $this->userRepository->getByUserId($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $input =  $request->all();

        
        // Retrieve the value of the checkbox
        $checkboxValue = $request->input('checkbox');
        
        // Check if the checkbox is checked
        if ($checkboxValue == 1) {
            // Checkbox is checked
            //Get user id from newly created user and assign it to user_id post input
            $input['user_id'] = $user->userId;
            
           
            
            //Check for file upload and upload to public  directory
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $fileName = $file->hashName();
                $path = $file->store('public');
                $input['profile_picture'] = $fileName;
            } else {
                // prevent picture from updating db since there is no upload
                unset($input['profile_picture']);
            }
            // prevent email from updating since email is unique
            unset($input['email']);
            //Create a new staff
            $this->staffRepository->update($input, $user->staff_id);
        }

        $role = $this->roleRepository->getByUserRoles($input['roles']);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('users.index'));
        }

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
        
        
       //updating their staff_id
       $input['staff_id']=$request->input('staff_id');
       
        $input['unit_id']=$request->input('unit_id');

        $user = $this->userRepository->update($input, $id);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        //$user->assignRole($request->input('roles'));

        $user->roles()->detach();
        $user->assignRole($role);


        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */




    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        if ($user->hasRole('super-admin')) {
            Flash::error('Cannot delete super admin');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    //function for profile
    public function manage_account($id)
    {
        echo "I am here! " . $id;
    }
    //i just did the method for soft delete yet to do route and view
    public function restorestaff(){
        $staff = Staff::withTrashed()->get();
        flash::success('only staff restored');
        return redirect()->route('users.index');
    }

    /* public function employeeJson(Request $request)
    {
        $employees = User::where('branch_id', $request->branch)->get()->pluck('name', 'id')->toArray();

        return response()->json($employees);
    } */

    public function json(Request $request)
    {
        $designations = Designation::where('department_id', $request->department_id)->get()->pluck('name', 'id')->toArray();

        return response()->json($designations);
    }
}
