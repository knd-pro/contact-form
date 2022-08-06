<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'user_name' => 'admin',
            'last_name' => 'Admin',
            'email' => 'mail@test.com',
            'password' => bcrypt('12345678'),
            'is_admin' => TRUE,
        ]);

        \App\Models\User::create([
            'user_name' => 'marcjne',
            'last_name' => 'Marc',
            'first_name' => 'Jean',
            'email' => 'jme@test.com',
            'phone' => '+0633221145',
            'address' => '9, rue du marais',
            'zip_code' => '75000',
            'town' => 'Paris',
            'comment' => 'Voici un commmentaire de test',
            'password' => bcrypt('Axe4885-'),
        ]);

        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
