<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Cleaner;
use App\Coach;
use App\Course;
use App\User;
use App\Advert;
use App\Admin;
use App\Trainee;
use App\Medical;
use App\Device;


//Main Page
Route::get('/', 'FrontendController@index')
    ->name('welcome');

//auth
Auth::routes();

//routes for the gym
//Settings

Route::middleware(['auth', 'admin'])->group(function () {
    //Dashboard
    Route::get('/home', 'SettingsController@index')
        ->name('home');

    // GYM Settings
    Route::get('/settings', 'SettingController@index')
        ->name('settings');
    Route::post('/settings/update', 'SettingController@update')
        ->name('settings.update');

    //Users
    Route::get('/users', 'UserController@index')
        ->name('users');
    Route::get('/user/create', 'UserController@create')
        ->name('user.create');
    Route::get('/user/delete/{id}', 'UserController@destroy')
        ->name('user.delete');
    Route::get('/user/admin_profile', 'UserController@admin_profile')
        ->name('user.admin_profile');
    Route::post('/user/store', 'UserController@store')
        ->name('user.store');
    Route::post('/user/{user}/makeAdmin', 'UserController@makeAdmin')
        ->name('user.makeAdmin');
    Route::post('/user/{user}/makeUser', 'UserController@makeUser')
        ->name('user.makeUser');

    //route for Admins
    Route::get('/admins', 'AdminController@index')
        ->name('admins');
    Route::get('/admin/create', 'AdminController@create')
        ->name('admin.create');
    Route::get('/admin/edit/{id}', 'AdminController@edit')
        ->name('admin.edit');
    Route::get('/admin/show/{id}', 'AdminController@show')
        ->name('admin.show');
    Route::get('/admin/delete/{id}', 'AdminController@destroy')
        ->name('admin.delete');
    Route::post('/admin/store', 'AdminController@store')
        ->name('admin.store');
    Route::post('/admin/update/{id}', 'AdminController@update')
        ->name('admin.update');
    Route::get('/admin/trashed', 'AdminController@trashed')
        ->name('admin.trashed'); //sodt delete 
    Route::get('/admin/hdelete/{id}', 'AdminController@hdelete')
        ->name('admin.hdelete'); //hard delete
    Route::get('/admin/restore/{id}', 'AdminController@restore')
        ->name('admin.restore');

    //route for Coachs
    Route::get('/coachs', 'CoachController@index')
        ->name('coachs'); //__construct() in controller == ->middleware('auth');
    Route::get('/coach/create', 'CoachController@create')
        ->name('coach.create');
    Route::get('/coach/edit/{id}', 'CoachController@edit')
        ->name('coach.edit');
    Route::get('/coach/show/{id}', 'coachController@show')
        ->name('coach.show');
    Route::get('/coach/delete/{id}', 'CoachController@destroy')
        ->name('coach.delete');
    Route::post('/coach/store', 'CoachController@store')
        ->name('coach.store');
    Route::post('/coach/update/{id}', 'CoachController@update')
        ->name('coach.update');
    Route::get('/coach/trashed', 'CoachController@trashed')
        ->name('coach.trashed'); //sodt delete 
    Route::get('/coach/hdelete/{id}', 'CoachController@hdelete')
        ->name('coach.hdelete'); //hard delete
    Route::get('/coach/restore/{id}', 'CoachController@restore')
        ->name('coach.restore');

    //route for Cleaners
    Route::get('/cleaners', 'CleanerController@index')
        ->name('cleaners');
    Route::get('/cleaner/create', 'CleanerController@create')
        ->name('cleaner.create');
    Route::get('/cleaner/edit/{id}', 'CleanerController@edit')
        ->name('cleaner.edit');
    Route::get('/cleaner/show/{id}', 'cleanerController@show')
        ->name('cleaner.show');
    Route::get('/cleaner/delete/{id}', 'CleanerController@destroy')
        ->name('cleaner.delete');
    Route::post('/cleaner/store', 'CleanerController@store')
        ->name('cleaner.store');
    Route::post('/cleaner/update/{id}', 'CleanerController@update')
        ->name('cleaner.update');
    Route::get('/cleaner/trashed', 'CleanerController@trashed')
        ->name('cleaner.trashed'); //sodt delete 
    Route::get('/cleaner/hdelete/{id}', 'CleanerController@hdelete')
        ->name('cleaner.hdelete'); //hard delete
    Route::get('/cleaner/restore/{id}', 'CleanerController@restore')
        ->name('cleaner.restore');

    //route for Medicals
    Route::get('/medicals', 'MedicalController@index')
        ->name('medicals');
    Route::get('/medical/create', 'MedicalController@create')
        ->name('medical.create');
    Route::get('/medical/edit/{id}', 'MedicalController@edit')
        ->name('medical.edit');
    Route::get('/medical/delete/{id}', 'MedicalController@destroy')
        ->name('medical.delete');
    Route::post('/medical/store', 'MedicalController@store')
        ->name('medical.store');
    Route::post('/medical/update/{id}', 'MedicalController@update')
        ->name('medical.update');
    Route::get('/medical/trashed', 'MedicalController@trashed')
        ->name('medical.trashed'); //sodt delete 
    Route::get('/medical/hdelete/{id}', 'MedicalController@hdelete')
        ->name('medical.hdelete'); //hard delete
    Route::get('/medical/restore/{id}', 'MedicalController@restore')
        ->name('medical.restore');

    //route for Adverts
    Route::get('/adverts', 'AdvertController@index')
        ->name('adverts');
    Route::get('/advert/create', 'AdvertController@create')
        ->name('advert.create');
    Route::get('/advert/edit/{id}', 'AdvertController@edit')
        ->name('advert.edit');
    Route::get('/advert/show/{id}', 'AdvertController@show')
        ->name('advert.show');
    Route::get('/advert/delete/{id}', 'AdvertController@destroy')
        ->name('advert.delete');
    Route::post('/advert/store', 'AdvertController@store')
        ->name('advert.store');
    Route::post('/advert/update/{id}', 'AdvertController@update')
        ->name('advert.update');
    Route::get('/advert/trashed', 'AdvertController@trashed')
        ->name('advert.trashed'); //sodt delete 
    Route::get('/advert/hdelete/{id}', 'AdvertController@hdelete')
        ->name('advert.hdelete'); //hard delete
    Route::get('/advert/restore/{id}', 'AdvertController@restore')
        ->name('advert.restore');

    //route for Devics
    Route::get('/devices', 'DeviceController@index')
        ->name('devices');
    Route::get('/device/create', 'DeviceController@create')
        ->name('device.create');
    Route::get('/device/edit/{id}', 'DeviceController@edit')
        ->name('device.edit');
    Route::get('/device/delete/{id}', 'DeviceController@destroy')
        ->name('device.delete');
    Route::post('/device/store', 'DeviceController@store')
        ->name('device.store');
    Route::post('/device/update/{id}', 'DeviceController@update')
        ->name('device.update');
    Route::get('/device/trashed', 'DeviceController@trashed')
        ->name('device.trashed'); //sodt delete 
    Route::get('/device/hdelete/{id}', 'DeviceController@hdelete')
        ->name('device.hdelete'); //hard delete
    Route::get('/device/restore/{id}', 'DeviceController@restore')
        ->name('device.restore');

    //route for Courses
    Route::get('/courses', 'CourseController@index')
        ->name('courses');
    Route::get('/course/create', 'CourseController@create')
        ->name('course.create');
    Route::get('/course/edit/{id}', 'CourseController@edit')
        ->name('course.edit');
    Route::get('/course/delete/{id}', 'CourseController@destroy')
        ->name('course.delete');
    Route::get('/course/show/{id}', 'CourseController@show')
        ->name('course.show');
    Route::post('/course/store', 'CourseController@store')
        ->name('course.store');
    Route::post('/course/update/{id}', 'CourseController@update')
        ->name('course.update');
    Route::get('/course/trashed', 'CourseController@trashed')
        ->name('course.trashed'); //sodt delete 
    Route::get('/course/hdelete/{id}', 'CourseController@hdelete')
        ->name('course.hdelete'); //hard delete
    Route::get('/course/restore/{id}', 'CourseController@restore')
        ->name('course.restore');

    //route for Trainees
    Route::get('/trainees', 'TraineeController@index')
        ->name('trainees');
    Route::get('/trainee/create', 'TraineeController@create')
        ->name('trainee.create');
    Route::get('/trainee/edit/{id}', 'TraineeController@edit')
        ->name('trainee.edit');
    Route::get('/trainee/show/{id}', 'traineeController@show')
        ->name('trainee.show');
    Route::get('/trainee/delete/{id}', 'TraineeController@destroy')
        ->name('trainee.delete');
    Route::post('/trainee/store', 'TraineeController@store')
        ->name('trainee.store');
    Route::post('/trainee/update/{id}', 'TraineeController@update')
        ->name('trainee.update');
    Route::get('/trainee/trashed', 'TraineeController@trashed')
        ->name('trainee.trashed'); //sodt delete 
    Route::get('/trainee/hdelete/{id}', 'TraineeController@hdelete')
        ->name('trainee.hdelete'); //hard delete
    Route::get('/trainee/restore/{id}', 'TraineeController@restore')
        ->name('trainee.restore');

    //route for Reports
    Route::get('/reports_employees', 'ReportController@reports_employees')
        ->name('reports.employees');
    Route::get('/reports_trainees', 'ReportController@reports_trainees')
        ->name('reports.trainees');
    Route::get('/reports_statistics', 'ReportController@reports_statistics')
        ->name('reports.statistics');
});

