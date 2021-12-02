<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso; 

class PermisoController extends Controller
{
    
    ///////////////////////////////////////////////////
    //CONSULTA GET CON METODO ALL
    ///////////////////////////////////////////////////
    public function getAllPermiso(){
        return permiso::all(); 
    }

    ///////////////////////////////////////////////////
    //CONSULTA GET CON METODO FIND
    ///////////////////////////////////////////////////
    public function getIdPermiso(Request $request){
        return permiso::find($request->id); 
    }

    ///////////////////////////////////////////////////
    //CURD: INSERTAR PERMISO CON MEMTODO SAVE
    ///////////////////////////////////////////////////
    public function PermisoAgregado(Request $request){
        $Permiso = new permiso;

        $Permiso->Nombre = $request->Nombre;
        $Permiso->Descripcion = $request->Descripcion;
       
        $Permiso->save();

        return $Permiso; 
    }
   
     
    ///////////////////////////////////////////////////
    //CRUD: INSERTAR PERMISO CON METODO CRETE
    ///////////////////////////////////////////////////
    public function AgregarPermiso(Request $request){
        $Permiso = permiso::create([
            'Nombre' => $request->Nombre,
            'Descripcion' => $request->Descripcion
        ]);

        return $Permiso; 
    }

    ///////////////////////////////////////////////////
    //CRUD: ACTUALIZAR PERMISO CON METODO FIND & SAVE;
    ///////////////////////////////////////////////////
    public function ActualizarPermiso(Request $request){
        $Permiso = Permiso::find($request->Id);

        $Permiso->Nombre = $request->Nombre;
        $Permiso->Descripcion = $request->Descripcion;
        
        $Permiso->save();

        return $Permiso; 
    }

    ///////////////////////////////////////////////////
    //CURD: ELMINAR PERMISO CON METODO FIND & DELETE; 
    ///////////////////////////////////////////////////
    public function EliminarPermiso(Request $request){
        $Permiso = Permiso::find($request->id);
    
        $Permiso->delete();

        return $Permiso; 
    }
}
