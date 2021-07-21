<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateComprasSabalsa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumns('compras', ['total','total_pagado'])) {
            Schema::table('compras', function (Blueprint $table) {
            $table->decimal('total',19,2)->default(0);
            $table->decimal('total_pagado',19,2)->default(0);

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
        if (Schema::hasColumns('compras',['total','total_pagado'])) {
            Schema::table('compras', function (Blueprint $table) {
                $table->dropColumn('total');
                $table->dropColumn('total_pagado');

            });
        }
    }
}
