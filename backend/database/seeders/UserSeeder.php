<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->state([
            'name' => 'admin',
            'email' => 'admin@joofele.com',
            'password' => bcrypt('admin'),
        ])->create();
    }
}
