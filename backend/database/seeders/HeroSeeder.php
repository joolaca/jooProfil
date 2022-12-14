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
        $langs = ['hu', 'en'];
        foreach ($langs as $lang) {
            $baseSection = \App\Models\Section::factory()->state([
                'slug' => 'hero-section',
                'name' => 'Hero section',
                'lang' => $lang,
            ])->create();


            \App\Models\Section::factory()->state([
                'parent_id' => $baseSection->id,
                'position' => 1,
                'name' => 'php',
                'image' => 'devicon-php-plain',
                'lang' => $lang,
            ])->create();

            \App\Models\Section::factory()->state([
                'parent_id' => $baseSection->id,
                'position' => 2,
                'name' => 'laravel',
                'image' => 'devicon-laravel-plain',
                'lang' => $lang,
            ])->create();

            \App\Models\Section::factory()->state([
                'parent_id' => $baseSection->id,
                'position' => 3,
                'name' => 'javascript',
                'image' => 'devicon-javascript-plain',
                'lang' => $lang,
            ])->create();
        }

    }
}
