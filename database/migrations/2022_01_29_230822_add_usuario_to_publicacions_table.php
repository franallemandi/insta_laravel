<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsuarioToPublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publicacions', function (Blueprint $table) {
            $table->string('usuario');
            $table  ->foreign('usuario')
                    ->references('nombre_usuario')
                    ->on('usuarios')
                    ->after('foto');//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publicacions', function (Blueprint $table) {
            //
        });
    }
}
