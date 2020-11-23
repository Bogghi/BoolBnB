<?php

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
        $this->call([
            ServicesTableSeeder::class,
            UserSeeder::class,
            ApartmentsTableSeeder::class,
            ViewsTableSeeder::class,
            MessagesSeeder::class,
            ImagesSeeder::class,
            PaymentPlanSeeder::class,
            SponsorizationSeeder::class
        ]);        
    }
}
