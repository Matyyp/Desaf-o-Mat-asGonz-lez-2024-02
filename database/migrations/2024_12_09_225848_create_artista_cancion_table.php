<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistaCancionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista_cancion', function (Blueprint $table) {
            $table->foreignId('cancion_id')->constrained('canciones')->onDelete('cascade'); 
            $table->foreignId('artista_id')->constrained('artistas')->onDelete('cascade'); 
            $table->primary(['cancion_id', 'artista_id']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artista_cancion');
    }
}
