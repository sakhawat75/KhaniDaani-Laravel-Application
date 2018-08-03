<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Eloquent::unguard();
        DB::table('dishes')->delete();
        DB::table('delivery_services')->delete();
        DB::table('profiles')->delete();
        DB::table('users')->delete();
        DB::table('system_variables')->delete();

//        $this->call(ProfilesTableSeeder::class);
//        $this->command->info("Profiles table has been seeded");
        
//        $this->call(DishesTableSeeder::class);
//        $this->command->info("Dishes table has been seeded");

//        $this->call(DeliveryServicesTableSeeder::class);
//        $this->command->info("DSP table has been seeded");


       
        DB::table('subcategories')->delete();
        DB::table('categories')->delete();
        
        $this->call(CategoriesTableSeeder::class);
        $this->command->info("Categories table has been seeded");

        $this->call(SubCategoriesTableSeeder::class);
        $this->command->info("SubCategories table has been seeded");

        DB::table('areas')->delete();
        DB::table('cities')->delete();
        
        $this->call(CitiesTableSeeder::class);
        $this->command->info("Cities table has been seeded");

        $this->call(AreasTableSeeder::class);
        $this->command->info("Areas table has been seeded");

	    $this->call(UsersTableSeeder::class);
	    $this->command->info("Users table has been seeded");

        $this->call(SystemVariablesSeeder::class);
	    $this->command->info("SystemVariables table has been seeded");

    }
}
