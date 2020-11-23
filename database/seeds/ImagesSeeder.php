<?php

use Illuminate\Database\Seeder;
use App\Image;
use App\Apartment;
use Faker\Generator as Faker;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * * Random Image for cover single apartment
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++){
            
            $newImage = new Image;

            $newImage->apartment_id = Apartment::inRandomOrder()->first()->id;
            $newImage->image_path = $faker->imageUrl(200, 300);

            $newImage->save();
        }
        
    }
}
