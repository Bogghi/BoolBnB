<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\Apartment;
use Faker\Generator as Faker;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * * Message from User
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {

            $newMessage = new Message;

            $newMessage->apartment_id = Apartment::inRandomOrder()->first()->id;
            $newMessage->email = $faker->email();
            $newMessage->content = $faker->text(200);
            $newMessage->date = $faker->dateTimeThisYear('now', null);

            $newMessage->save();
        }
    }
}
