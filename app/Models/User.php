<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;



class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    public function rols()
    {
        return $this->belongsTo(Rol::class, 'Rol', 'Id_Rol');
    }

    public function permisos()
    {
        return $this->hasManyThrough(
                Permiso::class,
                Rol::class,
                'Id_Rol', // Foreign key on the tabla relacion...
                'Id_Permiso', // Foreign key on the table paso...
                'id', // Local key on the table local...
                'Id_Rol' // Local key on the table relacion...
            );

        // return $this->hasManyThrough(
        //     Deployment::class,
        //     Environment::class,
        //     'project_id', // Foreign key on the environments table...
        //     'environment_id', // Foreign key on the deployments table...
        //     'id', // Local key on the projects table...
        //     'id' // Local key on the environments table...
        // );

    //     projects
    //     id - integer
    //     name - string

    // environments
    //     id - integer
    //     project_id - integer
    //     name - string

    // deployments
    //     id - integer
    //     environment_id - integer
    //     commit_hash - string

    // El primer argumento que se pasa al hasManyThroughmétodo es el nombre del modelo final al que deseamos acceder, mientras que el segundo argumento es el nombre del modelo intermedio.

    // Aunque la Deploymenttabla del modelo no contiene una project_idcolumna, la hasManyThroughrelación proporciona acceso a las implementaciones de un proyecto a través de $project->deployments. Para recuperar estos modelos, Eloquent inspecciona la project_idcolumna de la Environmenttabla del modelo intermedio . Después de encontrar los ID de entorno relevantes, se utilizan para consultar la Deploymenttabla del modelo.
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /*
            Añadiremos estos dos métodos
        */
        public function getJWTIdentifier()
        {
            return $this->getKey();
        }
        public function getJWTCustomClaims()
        {
            return [];
        }
}
