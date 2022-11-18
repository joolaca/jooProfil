<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseSection = \App\Models\Section::factory()->state([
            'slug' => 'hero-section',
            'name' => 'Hero section',
        ])->create();


        \App\Models\Section::factory()->state([
            'parent_id' => $baseSection->id,
            'position' => 1,
            'name' => 'php',
            'image' => 'devicon-php-plain',
        ])->create();

        \App\Models\Section::factory()->state([
            'parent_id' => $baseSection->id,
            'position' => 2,
            'name' => 'laravel',
            'image' => 'devicon-laravel-plain',
        ])->create();

        \App\Models\Section::factory()->state([
            'parent_id' => $baseSection->id,
            'position' => 3,
            'name' => 'javascript',
            'image' => 'devicon-javascript-plain',
        ])->create();
    }
}
