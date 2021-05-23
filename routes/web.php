<?php

use App\Http\Controllers\Auth\RegisterationController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\CompanyPersonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PhotoContorller;
use App\Http\Controllers\Project\ProjectCompanyController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ProjectPersonController;
use App\Http\Controllers\Project\ProjectUserController;
use App\Http\Controllers\UserController;
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


Route::get('/',[HomeController::class,'index'])->name('index');

//----------------- authentication ---------------------
Route::get('/signup' ,[RegisterationController::class,'create'])->name('signup');
Route::post('/register' ,[RegisterationController::class,'store'])->name('register');

Route::get('/login' ,[RegisterationController::class,'createShowLoginForm'])->name('loginForm');
Route::post('/login' ,[RegisterationController::class,'storeLogin'])->name('login');

Route::get('/logout' ,[RegisterationController::class,'logout'])->name('logout');
//-----------------end authentication ---------------------

Route::resource('projects',ProjectController::class);
// POST      | persons                            | persons.store            | App\Http\Controllers\PersonController@store
// GET|HEAD  | persons                            | persons.index            | App\Http\Controllers\PersonController@index
// GET|HEAD  | persons/create                     | persons.create           | App\Http\Controllers\PersonController@create
// DELETE    | persons/{person}                   | persons.destroy          | App\Http\Controllers\PersonController@destroy
// PUT|PATCH | persons/{person}                   | persons.update           | App\Http\Controllers\PersonController@update
// GET|HEAD  | persons/{person}                   | persons.show             | App\Http\Controllers\PersonController@show
// GET|HEAD  | persons/{person}/edit              | persons.edit             | App\Http\Controllers\PersonController@edit
//return redirect(route('contact.show',['type'=>'company','data'=>$company]))
Route::get('/contact/{type}/create/{data}',[ContactController::class,'create'])->name('contact.create');


Route::resource('users',UserController::class);
Route::resource('emails',EmailController::class);
//| GET|HEAD  | emails                                  | emails.index                   | App\Http\Controllers\EmailController@index                            | web        |
//| POST      | emails                                  | emails.store                   | App\Http\Controllers\EmailController@store                            | web        |
//| GET|HEAD  | emails/create                           | emails.create                  | App\Http\Controllers\EmailController@create                           | web        |
//| GET|HEAD  | emails/{email}                          | emails.show                    | App\Http\Controllers\EmailController@show                             | web        |
//| PUT|PATCH | emails/{email}                          | emails.update                  | App\Http\Controllers\EmailController@update                           | web        |
//| DELETE    | emails/{email}                          | emails.destroy                 | App\Http\Controllers\EmailController@destroy                          | web        |
//| GET|HEAD  | emails/{email}/edit                     | emails.edit                    | App\Http\Controllers\EmailController@edit                             | web        |

Route::resource('phones',PhoneController::class);
Route::resource('companies',CompanyController::class);
Route::resource('persons',PersonController::class);
Route::resource('companies.photos',PhotoContorller::class);

Route::get('/checkemail/{itemId}',[EmailController::class,'check'])->name('checkemail');


Route::get('/user/index',[UserController::class,'listUser'])->name('users.index');


Route::get('/companies/{company}/persons',[CompanyPersonController::class,'index'])->name('companies.persons.index');
Route::get('/companies/{company}/persons/create',[CompanyPersonController::class,'create'])->name('companies.persons.create');
Route::post('/companies/{company}/persons',[CompanyPersonController::class,'store'])->name('companies.persons.store');
Route::get('/companies/{company}/persons/destroy',[CompanyPersonController::class,'destroyForm'])->name('companies.persons.destroyForm');
Route::delete('/companies/{company}/persons/{person}',[CompanyPersonController::class,'destroy'])->name('companies.persons.destroy');

Route::post('/users/{user}/changeActivation',[UserController::class,"changeActivation"])->name('user.changeActivation');

//------------ assign project to company/user/person ---------------
Route::get('/project/{project}/user/assign',[ProjectUserController::class,'assign'])->name('projects.users.assign');
Route::post('/project/{project}/user/{user}',[ProjectUserController::class,'store'])->name('projects.users.storeAssign');

Route::get('/project/{project}/person/assign',[ProjectPersonController::class,'assign'])->name('projects.persons.assign');
Route::post('/project/{project}/person/{person}',[ProjectPersonController::class,'store'])->name('projects.persons.storeAssign');

Route::get('/project/{project}/company/assign',[ProjectCompanyController::class,'assign'])->name('projects.companies.assign');
Route::post('/project/{project}/company/{company}',[ProjectCompanyController::class,'store'])->name('projects.companies.storeAssign');
//------------end assign project to company/user/person ---------------




