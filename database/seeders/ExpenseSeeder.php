<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Expense;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i < 10; $i++) :
            $expense = new Expense();
            $expense->details = $faker->jobTitle();
            $expense->amount = $faker->randomNumber(3);
            $expense->expense_date = date('Y-m-d');
            $expense->save();
        endfor;
    }
}