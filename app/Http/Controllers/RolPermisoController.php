<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol_Permiso; 

class RolPermisoController extends Controller
{
    
    ///////////////////////////////////////////////////
    //CONSULTA GET CON METODO ALL
    ///////////////////////////////////////////////////
    public function getAllRol_Permiso(){
        return Rol_Permiso::all(); 
    }

    ///////////////////////////////////////////////////
    //CONSULTA GET CON METODO FIND
    ///////////////////////////////////////////////////
    public function getIdRol_Permiso(Request $request){
        return Rol_Permiso::find($request->id); 
    }

    ///////////////////////////////////////////////////
    //CURD: INSERTAR Rol_Permiso CON MEMTODO SAVE
    ///////////////////////////////////////////////////
    public function Rol_PermisoAgregado(Request $request){
        $Rol_Permiso = new Rol_Permiso;

        $Rol_Permiso->Rol_id = $request->Rol;
        $Rol_Permiso->Permiso_id = $request->Permiso;
       
        $Rol_Permiso->save();

        return $Rol_Permiso; 
    }
   
     
    ///////////////////////////////////////////////////
    //CRUD: INSERTAR Rol_Permiso CON METODO CRETE
    ///////////////////////////////////////////////////
    public function AgregarRol_Permiso(Request $request){
        $Rol_Permiso = Rol_Permiso::create([
            'Rol_id' => $request->Rol,
            'Permiso_id' => $request->Permiso
        ]);

        return $Rol_Permiso; 
    }

    ///////////////////////////////////////////////////
    //CRUD: ACTUALIZAR Rol_Permiso CON METODO FIND & SAVE;
    ///////////////////////////////////////////////////
    public function ActualizarRol_Permiso(Request $request){
        $Rol_Permiso = Rol_Permiso::find($request->Id);

        $Rol_Permiso->Rol_id = $request->Rol;
        $Rol_Permiso->Permiso_id = $request->Permiso;
        
        $Rol_Permiso->save();

        return $Rol_Permiso; 
    }

    ///////////////////////////////////////////////////
    //CURD: ELMINAR Rol_Permiso CON METODO FIND & DELETE; 
    ///////////////////////////////////////////////////
    public function EliminarRol_Permiso(Request $request){
        $Rol_Permiso = Rol_Permiso::find($request->id);
        
        $Rol_Permiso->delete();

        return $Rol_Permiso; 
    }
}
