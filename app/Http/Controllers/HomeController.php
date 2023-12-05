<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Shared\Models\Department;

use Modules\UnitManager\Models\Region;
use Modules\WorkflowEngine\Models\Staff;
use Modules\EmployerManager\Models\Payment;
use Modules\EmployerManager\Models\Employee;
use Modules\EmployerManager\Models\Employer;
use Modules\EmployerManager\Models\Certificate;
use Modules\ClaimsCompensation\Models\ClaimsCompensation;
use App\Models\AttendanceEmployee;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::check() && Auth::user()->hasRole('minister')) {
            return redirect()->route('minister');
        }
        else if(Auth::check() && Auth::user()->hasRole('permsec'))
        {

            return redirect()->route('permsec');
        }
        else if(Auth::check() && Auth::user()->hasRole('Regional Manager'))
        {

            return redirect()->route('region');
        }
        else if(Auth::check() && Auth::user()->hasRole('Branch Manager'))
        {

            return redirect()->route('branch');
        }
        else if(Auth::check() && Auth::user()->hasRole('ED FINANCE & ACCOUNT'))
        {

            return redirect()->route('ed_md');
        }
        else if(Auth::check() && Auth::user()->hasRole('ED ADMIN'))
        {

            return redirect()->route('ed_admin');
        }
        else if(Auth::check() && Auth::user()->hasRole('ED OPERATION'))
        {

            return redirect()->route('ed_op');
            //atp take note, you have not yet done page for ed_op,no role as ed operation yet
        }
        else if(Auth::check() && Auth::user()->hasRole('MD'))
        {

            return redirect()->route('ed_md');
        }

        else if(Auth::check() && Auth::user()->staff->department_id==6){
            return redirect()->route('dashboard');
        
        }

        else {

            
            $claims_table = 'death_claims';
            $claims_death_count = DB::table($claims_table)->count();
            
            $staffs = 'staff';
            $staff_count = DB::table($staffs)->count();
            $ictstaff= Staff::where('department_id',3)->count();
            
            $totalemployers=Employer::count();
            $registered_employers = Employer::where('status', 1)->count();
            $pending_employers = Employer::where('status', 2)->count();
            $registered_employees = Employee::where('status', 1)->count();
            $pending_employees = Employee::where('status', 2)->count();
            $data = Employer::where('status', 1);
            $data = $data->paginate(10);
            $diseaseclaims=ClaimsCompensation::where('claimstype_id',2)->count();
            $deathclaims=ClaimsCompensation::where('claimstype_id',3)->count();
            // $diseaseclaims=ClaimsCompensation::where('id',1)->count();
            $approvedclaims =ClaimsCompensation::where('regional_manager_status',1)->count();
            $pendingclaims =ClaimsCompensation::where('regional_manager_status',0)->count();
            
            
            return view('home', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees',
            'claims_death_count','deathclaims', 
            'staff_count','diseaseclaims', 'data','ictstaff',
            'totalemployers','pendingclaims','approvedclaims'));
        }
    }


    // $allstaff=Staff::count();
    //     $totalregion = Region::count();
    //     $totaldept= Department::count();
    //     $totalemployer=Employer::count();
    //     $managementstaff =Staff::where('ranking_id','!==',1)->count();
    
    // $userdepartment=auth()->user()->staff->department_id;
    // $userbranch=auth()->user()->staff->branch_id;
    // $allstaff=Staff::where('branch_id',$userbranch)->count() ;
   
    // $totalregion = Region::count();
    // // $totaldept= Department::count();
    // $totaldept= DB::table('departments')
    // ->join('staff','staff.department_id','=','departments.id')
    // ->join('branches','staff.branch_id','=','branches.id')
    // ->count();
    // // dd($totaldept);



    // // dd(auth()->user()->employer);
    // $totalemployer=Employer::count();
