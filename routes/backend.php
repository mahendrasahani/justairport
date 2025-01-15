<?php
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\ApiController;
use App\Http\Controllers\Backend\BookingLogController;
use App\Http\Controllers\Backend\BookingSlotController;
use App\Http\Controllers\Backend\CarCategoryController;
use App\Http\Controllers\Backend\CarTypeController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\InvoiceController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\LeadController;
use App\Http\Controllers\Backend\OperatorsController;
use App\Http\Controllers\Backend\SearchController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Console\JobMakeCommand;

Route::middleware(['auth', 'verified', 'role.admin'])->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard']);
    Route::get('/jims', [DashboardController::class, 'adminDashboard']);
    Route::get('/jims/profile', [DashboardController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/jims/edit-profile', [DashboardController::class, 'editAdminProfile'])->name('admin.edit_profile'); 
    Route::post('/jims/edit-profile', [DashboardController::class, 'updateProfile'])->name('admin.update_profile'); 

    Route::get('/jims/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/jims/control-jobs', [JobController::class, 'controlJob'])->name('admin.control_job');
    Route::post('/jims/assign-driver', [JobController::class, 'assignDriver'])->name('admin.assign_driver');
    Route::post('/jims/change-driver', [JobController::class, 'changeDriver'])->name('admin.change_driver');
    Route::get('/jims/get-driver-detail', [JobController::class, 'getDriverDetail'])->name('admin.get_driver_detail');
    Route::get('/jims/get-assigned-driver-with-job', [JobController::class, 'getAssignedDriverWithJob'])->name('admin.get_assigned_driver_with_job');
    Route::get('/jims/allocate-control-job', [JobController::class, 'allocateControlJob'])->name('backend.allocate_control_job');
    Route::post('/jims/unallocate-job', [JobController::class, 'unAllocateJob'])->name('backend.un_allocate_job');
    
    Route::get('/jims/unassign-control-job', [JobController::class, 'unassignControlJob'])->name('backend.unassign_control_job');
    Route::get('/jims/get-driver-call-sign-list', [JobController::class, 'getDriverCallSignList'])->name('backend.get_driver_call_sign_list');
    Route::get('/jims/get-driver-with_call_sign', [JobController::class, 'getDriverWithCallSign'])->name('backend.get_driver_with_call_sign');

    Route::get('/jims/wip-jobs', [JobController::class, 'wipJob'])->name('admin.wip_job');

    Route::get('/jims/new-job', [JobController::class, 'newJob'])->name('admin.new_job');
    Route::post('/jims/new-job', [JobController::class, 'newJobStore'])->name('admin.new_job.store');
    Route::post('/jims/job-update/{id}', [JobController::class, 'jobUpdate'])->name('admin.job.update');
    Route::get('/jims/new-job/get-account-with-acc-no', [AccountController::class, 'getAccountWithAccNo'])->name('admin.new_job.get_acc_with_acc_no');
    Route::get('/jims/new-job/get-account_with_acc_name', [AccountController::class, 'getAccountwithAccName'])->name('admin.new_job.get_acc_with_acc_name');
    Route::get('/jims/new-job/get-account_with_acc_d_name', [AccountController::class, 'getAccountwithAccDName'])->name('admin.new_job.get_acc_with_acc_d_name');
    Route::get('/jims/new-job/get-car-category', [CarCategoryController::class, 'getCarCategory'])->name('admin.new_job.get_car_category');
    Route::get('/jims/send-job-to-driver/{job_id}', [JobController::class, 'sendJobToDriver'])->name('admin.send_job_to_driver');
    Route::get('/jims/send-job-confirmation-to-customer/{job_id}', [JobController::class, 'sendConfirmationToCustomer'])->name('admin.send_job_confirmation_to_customer');
    Route::get('/jims/job/view/{id}', [JobController::class, 'viewJob'])->name('admin.job.view');
    Route::get('/jims/new-job/get-postcode-airport-list', [JobController::class, 'getPostcodeAirportsList'])->name('admin.get_postcode_airports_list');

    Route::get('/jims/history-data/job-history', [JobController::class, 'jobHistoryData'])->name('admin.history_data.job_history');
    Route::get('/jims/history-data/job-history-table', [JobController::class, 'getJobHistoryDataTable'])->name('admin.history_data.job_history_table');
    
    
      // job and client histor data using datatable start
    Route::get('/jims/history-data/job-history', [JobController::class, 'jobHistoryData'])->name('admin.history_data.job_history');
    Route::get('/jims/history-data/job-history-table', [JobController::class, 'getJobHistoryDataTable'])->name('admin.history_data.job_history_table');
    Route::get('/jims/history-data/client-history-table', [JobController::class, 'getClientHistoryDataTable'])->name('admin.history_data.client_history_table');
    Route::get('/jims/history-data/client-history', [JobController::class, 'clientHistoryData'])->name('admin.history_data.client_history');
    // job and client histor data using datatable end

    // jhgvbyutftrf
    Route::get('/car-categories-autosuggest', [JobController::class, 'getCarCategories'])->name('car.categories.autosuggest');

    Route::get('/jims/new-job/get-client', [ClientController::class, 'getClient'])->name('admin.new_job.get_client');
    Route::get('/jims/new-job/get-terminal-list', [JobController::class, 'getTerminalList'])->name('admin.new_job.get_terminal_list');
    Route::get('/jims/new-job/get-client-profile-with-phone', [JobController::class, 'getClientProfileWithPhone'])->name('admin.new_job.get_client_profile_with_phone');

    Route::get('/jims/all-jobs', [JobController::class, 'allJobs'])->name('admin.all_jobs');
    Route::get('/jims/deleted-jobs', [JobController::class, 'deletedJobs'])->name('admin.deleted_jobs');
    Route::get('/jims/canceled-jobs', [JobController::class, 'canceledJob'])->name('admin.canceled_job');
    Route::get('/jims/transfer-job', [JobController::class, 'transferJob'])->name('admin.transfer_job');
    Route::get('/jims/print-jobs', [JobController::class, 'printJobs'])->name('admin.print_jobs');
    Route::get('/jims/job-summary', [JobController::class, 'jobSummary'])->name('admin.job_summary');
    Route::post('/jims/all_jobs/edit-jobs/{id}', [JobController::class, 'editJob'])->name('admin.edit_jobs');
    Route::get('/jims/get-client-profile', [JobController::class, 'getClientProfile'])->name('admin.get_client_profile');
    
    Route::get('/jims/driver-profile', [DriverController::class, 'driverProfile'])->name('admin.driver_profile');
    Route::get('/jims/add-new-driver', [DriverController::class, 'addNewDriver'])->name('admin.add_new_driver');
    Route::post('/jims/add-new-driver', [DriverController::class, 'storeNewDriver'])->name('admin.store_new_driver');
    Route::get('/jims/edit-driver/{id}', [DriverController::class, 'editDriver'])->name('admin.edit_driver');
    Route::post('/jims/update-driver/{id}', [DriverController::class, 'updateDriver'])->name('admin.update_driver');
    Route::get('/jims/driver-applied', [DriverController::class, 'driverApplied'])->name('admin.driver_applied');
    Route::get('/jims/suspended-drivers', [DriverController::class, 'suspendedDriversPageView'])->name('admin.suspended_drivers');
    Route::get('/jims/expired-document', [DriverController::class, 'expiredDocument'])->name('admin.expired_document');
    Route::get('/jims/verified-driver-document', [DriverController::class, 'verifiedDriverDocument'])->name('admin.verified_driver_document');
    Route::get('/jims/driver-leaves', [DriverController::class, 'driverLeaves'])->name('admin.driver_leaves');
    Route::get('/jims/driver-suspend', [DriverController::class, 'suspendDriver'])->name('admin.driver_suspend');
    Route::get('/jims/driver-unsuspend', [DriverController::class, 'unSuspendDriver'])->name('admin.driver_unsuspend');

    Route::get('/jims/accounts', [AccountController::class, 'accounts'])->name('admin.accounts');
    Route::get('/jims/view-account', [AccountController::class, 'viewAccounts'])->name('admin.view_account');
    Route::get('/jims/edit-account', [AccountController::class, 'editAccounts'])->name('admin.edit_account');
    Route::post('/jims/update-account', [AccountController::class, 'updateAccount'])->name('admin.update_account');

    Route::get('/jims/app-user', [AccountController::class, 'users'])->name('admin.users');
    Route::get('/jims/app-user-view', [AccountController::class, 'viewAppUser'])->name('admin.view_app_user');

    Route::get('/jims/admins', [AccountController::class, 'admins'])->name('admin.admins');
    
    Route::get('/jims/car-type', [CarTypeController::class, 'carType'])->name('admin.car_type');
    Route::post('/jims/car-type-store', [CarTypeController::class, 'carTypeStore'])->name('admin.car_type.store');
    Route::get('/jims/car-type-status/{id}/{current_status}', [CarTypeController::class, 'carTypeStatus'])->name('admin.car_type.status');
    Route::get('/jims/car-type/edit/{id}', [CarTypeController::class, 'edit'])->name('admin.car_type.edit');
    Route::post('/jims/car-type/update/{id}', [CarTypeController::class, 'update'])->name('admin.car_type.update');
    
    Route::get('/jims/search-job', [SearchController::class, 'search'])->name('admin.search');
    Route::get('/jims/search-for-client', [SearchController::class, 'client'])->name('admin.for_client');
    Route::get('/jims/search-for-client-data', [SearchController::class, 'clientSearch'])->name('admin.for_client_data');

    // this is the api to get the client phone no. {shekhar}====================================================================================
    Route::get('/jims/get-all-client-data', [SearchController::class, 'getAllClient'])->name('admin.get_client_data');
    // this is the api to get the client phone no. {shekhar}==================================================================================== 
    Route::get('/jims/search-for-driver', [SearchController::class, 'searchForDriver'])->name('admin.for_driver');
    Route::get('/jims/search-by-number', [SearchController::class, 'searchByNumber'])->name('admin.search_by_number');
    Route::get('/jims/search-by-number-data', [SearchController::class, 'searchByNumberData'])->name('admin.search_by_number_data');
    Route::get('/jims/search-by-telephonist', [SearchController::class, 'searchByTelephonist'])->name('admin.search_by_telephonist');
    Route::get('/jims/search-by-date-time', [SearchController::class, 'searchbydatetime'])->name('admin.search_by_date_time');
    Route::get('/jims/search-by-date-time-data', [SearchController::class, 'searchbydatetimeData'])->name('admin.search_by_date_time_data');
    Route::get('/jims/search-by-x-reference', [SearchController::class, 'searchbyreference'])->name('admin.search_by_x_reference');
    Route::get('/jims/search-by-x-reference-data', [SearchController::class, 'searchbyreferenceData'])->name('admin.search_by_x_reference_data');
    Route::post('/jims/driver_account', [SearchController::class, 'driverAccount'])->name('admin.driverAccount');
    
    Route::get('/jims/invoice', [InvoiceController::class, 'index'])->name('admin.invoice.index');
    Route::get('/jims/invoice/create', [InvoiceController::class, 'create'])->name('admin.invoice.create');
    Route::get('/jims/invoice/search', [InvoiceController::class, 'search'])->name('admin.invoice.search');
    Route::get('/jims/invoice/setting', [InvoiceController::class, 'setting'])->name('admin.invoice.setting');
    Route::get('/jims/invoice/handle-invoice/{id}/{result_type}/{job_ids}', [InvoiceController::class, 'handleInvoice'])->name('admin.invoice.handle-invoice');
    Route::get('jims/invoice/view/{id}', [InvoiceController::class, 'viewInvoice'])->name('backend.invoice.view_invoice');
    
    Route::get('/jims/invoice/invoice_pdf', [InvoiceController::class, 'invoicePdf'])->name('admin.invoice.invoice_pdf');
    Route::get('/jims/invoice/view_pdf_test', [InvoiceController::class, 'viewPdfTest']);

    Route::get('/jims/send_reminder_mail', [JobController::class, 'sendReminderEmail'])->name('admin.send_reminder_mail');
    //   Route::get('/jims/send_reminder_mail/{email?}/{id}', [JobController::class, 'sendReminderEmail'])->name('admin.send_reminder_mail');
    // Route::get('reminder_to_client/', [JobController::class, 'reminder_to_client'])->name('admin.reminder_to_client');
    Route::get('/get-new-job', [ApiController::class, 'getNewJob'])->name('get_new_job');

    Route::get('/jims/user-analytic', [BookingLogController::class, 'index'])->name('admin.user_analytic');

    Route::get('/jims/booking-slot', [BookingSlotController::class, 'index'])->name('admin.booking_slot');
    Route::get('/jims/booking-slot/create', [BookingSlotController::class, 'create'])->name('admin.booking_slot.create');
    Route::post('/jims/booking-slot/store', [BookingSlotController::class, 'store'])->name('admin.booking_slot.store');
    Route::get('/jims/booking-slot/edit/{id}', [BookingSlotController::class, 'edit'])->name('admin.booking_slot.edit');
    Route::post('/jims/booking-slot/update/{id}', [BookingSlotController::class, 'update'])->name('admin.booking_slot.update');

    Route::get('/jims/operators', [OperatorsController::class, 'index'])->name('admin.operators.index');
    Route::get('/jims/operator/create', [OperatorsController::class, 'create'])->name('admin.operator.create');
    Route::post('/jims/operator/store', [OperatorsController::class, 'store'])->name('admin.operator.store');
    Route::get('/jims/operator/edit/{id}', [OperatorsController::class, 'edit'])->name('admin.operator.edit');
    Route::post('/jims/operator/update/{id}', [OperatorsController::class, 'update'])->name('admin.operator.update');
    


    Route::controller(LeadController::class)->group(function(){
        Route::prefix('/jims/leads')->group(function (){
            Route::get('website_leads', 'websiteLeads')->name('backend.leads.website_leads');
            Route::get('landing_page_one', 'landingPageOne')->name('backend.leads.landing_page_one');
            Route::post('update_comment', 'updateComment')->name('backend.leads.update_comment');
        });
    });
    
    Route::get('send-job-email', [ApiController::class, 'SendJobEmail'])->name('api.send_job_email');
    
    
});

Route::middleware(['auth', 'verified', 'role.agent'])->group(function (){
    Route::get('/agent', [DashboardController::class, 'agentDashboard']);
    Route::get('/agent/dashboard', [DashboardController::class, 'agentDashboard'])->name('agent.dashboard');
});

Route::middleware(['auth', 'verified', 'role.accountant'])->group(function (){
    Route::get('/accountant', [DashboardController::class, 'accountantDashboard']);
    Route::get('/accountant/dashboard', [DashboardController::class, 'accountantDashboard'])->name('accountant.dashboard');
});

Route::get('test_email', [Controller::class, 'testEmiall']);