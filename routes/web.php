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
use App\Http\Controllers\ReminderController;


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

// Start Document Manager
Route::group(['middleware' => ['auth']], function () {

Route::delete('/documents-category/{id}', 'App\Http\Controllers\DocumentsCategoryController@ajaxDestroy')->name('documents_category.ajax_destroy');
Route::resource('documents_category', App\Http\Controllers\DocumentsCategoryController::class);
Route::resource('documents_manager', App\Http\Controllers\DocumentsController::class);
Route::get('documents_manager/assigned/to/users', [App\Http\Controllers\DocumentsController::class, 'documentsByUsers'])->name('documents_manager.documentsByUsers');
Route::get('documents_manager/documents/audits/', [App\Http\Controllers\DocumentsController::class, 'documentsByAudits'])->name('documents_manager.audits');
Route::get('documents_manager/documentVersions/{id}', [App\Http\Controllers\DocumentsController::class, 'documentVersions'])->name('documents.documentVersions.index');
//Route::get('documents_manager/assignedToUser/index', [App\Http\Controllers\DocumentsController::class, 'viewDocumentsAssignedToUser'])->name('documents.assignedToUser');
Route::post('documents_manager/assignToUsers', [App\Http\Controllers\DocumentsController::class, 'assignToUsers'])->name('documents.assignToUsers');
Route::post('documents_manager/assignToRoles', [App\Http\Controllers\DocumentsController::class, 'assignToDepartments'])->name('documents.assignToRoles');
Route::get('documents_manager/assignedUsers/{id}', [App\Http\Controllers\DocumentsController::class, 'assignedUsers'])->name('documents.assignedUsers');
Route::get('documents_manager/assignedRoles/{id}', [App\Http\Controllers\DocumentsController::class, 'assignedDepartments'])->name('documents.assignedRoles');
Route::delete('documents_manager/assignedUsers/delete/{user_id}/{document_id}', [App\Http\Controllers\DocumentsController::class, 'deleteAssignedUser'])->name('documents.assignedUsers.destroy');
Route::delete('documents_manager/assignedRoles/delete/{role_id}/{document_id}', [App\Http\Controllers\DocumentsController::class, 'deleteAssignedRole'])->name('documents.assignedRoles.destroy');
Route::get('documents_manager/delete/{id}', [App\Http\Controllers\DocumentsController::class, 'delete'])->name('documents_manager.delete');
Route::post('documents_manager/add', [App\Http\Controllers\DocumentsController::class, 'add'])->name('documents_manager.add');
Route::get('/documents_manager/version/{id}', 'App\Http\Controllers\DocumentsController@documentsVersion')->name('documents_manager.version');
Route::get('/documents_manager/comment/{id}', 'App\Http\Controllers\DocumentsController@documentsComment')->name('documents_manager.comment');
Route::post('documents_manager/add_comment', [App\Http\Controllers\DocumentsController::class, 'addComment'])->name('documents_manager.add_comment');
Route::post('documents_manager/send_email', [App\Http\Controllers\DocumentsController::class, 'sendEmail'])->name('documents_manager.send_email');
Route::get('/documents_manager/share/{id}', 'App\Http\Controllers\DocumentsController@shareDocument')->name('documents_manager.share');
Route::post('documents_manager/shareuser', [App\Http\Controllers\DocumentsController::class, 'shareUser'])->name('documents_manager.shareuser');
Route::post('documents_manager/sharerole', [App\Http\Controllers\DocumentsController::class, 'shareRole'])->name('documents_manager.sharerole');
Route::get('/documents_manager/shared/user', 'App\Http\Controllers\DocumentsController@sharedUser')->name('documents_manager.shareduser');
Route::get('/documents_manager/shared/role', 'App\Http\Controllers\DocumentsController@sharedRole')->name('documents_manager.sharedrole');

Route::post('/generate-file-no', 'App\Http\Controllers\DocumentsCategoryController@generateFileNo');

Route::get('/documents_manager/shared/user/file', 'App\Http\Controllers\DocumentsController@sharedUserFile')->name('documents_manager.shareduserfile');
Route::post('documents_manager/shareuserfile', [App\Http\Controllers\DocumentsController::class, 'shareUserFile'])->name('documents_manager.shareuserfile');

Route::post('/store-clicked-link', 'App\Http\Controllers\DocumentsController@storeClickedLink')->name('store_clicked_link');
Route::get('/fetch-clicked-links', 'App\Http\Controllers\DocumentsController@fetchClickedLinks')->name('fetch_clicked_links');

//End of document manager

//Start of incoming documents
Route::get('incoming_document_dashboard', [App\Http\Controllers\IncomingDocumentsController::class, 'dashboard'])->name('incoming_document_dashboard');
Route::resource('incoming_documents_category', App\Http\Controllers\IncomingDocumentsCategoryController::class);
Route::post('/generate-incoming-file-no', 'App\Http\Controllers\IncomingDocumentsCategoryController@generateFileNo');

Route::resource('incoming_documents_manager', App\Http\Controllers\IncomingDocumentsController::class);
Route::get('incoming_documents_manager/assigned/to/users', [App\Http\Controllers\IncomingDocumentsController::class, 'documentsByUsers'])->name('incoming_documents_manager.documentsByUsers');
Route::get('incoming_documents_manager/documents/audits/', [App\Http\Controllers\IncomingDocumentsController::class, 'documentsByAudits'])->name('incoming_documents_manager.audits');
Route::get('incoming_documents_manager/documentVersions/{id}', [App\Http\Controllers\IncomingDocumentsController::class, 'documentVersions'])->name('incoming_documents.documentVersions.index');
//Route::get('incoming_documents_manager/assignedToUser/index', [App\Http\Controllers\IncomingDocumentsController::class, 'viewDocumentsAssignedToUser'])->name('incoming_documents.assignedToUser');
Route::post('incoming_documents_manager/assignToUsers', [App\Http\Controllers\IncomingDocumentsController::class, 'assignToUsers'])->name('incoming_documents.assignToUsers');
Route::post('incoming_documents_manager/assignToRoles', [App\Http\Controllers\IncomingDocumentsController::class, 'assignToDepartments'])->name('incoming_documents.assignToRoles');
Route::get('incoming_documents_manager/assignedUsers/{id}', [App\Http\Controllers\IncomingDocumentsController::class, 'assignedUsers'])->name('incoming_documents.assignedUsers');
Route::get('incoming_documents_manager/assignedRoles/{id}', [App\Http\Controllers\IncomingDocumentsController::class, 'assignedDepartments'])->name('incoming_documents.assignedRoles');
Route::delete('incoming_documents_manager/assignedUsers/delete/{user_id}/{document_id}', [App\Http\Controllers\IncomingDocumentsController::class, 'deleteAssignedUser'])->name('incoming_documents.assignedUsers.destroy');
Route::delete('incoming_documents_manager/assignedRoles/delete/{role_id}/{document_id}', [App\Http\Controllers\IncomingDocumentsController::class, 'deleteAssignedRole'])->name('incoming_documents.assignedRoles.destroy');
Route::get('incoming_documents_manager/delete/{id}', [App\Http\Controllers\IncomingDocumentsController::class, 'delete'])->name('incoming_documents_manager.delete');
Route::post('incoming_documents_manager/add', [App\Http\Controllers\IncomingDocumentsController::class, 'add'])->name('incoming_documents_manager.add');
Route::get('/incoming_documents_manager/version/{id}', 'App\Http\Controllers\IncomingDocumentsController@documentsVersion')->name('incoming_documents_manager.version');
Route::get('/incoming_documents_manager/comment/{id}', 'App\Http\Controllers\IncomingDocumentsController@documentsComment')->name('incoming_documents_manager.comment');
Route::post('incoming_documents_manager/add_comment', [App\Http\Controllers\IncomingDocumentsController::class, 'addComment'])->name('incoming_documents_manager.add_comment');
Route::post('incoming_documents_manager/send_email', [App\Http\Controllers\IncomingDocumentsController::class, 'sendEmail'])->name('incoming_documents_manager.send_email');
Route::get('/incoming_documents_manager/share/{id}', 'App\Http\Controllers\IncomingDocumentsController@shareDocument')->name('incoming_documents_manager.share');
Route::post('incoming_documents_manager/shareuser', [App\Http\Controllers\IncomingDocumentsController::class, 'shareUser'])->name('incoming_documents_manager.shareuser');
Route::post('incoming_documents_manager/sharerole', [App\Http\Controllers\IncomingDocumentsController::class, 'shareRole'])->name('incoming_documents_manager.sharerole');
Route::get('/incoming_documents_manager/shared/user', 'App\Http\Controllers\IncomingDocumentsController@sharedUser')->name('incoming_documents_manager.shareduser');
Route::get('/incoming_documents_manager/shared/role', 'App\Http\Controllers\IncomingDocumentsController@sharedRole')->name('incoming_documents_manager.sharedrole');
Route::get('/incoming_documents_manager/all_documents/secretary', 'App\Http\Controllers\IncomingDocumentsController@secretary')->name('incoming_documents_manager.all_documents.secretary');
//Route::get('incoming_documents_manager/create', 'App\Http\Controllers\IncomingDocumentsController@create')->name('incoming_documents_manager.create');
Route::get('/incoming_documents_manager/shared/user/file', 'App\Http\Controllers\IncomingDocumentsController@sharedUserFile')->name('incoming_documents_manager.shareduserfile');
Route::post('incoming_documents_manager/shareuserfile', [App\Http\Controllers\IncomingDocumentsController::class, 'shareUserFile'])->name('incoming_documents_manager.shareuserfile');


Route::resource('roles', RoleController::class);
// demo admin role
Route::get('demo_roles/{id}', 'App\Http\Controllers\RoleController@demo_edit')->name('demo_roles');
Route::post('demo_update/{id}', 'App\Http\Controllers\RoleController@demo_update')->name('demo_update');

Route::post('incoming_documents_manager/share_secretary', [App\Http\Controllers\IncomingDocumentsController::class, 'shareSecretary'])->name('incoming_documents_manager.share_secretary');

Route::resource('reminder', ReminderController::class);
    // Route::view('dash','dms.dashboard');
    Route::get('documentloginaudit', [ReminderController::class, 'loginaudit'])->name('loginaudit');


    Route::get('dash', [ReminderController::class, 'dashboard'])->name('dash');
});

