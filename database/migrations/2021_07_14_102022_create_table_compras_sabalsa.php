<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComprasSabalsa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->integer('usuario_id')->default(0);
            $table->biginteger('folio')->default(0);
            $table->text('comentario')->nullable();
            $table->date('fecha_del')->nullable();
            $table->date('fecha_hasta')->nullable();
            $table->date('fecha_impresion')->nullable();
            $table->biginteger('usuario_id_cancelada')->default(0);
            $table->text('comentario_cancelada')->nullable();
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
        Schema::dropIfExists('compras');
    }
}
