 <?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('areas')->insert(array(
            array('id' => '1','name' => 'Mirpur', 'city_id' => '1' ),
            array('id' => '2','name' => 'Dhanmondi', 'city_id' => '1'),
            array('id' => '3','name' => 'Uttara', 'city_id' => '1' ),
            array('id' => '4','name' => 'Gulshan', 'city_id' => '1' ),
            array('id' => '5','name' => 'Banani', 'city_id' => '1' ),
            array('id' => '6','name' => 'Mothijeel', 'city_id' => '1' ),
            array('id' => '7','name' => 'Other', 'city_id' => '1' ),

            array('id' => '8','name' => 'Agrabad', 'city_id' => '2' ),
            array('id' => '9','name' => 'Nasirabad', 'city_id' => '2'),
            array('id' => '10','name' => 'Kotwali', 'city_id' => '2' ),
            array('id' => '11','name' => 'Chawkbazar', 'city_id' => '2' ),
            array('id' => '12','name' => 'Chandgaon', 'city_id' => '2' ),
            array('id' => '13','name' => 'Other', 'city_id' => '2' ),

            array('id' => '14','name' => 'Zinda Bazar', 'city_id' => '3' ),
            array('id' => '15','name' => 'Bandar Bazar', 'city_id' => '3' ),
            array('id' => '16','name' => 'Amber Khana', 'city_id' => '3'),
            array('id' => '17','name' => 'South Surma', 'city_id' => '3' ),
            array('id' => '18','name' => 'Uposhohor', 'city_id' => '3' ),
            array('id' => '19','name' => 'Akhalia', 'city_id' => '3' ),
            array('id' => '20','name' => 'Bagh Bari', 'city_id' => '3' ),
            array('id' => '21','name' => 'Chouhatta', 'city_id' => '3'),
            array('id' => '22','name' => 'Dargah Mahalla', 'city_id' => '3' ),
            array('id' => '23','name' => 'Kumar para', 'city_id' => '3' ),
            array('id' => '24','name' => 'Lama Bazar', 'city_id' => '3'),
            array('id' => '25','name' => 'Major tila', 'city_id' => '3' ),
            array('id' => '26','name' => 'Nayasarak', 'city_id' => '3' ),
            array('id' => '27','name' => 'Nehari Para', 'city_id' => '3' ),
            array('id' => '28','name' => 'Osmani Nagar', 'city_id' => '3'),
            array('id' => '29','name' => 'Pathan Tula', 'city_id' => '3' ),
            array('id' => '30','name' => 'Shahi Eidgah', 'city_id' => '3' ),
            array('id' => '31','name' => 'Shahporan', 'city_id' => '3'),
            array('id' => '32','name' => 'Shibgonj', 'city_id' => '3' ),
            array('id' => '33','name' => 'Subhani Ghat', 'city_id' => '3' ),
            array('id' => '34','name' => 'Subid Bazar', 'city_id' => '3'),

            array('id' => '35','name' => 'Khulna Sadar', 'city_id' => '4' ),
            array('id' => '36','name' => 'Sonadanga', 'city_id' => '4' ),
            array('id' => '37','name' => 'Other', 'city_id' => '4' ),

            array('id' => '38','name' => 'Sadar Road', 'city_id' => '5' ),
            array('id' => '39','name' => 'nattullabad', 'city_id' => '5'),
            array('id' => '40','name' => 'Rupatali', 'city_id' => '5' ),
            array('id' => '41','name' => 'Other', 'city_id' => '5' ),

            array('id' => '42','name' => 'Shaheb bazar', 'city_id' => '6' ),
            array('id' => '43','name' => 'Mothihar', 'city_id' => '6' ),
            array('id' => '44','name' => 'Shiroli', 'city_id' => '6'),
            array('id' => '45','name' => 'Other', 'city_id' => '6'),

            array('id' => '46','name' => 'Rangpur city', 'city_id' => '7' ),
            array('id' => '47','name' => 'Kurigram', 'city_id' => '7' ),
            array('id' => '48','name' => 'Dinajpur', 'city_id' => '7'),

            array('id' => '49','name' => 'Patuakhali', 'city_id' => '8' ),
            array('id' => '50','name' => 'Bhola', 'city_id' => '8' ),
            array('id' => '51','name' => 'Pirojpur', 'city_id' => '8'),
            array('id' => '52','name' => 'Mymensinsh city', 'city_id' => '8' ),
            array('id' => '53','name' => 'Other', 'city_id' => '8' ),
          
        ));
    }
   
}