//User Profile
Route::get('/user/profile', 'UserController@profile')
    ->name('user.profile');

//Route to Front_end
Route::get('/index', 'FrontendController@index')
    ->name('front-index');
Route::get('/trainer', 'FrontendController@trainerIndex')
    ->name('front-trainer');
Route::get('/class', 'FrontendController@classesIndex')
    ->name('front-classes');
Route::get('/contact', 'FrontendController@contactIndex')
    ->name('front-contact');
Route::get('/memberservies', 'FrontendController@memberServicesIndex')
    ->name('front-memberservies');
Route::get('/succsesstories', 'FrontendController@successStoriesIndex')
    ->name('front-succsesstories');

//routes for the Settings
Route::get('/admins/settings', 'SettingsController@index')
    ->name('setting');
Route::post('/admins/settings/update', 'SettingsController@update')
    ->name('setting.update');
//routes for settings classses
Route::post('/admins/settings/classes/store', 'ClassController@store')
    ->name('setting.classes.store');
Route::get('/admins/settings/classes/create', 'ClassController@create')
    ->name('setting.classes.create');
Route::get('/admins/settings/classes/edit/{id}', 'ClassController@edit')
    ->name('setting.classes.edit');
Route::post('/admins/settings/classes/update/{id}', 'ClassController@update')
    ->name('setting.classes.update');
