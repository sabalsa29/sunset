<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('usuarios')) {

            Schema::create('usuarios', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('centro')->default(0);
                $table->string('nombre',255)->nullable();
                $table->string('email')->unique();
                $table->integer('departamento')->default(0);//0=>ningun departamento
                $table->string('password')->nullable();
                $table->integer('verificado')->default(0);
                $table->integer('estatus')->default(1);
                $table->timestamps();
            });
        }

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
