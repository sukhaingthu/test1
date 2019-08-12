<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'name' => str_random(10),
        	'description' =>str_random(50),
        	'price' => 2000,
        	'produced on' => Carbon::create('2000','01','01')
        ]);
    }
}
