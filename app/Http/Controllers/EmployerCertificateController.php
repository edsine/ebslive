<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use Modules\EmployerManager\Models\Certificate;
use Modules\EmployerManager\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Http\Request;
use App\Models\Signature;
use App\Http\Controllers\AppBaseController;
use Modules\ClaimsCompensation\Models\DeathClaim;
use Modules\ClaimsCompensation\Models\DiseaseClaim;
use Modules\ClaimsCompensation\Models\AccidentClaim;
use App\Http\Requests\StoreDeathClaimRequest;
use App\Http\Requests\UpdateDeathClaimRequest;
use App\Http\Requests\StoreDiseaseClaimRequest;
use App\Http\Requests\UpdateDiseaseClaimRequest;
use App\Http\Requests\StoreAccidentClaimRequest;
use App\Http\Requests\UpdateAccidentClaimRequest;

class EmployerCertificateController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
/*         $initial_year = 2023;
        $start_year = date('Y', strtotime(auth()->user()->created_at)) > $initial_year ? date('Y', strtotime(auth()->user()->created_at)) : $initial_year;

        $certificate_years = [];
        --$start_year;
        //check if employer has ECS payments since registration or start of system
        do {
            ++$start_year;
            $payment = auth()->user()->payments()
                ->where('payment_type', 4)
                ->where('payment_status', 1)
                ->whereRaw('contribution_year = ' . $start_year)
                ->selectRaw("SUM(contribution_months) AS contribution_months, contribution_period")
                ->groupBy(['contribution_year', 'contribution_period'])
                ->whereNotExists(function ($query) use ($start_year) {
                    $query->select(DB::raw(1))
                        ->from('certificates')
                        ->whereRaw('application_year = ' . $start_year);
                })
                ->first();

            //Employer can only generate certificates for years with completed payments
            //and where certificate has not already been generated
            if (
                ($payment && $payment->contribution_period == 'Annually') ||
                ($payment && $payment->contribution_period == 'Monthly' && $payment->contribution_months == 12)
            ) {
                $certificate_years[] = $start_year;
            }
        } while ($start_year < date('Y'));


        $certificates = auth()->user()->certificates;

        if ($certificates->count() > 0)
            $pending = auth()->user()->certificates()->get()->last();
        else $pending =  null;

        $amount = 50000;
        return view('certificates.index', compact('certificates', 'amount', 'pending', 'certificate_years'));
 */
        //if there is/are no completed ECS payments yearly payments
        //then employer cannot generate certificate

        $user = DB::table('employers')->where('id', $id)->first();
        $initial_year = 2023;
        $start_year = date('Y', strtotime($user->created_at)) > $initial_year ? date('Y', strtotime($user->created_at)) : $initial_year;
        
        $certificate_years = [];
        --$start_year;

        do {
            ++$start_year;
            $payment = DB::table('payments')
    ->select(DB::raw('SUM(contribution_months) AS contribution_months, contribution_period, contribution_year'))
    ->where('payment_type', 4)
    ->where('payment_status', 1)
    ->where('employer_id', $user->id)
    ->where('contribution_year', $start_year)
    ->groupBy(['contribution_year', 'contribution_period'])/* 
    ->whereNotExists(function ($query) use ($start_year) {
        $query->select(DB::raw(1))
            ->from('certificates')
            ->whereRaw('application_year = ' . $start_year);
    }) */
    ->first();

    $certificate = DB::table('certificates')->where('employer_id', $user->id)
    ->whereRaw('application_year = ' . $start_year)->latest()->first();

    if(!$certificate){
if (
    ($payment && $payment->contribution_period == 'Annually') ||
    ($payment && $payment->contribution_period == 'Monthly' && $payment->contribution_months == 12)
) {
    $certificate_years[] = $start_year;
}
    }
            //$certificate_years[] = $start_year;

        } while ($start_year < date('Y'));

        

        $certificates = DB::table('certificates')
    ->where('employer_id', $user->id)
    ->get();

        if ($certificates->count() > 0)
        $pending = DB::table('certificates')
        ->where('employer_id', $user->id)
        ->latest()
        ->first();
        else $pending =  null;

        $latestPayment = DB::table('payments')
    ->where('employer_id', $user->id)
    ->latest('created_at')
    ->first();

        $amount = 50000;
        $employer = $user;
        $pending_c = DB::table('certificates')
    ->join('payments', 'certificates.payment_id', '=', 'payments.id')
    ->select('payments.*', 'certificates.*')
    ->where('certificates.employer_id', $user->id)
    ->latest('payments.created_at')
    ->first();
        return view('certificates.index', compact('pending_c','employer','certificates', 'amount', 'pending', 'certificate_years', 'latestPayment'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $initial_year = 2023;
        $start_year = date('Y', strtotime(auth()->user()->created_at)) > $initial_year ? date('Y', strtotime(auth()->user()->created_at)) : $initial_year;
        
        $certificate_years = [];
        --$start_year;
        
        do {
            ++$start_year;
        
            $payment = auth()->user()->payments()
    ->where('payment_type', 4)
    ->where('payment_status', 1)
    ->where('contribution_year', $start_year)
    ->selectRaw("SUM(contribution_months) AS contribution_months, contribution_period, contribution_year")
    ->groupBy(['contribution_year', 'contribution_period'])
    ->first();

    $certificate = DB::table('certificates')->where('employer_id', auth()->user()->id)
    ->whereRaw('application_year = ' . $start_year)->latest()->first();

    if(!$certificate){
if (
    ($payment && $payment->contribution_period == 'Annually') ||
    ($payment && $payment->contribution_period == 'Monthly' && $payment->contribution_months == 12)
) {
    $certificate_years[] = $start_year;
}
    }
            
            //$certificate_years[] = $start_year;

        } while ($start_year < date('Y'));


       // dd($payment->contribution_period);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificateRequest $request)
    {
        $validated = $request->validated();
        $validated['application_letter'] = request()->file('application_letter')->store('application_letters', 'public');

        $validated['employer_id'] = $request->employer_id;

        $certificate = DB::table('certificates')->insertGetId($validated);

        return redirect()->back()->with('success', 'Certificate request submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        //
    }


    public function displayCertificateDetails($certificateId)
    {
        $certificate = Certificate::with(['employer', 'employer.employees', 'employer.payments'])->find($certificateId);

        // Get the last recent 3 years
        $currentYear = now()->year;
        $lastThreeYears = [$currentYear - 2, $currentYear - 1, $currentYear];

        $totalEmployees = [];
        $paymentsAmount = [];

        foreach ($lastThreeYears as $year) {
            $totalEmployees[$year] = DB::table('employees')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('created_at', '=', $year) // Update the whereYear condition
                ->count();

            $paymentsAmount[$year] = DB::table('payments')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('invoice_generated_at', '=', $year) // Update the whereYear condition
                ->sum('amount');
        }

        /* $currentYearExpiration1 = Payment::where('employer_id', $certificate->employer->id)
            ->whereYear('invoice_generated_at', '=', $currentYear)
            ->value('invoice_duration'); */
            $currentYearExpiration1 = Payment::where('id', $certificate->payment_id)
            ->value('invoice_duration');

        $currentYearExpiration = Carbon::createFromFormat('Y-m-d', $currentYearExpiration1)->format('F d, Y');

        // Generate a QR code for the data 'NSITF'
        //$qrCode = QrCode::generate('http://ebsnsitf.com.ng/');
        $qrCode = QrCode::generate('http://ebsnsitf.com.ng/');
        $signature = DB::table('signatures')
    ->select('signatures.*', 'users.first_name', 'users.middle_name', 'users.last_name')
    ->join('users', 'signatures.user_id', '=', 'users.id')
    ->where('signatures.id', 1)
    ->first();


        return view('certificates.details', compact('certificate', 'totalEmployees', 'paymentsAmount', 'currentYearExpiration', 'lastThreeYears', 'qrCode', 'signature'));
    }

    public function displayCertificateDetailsPage($certificateId)
    {
        $certificate = Certificate::with(['employer', 'employer.employees', 'employer.payments'])->find($certificateId);

        // Get the last recent 3 years
        $currentYear = now()->year;
        $lastThreeYears = [$currentYear - 2, $currentYear - 1, $currentYear];

        $totalEmployees = [];
        $paymentsAmount = [];

        foreach ($lastThreeYears as $year) {
            $totalEmployees[$year] = DB::table('employees')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('created_at', '=', $year) // Update the whereYear condition
                ->count();

            $paymentsAmount[$year] = DB::table('payments')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('invoice_generated_at', '=', $year) // Update the whereYear condition
                ->sum('amount');
        }

        $currentYearExpiration1 = Payment::where('employer_id', $certificate->employer->id)
            ->whereYear('invoice_generated_at', '=', $currentYear)
            ->value('invoice_duration');

        $currentYearExpiration = Carbon::createFromFormat('Y-m-d', $currentYearExpiration1)->format('F d, Y');

        // Generate a QR code for the data 'NSITF'
        $qrCode = QrCode::generate('http://ebs.nsitf.com.ng/');

        $signature = DB::table('signatures')
    ->select('signatures.*', 'users.first_name', 'users.middle_name', 'users.last_name')
    ->join('users', 'signatures.user_id', '=', 'users.id')
    ->where('signatures.id', 1)
    ->first();


        return view('certificates.detailspage', compact('certificate', 'totalEmployees', 'paymentsAmount', 'currentYearExpiration', 'lastThreeYears', 'qrCode', 'signature'));
    }

    public function verification()
    {

        return view('certificates.verification');
    }
    public function verifyCertificate(Request $request)
    {
        $ecsNumber = $request->input('ecs_number');
        $employer = Employer::where('ecs_number', $ecsNumber)->first();

        if ($employer) {
            // Redirect to the certificate details using the employer's first certificate (assuming there's a relationship between employer and certificate)
            return redirect()->route('certificate.detailspage', ['certificateId' => $employer->certificates->first()->id]);
        } else {
            return back()->with('error', 'ECS number not found.');
        }
    }

    public function downloadCertificateDetails($certificateId)
    {
        $certificate = Certificate::with(['employer', 'employer.employees', 'employer.payments'])->find($certificateId);

        $currentYear = now()->year;
        $lastThreeYears = [$currentYear - 2, $currentYear - 1, $currentYear];

        $totalEmployees = [];
        $paymentsAmount = [];

        foreach ($lastThreeYears as $year) {
            $totalEmployees[$year] = DB::table('employees')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('created_at', '=', $year)
                ->count();

            $paymentsAmount[$year] = DB::table('payments')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('invoice_generated_at', '=', $year)
                ->sum('amount');
        }

        $currentYearExpiration1 = Payment::where('employer_id', $certificate->employer->id)
            ->whereYear('invoice_generated_at', '=', $currentYear)
            ->value('invoice_duration');

        $currentYearExpiration = Carbon::createFromFormat('Y-m-d', $currentYearExpiration1)->format('F d, Y');

        // Generate a QR code for the data 'NSITF'
        $qrCode = QrCode::generate('http://ebsnsitf.com.ng/');

        $pdf = PDF::loadView('certificates.details', compact('certificate', 'totalEmployees', 'paymentsAmount', 'currentYearExpiration', 'lastThreeYears', 'qrCode'));

        return $pdf->download('certificate_details.pdf');
    }

    public function deathIndex(Request $request, $id)
    {
        //
        $claims = DB::table('death_claims')
    ->join('employees', 'death_claims.employee_id', '=', 'employees.id')
    ->select('death_claims.*', 'employees.*')
    ->where('death_claims.employer_id', $id)
    ->get();
    $employer = DB::table('employers')->where('id', $id)->first();
        return view('death_claims.index', compact('claims','employer'));
    }

    public function diseaseIndex(Request $request, $id)
    {
        //
        $claims = DB::table('disease_claims')
    ->join('employees', 'disease_claims.employee_id', '=', 'employees.id')
    ->select('disease_claims.*', 'employees.*')
    ->where('disease_claims.employer_id', $id)
    ->get();
    $employer = DB::table('employers')->where('id', $id)->first();
        return view('disease_claims.index', compact('claims','employer'));
    }

    public function accidentIndex(Request $request, $id)
    {
        //
        $claims = DB::table('accident_claims')
    ->join('employees', 'accident_claims.employee_id', '=', 'employees.id')
    ->select('accident_claims.*', 'employees.*')
    ->where('accident_claims.employer_id', $id)
    ->get();
    $employer = DB::table('employers')->where('id', $id)->first();
        return view('accident_claims.index', compact('claims','employer'));
    }
    public function deathCreate(Request $request, $id)
    {
        $employer = DB::table('employers')->where('id', $id)->first();
        $employees = DB::table('employees')->where('employer_id', $id)->get();
        return view('death_claims.create', compact('employer','employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function deathStore(StoreDeathClaimRequest $request)
    {
        $validated = $request->validated();
        $validated['document'] = request()->file('document')->store('claims_documents', 'public');

        $validated['employer_id'] = $request->employer_id;
        $validated['employee_sort_code'] = $request->employee_sort_code ?? 1;
        $validated['employer_sort_code'] = $request->employer_sort_code ?? 1;
       
       $deathClaimId = DB::table('death_claims')->insertGetId($validated);

        return redirect()->route('employer.deathclaims', ['id' => $request->employer_id])->with('success', 'Death claim created successfully!');
    }

    public function diseaseCreate(Request $request, $id)
    {
        $employer = DB::table('employers')->where('id', $id)->first();
        $employees = DB::table('employees')->where('employer_id', $id)->get();
        return view('disease_claims.create', compact('employer','employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function diseaseStore(StoreDiseaseClaimRequest $request)
    {
        $validated = $request->validated();
        $validated['document'] = request()->file('document')->store('claims_documents', 'public');

        $validated['employer_id'] = $request->employer_id;
        
       $deathClaimId = DB::table('disease_claims')->insertGetId($validated);

        return redirect()->route('employer.diseaseclaims', ['id' => $request->employer_id])->with('success', 'Disease claim created successfully!');
    }

    public function accidentCreate(Request $request, $id)
    {
        $employer = DB::table('employers')->where('id', $id)->first();
        $employees = DB::table('employees')->where('employer_id', $id)->get();
        return view('accident_claims.create', compact('employer','employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function accidentStore(StoreAccidentClaimRequest $request)
    {
        $validated = $request->validated();
        $validated['document'] = request()->file('document')->store('claims_documents', 'public');

        $validated['employer_id'] = $request->employer_id;
       
       $deathClaimId = DB::table('accident_claims')->insertGetId($validated);

        return redirect()->route('employer.accidentclaims', ['id' => $request->employer_id])->with('success', 'Accident claim created successfully!');
    }

    public function deathShow($id)
    {
        $incident = DeathClaim::findOrFail($id);

        return view('death_claims.show', compact('incident'));
    }

    public function diseaseShow($id)
    {
        $incident = DiseaseClaim::findOrFail($id);

        return view('disease_claims.show', compact('incident'));
    }

    public function accidentShow($id)
    {
        $incident = AccidentClaim::findOrFail($id);

        return view('accident_claims.show', compact('incident'));
    }
}
