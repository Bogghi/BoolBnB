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

        for($i = 0; $i < 10; $i++){
            $aprId = Apartment::inRandomOrder()->first()->id;
            $prcPlanId = PaymentPlan::inRandomOrder()->first();
            $prcHour = $prcPlanId->hours_duration;

            $newSpon = new Sponsorization;
            $newSpon->start_date = date("Y-m-d H:m:s");
            $newSpon->end_date = date("Y-m-d H:m:s",strtotime("+{$prcHour} hours"));
            $newSpon->apartment_id = $aprId;
            $newSpon->payment_plan_id = $prcPlanId->id;
            $newSpon->save();

        }
    }

}