Route::get('/new/incoming', 'App\Http\Controllers\IncomingDocumentsController@add_document')->name('add.new.incoming.document');
Route::get('/area/office/incoming', 'App\Http\Controllers\IncomingDocumentsController@area_office_document')->name('area.office.incoming.document');

Route::post('/add/new/incoming/store/', 'App\Http\Controllers\IncomingDocumentsController@store')->name('incoming_store');

Route::post('/add/new/incoming/store/now/', 'App\Http\Controllers\IncomingDocumentsController@store_now')->name('incoming_store_now');

//end incoming document
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'clockIn'])->name('home');
    Route::post('/home/clock-in', [HomeController::class, 'clockIn'])->name('clock-in');
    Route::post('/home/clock-out', [HomeController::class, 'clockOut'])->name('clock-out');
});


Route::get('/user-info', [HomeController::class, 'getUserInfo'])->middleware('auth');
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
    Route::patch('/reject-payment/{id}', [ESSPPaymentController::class, 'rejectPayment'])
    ->name('rejectPayment');
    Route::get('essp/payment/remita', [ESSPPaymentController::class, 'callbackRemita'])->name('essp.payment.callback');
    Route::post('essp/payment/remita', [ESSPPaymentController::class, 'generateRemita'])->name('essp.payment.remita');
    Route::get('employer/payment/list/{id}', [ESSPPaymentController::class, 'employerPayments'])->name('employer.payment.list');
    Route::get('new/ecs/employer/payment/{id}', [ESSPPaymentController::class, 'pendingPayment'])->name('new.ecs.employer.payment');
    Route::get('employer/certificate/{id}', 'App\Http\Controllers\EmployerCertificateController@index')->name('employer.certificate');
    Route::post('employer/certificate/store', 'App\Http\Controllers\EmployerCertificateController@store')->name('employer.certificate.store');
    Route::get('employer/certificate/{certificateId}/details', 'App\Http\Controllers\EmployerCertificateController@displayCertificateDetails')->name('employer.certificate.details');
    Route::get('employer/certificate/{certificateId}/download', 'App\Http\Controllers\EmployerCertificateController@downloadCertificateDetails')->name('employer.certificate.download');
   
    Route::get('employer/deathclaims/{id}', 'App\Http\Controllers\EmployerCertificateController@deathIndex')->name('employer.deathclaims');
    Route::get('employer/diseaseclaims/{id}', 'App\Http\Controllers\EmployerCertificateController@diseaseIndex')->name('employer.diseaseclaims');
    Route::get('employer/accidentclaims/{id}', 'App\Http\Controllers\EmployerCertificateController@accidentIndex')->name('employer.accidentclaims');

    Route::get('employer/death/claims/create/{id}', 'App\Http\Controllers\EmployerCertificateController@deathCreate')->name('employer.deathclaims.create');
    Route::post('employer/death/claims/store', 'App\Http\Controllers\EmployerCertificateController@deathStore')->name('employer.deathclaims.store');
    Route::get('employer/disease/claims/{id}', 'App\Http\Controllers\EmployerCertificateController@diseaseCreate')->name('employer.diseaseclaims.create');
    Route::post('employer/disease/claims/store', 'App\Http\Controllers\EmployerCertificateController@diseaseStore')->name('employer.diseaseclaims.store');
    Route::get('employer/accident/claims/{id}', 'App\Http\Controllers\EmployerCertificateController@accidentCreate')->name('employer.accidentclaims.create');
    Route::post('employer/accident/claims/store', 'App\Http\Controllers\EmployerCertificateController@accidentStore')->name('employer.accidentclaims.store');
   
    Route::get('employer/death/claims/show/{id}', 'App\Http\Controllers\EmployerCertificateController@deathShow')->name('employer.death.claims.show');
    Route::get('employer/disease/claims/show/{id}', 'App\Http\Controllers\EmployerCertificateController@diseaseShow')->name('employer.disease.claims.show');
    Route::get('employer/accident/claims/show/{id}', 'App\Http\Controllers\EmployerCertificateController@accidentShow')->name('employer.accident.claims.show');
    
    // Start Document Manager
        Route::resource('documents_category', App\Http\Controllers\DocumentsCategoryController::class);
        Route::resource('documents_manager', App\Http\Controllers\DocumentsController::class);
        Route::get('documents_manager/assigned/to/users', [App\Http\Controllers\DocumentsController::class, 'documentsByUsers'])->name('documents_manager.documentsByUsers');
        Route::get('documents_manager/documents/audits/', [App\Http\Controllers\DocumentsController::class, 'documentsByAudits'])->name('documents_manager.audits');
        Route::get('documents_manager/documentVersions/{id}', [App\Http\Controllers\DocumentsController::class, 'documentVersions'])->name('documents.documentVersions.index');
        //Route::get('documents_manager/assignedToUser/index', [App\Http\Controllers\DocumentsController::class, 'viewDocumentsAssignedToUser'])->name('documents.assignedToUser');
        Route::post('documents_manager/assignToUsers', [App\Http\Controllers\DocumentsController::class, 'assignToUsers'])->name('documents.assignToUsers');
        Route::post('documents_manager/assignToRoles', [App\Http\Controllers\DocumentsController::class, 'assignToDepartments'])->name('documents.assignToRoles');
        Route::get('documents_manager/assignedUsers/{id}', [App\Http\Controllers\DocumentsController::class, 'assignedUsers'])->name('documents.assignedUsers');
        Route::get('documents_manager/assignedRoles/{id}', [App\Http\Controllers\DocumentsController::class, 'assignedDepartments'])->name('documents.assignedRoles');
        Route::delete('documents_manager/assignedUsers/delete/{user_id}/{document_id}', [App\Http\Controllers\DocumentsController::class, 'deleteAssignedUser'])->name('documents.assignedUsers.destroy');
        Route::delete('documents_manager/assignedRoles/delete/{role_id}/{document_id}', [App\Http\Controllers\DocumentsController::class, 'deleteAssignedRole'])->name('documents.assignedRoles.destroy');

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

