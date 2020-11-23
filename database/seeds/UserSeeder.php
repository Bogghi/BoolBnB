<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * // Seeder for generating random Users
     * 
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <5 ; $i++) {

          $newUser = new User;
          $newUser->name = $faker->firstName();
          $newUser->lastname = $faker->lastName;
          $newUser->date_of_birth = $faker->date('Y-m-d');
          $newUser->password = Hash::make('admin007');
          $newUser->email = $faker->email;
          $newUser->save();
        }
    }
}
