<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i = 1; $i < 10; $i++) :
            $product = new Product();
            $product->product_name = $faker->jobTitle();
            $product->category_id = $faker->randomNumber(1);
            $product->product_code = $faker->randomNumber(5);
            $product->root = $faker->phoneNumber(3);
            $product->buying_price = $faker->randomNumber(5);
            $product->selling_price = $faker->randomNumber(5);
            $product->supplier_id = $faker->randomNumber(1);
            $product->buying_date = $faker->date();
            $product->product_quantity = $faker->randomNumber(2);
            $product->photo = '';
            $product->save();
        endfor;
    }
}