<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $images = Storage::allFiles('images');

        foreach ($images as $image){

            if(strpos($image, ".DS_Store")) continue; //skip DS_Store file (for Mac)

            Image::factory()->create([
                'file' => $image,
                'dimension' => Image::getDimension($image),
            ]);
        }

    }

}
