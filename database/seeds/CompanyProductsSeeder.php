<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
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
                'company_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9, 10]),
                'name' => $faker->randomElement(
                    [
                        'cement 101',
                        'cement 102',
                        'cement 103',
                    ]
                ),
                'category' => 'cement',
                'description' => $faker->text($maxNbChars = 100, $indexSize = 2),
                'price' => $faker->numberBetween($min = 100, $max = 1000) ,
                'image_url' => 'https://www.stockportfencing.co.uk/wp-content/uploads/2016/11/s202.jpg',
                "created_at" => Carbon::now()->today(),
                "updated_at" => Carbon::now()->today()
            ]);
        }

        foreach(range(1, 25) as $index) {
            DB::table('company_products')->insert([
                'company_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9, 10]),
                'name' => $faker->randomElement(
                    [
                        'paint 101',
                        'paint 102',
                        'paint 103',
                    ]
                ),
                'category' => 'paint',
                'description' => $faker->text($maxNbChars = 100, $indexSize = 2),
                'price' => $faker->numberBetween($min = 100, $max = 1000) ,
                'image_url' => 'http://www.himkeehomepaint.com/upload/images/Image/ici%20Hydro_Fresh.jpg',
                "created_at" => Carbon::now()->today(),
                "updated_at" => Carbon::now()->today()
            ]);
        }

        foreach(range(1, 20) as $index) {
            DB::table('company_products')->insert([
                'company_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9, 10]),
                'name' => $faker->randomElement(
                    [
                        'paint 101',
                        'paint 102',
                        'paint 103',
                    ]
                ),
                'category' => 'paint',
                'description' => $faker->text($maxNbChars = 100, $indexSize = 2),
                'price' => $faker->numberBetween($min = 100, $max = 1000) ,
                'image_url' => 'https://italcotto.co.za/wp-content/uploads/2016/10/Italcotto_Tiles_Ideal_Concrete_Dark_Grey_Matt_Tiles_90x90_4_tiles.jpg',
                "created_at" => Carbon::now()->today(),
                "updated_at" => Carbon::now()->today()
            ]);
        }
    }
}