public function regional(){

    $totalbranches= Branch::count();
    $totalregional = Region::count();
    $totaldepartment=Department::count();
    // dd(auth()->user()->staff->branch);
    $userbranch =auth()->user()->staff->branch_id;
    $region =Region::all();

    $myregionid = auth()->user()->staff->branch->region_id;
   
    $totalbranchinregion = DB::table('branches')
    ->where('region_id',$myregionid)->count();

  

 
    $totaldepartmentinregion =DB::table('departments')
    ->join('branches','departments.branch_id','=','branches.id')
    ->join('regions','branches.region_id','=','regions.id')
    ->count();

   
    $totalstaffinregion =DB::table('staff')
    ->join('branches','staff.branch_id','=','branches.id')
    ->join('regions','branches.region_id','=','regions.id')
    ->count();
    
    $totalunitinregion =DB::table('units')
    ->join('departments as d','units.department_id','=','d.id')
    ->join('branches as b','d.branch_id','=','b.id')
    ->join('regions as r','b.region_id','=','r.id')
    ->count();



    $totalemployersinbranch = DB::table('employers as e')
    ->join('branches as b','e.branch_id','=','b.id')
    ->join('regions as r','b.region_id','=','r.id')
    ->count();
// dd( $totalemployersinbranch );

    $totalcerticateinbranches = DB::table('certificates as c')
    ->where('payment_status','=',1)
    ->join('branches as b','c.branch_id','=','b.id')
    ->join('regions as r','b.region_id','=','r.id')
    ->count();
    

    
    return view('regionaladmin',compact('totalbranches',
    'totalregional','totaldepartment','region','totalbranchinregion',
    'totaldepartmentinregion','totalstaffinregion','totalunitinregion',
    'totalemployersinbranch','totalcerticateinbranches',

));

        // return view('regionaladmin',compact('allstaff','totalregion','totaldept',
        // 'totalemployer','managementstaff'));

}
public function branch(Request $request){
    // dd(DB::table('staff')->count());
    $userdepartment=auth()->user()->staff->department_id;
    $userbranch=auth()->user()->staff->branch_id;

    $totaldept=Department::count();
    $totalbranches=Branch::count();
    $allstaff= DB::table('staff as s')
    ->join('branches as b','s.branch_id','=','b.id')
    ->count();
    // $allstaff=Staff::where('branch_id',$userbranch)->count() ;
   
    $totalregion = Region::count();
    // $totaldept= Department::count();
    $totaldept= DB::table('departments')
    // ->join('staff','staff.department_id','=','departments.id')
    // ->join('branches','staff.branch_id','=','branches.id')
    ->count();
    // dd($totaldept);



    // dd(auth()->user()->employer);
    $totalemployer=Employer::count();

    $managementstaff =Staff::where('ranking_id','!==',1)->count();
    
    return view('branchadmin',compact('allstaff','totaldept','totalbranches','totalregion','totaldept',
    'totalemployer','managementstaff'));                 
            

}

