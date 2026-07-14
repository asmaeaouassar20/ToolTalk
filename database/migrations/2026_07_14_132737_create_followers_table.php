<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // ce code crée une table de followers qui permet de savoir qui suit qui
    public function up(): void
    {
        // user_id => L'utilisateur qui est suivi
        // follower_id => L'utilisateur qui suit
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') // cela fait référence à : users.id
                    ->constrained()  // Laravel comprend automatiquement que cela pointe vers la table users.
                    ->onDelete('cascade');  // si cet utilisateur est supprimé, toutes les lignes de followers qui le concernent seront supprimées automatiquement.
            $table->foreignId('follower_id')                    
                    ->constrained('users') // On précise "users" car Laravel penserait sinon à une table "followers".
                    ->onDelete('cascade'); // Si ce follower est supprimé, les relations de suivi sont supprimées.
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
