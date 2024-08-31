<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('dni', 45);

            $table->unsignedBigInteger('id_reg');
            $table->unsignedBigInteger('id_com');

            // Definir la clave primaria compuesta
            $table->primary(['dni']);

            $table->string('email' , 120,);
            $table->string('name',45);
            $table->string('last_name',45);
            $table->string('address',245);
            $table->dateTime('date_reg');
            $table->enum('status',['A','I' ,'trash'  ])->default('A');
             $table->timestamps();


              // Definir claves foráneas
            $table->foreign('id_reg')->references('id_reg')->on('regions')->onDelete('cascade');
            $table->foreign('id_com')->references('id_com')->on('communes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
