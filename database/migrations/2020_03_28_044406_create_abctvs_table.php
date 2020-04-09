<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbctvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abctvs', function (Blueprint $table) {
            
           
            $table->id();
            $table->timestamps();
            $table->string('url');
            $table->string('thumbnail');
            $table->string('titulo');
            $table->integer('visto')->default(0);
            $table->text('descripcion');
            $table->text('autor');
            $table->string('tipo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abctvs');
    }
}
