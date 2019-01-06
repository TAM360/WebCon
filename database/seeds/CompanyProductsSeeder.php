<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompanyProductsSeeder extends Seeder
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
            DB::table('company_products')->insert([
                'company_id' => $faker->randomDigit,
                'name' => $faker->randomElement(
                    [
                        'cement 101',
                        'paint 101',
                        'polymer 101',
                        'tiles 101'
                    ]
                ),
                'category' => $faker->randomElement(
                    [
                        'polymer',
                        'cement',
                        'titles',
                        'paint'
                    ]
                ),
                'description' => $faker->text($maxNbChars = 100, $indexSize = 2),
                'price' => $faker->numberBetween($min = 100, $max = 1000) ,
                'image_url' => $faker->randomElement(
                    [
                        'https://www.stockportfencing.co.uk/wp-content/uploads/2016/11/s202.jpg',
                        'https://italcotto.co.za/wp-content/uploads/2016/10/Italcotto_Tiles_Ideal_Concrete_Dark_Grey_Matt_Tiles_90x90_4_tiles.jpg',
                        'http://www.himkeehomepaint.com/upload/images/Image/ici%20Hydro_Fresh.jpg'
                    ]
                ),
            ]);
        }
    }
}
