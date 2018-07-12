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

        
    }
}
