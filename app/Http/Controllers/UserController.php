<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User; 
use Tymon\JWTAuth\Exceptions\JWTException; 
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Message;
use App\Models\Rol;
use App\Models\Permiso; 
use App\Models\Rol_Permiso; 
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }
            } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    return response()->json(['token_expired'], $e->getStatusCode);
            } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                    return response()->json(['token_invalid'], $e->getStatusCode);
            } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
                    return response()->json(['token_absent'], $e->getStatusCode);
            }
            return response()->json(compact('user'));
    }

    public function register(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'Rol' => $request->get('Rol'),

        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }






    
    // public function getUsers(){
    //     //return User::all(); 
    //     return User::select('users.*', 'rol.*', 'permios.*')
    //     ->join('rol', 'rol.Id_Rol', '=', 'users.Rol')
    //     ->join('permios', 'permios.Id_permisos', '=', 'rol.Permisos')
    //     ->get();

    //     //SELECT * FROM permios INNER JOIN rol ON permios.Id_permisos=rol.Permisos INNER JOIN users ON users.Rol=rol.Id_Rol
    // }
    ///////////////////////////////////////////////////
    //CONSULTA GET CON METODO ALL
    ///////////////////////////////////////////////////
    public function getLConsultaAnsiosaUSER(){
        // return Permiso::find(1)->Roles; 

        // $Rol = User::find(1)->rols; 
        //  return $Rol;

        $User = User::find(1);
        $User->rols->permiso;
       return $User;
    }


    ///////////////////////////////////////////////////
    //CONSULTA GET CON METODO ALL
    ///////////////////////////////////////////////////
    public function getAllUsuarios(){
        // return User::join('rol', 'rol.Id_Rol', '=' , 'users.Rol')
        // ->join('Permiso', 'permios.Id_permisos', '=', 'rol.Permisos')
        // ->select('users.*', 'rol.*', 'permios.*')
        // ->get(); 

        //SELECT * FROM users INNER JOIN rol on users.Rol=rol.Id_Rol INNER JOIN permios on permios.Id_permisos=rol.Permisos; 


        // return Rol::select('rol.*', 'permios.*')->join('permios', 'rol.Permisos', '=', 'permios.Id_permisos')->get(); 

         $Rol = Rol::find(1)->Permiso; 
         return $Rol;

        // SELECT * FROM rol INNER JOIN permios ON rol.Permisos=permios.Id_permisos;
    }

    ///////////////////////////////////////////////////
    //CONSULTA GET CON METODO FIND
    ///////////////////////////////////////////////////
    public function getIdUsuarios(Request $request){
        return User::find($request->id); 
    }

    ///////////////////////////////////////////////////
    //CURD: INSERTAR USUARIO CON MEMTODO SAVE
    ///////////////////////////////////////////////////
    public function UsuariosAgregado(Request $request){
        $User = new User;

        $User->name = $request->Nombre;
        $User->email = $request->Email;
        $User->password = $request->Password;
        $User->Rol = $request->Rol;
        
        $User->save();

        return $User; 
    }
   
     
    ///////////////////////////////////////////////////
    //CRUD: INSERTAR USUARIO CON METODO CRETE
    ///////////////////////////////////////////////////
    public function AgregarUsuarios(Request $request){
        $User = User::create([
            'name' => $request->Nombre,
            'email' => $request->Email,
            'password' => $request->Password,
            'Rol' => $request->Rol,
        ]);

        return $User; 
    }

    ///////////////////////////////////////////////////
    //CRUD: ACTUALIZAR USUARIO CON METODO FIND & SAVE;
    ///////////////////////////////////////////////////
    public function ActualizarUsuarios(Request $request){
        $User = User::find($request->Id);

        $User->name = $request->Nombre;
        $User->email = $request->Email;
        $User->password = $request->Password;
        $User->Rol = $request->Rol;
        
        $User->save();

        return $User; 
    }

    ///////////////////////////////////////////////////
    //CURD: ELMINAR USUARIO CON METODO FIND & DELETE; 
    ///////////////////////////////////////////////////
    public function EliminarUsuarios(Request $request){
        $User = User::find($request->id);
        
        return $User; 

        $User->delete();
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////CONSULTAS CON TODAS LAS TABLAS//////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////

    public function User_Select(){
        //$users = DB::select('select * from users where id = ?', [1]);

        //$results = DB::select('select * from rols where Id_Rol = :Id_Rol', ['Id_Rol' => 1]);

        $results = DB::table('users')->get();

        return $results;
    }

    public function Rol_Select(){
        
    }

    public function Permisos_Select(){
        
    }

    public function RolPermisos_Select(){
        
    }



    public function User_Select1(){
        $users = DB::select('select * from users');

        foreach ($users as $user) {
        echo $user->id;
        echo $user->name;
        }
    }

    public function Rol_Select1(){
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            echo $user->name;
        }
        
    }

    public function Permisos_Select1(){
        //$user = DB::table('users')->where('name', 'Victor Miguel Basurto Juarez')->first();
        $email = DB::table('users')->where('name', 'Victor Miguel Basurto Juarez')->value('email');

        return $email;
        
    }

    public function RolPermisos_Select1(){
        $resultado = User::find(1)->get();
        
        return $resultado; 
        
    }


    public function User_find(){
        
    }

    public function Rol_cross(){
        $sizes = DB::table('users')
            ->crossJoin('rols')
            ->crossJoin('rolpermisos')
            ->crossJoin('permisos')
            ->get();

            return $sizes; 
        
    }

    public function Permisos_find(){
        
    }

    public function RolPermisos_find(){
        
    }


    public function Permisos_pluck(){
        $titles = DB::table('permisos')->pluck('Nombre');

        foreach ($titles as $title) {
            echo $title."<br>";
        }
    }

    public function Rol_(){

        $RESULTADO = User::select('users.*' , 'rols.*' , 'permisos.*')
        ->join('rols', 'rols.Id_Rol', '=', 'users.Rol')
        ->join('rolpermisos', 'rolpermisos.Rol_id', '=', 'rols.Id_Rol')
        ->join('permisos', 'permisos.Id_Permiso', '=', 'rolpermisos.Permiso_id')
        ->get(); 

        return $RESULTADO; 

        // SELECT * FROM users 
        // INNER JOIN rols 
        // ON users.Rol=rols.Id_Rol 
        // INNER JOIN rolpermisos 
        // ON rolpermisos.Rol_id=rols.Id_Rol 
        // INNER JOIN permisos 
        // ON permisos.Id_Permiso = rolpermisos.Permiso_id;
        
    }

    public function Permisos_Count(){
        $users = DB::table('permisos')->count();
        return $users; 
    }

    public function RolPermisos_select3(){
        $Resultado = Rol_Permiso::select('*')->get(); 
        return $Resultado; 
    }
}