// Route::view('op','ed_op');
Route::get('edops',[HomeController::class,'edops'])->name('ed_op');
Route::group(['middleware' => ['auth']], function () {
    Route::get('myedit/{id}', [UserController::class, 'myedit'])->name('myedit');
    Route::put('myedit/{id}', [UserController::class, 'myupdate'])->name('myupdate');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/minister',[HomeController::class,'minister'])->name('minister');
    
 //Route::get('users/{id}', 'UserController@show')->name('users.show');
Route::get('certicate',[CertificateController::class,'index'])->name('certicate');

    Route::get('/active', [UserController::class,'getactive'])->name('active');
    Route::get('/pending', [UserController::class,'getpending'])->name('pending');
    Route::post('/upload', [UserController::class,'upload'])->name('upload');
    Route::get('/bulkUpload', [UserController::class,'bulkUpload'])->name('bulkUpload');
    Route::get('change-email-password', [UserController::class,'showChangePasswordForm'])->name('change.email.password.form');
    Route::post('change-email-password', [UserController::class,'changePassword'])->name('change.email.password');
    Route::post('/save-signature', [UserController::class,'saveSignature']);
    Route::get('/change-signature', [UserController::class,'changeSignature'])->name('change.signature');

    Route::get('new-email-password', [UserController::class,'newWebmail'])->name('new.email.password.form');
    Route::post('new-email-password', [UserController::class,'saveWebmail'])->name('new.email.password');
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
