 <?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('cities')->insert(array(
            array('id' => '1','name' => 'Dhaka' ),
            array('id' => '2','name' => 'Chattogram' ),
            array('id' => '3','name' => 'Sylhet' ),
            array('id' => '4','name' => 'Khulna' ),
            array('id' => '5','name' => 'Barisal'),
            array('id' => '6','name' => 'Rajshahi' ),
            array('id' => '7','name' => 'Rangpur' ),
            array('id' => '8','name' => 'Mymensingh' ),
        ));
           
    }
   
}
