<?php

use App\Http\Controllers\Auth\RegisterationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyPersonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationalController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PersonRelatedController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PhotoContorller;
use App\Http\Controllers\ProjectCompanyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectPersonController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//***************************************************
Route::middleware('guest')->group(function () {

    Route::get('/login', [RegisterationController::class, 'createShowLoginForm'])->name('loginForm');
    Route::post('/login', [RegisterationController::class, 'storeLogin'])->name('login');
});


Route::middleware(['auth'])->group(function () {




    Route::get('items/{type}/photos/{id}', [PhotoContorller::class, 'index'])->name('items.photos.index');
    Route::post('gallery/{type}/item/{id}', [PhotoContorller::class, 'store'])->name('gallery.item.store');
    Route::delete('gallery/{photo}', [PhotoContorller::class, 'destroy'])->name('items.photos.destroy');


    Route::get('/account/{type}/show/{data}', [AccountController::class, 'show'])->name('account.show');
    Route::get('/account/{type}/create/{data}', [AccountController::class, 'create'])->name('account.create');
    Route::post('/account/{type}/store/{data}', [AccountController::class, 'store'])->name('account.store');
    Route::get('/account/edit/{account}', [AccountController::class, 'edit'])->name('account.edit');
    Route::patch('/account/update/{account}', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account/{account}/delete', [AccountController::class, 'destroy'])->name('account.delete');


    //-------------------------Emails---------------------
    Route::get('/email/{type}/show/{data}', [EmailController::class, 'show'])->name('email.show');
    Route::get('/email/{type}/create/{data}', [EmailController::class, 'create'])->name('email.create');
    Route::post('/email/{type}/store/{data}', [EmailController::class, 'store'])->name('email.store');
    Route::get('/email/edit/{email}', [EmailController::class, 'edit'])->name('email.edit');
    Route::patch('/email/update/{email}', [EmailController::class, 'update'])->name('email.update');
    Route::delete('/email/{email}', [EmailController::class, 'destroy'])->name('email.delete');
    //--------------------------Phones--------------------
    Route::get('/phone/{type}/show/{data}', [PhoneController::class, 'show'])->name('phone.show');
    Route::get('/phone/{type}/create/{data}', [PhoneController::class, 'create'])->name('phone.create');
    Route::post('/phone/{type}/store/{data}', [PhoneController::class, 'store'])->name('phone.store');
    Route::get('/phone/edit/{phone}', [PhoneController::class, 'edit'])->name('phone.edit');
    Route::patch('/phone/update/{phone}', [PhoneController::class, 'update'])->name('phone.update');
    Route::delete('/phone/{phone}', [PhoneController::class, 'destroy'])->name('phone.delete');
    //----------------------------------------------------
    Route::resource('', AccountController::class)->except('store');


//----------------------------Project-----------------------------

    Route::get('projects/export', [ProjectController::class, 'export'])->name('projects.export');
    Route::get('projects/execlExport/{project}', [ProjectController::class, 'exportOne'])->name('projects.exportOne');

    Route::resource('projects', ProjectController::class);


//----------------------------Person-----------------------------
    Route::get('persons/project/{person}',[PersonController::class,'list_project'])->name("personProject.create");

    Route::get('persons/export', [PersonController::class, 'export'])->name('persons.export');
    Route::get('persons/execlExport/{person}', [PersonController::class, 'exportOne'])->name('persons.exportOne');
    Route::get('persons/personRelatedExport/{person}', [PersonRelatedController::class, 'exportPersonRelated'])->name('persons.exportPersonRelated');
    Route::get('persons/personEducationalExport/{person}', [EducationalController::class, 'exportPersonEducational'])->name('person.exportPersonEducational');
    Route::resource('persons', PersonController::class);


    Route::get('persons/related/{person}', [PersonRelatedController::class, 'show'])->name('persons.related.show');
    Route::get('persons/related/create/{person}', [PersonRelatedController::class, 'create'])->name('persons.related.create');

    Route::post('persons/related/{person}', [PersonRelatedController::class, 'store'])->name('persons.related.store');
    Route::delete('persons/related/{person}/{related}', [PersonRelatedController::class, 'destroy'])->name('persons.related.delete');


    Route::get('persons/related/{person}/edit/{related}', [PersonRelatedController::class, 'edit'])->name('persons.related.edit');
    Route::patch('persons/related/{person}/{related}', [PersonRelatedController::class, 'update'])->name('persons.related.update');

//    نمایش سوابق تحصیلی فرد
    Route::get('/educational/show/{person}', [EducationalController::class, 'show'])->name('educational.show');
    Route::get('/educational/create/{person}', [EducationalController::class, 'create'])->name('educational.create');
    Route::post('/educational/store/{person}', [EducationalController::class, 'store'])->name('educational.store');
    Route::get('/educational/{educational}/edit', [EducationalController::class, 'edit'])->name('educational.edit');
    Route::patch('/educational/{educational}', [EducationalController::class, 'update'])->name('educational.update');
    Route::delete('/educational/{educational}', [EducationalController::class, 'destroy'])->name('educational.destroy');

//-----------------------سوابق شغلی
    Route::get('/experience/show/{person}', [ExperienceController::class, 'experience_show'])->name('experience.show');
    Route::get('/experience/create/{person}', [ExperienceController::class, 'experience_create'])->name('experience.create');
    Route::post('/experience/store/{person}', [ExperienceController::class, 'experience_store'])->name('experience.store');
    Route::get('/experience/edit/{id}', [ExperienceController::class, 'experience_edit'])->name('experience.edit');
    Route::patch('/experience/{companyPerson}', [ExperienceController::class, 'experience_update'])->name('experience.update');
    Route::delete('/experience/{id}', [ExperienceController::class, 'experience_destroy'])->name('experience.destroy');
    Route::get('experience/execlExport/{person}', [ExperienceController::class, 'exportExperienceOne'])->name('experience.exportOne');

//----------------------------Company-----------------------------
    Route::get('companies/export', [CompanyController::class, 'export'])->name('companies.export');
    Route::get('companies/execlExport/{company}', [CompanyController::class, 'exportOne'])->name('companies.exportOne');
    Route::get('persons/personSavabeghExport/{person}', [CompanyPersonController::class, 'exportPersonSavabegh'])->name('persons.exportPersonSavabegh');

    Route::resource('companies', CompanyController::class);
    Route::get('/companies/{company}/persons', [CompanyPersonController::class, 'index'])->name('companies.persons.index');
    Route::get('/companies/{company}/persons/create', [CompanyPersonController::class, 'create'])->name('companies.persons.create');
    Route::post('/companies/{company}/persons', [CompanyPersonController::class, 'store'])->name('companies.persons.store');

    Route::delete('/companies/{company}/persons/{person}', [CompanyPersonController::class, 'destroy'])->name('companies.persons.destroy');

    Route::get('/companies/{company}/persons/destroy', [CompanyPersonController::class, 'destroyForm'])->name('companies.persons.destroyForm');

    Route::resource('companies.photos', PhotoContorller::class);

//----------------------------User-----------------------------
    Route::get('users/export', [UserController::class, 'export'])->name('users.export');

    Route::resource('users', UserController::class);
    Route::get('/logout', [RegisterationController::class, 'logout'])->name('logout');
    Route::get('/signup', [RegisterationController::class, 'create'])->name('signup');
    Route::post('/register', [RegisterationController::class, 'store'])->name('register');
    Route::post('/checkUsername/{User:username}', [RegisterationController::class, 'checkUsername'])->name('checkUsername');

    Route::get('/user/projects', [UserController::class, 'myproject'])->name('user.projects');
    Route::post('/users/{user}/changeActivation', [UserController::class, "changeActivation"])->name('user.changeActivation');
    Route::post('/users/changeRole/{user}', [UserController::class, "changeRole"])->name('user.changeRole');
    Route::delete('/user/{user}',[UserController::class , 'destroy'])->name('user.delete');
    /****/
    Route::get('/user/index', [UserController::class, 'listUser'])->name('users.listUsers');



//------------ assign project to company/user/persons ---------------
    Route::get('/project/{project}/user/assign', [ProjectUserController::class, 'assign'])->name('projects.users.assign');
    Route::post('/project/{project}/user/{user}', [ProjectUserController::class, 'store'])->name('projects.users.storeAssign');

    Route::get('/project/{project}/persons/assign', [ProjectPersonController::class, 'assign'])->name('projects.persons.assign');
    Route::post('/project/{project}/persons/{person}', [ProjectPersonController::class, 'store'])->name('projects.persons.storeAssign');
    Route::post('persons/{person}/project/{project}',[ProjectPersonController::class,'storePersonProject'])->name('personProject.store');

    Route::get('/project/{project}/company/assign', [ProjectCompanyController::class, 'assign'])->name('projects.companies.assign');
    Route::post('/project/{project}/company/{company}', [ProjectCompanyController::class, 'store'])->name('projects.companies.storeAssign');

//------------------Roles--------------------
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::patch('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.delete');
    Route::get('/', [HomeController::class, 'index'])->name('index');

    //--------------------dashboard
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});






