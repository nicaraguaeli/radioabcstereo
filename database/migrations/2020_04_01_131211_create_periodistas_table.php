<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodistas', function (Blueprint $table) {
            
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('imagen')->nullable();
            $table->enum('tipo',['Periodista','Colaborador','Redacción Digital ABC']);
            $table->enum('estado',['1','0'])->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodistas');
    }
}
