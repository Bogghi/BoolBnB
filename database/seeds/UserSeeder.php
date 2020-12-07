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
        $users = [
          [
            "name" => "Lorenzo",
            "lastname" => "D'Amico",
            "date_of_birth" => "1994-02-17",
            "email" => "loredam@hotmail.it"
          ],
          [
            "name" => "Danilo",
            "lastname" => "Patané",
            "date_of_birth" => "1998-01-25",
            "email" => "d.patane@gmail.com"
          ],
          [
            "name" => "Matteo Simone",
            "lastname" => "Borghi",
            "date_of_birth" => "1998-12-21",
            "email" => "matteosimoneborghi@gmail.com"
          ],
          [
            "name" => "Gabriele",
            "lastname" => "Musumeci",
            "date_of_birth" => "1983-06-23",
            "email" => "gabrielemusumeci@gmail.com"
          ],
          [
            "name" => "Andrea",
            "lastname" => "Contestabile",
            "date_of_birth" => "1989-05-19",
            "email" => "andreacontestabile@gmail.com"
          ]
        ];

        foreach($users as $user) {

          $newUser = new User;
          $newUser->name = $user["name"];
          $newUser->lastname = $user["lastname"];
          $newUser->date_of_birth = $user["date_of_birth"];
          $newUser->password = Hash::make('admin007');
          $newUser->email = $user["email"];
          $newUser->save();
        }
    }
}
