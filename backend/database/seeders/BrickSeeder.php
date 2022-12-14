<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrickSeeder extends Seeder
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
                'slug' => 'brick-section',
                'name' => 'Brick section',
                'lang' => $lang,
            ])->create();


            \App\Models\Section::factory()->state([
                'parent_id' => $baseSection->id,
                'name' => 'company 1',
                'position' => 1,
                'title' => '2022',
                'lang' => $lang,
            ])->create();

            \App\Models\Section::factory()->state([
                'parent_id' => $baseSection->id,
                'name' => 'company 2',
                'position' => 2,
                'title' => '2000',
                'lang' => $lang,
            ])->create();

            \App\Models\Section::factory()->state([
                'parent_id' => $baseSection->id,
                'name' => 'company 3',
                'position' => 3,
                'title' => '1980',
                'lang' => $lang,
            ])->create();
        }

    }
}
