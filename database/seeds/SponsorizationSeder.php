<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Sponsorization;
use App\Apartment;


class SponsorizationSeder extends Seeder
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
        $newSpon = new Sponsorization;

        for($i = 0; $i < 10; $i++){
            $newSpon->start_date = $fake->unixTime($max = 'now');
            $newSpon->end_date = $newSpon->start_date + $prices[0][1];

        }
    }

    /**
     *
     * @return price id from db
     */
    public function pricePlan()
    {
        //function to reutrn primary key from database
    
        $priceList->a = array(1,12,10);
        $priceList->b = array(2,23,20);
        $priceList->c = array(3,32,30);

        
        return $aprIds;
    }


    /** 
    * @return aprtments list of apparment for apartments table
    */
    public function apartmentsId(){
        return array(1,2,3);
    }
}
