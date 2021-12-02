<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_permisos', function (Blueprint $table) {
            $table->id('Id_Rol_Permiso');
            $table->unsignedBigInteger('Rol_id');
            $table->foreign('Rol_id')->references('Id_Rol')->on('rols');

            $table->unsignedBigInteger('Permiso_id');
            $table->foreign('Permiso_id')->references('Id_Permiso')->on('permisos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_permisos');
    }
}
