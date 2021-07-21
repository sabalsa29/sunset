<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePagosSabalsa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id')->default(0);
            $table->bigInteger('programacion_id')->default(0);
            $table->bigInteger('programacion_detalle_id')->default(0);
            $table->string("descripcion")->nullable();
            $table->decimal('cantidad',19,2)->default(0);
            $table->string("url")->nullable();
            $table->string("archivo")->nullable();
            $table->date('fecha')->nullable();
            $table->integer('estatus')->default(1);
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
        Schema::dropIfExists('pagos');
    }
}
