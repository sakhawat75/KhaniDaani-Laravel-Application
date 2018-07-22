<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class, 15)->create()
        ->each(function ($u){
	        $dsp = factory(App\DeliveryService::class, 3)->create(['user_id' => $u->id]);
	        $profile = factory(App\Profile::class, 1)->create(['user_id' => $u->id])
	        ->each(function ($p) use ($u){
		       $dish = factory(App\Dish::class, 5)->create(['profile_id' => $p->id]);
	        });
        });
    }
}
