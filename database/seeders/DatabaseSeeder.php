<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        Listing::factory(6)->create();

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript ',
        //     'company' => 'Acme Corp',
        //     'location' => 'Bosten, MA ',
        //     'email' => 'shedrackejikeo@gmail.com',
        //     'website' => 'https://www.Acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet,
        //      consectetur adipisicing elit. Asperiores
        //       voluptatem necessitatibus et ex omnis nam 
        //       possimus molestiae, delectus non dolore!
        //     ' 
        // ]);

        // Listing::create([
        //     'title' => 'Full-Stack Developer',
        //     'tags' => 'laravel, backend , api',
        //     'company' => 'Stark Industries',
        //     'location' => 'New York, NY ',
        //     'email' => 'shedrackejikeo@gmail.com',
        //     'website' => 'https://www.Acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet,
        //      consectetur adipisicing elit. Asperiores
        //       voluptatem necessitatibus et ex omnis nam 
        //       possimus molestiae, delectus non dolore!
        //     ' 
        // ]);
    } 
}

