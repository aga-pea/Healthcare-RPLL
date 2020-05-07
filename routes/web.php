<?php

use Illuminate\Support\Facades\Route;

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

/*
------------------------------------------------------------------
Index Routes
------------------------------------------------------------------
*/
Route::get('/', function () { return view('lock_screen'); });

/*
------------------------------------------------------------------
Patient Routes & Controller
------------------------------------------------------------------
*/
Route::get('/patient_login', function () { return view('Patient/login'); });
Route::get('/patient_main', function () { return view('Patient/index'); });
Route::get('/patient_medical_record', 'ReadMedicalDataController@readMedicalData');
Route::get('/patient_appointment', 'RequestAppointmentController@index');
Route::get('/patient_appointment_pick', 'RequestAppointmentController@pickAppointment');
Route::get('/patient_appointment_add', 'RequestAppointmentController@reqAppointment');

/*
------------------------------------------------------------------
Doctor Routes & Controller
------------------------------------------------------------------
*/
Route::get('/doctor_login', function () { return view('Doctor/login'); });
Route::get('/doctor_main', function () { return view('Doctor/index'); });
Route::get('/doctor_schedule', function () { return view('Doctor/advanced_form_components'); });
Route::get('/doctor_medical_record', function () { return view('Doctor/advanced_table'); });

/*
------------------------------------------------------------------
Warehouse Routes & Controller
------------------------------------------------------------------
*/
Route::get('/warehouse_login', function () { return view('Warehouse/login'); });
Route::get('/warehouse_main', function () { return view('Warehouse/index'); });
Route::get('/warehouse_input', 'AddInventoryController@index');
Route::get('/warehouse_input_detail','AddInventoryController@detail');
Route::get('/warehouse_input_detail_proses','AddInventoryController@store');
Route::get('/warehouse_view', 'ViewInventoryController@index');
Route::get('/warehouse_view_list','ViewInventoryController@list');
Route::get('/warehouse_view_detail','ViewInventoryController@detail');
Route::get('/warehouse_view_detail_update', 'ViewInventoryController@update');
Route::get('/logout_warehouse', 'LoginWarehouseController@logout');

/*
------------------------------------------------------------------
Receiptionist Routes & Controller
------------------------------------------------------------------
*/
Route::get('/receiptionist_login', function () { return view('Receiptionist/login'); });
Route::get('/receiptionist_main', function () { return view('Receiptionist/index'); });
Route::get('/receiptionist_patient_register', function(){ return view('Receiptionist/patient_registration_main'); });
Route::get('/receiptionist_patient_register_detail', 'PatientRegistrationController@detail');
Route::get('/receiptionist_patient_register_proses','PatientRegistrationController@proses_patient');
Route::get('/receiptionist_patient_register_appointment','PatientRegistrationController@patient_appointment');
Route::get('/receiptionist_new_patient_appointment_proses', 'PatientRegistrationController@patient_appointment_detail');
Route::get('/receiptionist_new_patient_appointment_create', 'PatientRegistrationController@patient_appointment_proses');
Route::get('/receiptionist_new_appointment','PatientRegistrationController@appointment_pick');
Route::get('/receiptionist_patient_appointment', 'HandleAppointmentController@display_appointment');
Route::get('/receiptionist_patient_appointment_change_status', 'HandleAppointmentController@change_status');
Route::get('/receiptionist_patient_appointment_change_status_proses', 'HandleAppointmentController@change_status_proses');
Route::get('/view_schedule','ViewScheduleController@index');
Route::get('/view_full_schedule', 'ViewScheduleController@proses');
/*
------------------------------------------------------------------
Cashier Routes & Controller
------------------------------------------------------------------
*/
Route::get('/cashier_login', function () { return view('Cashier/login'); });
Route::get('/cashier_main', function () { return view('Cashier/index'); });


/*
------------------------------------------------------------------
Logout Routes & Controller
------------------------------------------------------------------
*/
Route::post('/login_patient/proses', 'LoginPatientController@proses');
Route::get('/logout_patient', 'LoginPatientController@logout');

Route::post('/login_doctor/proses', 'LoginMedStaffController@proses');
Route::get('/logout_doctor', 'LoginMedStaffController@logout');

Route::post('/login_receiptionist/proses', 'LoginReceptionistController@proses');
Route::get('/logout_receiptionist', 'LoginReceptionistController@logout');

Route::post('/login_warehouse/proses', 'LoginWarehouseController@proses');
Route::get('/logout_warehouse', 'LoginWarehouseController@logout');

Route::post('/login_cashier/proses', 'LoginCashierController@proses');
Route::get('/logout_cashier', 'LoginCashierController@logout');