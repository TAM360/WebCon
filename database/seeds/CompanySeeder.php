<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $index)
        {
            DB::table('companies')->insert([
                "id" => $index,
                "full_name" => $faker->company,
                "email" => $faker->email,
                "password" => Hash::make("123456789"),
                "logo" => $faker->imageUrl($width = 400, $height = 400),
                "created_at" => Carbon::now()->today(),
                "updated_at" => Carbon::now()->today()
            ]);
        }
    }
}
