<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol; 

class RolController extends Controller
{
      ///////////////////////////////////////////////////
    //CONSULTA ANSIOSA GET CON METODO FIND
    ///////////////////////////////////////////////////
    public function getConsultaAnsiosaROL(){
        //$RolesPermisos = Rol::all()->Permiso;

        // $RolesPermisos = rol::find(1);

        // foreach ($RolesPermisos->permiso as $role) {
        //     return $role;
        // }
         $RolesPermisos = rol::find(1);
         $RolesPermisos->permiso;
        return $RolesPermisos;
        //return $RolesPermisos;
    }

   ///////////////////////////////////////////////////
    //CONSULTA ANSIOSA GET CON METODO FIND
    ///////////////////////////////////////////////////
    public function getAllRoles(){
        return Rol::all(); 
    }

    ///////////////////////////////////////////////////
    //CONSULTA GET CON METODO FIND
    ///////////////////////////////////////////////////
    public function getIdRoles(Request $request){
        return Rol::find($request->id); 
    }

    ///////////////////////////////////////////////////
    //CURD: INSERTAR ROL CON MEMTODO SAVE
    ///////////////////////////////////////////////////
    public function RolesAgregado(Request $request){
        $Rol = new Rol;

        $Rol->Nombre = $request->Nombre;
        $Rol->Descripcion = $request->Descripcion;
    
        $Rol->save();

        return $Rol; 
    }
   
     
    ///////////////////////////////////////////////////
    //CRUD: INSERTAR ROL CON METODO CRETE
    ///////////////////////////////////////////////////
    public function AgregarRoles(Request $request){
        $Rol = Rol::create([
            'Nombre' => $request->Nombre,
            'Descripcion' => $request->Descripcion
        ]);

        return $Rol; 
    }

    ///////////////////////////////////////////////////
    //CRUD: ACTUALIZAR ROL CON METODO FIND & SAVE;
    ///////////////////////////////////////////////////
    public function ActualizarRoles(Request $request){
        $Rol = Rol::find($request->Id);

        $Rol->Nombre = $request->Nombre;
        $Rol->Descripcion = $request->Descripcion;
        
        $Rol->save();

        return $Rol; 
    }

    ///////////////////////////////////////////////////
    //CURD: ELMINAR ROL CON METODO FIND & DELETE; 
    ///////////////////////////////////////////////////
    public function EliminarRoles(Request $request){
        $Rol = Rol::find($request->id);
        
        $Rol->delete();
        
        return $Rol; 
    }
}
