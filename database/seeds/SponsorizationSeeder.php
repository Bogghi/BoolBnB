<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Sponsorization;
use App\PaymentPlan;
use App\Apartment;

class SponsorizationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   * @fake faker object to generate values
   */
  public function run(Faker $fake)
  {
    //function to fill the promotion with fake record
    $apartments = Apartment::all();

    foreach ($apartments as $apartment) {

      if (rand(0, 2) == 0) {

        $paymentPlan = PaymentPlan::inRandomOrder()->first();
        $prcHour = $paymentPlan->hours_duration;

        $newSpon = new Sponsorization;
        $newSpon->start_date = date("Y-m-d H:i:s");
        $newSpon->end_date = date("Y-m-d H:i:s", strtotime("+{$prcHour} hours"));
        $newSpon->apartment_id = $apartment->id;
        $newSpon->payment_plan_id = $paymentPlan->id;

        $newSpon->save();
      }
    }
  }
}
