<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     */
    public function run(): void{
        // Generasi 10 data dummy ke tabel links
        Link::factory(10)->create();
    }
}