<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i < 10; $i++) :
            $employee = new Employee();
            $employee->name = $faker->firstName();
            $employee->email = $faker->email();
            $employee->phone = $faker->phoneNumber();
            $employee->address = $faker->address();
            $employee->joining_date = $faker->date();
            $employee->nid = $faker->e164PhoneNumber();
            $employee->salary = $faker->randomNumber();
            $employee->photo = '';
            $employee->save();
        endfor;
    }
}