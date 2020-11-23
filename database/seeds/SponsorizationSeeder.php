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
        $prices = $this->pricePlan();
        $aprIds = $this->apartmentsId();

        for($i = 0; $i < 10; $i++){
            $newSpon = new Sponsorization;
            $newSpon->start_date = date("Y-m-d H:m:s");
            $newSpon->end_date = date("Y-m-d H:m:s",strtotime("+5 hours"));
            $newSpon->apartment_id = $aprIds[0];
            $newSpon->payment_plan_id = $prices[0][0];
            $newSpon->save();
            shuffle($prices);
            shuffle($aprIds);
        }
    }

    /**
     *
     * @return price id from db
     */
    public function pricePlan()
    {
        //function to reutrn primary key from database
        
        $priceList = [];
        $allPlan = PaymentPlan::all();

        for($i = 0; $i < $allPlan->length(); $i++){
            $rand = rand(0,2);
            $tmpPrice = PaymentPlan::find($rand);
            array_push($priceList,$tmpPrice);
        }
        
        return $priceList;
    }


    /** 
    * @return aprtments list of apparment for apartments table
    */
    public function apartmentsId(){
        $aptList = [];
        
        for($i = 0; $i < 5; $i++){
            $rand = rand(0,3);
            $tmpApt = Apartment::find($rand);
            array_push($aptList,$tmpApt);
        }
    }
}
