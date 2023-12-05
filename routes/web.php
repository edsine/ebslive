<?php

use App\Models\User;
use App\Http\Controllers\Minister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
//use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\AllowanceController;
use App\Http\Controllers\SetSalaryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ZoomMeetingController;
use Modules\Accounting\Http\Controllers\ReportController;
use App\Http\Controllers\ESSPPaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'clockIn'])->name('home');
    Route::post('/home/clock-in', [HomeController::class, 'clockIn'])->name('clock-in');
    Route::post('/home/clock-out', [HomeController::class, 'clockOut'])->name('clock-out');
});



Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')
    ->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')
    ->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')
    ->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')
    ->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')
    ->name('io_generator_builder_rollback');
Route::post('generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile')
    ->name('io_generator_builder_generate_from_file');

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/html_email', [UserController::class, 'html_email'])->name('html_email');

//Route::get('/webmail', [EmailController::class, 'index']);


Route::group(['middleware' => ['auth']], function () {
    Route::get('/hradmin', [HomeController::class, 'hradmin'])->name('hradmin');
    Route::get('/financeadmin', [HomeController::class, 'financeadmin'])->name('financeadmin');
    Route::get('/claimsadmin', [HomeController::class, 'claimsadmin'])->name('claimsadmin');
});

// Route::middleware(['auth', 'authuserbyrole'])->group(function(){
//     Route::get('/home', [HomeController::class, 'index'])->name('home');

// });
Route::middleware(['auth'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/essp/payments', [ESSPPaymentController::class, 'index'])->name('essp.payments');
    Route::patch('/approve-payment/{id}', [ESSPPaymentController::class, 'approvePayment'])
    ->name('approvePayment');
});




Route::get('/roundcube-login', [HomeController::class, 'roundcubeLogin']);

Route::get('auditadmin',[HomeController::class,'auditadmin']);
Route::get('ictadmin',[HomeController::class,'ictadmin'])->name('ict');
Route::get('/hradmin', [HomeController::class, 'hradmin'])->name('hradmin');
Route::get('/financeadmin', [HomeController::class, 'financeadmin'])->name('financeadmin');
Route::get('/claimsadmin', [HomeController::class, 'claimsadmin'])->name('claimsadmin');
Route::get('/itmadmin', [HomeController::class, 'itmadmin'])->name('itmadmin');
Route::get('/complianceadmin', [HomeController::class, 'complianceadmin'])->name('complianceadmin');
Route::get('/hseadmin', [HomeController::class, 'hseadmin'])->name('hseadmin');
Route::get('/permsec', [HomeController::class, 'pamsec'])->name('permsec');
Route::get('/branch', [HomeController::class, 'branch'])->name('branch');
Route::get('/region', [HomeController::class, 'regional'])->name('region');
Route::get('/ed_md', [HomeController::class, 'edfinance'])->name('ed_md');
Route::get('/ed_admin', [HomeController::class, 'edadmin'])->name('ed_admin');

Route::get('/riskadmin',[HomeController::class,'riskadmin']);

Route::get('/aprd',[HomeController::class,'aprd']);
Route::get('/fre',[HomeController::class,'fre']);
Route::get('/copaffairs',[HomeController::class,'copaffairs']);
Route::get('legaladmin',[HomeController::class,'legaladmin']);
Route::get('procurementadmin',[HomeController::class,'procurementadmin']);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/view-profile', [ProfileController::class, 'showProfile'])->name('view-profile');
Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile-update');


//Route::resource('users', UserController::class)->middleware('auth');
//Route::resource('roles', RoleController::class)->middleware('auth');
Route::post('api/fetch-locals', [DropdownController::class, 'fetchLocal']);


// Demo Mail UI Route
Route::get('/composemail', [HomeController::class, 'composeMail'])->name('compose_mail');
Route::get('/mailinbox', [HomeController::class, 'mailInbox'])->name('mail_inbox');
Route::get('/viewreplymail', [HomeController::class, 'viewReplyMail'])->name('view_reply_mail');


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('myedit/{id}', [UserController::class, 'myedit'])->name('myedit');
    Route::put('myedit/{id}', [UserController::class, 'myupdate'])->name('myupdate');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/minister',[HomeController::class,'minister'])->name('minister');
    
 Route::get('users/{id}', 'UserController@show')->name('users.show');
