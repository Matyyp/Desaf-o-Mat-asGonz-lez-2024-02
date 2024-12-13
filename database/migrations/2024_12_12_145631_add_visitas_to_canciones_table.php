<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisitasToCancionesTable extends Migration
{
    public function up()
    {
        Schema::table('canciones', function (Blueprint $table) {
            $table->unsignedBigInteger('visitas')->default(0);
        });
    }

    public function down()
    {
        Schema::table('canciones', function (Blueprint $table) {
            $table->dropColumn('visitas');
        });
    }
}
