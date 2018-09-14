<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FeaturedDishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('featured_dishes')->insert(array(
            array('dish_id' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ),
            array('dish_id' => '10', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ),
            array('dish_id' => '19', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ),
        ));
    }
}
