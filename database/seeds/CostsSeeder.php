<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;


class CostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create(); 
           foreach(range(1, 20) as $index) {

           	DB::table('costs')->insert([

           		'products' => $faker->randomElement(
                    [
                        'Cement',
                        'Steel',
                        'Tile',
                        'Brick',
                    ]
                ),

                'class' => $faker->randomElement(
                    [
                        'A',
                        'B',
                        'C',
                        
                    ]
                ),

                'price' => $faker->numberBetween($min = 100, $max = 500) ,
                  "created_at" => Carbon::now()->today(),
                "updated_at" => Carbon::now()->today()


           		]);

           }

    }
}
