<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rols';
    protected $primaryKey = 'Id_Rol';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable=['Nombre', 'Descripcion'];

    public function permiso()
    {
        return $this->belongsToMany(permiso::class, 'rol_permisos', 'Rol_id', 'Permiso_id', 'Id_Rol', 'Id_Permiso');


        // $ relacionado, 
        // $ tabla = nulo, 
        // $ ForeignPivotKey = nulo, 
        // $ relatedPivotKey = nulo, 
        // $ parentKey = nulo, 
        // $ relatedKey = nulo, 
        // $ relación = nulo
    }

    // public function Permiso()
    // {
    //     return $this->belongsTo(Permiso::class, 'Permisos', 'Id_permisos');
    // }

    public function user()
    {
        return $this->hasOne(User::class, 'Rol', 'Id_Rol');
    }
}
