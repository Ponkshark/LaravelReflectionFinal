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
        \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Testman1',
            'lastname' => 'Smith',
            'company' => 'Smith&Co',
            'email' => 'Testemail@email.com',
            'phone' => '13333',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Testman2',
            'lastname' => 'Jones',
            'company' => 'Jones and Co',
            'email' => 'Jones@jones.com',
            'phone' => '12222',
        ]);

        \App\Models\Companies::factory()->create([
            'name' => 'LizardInc',
            'email' => 'lizard@email.com',
            'logo' => 'public/QNAnGHyjk68K7iLR1G5ZtbDBHQWL5fgbP72GnVH2.png',
            'website' => 'Lizards.com',
        ]);
    }
}
