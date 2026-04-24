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
        Schema::create('demandeconges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');

            $table->string('matriculemanager');
            $table->string('duree');
            $table->string('titre');
            $table->date('datedebut');
            $table->date('datefin');
            $table->string('adresse');
            $table->string('typeConge');
            $table->string('status');
            $table->string('remarque');
            
            $table->timestamps();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            
        });
   

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandeconges');
    }
};
