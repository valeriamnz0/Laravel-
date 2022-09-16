<?php

use App\Rol;
use App\User;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('/Login', function () {
    return view('Login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', 'HomeController@index')->name('home');

    Route::middleware(['can:isAdmin,isSeller'])->group(function () {
        Route::get('/cotizador', function () {
            return view('cotizador');
        });

        Route::resource('proyecto', 'ProyectoController');

        Route::get('/datosCotizacion/{id}', 'AgendaInstalacionController@datosCotizacion');
        
        Route::get('/updateProyecto/{proyecto}', 'AgendaInstalacionController@updateProyecto');

        Route::resource('cliente', 'UserController');

        Route::resource('articulo', 'ArticuloController');

        Route::resource('cita', 'AgendaVisitaController');

        Route::get('FormularioCitas', function () {
            return view('/Visitas/FormularioCitas');
        });

        Route::post('get_provinces', 'UserController@getAllProvinces')->name('getProvinces');

        Route::get('/FormularioClientes', function () {
            return view('FormularioClientes');
        });

        Route::get('/FormularioArticulos', function () {
            return view('FormularioArticulos');
        });
    });
    Route::middleware(['can:isAdmin'])->group(function () {

        Route::get('/FormularioEmpleados', function () {

            $roles = DB::table('rols')
            ->whereIn('rolID', [1, 2, 3])
            ->select('*')
            ->get();

            $usuarios = User::join('rols', 'rols.rolID', 'users.fk_rolID')
            ->whereIn('rolID', [1, 2, 3])->get();

            return view('FormularioEmpleados', compact(['roles', 'usuarios']));
        })->name('empleados');

        Route::post('/RegistrarEmpleado', 'UserController@storeUsuario')->name('users.store');
        Route::put('/RegistrarEmpleado{userID}', 'UserController@updateUsuario')->name('users.update');

        Route::post('escogeCliente', ['as' => 'escogeCliente', 'uses' => 'ProyectoController@escogeCliente']);

        Route::get('/FormularioProyecto', function () {
            return view('FormularioProyecto');
        });

        Route::post('/proyecto/{pasaCliente}', 'ProyectoController@pasarCliente');

        Route::get('/cotizacion/cargaProyecto/{proyectoID}', 'CotizacionController@cargaProyecto');

        Route::get('/cotizacion/editaCotizacion/{cotizacionID}', 'CotizacionController@editaCotizacion');
        Route::get('/Reportes_Ventas', 'ReportController@viewSaleReport');
        Route::get('/Reportes_Clientes', 'ReportController@viewClientReport');
        Route::get('/Reportes_Articulos', 'ReportController@viewItemReport');
        Route::post('/Reportes_Ventas', 'ReportController@generateSaleReport');
        Route::post('/Reportes_Clientes', 'ReportController@generateClientReport');
        Route::post('/Reportes_Articulos', 'ReportController@generateItemReport');
    });
    Route::middleware('can:isTech,isAdmin')->group(function () {

        Route::get('/updateProyecto/{proyecto}', 'AgendaInstalacionController@updateProyecto');

        Route::resource('instalacion', 'AgendaInstalacionController');

        Route::post('/instalacion/{pasaProyecto}', 'AgendaInstalacionController@pasarProyectoID');

        Route::get('/datosCitasTecnico/{id}', 'AgendaInstalacionController@datosCitasTecnico'); //para vista tecnico instalacion

        Route::get('/listaMaterialesTecnico/{id1}', 'AgendaInstalacionController@listaMaterialesTecnico');  //lista de materiales instalacion

        Route::get('/FormularioInstalacion', function () {
            return view('FormularioInstalacion');
        });

        Route::get('/FormularioInstalacionTecnico', function () {
            return view('FormularioInstalacionTecnico');
        });
    });
});

Route::get('/PDF/{id}', 'ArticuloController@PDF')->name('descargarPDF/{id}');
Route::resource('cotizacion', 'CotizacionController');

Route::get('articulos', function () {
    return view('/articulos');
});

Auth::routes();
Route::get('/test', function () {
    dd(\App\cotizacion::with('articulos')->get());
    dd(bcrypt('admin1234'));
});
