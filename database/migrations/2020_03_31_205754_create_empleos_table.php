<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleos', function (Blueprint $table) {
            
            
            $table->id();
            $table->timestamps();
            $table->string('cargo');
            $table->string('descripcion');
            $table->string('empleador');
            $table->date('expiracion');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')
            ->references('id')->on('cities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleos');
    }
}
