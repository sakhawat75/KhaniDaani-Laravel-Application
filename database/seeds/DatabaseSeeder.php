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
        $this->call(SubCategoriesTableSeeder::class);
        $this->command->info("SubCategories table has been seeded");
        
        DB::table('categories')->delete();
        $this->call(CategoriesTableSeeder::class);
        $this->command->info("Categories table seeded");

        
    }
}