Route::get('/admins/settings/classes/destroy/{id}', 'ClassController@destroy')
    ->name('setting.classes.delete'); //soft delete
Route::get('/admins/settings/classes/hdelete/{id}', 'ClassController@hdelete')
    ->name('setting.classes.hdelete'); //hard delete
Route::get('/admins/settings/classes/restore/{id}', 'ClassController@restore')
    ->name('setting.classes.restore');
Route::get('/admins/settings/classes/trached', 'ClassController@trashed')
    ->name('setting.classes.trashed');
//route for settings trainers
Route::post('/admins/settings/trainers/store', 'TrainerController@store')
    ->name('setting.trainers.store');
Route::get('/admins/settings/trainers/create', 'TrainerController@create')
    ->name('setting.trainers.create');
Route::get('/admins/settings/trainers/edit/{id}', 'TrainerController@edit')
    ->name('setting.trainers.edit');
Route::post('/admins/settings/trainers/update/{id}', 'TrainerController@update')
    ->name('setting.trainers.update');
Route::get('/admins/settings/trainers/destroy/{id}', 'TrainerController@destroy')
    ->name('setting.trainers.delete'); //soft delete
Route::get('/admins/settings/trainers/hdelete/{id}', 'TrainerController@hdelete')
    ->name('setting.trainers.hdelete'); //hard delete
Route::get('/admins/settings/trainers/restore/{id}', 'TrainerController@restore')
    ->name('setting.trainers.restore');
Route::get('/admins/settings/trainers/trached', 'TrainerController@trached')
    ->name('setting.trainers.trashed');

//route for settings Services
Route::post('/admins/settings/service/store', 'FrontendController@serviceStore')
    ->name('setting.service.store');
Route::get('/admins/settings/service/delete/{id}', 'FrontendController@serviceDelete')
    ->name('setting.service.delete');






















//Test Query
Route::get('/profile', function () {
    return view('users.profile');
})->name('profile');

Route::get('/admin', function () {
    $admin = Admin::findOrFail(1);
    //return Admin::findOrFail(1)->user->password;
    //return Admin::findOrFail(1)->user->name;
    //return Admin::findOrFail(1)->user;
    //one to many
    foreach ($admin->cleaners as $cleaner) {
        echo $cleaner->full_name;
    }
    //return $admin->cleaners;
    //return $admin->coachs;//or return Admin::findOrFail(1)->coachs;
    //return $admin->adverts;
    /*
    return Admin::where('salary', '>', 10000)
        ->update(['salary' => 50000]); //The update method expects an array of column and value pairs representing the columns that should be updated
    */
    //return Admin::all()->sum('salary');
    //return Admin::all()->max('salary');
    //return Admin::where('salary','>',10000)->count();
    //return Admin::where('salary', '>', 100)->firstOrFail();
    //return Admin::findOrFail(1)->full_name;
    //return Admin::orderBy('salary','desc')->get();
    //return Admin::orderBy('salary','desc')->take(2)->get();
    //return Admin::where('id',1)->get();
})->name('admin');

Route::get('/coach', function () {
    return Coach::findOrFail(1)->admin->full_name;
})->name('user');

Route::get('/cleaner', function () {
    return Cleaner::findOrFail(1)->admin->full_name;
})->name('user');

Route::get('/advert', function () {
    return Advert::findOrFail(1)->admin->full_name;
})->name('advert');
//not working ??
Route::get('/device', function () {
    return Device::findOrFail(2)->course->sport_type;
})->name('device');
//not working ??
Route::get('/course', function () {
    //return Course::findOrFail(2)->devices;
    $course = Course::findOrFail(2);
    foreach ($course->devices as $device) {
        echo $device->type;
    }
})->name('course');

Route::get('/medical', function () {
    return Medical::findOrFail(1)->trainee;
})->name('medical');


//route for Users
Route::get('/users', 'UserController@index')->name('users');

//test query
Route::get('/trainee', function () {
    $trainees = Trainee::findOrFail(1);
    foreach ($trainees->courses as $course) {
        //
    }
    //return Trainee::findOrFail(1)->courses()->get();
    //return Trainee::findOrFail(1)->medical->hospital_name;
})->name('trainee');

Route::get('/course', function () {
    $courses = Course::findOrFail(1);
    foreach ($courses->trainees as $trainee) {
        //
    }
    //return Course::findOrFail(1)->trainees()->get();
})->name('course ');
