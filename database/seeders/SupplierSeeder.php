<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i < 50; $i++) :
            $employee = new Supplier();
            $employee->name = $faker->firstName();
            $employee->email = $faker->email();
            $employee->phone = $faker->phoneNumber();
            $employee->address = $faker->address();
            $employee->shopname = $faker->company();
            $employee->photo = '';
            $employee->save();
        endfor;
    }
}