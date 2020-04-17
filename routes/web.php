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

Route::get('/', function () { return view('lock_screen'); });

Route::get('/patient_login', function () { return view('Patient/login'); });
Route::get('/patient_main', function () { return view('Patient/index'); });
Route::get('/patient_appointment', function () { return view('Patient/mail_compose'); });
Route::get('/patient_medical_record', 'RequestController@index');

Route::get('/patient_appointment_add', 'RequestAppointmentController@reqAppointment');

Route::get('/doctor_login', function () { return view('Doctor/login'); });
Route::get('/doctor_main', function () { return view('Doctor/index'); });
Route::get('/doctor_schedule', function () { return view('Doctor/calendar'); });
Route::get('/patients_medical_record', function () { return view('Doctor/advanced_table'); });

Route::get('/warehouse_login', function () { return view('Warehouse/login'); });
Route::get('/warehouse_main', function () { return view('Warehouse/index'); });

Route::get('/receiptionist_login', function () { return view('Receiptionist/login'); });
Route::get('/receiptionist_main', function () { return view('Receiptionist/index'); });

Route::get('/cashier_login', function () { return view('Cashier/login'); });
Route::get('/cashier_main', function () { return view('Cashier/index'); });

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
// Testing Routes
// Route::get('/inbox', function () { return view('inbox'); });
// Route::get('/mail_compose', function () { return view('mail_compose'); });