Route::get('certicate',[CertificateController::class,'index'])->name('certicate');

    Route::get('/active', [UserController::class,'getactive'])->name('active');
    Route::get('/pending', [UserController::class,'getpending'])->name('pending');
    Route::post('/upload', [UserController::class,'upload'])->name('upload');
    Route::get('/bulkUpload', [UserController::class,'bulkUpload'])->name('bulkUpload');
    Route::get('change-email-password', [UserController::class,'showChangePasswordForm'])->name('change.email.password.form');
    Route::post('change-email-password', [UserController::class,'changePassword'])->name('change.email.password');
    Route::post('/save-signature', [UserController::class,'saveSignature']);
    Route::get('/change-signature', [UserController::class,'changeSignature'])->name('change.signature');
});

// Route::get('/account', function () {
//     return view('accountdashboard');
// });


//=================================== Zoom Meeting ======================================================================
Route::get('zoom' ,function(){
    return view('zoom-meeting.index');
})->name('zoom');
// // Route::resource('zoom-meeting', ZoomMeetingController::class)->middleware(['auth']);
// Route::any('/zoom-meeting/projects/select/{bid}', [ZoomMeetingController::class, 'projectwiseuser'])->name('zoom-meeting.projects.select');
// Route::get('zoom-meeting-calender', [ZoomMeetingController::class, 'calender'])->name('zoom-meeting.calender')->middleware(['auth','XSS']);

//=================================== Zoom Meeting ======================================================================
Route::resource('zoom-meeting', ZoomMeetingController::class)->middleware(['auth']);
Route::any('/zoom-meeting/projects/select/{bid}', [ZoomMeetingController::class, 'projectwiseuser'])->name('zoom-meeting.projects.select');
Route::get('zoom-meeting-calender', [ZoomMeetingController::class, 'calender'])->name('zoom-meeting.calender')->middleware(['auth']);




Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function (){
    Route::get('support/{id}/reply', [SupportController::class, 'reply'])->name('support.reply');
    Route::post('support/{id}/reply', [SupportController::class, 'replyAnswer'])->name('support.reply.answer');
    Route::get('support/grid', [SupportController::class, 'grid'])->name('support.grid');
    Route::resource('support', SupportController::class);

}
);

Route::resource('setsalary', SetSalaryController::class)->middleware(['auth']);
Route::get('employee/salary/{eid}', [SetSalaryController::class, 'employeeBasicSalary'])->name('employee.basic.salary')->middleware(['auth']);
Route::post('employee/update/sallary/{id}', [SetSalaryController::class, 'employeeUpdateSalary'])->name('employee.salary.update')->middleware(['auth']);
Route::get('salary/employeeSalary', [SetSalaryController::class, 'employeeSalary'])->name('employeesalary')->middleware(['auth']);
Route::post('branch/employee/json', [UserController::class, 'employeeJson'])->name('branch.employee.json')->middleware(['auth']);

Route::resource('allowance', AllowanceController::class)->middleware(['auth']);
Route::get('allowances/create/{eid}', [AllowanceController::class, 'allowanceCreate'])->name('allowances.create')->middleware(['auth']);

//payslip

/* Route::resource('paysliptype', PayslipTypeController::class)->middleware(['auth']);
Route::resource('commission', CommissionController::class)->middleware(['auth']);
Route::resource('allowanceoption', AllowanceOptionController::class)->middleware(['auth']);
Route::resource('loanoption', LoanOptionController::class)->middleware(['auth']);
Route::resource('deductionoption', DeductionOptionController::class)->middleware(['auth']);
Route::resource('loan', LoanController::class)->middleware(['auth']);
Route::resource('saturationdeduction', SaturationDeductionController::class)->middleware(['auth']);
Route::resource('otherpayment', OtherPaymentController::class)->middleware(['auth']);
Route::resource('overtime', OvertimeController::class)->middleware(['auth']);


Route::get('commissions/create/{eid}', [CommissionController::class, 'commissionCreate'])->name('commissions.create')->middleware(['auth']);
Route::get('loans/create/{eid}', [LoanController::class, 'loanCreate'])->name('loans.create')->middleware(['auth']);
Route::get('saturationdeductions/create/{eid}', [SaturationDeductionController::class, 'saturationdeductionCreate'])->name('saturationdeductions.create')->middleware(['auth']);
Route::get('otherpayments/create/{eid}', [OtherPaymentController::class, 'otherpaymentCreate'])->name('otherpayments.create')->middleware(['auth']);
Route::get('overtimes/create/{eid}', [OvertimeController::class, 'overtimeCreate'])->name('overtimes.create')->middleware(['auth']);
Route::get('payslip/paysalary/{id}/{date}', [PaySlipController::class, 'paysalary'])->name('payslip.paysalary')->middleware(['auth']);
Route::get('payslip/bulk_pay_create/{date}', [PaySlipController::class, 'bulk_pay_create'])->name('payslip.bulk_pay_create')->middleware(['auth']);
Route::post('payslip/bulkpayment/{date}', [PaySlipController::class, 'bulkpayment'])->name('payslip.bulkpayment')->middleware(['auth']);
Route::post('payslip/search_json', [PaySlipController::class, 'search_json'])->name('payslip.search_json')->middleware(['auth']);
Route::get('payslip/employeepayslip', [PaySlipController::class, 'employeepayslip'])->name('payslip.employeepayslip')->middleware(['auth']);
Route::get('payslip/showemployee/{id}', [PaySlipController::class, 'showemployee'])->name('payslip.showemployee')->middleware(['auth']);
Route::get('payslip/editemployee/{id}', [PaySlipController::class, 'editemployee'])->name('payslip.editemployee')->middleware(['auth']);
Route::post('payslip/editemployee/{id}', [PaySlipController::class, 'updateEmployee'])->name('payslip.updateemployee')->middleware(['auth']);
Route::get('payslip/pdf/{id}/{m}', [PaySlipController::class, 'pdf'])->name('payslip.pdf')->middleware(['auth']);
Route::get('payslip/payslipPdf/{id}', [PaySlipController::class, 'payslipPdf'])->name('payslip.payslipPdf')->middleware(['auth']);
Route::get('payslip/send/{id}/{m}', [PaySlipController::class, 'send'])->name('payslip.send')->middleware(['auth']);
Route::get('payslip/delete/{id}', [PaySlipController::class, 'destroy'])->name('payslip.delete')->middleware(['auth']);
Route::resource('payslip', PaySlipController::class)->middleware(['auth']); */

