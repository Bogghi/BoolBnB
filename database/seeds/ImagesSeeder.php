<?php

use Illuminate\Database\Seeder;
use App\Image;
use App\Apartment;
use Faker\Generator as Faker;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * * Random Image for cover single apartment
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $randomImages = [
          "https://www.dilorenzoarredi.it/wp-content/uploads/2019/10/COD.00559_CAMERA-ELLIOT-SPAT.BRONZO-LLOTO-MONOLITH-15-GR.-UP.jpg",
          "https://www.diotti.com/media/catalog/product/cache/2/image/b38cf51ec77170b109c5e310157197eb/2/9/29521-camera_da_letto.jpg",
          "https://mk0errebidesignhoa1f.kinstacdn.com/wp-content/uploads/2018/10/camera-da-letto-matrimoniale-moretti-compact-1.jpg",
          "https://www.midarte.com/wp-content/uploads/2018/01/camera_double_08.jpg",
          "https://www.ideastile.it/image/cache/catalog/data/VANITY974_1-800x800.jpg",
          "https://www.lago.it/wp-content/uploads/2019/08/Bagno-Depth-5.jpg",
          "https://www.tvoggisalerno.it/wp-content/uploads/2019/01/effe-emme-home-bagno.png",
          "https://static.designmag.it/r/845X0/www.designmag.it/img/come-arredare-un-bagno-moderno.jpg",
          "https://www.outletarredamento.it/img/divani/divano-angolare-leonard-doimo-salotti-prezzi-outlet_N1_608732.jpg",
          "https://www.outletarredamento.it/img/divani/divano-monet-doimo-salotti-con-sconto-50_N1_522757.jpg",
          "https://www.rosinidivani.it/divani/salotti-in-pelle_1.jpg",
          "https://media.gettyimages.com/photos/garage-picture-id528098460?s=612x612",
          "https://citynews-ravennatoday.stgy.ovh/~media/original-hi/34849104757845/garage-2.jpg",
          "https://st.hzcdn.com/simgs/pictures/terrazze/terrazzo-chiara-costa-claudia-ponti-architetti-img~4e31d9f609d28dd7_4-5622-1-aacdde4.jpg",
          "https://community.leroymerlin.it/t5/image/serverpage/image-id/31984iDD51C69AEC89DAF8/image-size/large?v=1.0&px=999",
          "https://evo-casa.it/preview/imm_5911-2000--20200418104515-035_-_Casa_indipendente_con_giardino_e_riposti.jpg",
          "https://images-1.casa.it/360x265/listing/7357aea13904cf358333017dd7b668f4",
          "https://www.diotti.com/media/catalog/product/cache/2/image/b38cf51ec77170b109c5e310157197eb/3/0/3066-dining_room_3.jpg",
          "https://images.eprice.it/nobrand/0/hres/799/207204799/59484629-1AD6-42AF-966C-6B1643BB12F0.jpg",
          "https://www.ikea.com/images/ampia-e-luminosa-zona-pranzo-con-soggiorno-annesso-il-tavolo-1b5e1fd08f33c038fe27235b8239d4ab.jpg"
        ];

        $apartments = Apartment::all();

        foreach ($apartments as $apartment) {

          $numberImages = rand(0, 5);

          if ($numberImages != 0) {

            $indexImages = array_rand($randomImages, $numberImages);

            if (is_array($indexImages)) {

              foreach ($indexImages as $indexImage) {

                $newImage = new Image();

                $newImage->apartment_id = $apartment->id;
                $newImage->image_path = $randomImages[$indexImage];

                $newImage->save();
              }

            } else {

              $newImage = new Image();

              $newImage->apartment_id = $apartment->id;
              $newImage->image_path = $randomImages[$indexImages];

              $newImage->save();

            }
          }

        }
    }
}
