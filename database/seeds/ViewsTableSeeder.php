<?php

use Illuminate\Database\Seeder;
use App\View;
use App\Apartment;
use Faker\Generator as Faker;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Run this seeder to add some views in the database's views table.
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();

        foreach ($apartments as $apartment) {

          $numberViews = rand(0, 50);

          for ($i=0; $i < $numberViews; $i++) {

            $newView = new View();

            $newView->apartment_id = $apartment->id;
            $newView->date = $faker->dateTimeThisDecade('now', null);

            $newView->save();

          }
        }
    }
}