Route::get('report/income-summary', [ReportController::class, 'incomeSummary'])->name('report.income.summary');
Route::get('report/expense-summary', [ReportController::class, 'expenseSummary'])->name('report.expense.summary');
Route::get('report/income-vs-expense-summary', [ReportController::class, 'incomeVsExpenseSummary'])->name('report.income.vs.expense.summary');
Route::get('report/tax-summary', [ReportController::class, 'taxSummary'])->name('report.tax.summary');
//    Route::get('report/profit-loss-summary', [ReportController::class, 'profitLossSummary'])->name('report.profit.loss.summary');
Route::get('report/invoice-summary', [ReportController::class, 'invoiceSummary'])->name('report.invoice.summary');
Route::get('report/bill-summary', [ReportController::class, 'billSummary'])->name('report.bill.summary');
Route::get('report/product-stock-report', [ReportController::class, 'productStock'])->name('report.product.stock.report');
Route::get('report/invoice-report', [ReportController::class, 'invoiceReport'])->name('report.invoice');
Route::get('report/account-statement-report', [ReportController::class, 'accountStatement'])->name('report.account.statement');
Route::get('report/balance-sheet', [ReportController::class, 'balanceSheet'])->name('report.balance.sheet');
Route::get('report/ledger', [ReportController::class, 'ledgerSummary'])->name('report.ledger');
Route::get('report/trial-balance', [ReportController::class, 'trialBalanceSummary'])->name('trial.balance');
Route::get('report/profit-loss', [ReportController::class, 'profitLoss'])->name('report.profit.loss');
Route::get('reports-monthly-cashflow', [ReportController::class, 'monthlyCashflow'])->name('report.monthly.cashflow');
Route::get('reports-quarterly-cashflow', [ReportController::class, 'quarterlyCashflow'])->name('report.quarterly.cashflow');
Route::post('export/trial-balance', [ReportController::class, 'trialBalanceExport'])->name('trial.balance.export');
Route::post('export/balance-sheet', [ReportController::class, 'balanceSheetExport'])->name('balance.sheet.export');
Route::post('print/balance-sheet', [ReportController::class, 'balanceSheetPrint'])->name('balance.sheet.print');
Route::post('print/trial-balance', [ReportController::class, 'trialBalancePrint'])->name('trial.balance.print');

// Email Templates
Route::get('email_template_lang/{id}/{lang?}', [EmailTemplateController::class, 'manageEmailLang'])->name('manage.email.language')->middleware(['auth']);
Route::any('email_template_store/{pid}', [EmailTemplateController::class, 'storeEmailLang'])->name('store.email.language')->middleware(['auth']);
Route::any('email_template_store', [EmailTemplateController::class, 'updateStatus'])->name('status.email.language')->middleware(['auth']);
Route::resource('email_template', EmailTemplateController::class)->middleware(['auth']);

// End Email Templates

//Botman side that i do match route
Route::match(['get','post'],'/botman','App\Http\Controllers\BotmanController@handle')->name('botman');
