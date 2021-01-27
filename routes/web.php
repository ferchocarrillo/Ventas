<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\JhonatanPermission\Models\Role;
use App\JhonatanPermission\Models\Permission;
use App\JhonatanPermission\Models\Porta;
use App\JhonatanPermission\Models\Upgrade;
use App\JhonatanPermission\Models\Fija;
use App\JhonatanPermission\Models\Prepost;
use App\JhonatanPermission\Models\Rechazos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


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

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Auth::routes();

    Route::get('/test', function () {

    $user =User::find(2);

    //$user->roles()->sync([2]);
    Gate::authorize('haveaccess','role.show');
    return $user;
    //return $user->havePermission('role.create');
    });

    Route::resource('/role', 'RoleController')->names('role');
    Route::resource('/user', 'UserController', ['except'=>[
        'create','store']])->names('user');
    Route::resource('/Upgrade','UpgradeController');

    Route::post('/app/Ciudades', array('as' => 'Ciudad', 'uses' => 'selectsController@Ciudad'));
    Route::post('/app/Revisados', array('as' => 'Revisado', 'uses' => 'selects2Controller@Revisados'));
    Route::resource('porta', PortaController::class);
    Route::resource('prepost', PrepostController::class);
    Route::resource('upgrade', UpgradeController::class);
    Route::resource('fija', FijaController::class);
    Route::resource('rechazos', RechazosController::class);
    Route::get('porta-list-excel', 'PortaController@exportExcel')->name('porta.excel');
    Route::get('prepost-list-excel', 'PrepostController@exportExcel')->name('prepost.excel');
    Route::get('upgrade-list-excel', 'UpgradeController@exportExcel')->name('upgrade.excel');
    Route::get('fija-list-excel', 'FijaController@exportExcel')->name('fija.excel');
    Route::get('/search','PortaController@search');
    Route::get('/searchfija','FijaController@searchfija');
    Route::get('/searchprepost','PrepostController@searchprepost');
    Route::get('/searchupgrade','UpgradeController@searchupgrade');
    Route::get('/searchportadigital','PortaDigitalController@searchportadigital');
    Route::get('/searchusers','UserController@searchusers');
    Route::get('/charts', 'ChartController@index')->name('charts');
    Route::resource('portadigital', PortaDigitalController::class);
    Route::get('portadigital-list-excel', 'PortaDigitalController@exportExcel')->name('portadigital.excel');
    Route::resource('portaplnew', PortaPlanesNuevosController::class);
    Route::resource('prepostplnew', PrepostPlanesNuevosController::class);



