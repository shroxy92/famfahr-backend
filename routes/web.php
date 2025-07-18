<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('layouts.login');
});

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard','layouts.dashboard')->name('dashboard');

    // Attendance
    Route::view('/manual_entry','layouts.attendance.mannual_attendance_entry');
    Route::view('/attendance_report','layouts.attendance.attendance_report');
    Route::view('/ar','layouts.attendance.report_attendance');

    // Roster
    Route::view('/extra_duty','layouts.roster.roster_extraduty');
    Route::view('/late_night_duty','layouts.roster.roster_latenight');
    Route::view('/holiday_duty','layouts.roster.roster_holiday');
    Route::view('/all_roster_request','layouts.roster.all_roster_requests');
    Route::view('/request_details','layouts.roster.request_roster_details');

    // Claim
    Route::get('/loan_apply',[\App\Http\Controllers\ClaimController::class,'index'])->name('loan-apply');
    Route::view('/claim_request_form','layouts.claim.claim_request_form');
    Route::view('/advance_salary','layouts.claim.advance_salary');
    Route::view('/all_claim_requested_list','layouts.claim.all_requested_lists')->name('all-claim-requested-list');
    Route::view('/requested_details','layouts.claim.requested_details');

    //User Profile
    Route::view('/profile','layouts.user_management.uemployee_profile');

    // Leave
    Route::view('/new_leave','layouts.leave.leave_new_application');
    Route::view('/cancel_leave','layouts.leave.cancel_applied_leave');
    Route::view('/adjust_leave','layouts.leave.adjust_applied_leave');
    Route::view('/availed_adjustment','layouts.leave.adjust_approved_leave');
    Route::view('/availed_cancel','layouts.leave.cancel_approved_leave');
    Route::view('/leave_report','layouts.leave.leave_report');

    //User Management
    Route::view('add_user','layouts.user_management.uadd_user');
    Route::view('add_employee','layouts.user_management.uadd_employee');
    Route::view('user_manage','layouts.user_management.uuser_list');
    Route::view('add_dept_lead','layouts.user_management.uadd_dept_lead');
    Route::view('emp_list','layouts.user_management.uemployee_list');
    Route::view('user_permission','layouts.user_management.uuser_permission');
    Route::view('emp_profile','layouts.user_management.uemployee_profile')->name('employees.show');
    Route::view('user_edit','layouts.user_management.uedit_user');

    //Appropval Route-Leave
    Route::view('/all_leave_req','layouts.approval.leave_approval_modal');
    Route::view('/approved_leave_list','layouts.approval.leave_approved_list');
    Route::view('/leave_reports','layouts.approval.leave_reports');

    //Appropval Route-Claim
    Route::view('/all_claim_req','layouts.approval.claim_request_list_for_approval');
    Route::view('/acr','layouts.approval.claim_request_list_for_approval1');
    Route::view('/approved_claim','layouts.approval.claim_approved_list');
    Route::view('/claim_reports','layouts.approval.claim_reports');
    Route::view('/claim_history_ind','layouts.approval.claim_individual_history');

    //Appropval Route-Roster
    Route::view('all_roster_requests','layouts.approval.roster_request_list_for_approval');
    Route::view('approved_roster','layouts.approval.roster_approved_list');
    Route::view('reports_roster','layouts.approval.roster_reports');
    Route::view('reports_ind_roster','layouts.approval.roster_individual_history');

    //Appropval Route-Attendance
    Route::view('/attendance_manual_entry_request','layouts.approval.attendance_review_for_approval');
    Route::view('/approved_attendance','layouts.approval.attendance_approved_list');
    Route::view('/att_custom_report','layouts.approval.attendance_customized_report');
});

//end of breeze

// static route

//Route::view('/rfa','layouts.approval.roster_review_for_approval');


//Route::middleware(['auth'])->group(function () {
//    Route::view('/dashboard','layouts.dashboard');
//
//    // Attendance
//    Route::view('/manual_entry','layouts.attendance.mannual_attendance_entry');
//    Route::view('/attendance_report','layouts.attendance.attendance_report');
//    Route::view('/ar','layouts.attendance.report_attendance');
//
//     Roster
    //Route::view('/extra_duty','layouts.roster.roster_extraduty');
//    Route::view('/late_night_duty','layouts.roster.roster_latenight');
//    Route::view('/holiday_duty','layouts.roster.roster_holiday');
//    Route::view('/all_roster_request','layouts.roster.all_roster_requests');
//    Route::view('/request_details','layouts.roster.request_roster_details');
//
//    // Claim
//    Route::view('/loan_apply','layouts.claim.loan_apply');
//    Route::view('/claim_request_form','layouts.claim.claim_request_form');
//    Route::view('/advance_salary','layouts.claim.advance_salary');
//    Route::view('/all_claim_requested_list','layouts.claim.all_requested_lists');
//    Route::view('/requested_details','layouts.claim.requested_details');
//
//    //User Profile
//    Route::view('/profile','layouts.user_management.uemployee_profile');
//
//    // Leave
//    Route::view('/new_leave','layouts.leave.leave_new_application');
//    Route::view('/cancel_leave','layouts.leave.cancel_applied_leave');
//    Route::view('/adjust_leave','layouts.leave.adjust_applied_leave');
//    Route::view('/availed_adjustment','layouts.leave.adjust_approved_leave');
//    Route::view('/availed_cancel','layouts.leave.cancel_approved_leave');
//    Route::view('/leave_report','layouts.leave.leave_report');
//
//    //User Management
//    Route::view('add_user','layouts.user_management.uadd_user');
//    Route::view('add_employee','layouts.user_management.uadd_employee');
//    Route::view('user_manage','layouts.user_management.uuser_list');
//    Route::view('add_dept_lead','layouts.user_management.uadd_dept_lead');
//    Route::view('emp_list','layouts.user_management.uemployee_list');
//    Route::view('user_permission','layouts.user_management.uuser_permission');
//    Route::view('emp_profile','layouts.user_management.uemployee_profile')->name('employees.show');
//    Route::view('user_edit','layouts.user_management.uedit_user');
//
//    //Appropval Route-Leave
//    Route::view('/all_leave_req','layouts.approval.leave_approval_modal');
//    Route::view('/approved_leave_list','layouts.approval.leave_approved_list');
//    Route::view('/leave_reports','layouts.approval.leave_reports');
//
//    //Appropval Route-Claim
//    Route::view('/all_claim_req','layouts.approval.claim_request_list_for_approval');
//    Route::view('/acr','layouts.approval.claim_request_list_for_approval1');
//    Route::view('/approved_claim','layouts.approval.claim_approved_list');
//    Route::view('/claim_reports','layouts.approval.claim_reports');
//    Route::view('/claim_history_ind','layouts.approval.claim_individual_history');
//
//    //Appropval Route-Roster
//    Route::view('/all_roster_requests','layouts.approval.roster_request_list_for_approval');
//    Route::view('/approved_roster','layouts.approval.roster_approved_list');
//    Route::view('/reports_roster','layouts.approval.roster_reports');
//    Route::view('/reports_ind_roster','layouts.approval.roster_individual_history');
//
//    //Appropval Route-Attendance
//    Route::view('/attendance_manual_entry_request','layouts.approval.attendance_review_for_approval');
//    Route::view('/approved_attendance','layouts.approval.attendance_approved_list');
//    Route::view('/att_custom_report','layouts.approval.attendance_customized_report');
//});
