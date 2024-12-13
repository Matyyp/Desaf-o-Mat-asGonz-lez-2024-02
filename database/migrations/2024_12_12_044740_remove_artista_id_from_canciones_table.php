<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveArtistaIdFromCancionesTable extends Migration
{
    public function up()
    {
        Schema::table('canciones', function (Blueprint $table) {
            // Eliminar la clave foránea primero
            $table->dropForeign(['artista_id']);
        
            // Luego eliminar la columna
            $table->dropColumn('artista_id');
        });
    }
    
    public function down()
    {
        Schema::table('canciones', function (Blueprint $table) {
            // Agregar la columna nuevamente
            $table->foreignId('artista_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    

}
