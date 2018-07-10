 <?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('categories')->insert(array(
            array('id' => '1','name' => 'Chicken' ),
            array('id' => '2','name' => 'Beef' ),
            array('id' => '3','name' => 'Mutton' ),
            array('id' => '4','name' => 'Fish' ),
            array('id' => '5','name' => 'Vegetables' ),
            array('id' => '6','name' => 'Fast Food/Snacks'),
            array('id' => '7','name' => 'Continental' ),
            array('id' => '8','name' => 'Platter' ),
            array('id' => '9','name' => 'Other' ),
        ));
           
    }
   
}
