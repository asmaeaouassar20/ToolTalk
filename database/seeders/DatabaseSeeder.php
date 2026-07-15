<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


// Le seeder principal exécuté avec la commande : php artisan db:seed
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       User::factory()->create([
            'name' => 'Test User',
            'username' => 'testuser' ,
            'email' => 'test@gmail.com',                        
       ]);

        $categories = [
            'Conversational AI Assistants',
            'Content Creation',
            'Software Development & Coding',
            'Data Analysis & Decision Support',
            'Productivity & Automation',
            'Research & Knowledge Management'
        ]; 

        // parcourir le tableau des catégories à insérer dans la BD
        foreach($categories as $category){
            Category::create(['name' => $category]);
        }


        // créer automatiquement 5 articles
        Post::factory(5)->create();
    }
}
