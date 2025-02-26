<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public $categories = [
        ['name' => 'Elettronica', 'icon' => 'fa-laptop'],
        ['name' => 'Abbigliamento', 'icon' => 'fa-tshirt'],
        ['name' => 'Salute e Bellezza', 'icon' => 'fa-heart'],
        ['name' => 'Casa e Giardinaggio', 'icon' => 'fa-home'],
        ['name' => 'Giocattoli', 'icon' => 'fa-gamepad'],
        ['name' => 'Sport', 'icon' => 'fa-dumbbell'],
        ['name' => 'Animali Domestici', 'icon' => 'fa-paw'],
        ['name' => 'Libri e Riviste', 'icon' => 'fa-book'],
        ['name' => 'Accessori', 'icon' => 'fa-gem'],
        ['name' => 'Motori', 'icon' => 'fa-car'],
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category['name'],
                'icon' => $category['icon'],
            ]);
        }
    }
}
