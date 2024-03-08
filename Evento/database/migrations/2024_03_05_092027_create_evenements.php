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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_categorie')->constrained('categories');
            $table->string('titre');
            $table->text('description');
            $table->date('date');
            $table->string('lieu');
            $table->integer('place');
            $table->enum('validation', ['manuelle', 'automatique'])->default('automatique');
            $table->enum('status', ['en attente', 'confirmer', 'rejeter'])->default('en attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