public function edfinance(){
    $branchtotal= Branch::count();
        
    
    $departmenttotal = Department::count();
    $regiontotal= Region::count();
    $revenuefromecs=Payment::where('payment_type',1)->count();
    $revenuefromcertificate=Payment::where('payment_type',2)->count();
    $revenuefromregistration=Payment::where('payment_type',3)->count();
    $totalstaff =Staff::count();
    $totalemployers=Employer::count();
    $totalemployees=Employee::count();
    $totalcertificate=Certificate::count();

    return view('ed_md',compact('branchtotal','departmenttotal',
    'regiontotal','revenuefromecs',
    'revenuefromcertificate','revenuefromregistration','totalemployers',
    'totalemployees','totalcertificate',
   
    'totalstaff'));
}
public function edadmin(){
    $totalbranch=Branch::count();
    $totalregion=Region::count();
    $totaldept=Department::count();

    return view('ed_admin',compact('totalbranch','totalregion','totaldept'));
}



    public function minister()
    {
        $branchtotal= Branch::count();
        
    
        $departmenttotal = Department::count();
        $regiontotal= Region::count();
        $revenuefromecs=Payment::where('payment_type',1)->count();
        $revenuefromcertificate=Payment::where('payment_type',2)->count();
        $revenuefromregistration=Payment::where('payment_type',3)->count();
        $totalstaff =Staff::count();
        $totalemployers=Employer::count();
        $totalemployees=Employee::count();
        $totalcertificate=Certificate::count();
    
        return view('minister',compact('branchtotal','departmenttotal',
        'regiontotal','revenuefromecs',
        'revenuefromcertificate','revenuefromregistration','totalemployers',
        'totalemployees','totalcertificate',
       
        'totalstaff'));
    }


    public function hradmin()
    {
        
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('layouts/hradmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

    public function aprd()
    {
        
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('aprd', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

    public function fre()
    {
        
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('fre', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }
    public function copaffairs()
    {
        
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('copaffairs', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

    public function financeadmin()
    {
        
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('financeadmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }


    public function claimsadmin()
{

//starting myown claims data
$deathclaims= ClaimsCompensation::where('claimstype_id' ,3)->count();
$diseaseclaims= ClaimsCompensation::where('claimstype_id' ,2)->count();

    //
    $registered_employers = Employer::where('status', 1)->count();
    $pending_employers = Employer::where('status', 2)->count();
    $registered_employees = Employee::where('status', 1)->count();
    $pending_employees = Employee::where('status', 2)->count();
    
    $data = Employer::where('status', 1);
    $data = $data->paginate(10);
    
    
    return view('claimsadmin', compact(
        'registered_employers', 
        'pending_employers', 
        'registered_employees', 
        'pending_employees', 
        'data',
        'deathclaims',
        'diseaseclaims'

    ));
}


public function ictadmin(){
    $ictstaff=Staff::where('department_id',3)->count();
return view('ictadmin',compact('ictstaff'));
}

    public function itmadmin()
    {
        
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('itmadmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

public function legaladmin(){
    return view('legaladmin');
}

public function procurementadmin(){
    return view('procurement');
}

    public function complianceadmin()
    {
   

        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('complianceadmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

    public function riskadmin(){
        
        return view('riskadmins');
    }


    public function auditadmin(){
        return view('auditadmin');
    }
    public function hseadmin()
    {

        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('hseadmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }
    public function pamsec()
    {
        $allstaff=Staff::count();
        $totalregion = Region::count();
        $totaldept= Department::count();
        $totalemployer=Employer::count();
        $managementstaff =Staff::where('ranking_id','!==',1)->count();
        
        return view('pamsec',compact('allstaff','totalregion','totaldept',
        'totalemployer','managementstaff'));
    }
    // Mail Demo UI
    public function composeMail()
    {
        return view('composemail');
    }
    public function mailInbox()
    {
        return view('mailinbox');
    }

    public function viewReplyMail()
    {
        return view('viewreplymail');
    }

    public function loginToRoundcube($username, $password, $roundcubeUrl)
{
    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $roundcubeUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        '_task' => 'login',
        '_action' => 'login',
        '_timezone' => '1',
        '_url' => '_task=login',
        '_user' => $username,
        '_pass' => $password,
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL request
    $response = curl_exec($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL session
    curl_close($ch);

    // Return the response
    return [
        'status_code' => $statusCode,
        'body' => $response,
    ];
}

    public function roundcubeLogin(Request $request)
    {
        $username = 'test1@nsitf.gov.ng';
        $password = 'Testingdata1!';
        $roundcubeUrl = 'http://localhost/nsitfmail/?_task=login';

        $response = $this->loginToRoundcube($username, $password, $roundcubeUrl);

        return response()->json($response);
    }

    public function clockIn(Request $request)
{
    // Validate the request data as needed
    $data = $request->validate([
        'employee_id' => 'required',
        // Add validation rules for other fields
    ]);

    // Check if the user has already clocked in for the current day
    $existingAttendance = AttendanceEmployee::where('employee_id', Auth::user()->id)
        ->where('date', now()->toDateString())
        ->where('status', 'Clock In')
        ->first();

    if ($existingAttendance) {
        return response()->json(['message' => 'You have already clocked in for today.']);
    }

    // Insert the clock-in record
    $data['date'] = now()->toDateString(); // Current date
    $data['status'] = 'Clock In';
    $data['clock_in'] = now()->toTimeString(); // Current time
    $data['clock_out'] = now()->toTimeString(); // Current time
    $data['employee_id'] = Auth::user()->id;
    $data['late'] = now()->toTimeString();
    $data['early_leaving'] = now()->toTimeString();
    $data['overtime'] = now()->toTimeString();
    $data['total_rest'] = "23";
    $data['created_by'] = "4";

    $attendance = AttendanceEmployee::create($data);

    return response()->json(['message' => 'Clock In Successful']);
}

    public function clockOut(Request $request)
    {
        // Validate the request data as needed
        $data = $request->validate([
            'employee_id' => 'required',
            // Add validation rules for other fields
        ]);

        // Find the last clock-in record for the user and update the clock-out time
        $attendance = AttendanceEmployee::where('employee_id', $data['employee_id'])
            ->where('date', now()->toDateString()) // Current date
            ->where('status', 'Clock In')
            ->latest()
            ->first();

        if ($attendance) {
            $attendance->status = 'Clock Out';
            $attendance->clock_out = now()->toTimeString(); // Current time
            $attendance->save();
            return response()->json(['message' => 'Clock Out Successful']);
        }

        return response()->json(['message' => 'No matching Clock In record found'], 404);
    }


}
