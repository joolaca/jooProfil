<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SimpleTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $langs = ['hu', 'en'];
        foreach ($langs as $lang) {
            $baseSection = \App\Models\Section::factory()->state([
                'slug' => 'simple-text-section',
                'name' => 'Simple Text section',
                'lang' => $lang,
            ])->create();

            \App\Models\Section::factory()->state([
                'parent_id' => $baseSection->id,
                'position' => 1,
                'name' => 'Simple Text 1',
                'description' => $faker->text(1000),
                'lang' => $lang,
            ])->create();

            \App\Models\Section::factory()->state([
                'parent_id' => $baseSection->id,
                'position' => 2,
                'name' => 'Simple Text 2',
                'description' => $faker->text(1000),
                'lang' => $lang,
            ])->create();
        }

    }
}
