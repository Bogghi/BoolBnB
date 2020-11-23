<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Run this seeder to add some services in the database's services table.
     * @return void
     */
    public function run()
    {
        $services = [
          'WiFi',
          'Posto auto',
          'Piscina',
          'Portineria',
          'Sauna',
          'Vista mare'
        ];

        foreach ($services as $service) {

          $newService = new Service();

          $newService->name = $service;

          $newService->save();

        }
    }
}
