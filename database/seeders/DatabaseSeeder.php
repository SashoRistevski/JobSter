<?php

namespace Database\Seeders;
use App\Models\Listing;

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
         \App\Models\User::factory(5)->create();
        Listing::factory(6)->create();
//
//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);





//            Listing::create([
//                'title'=> 'Laravel developer',
//                'tags'=> 'laravel, javascript, node js, vue js',
//                'company' => 'my company llc',
//                'location' => 'Skopje',
//                'email' => 'test@email.com',
//                'website' => 'https://somesite.com',
//                'description' => 'Lorem ipsum dolor sit amet,
//                consectetur adipiscing elit,
//                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
//                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
//                aliquip ex ea commodo consequat.'
//            ]);
//
//            Listing::create([
//                'title' => 'Full-Stack Engineer',
//                'tags' => 'laravel, backend ,api',
//                'company' => 'Stark Industries',
//                'location' => 'New York, NY',
//                'email' => 'email2@email.com',
//                'website' => 'https://www.starkindustries.com',
//                'description' => 'Lorem ipsum dolor sit amet,
//                consectetur adipiscing elit,
//                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
//                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
//                aliquip ex ea commodo consequat.'
//            ]);
    }
}
