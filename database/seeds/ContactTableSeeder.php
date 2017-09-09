<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // faker instance
        $faker = Faker::create();

        // delete previous value
        DB::table('contacts')->truncate();

        $contacts = [];

        foreach(range(1,20) as $index){
            $contacts[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'group_id' => rand(1,3),
                'company' => $faker->company,
                'phone' => $faker->phoneNumber,
                'address' => "{$faker->streetName} {$faker->postcode} {$faker->city}",
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ];
        }


        DB::table('contacts')->insert($contacts);
    }
}
