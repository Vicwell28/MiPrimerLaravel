<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_Permiso extends Model
{
    use HasFactory;

    
    protected $table = 'rol_permisos';
    protected $primaryKey = 'Id_Rol_Permiso';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable=['Rol_id', 'Permiso_id'];


    // public function Permiso()
    // {
    //     return $this->belongsTo(Permiso::class, 'Permisos', 'Id_permisos');
    // }

    // public function user()
    // {
    //     return $this->hasOne(User::class, 'Rol', 'Id_Rol');
    // }
}
