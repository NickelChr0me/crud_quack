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
        Schema::create('quacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('content');
            $table->timestamps();
        });
        /*
        Le problème dans votre migration est que vous avez spécifié la colonne "created_at" deux fois.
        Une fois explicitement avec $table->dateTime('created_at'), et une fois implicitement avec $table->timestamps().
        La méthode timestamps() ajoute automatiquement les colonnes "created_at" et "updated_at" à votre table, donc vous n'avez pas besoin de les spécifier manuellement.
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quacks');
    }
};
