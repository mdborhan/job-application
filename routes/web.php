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

Route::get('/', 'HomePageController@index')->name('/');

Route::get('/get-profile', 'ApplicantController@getProfile')->name('get.profile');
Route::get('/get-dashboard', 'ApplicantController@getDashboard')->name('get.dashboard');
Route::post('/applicant-profile-update', 'ApplicantController@postProfile')->name('user.profile.update');
Route::post('/applicant-apply', 'ApplicantController@getVApply')->name('valid.applicant');
Route::get('/apply', 'ApplicantController@getApply')->name('apply');
Route::get('/applicant', 'ApplicantController@index')->name('applicant');
Route::post('/applicant-login', 'ApplicantController@applicantLoginPage')->name('applicant.login');
Route::get('/applicant-register', 'ApplicantController@getRegister')->name('applicant.register');
Route::post('/applicant-register', 'ApplicantController@postRegister')->name('applicant.register');
Route::post('/applicant-logout', 'ApplicantController@applicantLogout')->name('applicant.logout');
Route::get('/company-dashboard', 'CompanyController@getDashboard')->name('company.dashboard');
Route::get('/company', 'CompanyController@index')->name('company');
Route::get('/job-post', 'CompanyController@getJob')->name('job.post');
Route::post('/add-job-post', 'CompanyController@postJob')->name('add.job.post');
Route::post('/delete-job-post', 'CompanyController@deleteJob')->name('delete.job.post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
