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
        else {

            
            $claims_table = 'death_claims';
            $claims_death_count = DB::table($claims_table)->count();
            
            $staffs = 'staff';
            $staff_count = DB::table($staffs)->count();
            $ictstaff= Staff::where('department_id',3)->count();
            
            $registered_employers = Employer::where('status', 1)->count();
            $pending_employers = Employer::where('status', 2)->count();
            $registered_employees = Employee::where('status', 1)->count();
            $pending_employees = Employee::where('status', 2)->count();
            $data = Employer::where('status', 1);
            $data = $data->paginate(10);
            
            
            
            return view('home', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees',
            'claims_death_count', 'staff_count', 'data','ictstaff'));
        }
    }

    public function minister()
    {
        $branchtotal= Branch::count();
        
    
        $departmenttotal = Department::count();
        $regiontotal= Region::count();
        $revenuefromecs=Payment::where('payment_type',1)->count();
        $revenuefromcertificate=Payment::where('payment_type',2)->count();
        $revenuefromregistration=Payment::where('payment_type',3)->count();
        $totalstaff=Staff::count();
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
        return view('pamsec');
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

}
