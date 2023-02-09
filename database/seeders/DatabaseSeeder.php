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
            'firstname' => 'Michael',
            'lastname' => 'Smith',
            'company' => 'Smith&Co',
            'email' => 'Testemail@email.com',
            'phone' => '13333',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Josh',
            'lastname' => 'Jones',
            'company' => 'Jones and Co',
            'email' => 'Jones@jones.com',
            'phone' => '12222',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'George',
            'lastname' => 'Smit',
            'company' => 'Chairstore',
            'email' => 'Chairs@website.com',
            'phone' => '2003030',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Jacob',
            'lastname' => 'Arbor',
            'company' => 'Trees and more',
            'email' => 'Forest@gmail.com',
            'phone' => '3434556',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Baba',
            'lastname' => 'Yaga',
            'company' => 'KFC',
            'email' => 'KFCOfficial@hotmail.com',
            'phone' => '02034484',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Isaac',
            'lastname' => 'Marylyn',
            'company' => 'Changle',
            'email' => 'Isaacs@email.com',
            'phone' => '099091',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Maggie',
            'lastname' => 'Mags',
            'company' => 'Clothesnmore',
            'email' => 'Clothy@mags.com',
            'phone' => '12222',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Cain',
            'lastname' => 'Judason',
            'company' => 'Abels',
            'email' => 'Abels@gmail.com',
            'phone' => '106610',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Eden',
            'lastname' => 'Homage',
            'company' => 'Edens garden',
            'email' => 'EGard@gmail.com',
            'phone' => '143556',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Beth',
            'lastname' => 'Quan',
            'company' => 'Wunderburger',
            'email' => 'Burgs@hotmail.com',
            'phone' => '124444',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Arty',
            'lastname' => 'Smith',
            'company' => 'Showtown',
            'email' => 'Shows@gmail.com',
            'phone' => '727711',
        ]);

        \App\Models\Employees::factory()->create([
            'firstname' => 'Gorgon',
            'lastname' => 'Zola',
            'company' => 'Marvel Comics',
            'email' => 'DCUniverse@hotmail.com',
            'phone' => '887361',
        ]);

        \App\Models\Companies::factory()->create([
            'name' => 'LizardInc',
            'email' => 'lizard@email.com',
            'logo' => 'public/QNAnGHyjk68K7iLR1G5ZtbDBHQWL5fgbP72GnVH2.png',
            'website' => 'Lizards.com',
        ]);

        \App\Models\Companies::factory()->create([
            'name' => 'Asterlink',
            'email' => 'asteroids@gmail.com',
            'logo' => 'public/logo.png',
            'website' => 'Asterlink.com',
        ]);

        \App\Models\Companies::factory()->create([
            'name' => 'QuoteBuilder',
            'email' => 'quotes@email.com',
            'logo' => 'public/logo-no-background.jpg',
            'website' => 'Lizards.com',
        ]);

        \App\Models\Companies::factory()->create([
            'name' => 'Shark Industries',
            'email' => 'sharkInd@hotmail.com',
            'logo' => 'public/sharklogo.png',
            'website' => 'SharkIndustries.com',
        ]);

        \App\Models\Companies::factory()->create([
            'name' => 'Google',
            'email' => 'google@gmail.com',
            'logo' => 'public/google.png',
            'website' => 'Lizards.com',
        ]);

        \App\Models\Companies::factory()->create([
            'name' => 'Wolfs Cookies',
            'email' => 'wolfcookies@email.com',
            'logo' => 'public/biscuitleobybearwulf.jpg',
            'website' => 'Lizards.com',
        ]);

        \App\Models\Companies::factory()->create([
            'name' => 'Apple',
            'email' => 'apple@microsoft.com',
            'logo' => 'public/applelogo.png',
            'website' => 'Apple.com',
        ]);
    }
}
