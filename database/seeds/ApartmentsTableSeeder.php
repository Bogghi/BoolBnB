<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;
use App\User;
use App\Service;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $randomUser = User::inRandomOrder()->first()->id;

            $newApartment = new Apartment;
            $newApartment->user_id = $randomUser;
            $newApartment->longitude = $faker->longitude;
            $newApartment->latitude = $faker->latitude;
            $newApartment->cover_image = $faker->imageUrl(350, 350, 'houses');
            $newApartment->bathrooms_number = rand(1, 3);
            $newApartment->beds_number = rand(2, 8);
            $newApartment->square_meters = rand(40, 200);
            $newApartment->address = $faker->city;
            $newApartment->description = $faker->paragraph(1, true);
            $newApartment->rooms_number = rand(2, 8);
            $newApartment->title = $faker->text(100);
            $newApartment->visibility = $faker->boolean();

            $newApartment->save();

            $allServices = Service::all()->count();
            $services = Service::inRandomOrder()->limit(rand(1,$allServices))->get();
            $newApartment->services()->attach($services);
        }
    }
}
