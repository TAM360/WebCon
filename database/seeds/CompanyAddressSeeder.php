<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

class CompanyAddressSeeder extends Seeder
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
            DB::table('company_address')->insert([
                'company_id' => $index, 
                'first_address' => $faker->address,
                'second_address' => $faker->address,
                'first_phone_number' => $faker->phoneNumber,
                'second_phone_number' => $faker->phoneNumber,
                'created_at' => Carbon::now()->today(),
                'updated_at' => Carbon::now()->now()
            ]);
        }
    }
}
