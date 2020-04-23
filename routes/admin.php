<?php

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

Route::middleware(\App\Http\Middleware\LangMiddleware::class)->group(function () {

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/lang/{lang}', 'AdminController@changeLang')->name('admin.changeLang');  

    // users
    Route::resource('users', 'UsersController');
    Route::post('users/multi_delete', 'UsersController@multi_delete')->name('users.multi_delete');

    // roles and permissions
    Route::resource('roles', 'RoleController');
    Route::post('/roles/multi_delete', 'RoleController@multi_delete')->name('roles.multi_delete');

    Route::resource('permissions', 'PermissionController');
    Route::post('permissions/multi_delete', 'PermissionController@multi_delete')->name('permissions.multi_delete');

    // Beds
    Route::resource('beds', 'BedsController');
    Route::post('beds/multi_delete', 'BedsController@multi_delete')->name('beds.multi_delete');

    // Medical Form
    Route::resource('medicalforms', 'MedicalformsController');
    Route::post('medicalforms/multi_delete', 'MedicalformsController@multi_delete')->name('medicalforms.multi_delete');

    // Medications
    Route::resource('medications', 'MedicationsController');
    Route::post('medications/multi_delete', 'MedicationsController@multi_delete')->name('medications.multi_delete');

    // Patients
    Route::resource('patients', 'PatientsController');
    Route::post('patients/multi_delete', 'PatientsController@multi_delete')->name('patients.multi_delete');

    // Prescription
    Route::resource('prescriptions', 'PrescriptionsController');
    Route::post('prescriptions/multi_delete', 'PrescriptionsController@multi_delete')->name('prescriptions.multi_delete');

    // departments
    Route::resource('departments', 'DepartmentsController');
    Route::post('departments/multi_delete', 'DepartmentsController@multi_delete')->name('departments.multi_delete');

});
