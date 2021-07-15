<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComprasDetallesSabalsa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_detalles', function (Blueprint $table) {
            $table->id();
            $table->biginteger('empresa_id')->default(0);
            $table->biginteger('compra_id')->default(0);
            $table->biginteger('proveedor_id')->default(0);
            $table->biginteger('producto_id')->default(0);
            $table->biginteger('usuario_autoriza_id')->default(0);
            $table->string('no_factura')->nullable();
            $table->date('fecha')->nullable();
            $table->string('pagado')->nullable();
            $table->decimal('total',19,2)->default(0);
            $table->string('codigo')->nullable();
            $table->text('viaje')->nullable();
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
        Schema::dropIfExists('compras_detalles');
    }
}
