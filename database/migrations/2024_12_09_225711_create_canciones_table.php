<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->time('duracion');
            $table->year('año_lanzamiento')->nullable(); 
            $table->string('caratula')->nullable(); 
            $table->foreignId('album_id')->nullable()->constrained('albums')->onDelete('set null');
            $table->foreignId('genero_id')->constrained('generos')->onDelete('cascade'); 
            $table->foreignId('artista_id')->constrained('artistas')->onDelete('cascade'); 
            $table->string('archivo_mp3')->nullable(); 
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
        Schema::dropIfExists('canciones');
    }
}
