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
        $this->command->info("Categories table seeded");

        $this->call(SubCategoriesTableSeeder::class);
        $this->command->info("SubCategories table has been seeded");

        
    }
}
