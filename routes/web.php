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

Route::get('/', function () { return view('welcome'); });
Route::get('/login', function () { return view('login'); });
Route::get('/inbox', function () { return view('inbox'); });
Route::get('/patient_main', function () { return view('Patient/index'); });
Route::get('/doctor_main', function () { return view('Doctor/index'); });
Route::get('/warehouse_main', function () { return view('Warehouse/index'); });
Route::get('/receptionist_main', function () { return view('Receptionist/index'); });

Route::get('/login_patient', function () { return view('login'); });
Route::post('/login_patient/proses', 'LoginPatientController@proses');
Route::get('/logout_patient', 'LoginPatientController@logout');

Route::get('/login_doctor', function () { return view('login'); });
Route::post('/login_doctor/proses', 'LoginMedStaffController@proses');
Route::get('/logout_doctor', 'LoginMedStaffController@logout');