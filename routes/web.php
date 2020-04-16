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
Route::get('/patient_medical_record', function () { return view('Patient/advanced_table'); });
Route::get('/patient_appointment_add', 'RequestAppointmentController@reqAppointment');

Route::get('/doctor_login', function () { return view('Doctor/login'); });
Route::get('/doctor_main', function () { return view('Doctor/index'); });
Route::get('/doctor_schedule', function () { return view('Doctor/calendar'); });
Route::get('/patients_medical_record', function () { return view('Doctor/advanced_table'); });


Route::get('/warehouse_login', function () { return view('Warehouse/login'); });
Route::get('/warehouse_main', function () { return view('Warehouse/index'); });


Route::get('/receiptionist_login', function () { return view('Receiptionist/login'); });
Route::get('/receiptionist_main', function () { return view('Receiptionist/index'); });

Route::get('/login_patient', function () { return view('login'); });
Route::post('/login_patient/proses', 'LoginPatientController@proses');
Route::get('/logout_patient', 'LoginPatientController@logout');

Route::get('/login_doctor', function () { return view('login'); });
Route::post('/login_doctor/proses', 'LoginMedStaffController@proses');
Route::get('/logout_doctor', 'LoginMedStaffController@logout');


// Testing Routes
Route::get('/login', function () { return view('login'); });
// Route::get('/inbox', function () { return view('inbox'); });
// Route::get('/mail_compose', function () { return view('mail_compose'); });