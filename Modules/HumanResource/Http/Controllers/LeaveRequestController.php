<?php

namespace Modules\HumanResource\Http\Controllers;

use LeaveType;

use Laracasts\Flash\Flash;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\StaffRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Notification;
use Modules\Shared\Repositories\BranchRepository;
use Modules\HumanResource\Repositories\leavetyperepository;

use Modules\HumanResource\Http\Requests\createleaverequests;
use Modules\HumanResource\Http\Requests\updateleaverequests;
use Modules\HumanResource\Notifications\Leaverequest;
use Modules\HumanResource\Repositories\leaverequestrepository;

use Modules\UnitManager\Repositories\UnitHeadRepository;
use Modules\UnitManager\Models\UnitHead;
use Modules\Shared\Models\DepartmentHead;




class LeaveRequestController extends  AppBaseController
{



    /** @var UnitHeadRepository $unitHeadRepository*/
    private $unitHeadRepository;

    /** @var LeaveRequestController $leaverequest*/
    private $leaverequestrepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    /** @var LeavetypeRepository $branchRepository*/
    private $leavetypeRepository ;


    /** @var $userRepository UserRepository */
    private $userRepository;

/** @var StaffRepository $staffRepository*/
private $staffRepository;



public function __construct(UnitHeadRepository $unitHeadRepo,UserRepository $userRepo, LeaveRequestrepository $leaverequestRepo, BranchRepository $branchRepo, StaffRepository $staffRepo ,LeavetypeRepository $leavetypeRepo)
    {
        $this->leaverequestrepository = $leaverequestRepo;
        $this->branchRepository = $branchRepo;
        $this->staffRepository = $staffRepo;
        $this->leavetypeRepository = $leavetypeRepo;
        $this->userRepository=$userRepo;
        $this->unitHeadRepository = $unitHeadRepo;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */




    public function index()

    {

        $user_id = Auth::id();
        $unit_head_data = UnitHead::with('user')->where('user_id',$user_id)->first();
       //$department_head_data = DepartmentHead::with('user')->where('user_id',$user_id)->first();

       //$unit_head_id = $this->leaverequestrepository->isUnitHeadInSameDepartment($user_id, $department_id);

        if(!empty($user_id) && $user_id !=1){
            // $leaverequest=$this->leaverequestrepository->getByUserId($user_id);
            $leaverequest=$this->leaverequestrepository->paginate(10);
        } else {

            $leaverequest=$this->leaverequestrepository->paginate(10);

        }

        //return view('humanresource::leaverequest.index',compact(['department_head_data','leaverequest','unit_head_data']));
        return view('humanresource::leaverequest.index',compact(['leaverequest']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()

    {

        $user_id = Auth::id();
        $unit_head_data = UnitHead::with('user')->where('user_id',$user_id)->first();
        $department_head_data = DepartmentHead::with('user')->where('user_id',$user_id)->first();

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');

        $leavetype = $this->leavetypeRepository->all();



        //the downone has been commented out
       // $leavetype = $this->leavetypeRepository->all()->pluck('name','id');



        return view('humanresource::leaverequest.create',compact(['leavetype','department_head_data','branches','unit_head_data']));

    }

    public function getDuration($id)
    {

        $leavetype = $this->leavetypeRepository->getById($id);

        return response()->json(['duration' => $leavetype->duration]);
    }

    public function leavetypeduration(Request $request)
    {
        $id=$request->get('id');

        $leavetype=$this->leavetypeRepository->find($id)->pluck('duration');


        return $leavetype;
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateLeaveRequests $request, LeavetypeRepository $leavetype)
    {

        $input=$request->all();

        $uid=Auth::id();
        $user=Auth::user();



        // $staff_id = $this->staffRepository->getByUserId($uid);
         // $input['staff_id'] = $staff_id->id;

         $input['supervisor_approval'] = 0;
         $input['hr_approval'] = 0;
         $input['hod_approval'] = 0;
         $input['user_id']=$uid;

        $input['leavetype_id'] = $request->type;



        if ($request->hasFile('signature_path')) {
            $file = $request->file('signature_path');
            $fileName = $file->hashName();
            $path = $file->store('public');
            $input['signature_path'] = $fileName;
        }

        $leaveRequest = $this->leaverequestrepository->create($input);

        // sending a notification to the user that he has created a leave request
        //Notification::send($user,new Leaverequest($input));

        //INITIATE APPROVAL FLOW || ALSO FOR UPDATING create|update
        $approval_request = $leaveRequest->request()->create([
            'staff_id' => $user->staff->id,
            'type_id' => 2,//for casual leave requests
            'order' => 1,//order/step of the flow
            'action_id' => 1,//action taken id 1= create
        ]);

        Flash::success('Leave Requests sent successfully.');

        return redirect(route('leave_request.index'));

    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */

    public function show($id)
    {
        $leaverequest = $this->leaverequestRepository->find($id);


        if (empty($leaverequest)) {
            Flash::error('Leave Requests not found');

            return redirect(route('leaverequests.index'));
        }

        return view('humanresource::leaverequest.show')->with('leaverequest',$leaverequest);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {

        $leaverequest= $this->leaverequestRepository->find($id);
        if (empty($leaverequest)) {
            Flash::error('Leave Request not found');

            return redirect(route('leave_request.index'));
        }

        $user_id = Auth::id();
        $unit_head_data = UnitHead::with('user')->where('user_id',$user_id)->first();
        $department_head_data = DepartmentHead::with('user')->where('user_id',$user_id)->first();

       //  $leavetype=$this->leavetypeRepository->find($id)->pluck('duration','id');
      //  $leavetype=$this->leavetypeRepository->find($id)->all();
        $leavetype=$this->leavetypeRepository->all();

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');

        return view('humanresource::leaverequest.edit')->with(['department_head_data' => $department_head_data,'unit_head_data' => $unit_head_data,'LeaveRequest' => $leaverequest, 'branches' => $branches,'leavetype'=>$leavetype]);;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */

    public function update($id, updateleaverequests $request)
    {
       // $user= Auth::user();
        $leaverequest = $this->leaverequestrepository->find($id);

        if (empty($leaverequest)) {
            Flash::error('leave request not found');

            return redirect(route('leave_request.index'));
        }

        $input = $request->all();
        $user_id = Auth::id();
        //$input['staff_id'] = $user_id;
        $input['comments'] = $input['comments'];

        if ($request->hasFile('signature_path')) {
            $file = $request->file('signature_path');
            $fileName = $file->hashName();
            $path = $file->store('public');
            $input['signature_path'] = $fileName;
        } else {
            // prevent images from updating db since there is no upload
            unset($input['signature_path']);
        }

        $leaverequest = $this->leaverequestrepository->update($input, $id);

        //Notification::send($user,new Leaverequest($input));

        Flash::success('LEAVE REQUEST Updated successfully .');

        return redirect(route('leave_request.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $dtarequests = $this->leaverequestrepository->find($id);

        if (empty($dtarequests)) {
            Flash::error('LEAVE Requests not found');

            return redirect(route('leave_request.index'));
        }

        $this->leaverequestrepository->delete($id);

        Flash::success('LEAVE REQUEST DISCARDED SUCCESSFULLY.');

        return redirect(route('leave_request.index'));
    }
}







