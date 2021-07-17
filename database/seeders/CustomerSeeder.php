<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Generator as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i < 10; $i++) :
            $employee = new Customer();
            $employee->name = $faker->firstName();
            $employee->email = $faker->email();
            $employee->phone = $faker->phoneNumber();
            $employee->address = $faker->address();
            $employee->photo = '';
            $employee->save();
        endfor;
    }
}