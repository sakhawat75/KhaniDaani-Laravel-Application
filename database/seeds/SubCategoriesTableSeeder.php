 <?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('subcategories')->insert(array(
            array('id' => '1','name' => 'Chicken Biriyani', 'category_id' => '1' ),
            array('id' => '2','name' => 'Chicken Masala', 'category_id' => '1'),
            array('id' => '3','name' => 'Jaal Fry', 'category_id' => '1' ),
            array('id' => '4','name' => 'Roast', 'category_id' => '1' ),
            array('id' => '5','name' => 'Kabab', 'category_id' => '1' ),
            array('id' => '6','name' => 'Grilled', 'category_id' => '1' ),
            array('id' => '7','name' => 'Other', 'category_id' => '1' ),

            array('id' => '8','name' => 'Beef Biriyani', 'category_id' => '2' ),
            array('id' => '9','name' => 'Beef Curry', 'category_id' => '2'),
            array('id' => '10','name' => 'Beef Masala', 'category_id' => '2' ),
            array('id' => '11','name' => 'Beef Kurma', 'category_id' => '2' ),
            array('id' => '12','name' => 'Ginger Beef', 'category_id' => '2' ),
            array('id' => '13','name' => 'Beef Cabab', 'category_id' => '2' ),
            array('id' => '14','name' => 'Other', 'category_id' => '2' ),

            array('id' => '15','name' => 'Mutton Biriyani', 'category_id' => '3' ),
            array('id' => '16','name' => 'Mutton Bhuna', 'category_id' => '3'),
            array('id' => '17','name' => 'Mutton Curry', 'category_id' => '3' ),
            array('id' => '18','name' => 'Mutton Kurma', 'category_id' => '3' ),
            array('id' => '19','name' => 'Other', 'category_id' => '3' ),

            array('id' => '20','name' => 'Prawn', 'category_id' => '4' ),
            array('id' => '21','name' => 'Hilsha', 'category_id' => '4'),
            array('id' => '22','name' => 'Pabda', 'category_id' => '4' ),
            array('id' => '23','name' => 'Rui', 'category_id' => '4' ),
            array('id' => '24','name' => 'Sea Fish', 'category_id' => '4'),
            array('id' => '25','name' => 'Small Fish', 'category_id' => '4' ),
            array('id' => '26','name' => 'Other', 'category_id' => '4' ),

            array('id' => '27','name' => 'Mixed Vegetable', 'category_id' => '5' ),
            array('id' => '28','name' => 'Chicken Vegetable', 'category_id' => '5'),
            array('id' => '29','name' => 'Special Vegetable Bharta', 'category_id' => '5' ),
            array('id' => '30','name' => 'Other', 'category_id' => '5' ),

            array('id' => '31','name' => 'Pizza', 'category_id' => '6'),
            array('id' => '32','name' => 'Burger', 'category_id' => '6' ),
            array('id' => '33','name' => 'Sandwich', 'category_id' => '6' ),
            array('id' => '34','name' => 'Hot Dog', 'category_id' => '6'),
            array('id' => '35','name' => 'Noodles/Spaghetti', 'category_id' => '6' ),
            array('id' => '36','name' => 'Pasta', 'category_id' => '6' ),
            array('id' => '37','name' => 'Other', 'category_id' => '6' ),

            array('id' => '38','name' => 'Indian', 'category_id' => '7' ),
            array('id' => '39','name' => 'Italian', 'category_id' => '7'),
            array('id' => '40','name' => 'Arabian', 'category_id' => '7' ),
            array('id' => '41','name' => 'Other', 'category_id' => '7' ),

            array('id' => '42','name' => 'Special Platter', 'category_id' => '8' ),
            array('id' => '43','name' => 'Sale Platter', 'category_id' => '8' ),
            array('id' => '44','name' => 'Other', 'category_id' => '8'),

            array('id' => '45','name' => 'Rice', 'category_id' => '9'),
            array('id' => '46','name' => 'Nan/Porota', 'category_id' => '9' ),
            array('id' => '47','name' => 'Soup', 'category_id' => '9' ),
            array('id' => '48','name' => 'Salad', 'category_id' => '9'),
            array('id' => '49','name' => 'Desserts', 'category_id' => '9' ),
            array('id' => '50','name' => 'Sizzling', 'category_id' => '9' ),
            array('id' => '51','name' => 'Appetizers', 'category_id' => '9'),
            array('id' => '52','name' => 'Other', 'category_id' => '9' )
          
        ));
    }
   
}
