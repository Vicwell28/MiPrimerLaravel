<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\RolPermisoController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('register', 'UserController@register');
// Route::post('login', 'UserController@authenticate');

//Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('register', [UserController::class, 'register' ]);  
// Route::post('register', [UserController::class, 'register' ]); 


Route::group(['middleware' => ['jwt.verify']], function() {
    /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/
});






//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////PERMISOS//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

//RUTA PARA AGREGAR Puesto METODO CREATE.
Route::post('/AgregarPermiso', [PermisoController::class, 'AgregarPermiso']); 

//RUTA PARA AGREGAR Puesto METODO SAVE.
Route::post('/PermisoAgregado', [PermisoController::class, 'PermisoAgregado']); 

//RUTA PARA MODIFICAR Puesto. 
Route::post('/ActualizarPermiso', [PermisoController::class, 'ActualizarPermiso']); 

//RUTA PARA ELIMINAR pueto. 
Route::post('/EliminarPermiso/{id}', [PermisoController::class, 'EliminarPermiso']); 

//CONSULTA PARA PUESTO ID
Route::get('/getIdPermiso/{id}', [PermisoController::class, 'getIdPermiso']); 

//CONSULTA PARA PUESTO ALL
Route::get('/getAllPermisos', [PermisoController::class, 'getAllPermiso']); 



//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////ROLES////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

//RUTA PARA AGREGAR Puesto METODO CREATE.
Route::post('/AgregarRol', [RolController::class, 'AgregarRoles']); 

//RUTA PARA AGREGAR Puesto METODO SAVE.
Route::post('/RolAgregado', [RolController::class, 'RolesAgregado']); 

//RUTA PARA MODIFICAR Puesto. 
Route::post('/ActualizarRol', [RolController::class, 'ActualizarRoles']); 

//RUTA PARA ELIMINAR pueto. 
Route::post('/EliminarRol/{id}', [RolController::class, 'EliminarRoles']); 

//CONSULTA PARA PUESTO ID
Route::get('/getIdRol/{id}', [RolController::class, 'getIdRoles']); 

//CONSULTA PARA PUESTO ALL
Route::get('/getAllRol', [RolController::class, 'getAllRoles']); 

//CONSULTA PARA PUESTO ALL
Route::get('/getConsultaAnsiosaROL', [RolController::class, 'getConsultaAnsiosaROL']); 


//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////USUARIOS/////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

//RUTA PARA AGREGAR Puesto METODO CREATE.
Route::post('/AgregarUsuario', [UserController::class, 'AgregarUsuarios']); 

//RUTA PARA AGREGAR Puesto METODO SAVE.
Route::post('/UsuarioAgregado', [UserController::class, 'UsuariosAgregado']); 

//RUTA PARA MODIFICAR Puesto. 
Route::post('/ActualizarUsuario', [UserController::class, 'ActualizarUsuarios']); 

//RUTA PARA ELIMINAR pueto. 
Route::post('/EliminarUsuario/{id}', [UserController::class, 'EliminarUsuarios']); 

//CONSULTA PARA PUESTO ID
Route::get('/getIdUsuario/{id}', [UserController::class, 'getIdUsuarios']); 

//CONSULTA PARA PUESTO ALL
Route::get('/getAllUsuario', [UserController::class, 'getAllUsuarios']); 

//CONSULTA ANSIOSA PARA PUESTO ALL
Route::get('/getLConsultaAnsiosaUSER', [UserController::class, 'getLConsultaAnsiosaUSER']); 

//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////TABLA RALCION ROL PERMISO////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

//RUTA PARA AGREGAR Puesto METODO CREATE.
Route::post('/Agregarrolpermiso', [RolPermisoController::class, 'AgregarRol_Permiso']); 

//RUTA PARA AGREGAR Puesto METODO SAVE.
Route::post('/rolpermisoAgregado', [RolPermisoController::class, 'Rol_PermisoAgregado']); 

//RUTA PARA MODIFICAR Puesto. 
Route::post('/Actualizarrolpermiso', [RolPermisoController::class, 'ActualizarRol_Permiso']); 

//RUTA PARA ELIMINAR pueto. 
Route::post('/Eliminarrolpermiso/{id}', [RolPermisoController::class, 'EliminarRol_Permiso']); 

//CONSULTA PARA PUESTO ID
Route::get('/getIdrolpermiso/{id}', [RolPermisoController::class, 'getIdRol_Permiso']); 

//CONSULTA PARA PUESTO ALL
Route::get('/getAllrolpermiso', [RolPermisoController::class, 'getAllRol_Permiso']); 

//CONSULTA ANSIOSA PARA PUESTO ALL
Route::get('/getConsultaAnsiosa', [RolPermisoController::class, 'getLConsultaAnsiosa']); 



//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////CONSULTAS EN USERCONTROLLER////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/User_Select', [UserController::class, 'User_Select']); 
Route::get('/Permisos_pluck', [UserController::class, 'Permisos_pluck']); 
Route::get('/Permisos_Count', [UserController::class, 'Permisos_Count']); 
Route::get('/RolPermisos_select3', [UserController::class, 'RolPermisos_select3']); 


Route::get('/User_Select1', [UserController::class, 'User_Select1']); 
Route::get('/Rol_Select1', [UserController::class, 'Rol_Select1']); 
Route::get('/Permisos_Select1', [UserController::class, 'Permisos_Select1']); 
Route::get('/RolPermisos_Select1', [UserController::class, 'RolPermisos_Select1']); 


Route::get('/Rol_', [UserController::class, 'Rol_']); 
Route::get('/Rol_cross', [UserController::class, 'Rol_cross']); 
Route::get('/User_Select', [UserController::class, 'User_Select']); 
Route::get('/User_Select', [UserController::class, 'User_Select']); 


// Route::post('/getUsers', [UserController::class, 'getUsers']);

// Route::get('/ObtenerTodosLosRoles', [RolController::class, 'getAllRoles']);
// Route::get('/JoinsDeLosRoles', [RolController::class, 'getJoinRol']);


// Route::get('/Hola/{Hola}', function($Hola){
//     return "Hola, pinche $Hola!"; 
// });
