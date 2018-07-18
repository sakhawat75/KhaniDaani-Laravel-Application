<?php

use Illuminate\Database\Seeder;

class DeliveryServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DeliveryService::class, 15)->create();
    }
}
