<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    
    protected $table = 'permisos';
    protected $primaryKey = 'Id_Permiso';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable=['Nombre', 'Descripcion'];


    public function roles()
    {
        return $this->belongsToMany(rol::class, 'rol_permiso', 'Permiso_id', 'Rol_id', 'Id_Permiso', 'Id_Rol');

         // $ relacionado, 
        // $ tabla = nulo, 
        // $ ForeignPivotKey = nulo, 
        // $ relatedPivotKey = nulo, 
        // $ parentKey = nulo, 
        // $ relatedKey = nulo, 
        // $ relación = nulo
    }

    // public function Roles()
    // {
    //     return $this->hasMany(Rol::class, 'Permisos', 'Id_permisos');
    // }
}
