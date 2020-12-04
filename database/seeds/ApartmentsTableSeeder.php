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

    $randomAddresses = [
      'Via delle Terme di Traiano, 4A, 00184 Roma RM',
      'Via Gerolamo Morone, 4, 20121 Milano MI',
      '122 Rue de Grenelle, 75007 Paris, Francia',
      '23 Gosfield St, Fitzrovia, London W1W 6PJ, Regno Unito',
      'Carrer de Sant Cugat del Vallès, 54, 58, 08024 Barcelona, Spagna',
      'Calle de Velázquez, 83, 28006 Madrid, Spagna',
      'R. Felicidade Brown 59-3, Porto, Portogallo',
      'Oberwallstraße 6, 10117 Berlin, Germania',
      'Via Ughetti, 39, 95124 Catania CT',
      'Via Pietro Piffetti, 10143 Torino TO',
      'Campo de la Lana, 620, 30135 Venezia VE',
      'Via Lauro de Bosis, 16, 16145 Genova GE',
      'Mostgasse 5, 1040 Wien, Austria',
      'Via di S. Pier Maggiore, 2, 50122 Firenze FI',
      '21 Avenue de la Costa, 98000 Monaco',
      'Via Antonio Gambacorti Passerini, 13, 20900 Monza MB',
      'Via Stanislao Esposito, 30, 00054 Fiumicino RM',
      'Piazza Mercato, 232, 80133 Napoli NA',
      'Via delle Donzelle, 6, 40126 Bologna BO',
      'Via Giuseppe Lunati, 8, 00149 Roma RM'
    ];

    foreach ($randomAddresses as $randomAddress) {

      $randomUser = User::inRandomOrder()->first()->id;

      $newApartment = new Apartment;
      $newApartment->user_id = $randomUser;
      $newApartment->cover_image = $faker->imageUrl(350, 350);
      $newApartment->bathrooms_number = rand(1, 3);
      $newApartment->beds_number = rand(2, 8);
      $newApartment->square_meters = rand(40, 200);
      $newApartment->description = $faker->paragraph(1, true);
      $newApartment->rooms_number = rand(2, 8);
      $newApartment->title = $faker->text(100);
      $newApartment->visibility = $faker->boolean(100);
      $newApartment->address = $randomAddress;

      $geocode = file_get_contents('https://api.tomtom.com/search/2/geocode/' . $randomAddress . '.json?limit=1&key=sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo');
      $output = json_decode($geocode);
      $latitude = $output->results[0]->position->lat;
      $longitude = $output->results[0]->position->lon;

      $newApartment->latitude = $latitude;
      $newApartment->longitude = $longitude;

      $newApartment->save();

      $allServices = Service::all()->count();
      $services = Service::inRandomOrder()->limit(rand(1, $allServices))->get();
      $newApartment->services()->attach($services);
    }



  }
}
