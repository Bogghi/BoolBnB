<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\PaymentPlan;

class PaymentPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * // seeder PaymentPlan
     * @return void
     */
    public function run(Faker $faker)
    {
        
            $durations = [24, 72, 144];

            foreach ($durations as $duration) {
                $newPayment = new PaymentPlan;

                $newPayment->hours_duration = $duration;
                
                if ($duration == 24) {

                    $newPayment->price = 2.99;

                } elseif ($duration == 72) {
                    $newPayment->price = 5.99;
                } else {
                    $newPayment->price = 9.99;
                    
                }
                $newPayment->save();
            }

        
    }
}
