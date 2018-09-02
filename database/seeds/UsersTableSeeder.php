<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array('id' => '1','name' => 'Legal_Buyer', 'email' => 'buyer@gmail.com',  'password' => bcrypt('secret'), 'remember_token' => str_random(10)),

            array('id' => '2','name' => 'Royal_Chef', 'email' => 'chef@gmail.com',  'password' => bcrypt('secret'), 'remember_token' => str_random(10)),
           
           array('id' => '3','name' => 'Fast_Deliverer', 'email' => 'dsp@gmail.com',  'password' => bcrypt('secret'), 'remember_token' => str_random(10)),

        ));


        $faker = Faker::create();
        $user_name = array('Legal_Buyer', 'Royal_Chef', 'Fast_Deliverer');
        $full_name = array('Hussain Juned', 'Sakhawat', 'Haider Nurain');
        for( $i=0; $i<3; $i++ )
        {
            DB::table('profiles')->insert(array(
                array(
                    'id' => $i+1,  
                    'user_id' => $i+1,  
                    'user_name' => $user_name[$i],
                    'fullname' => $full_name[$i],
                    'mobile_no' => $faker->phoneNumber,
                    'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'city' => $faker->city,
                    'area' => $faker->secondaryAddress,
                    'address' => $faker->address,
                    'address_hint' => $faker->streetName,                    
            //        'cover_image' =>$faker->imageUrl($width = 640, $height = 480),
            //        'profile_image' =>$faker->imageUrl($width = 640, $height = 480),
                    'description' => $faker->paragraph,
                    'avgRating' => $faker->numberBetween(1,5),
                    'communicationRating' => $faker->numberBetween(1,5),
                    'presentationRating' => $faker->numberBetween(1,5),
                    'timingRating' => $faker->numberBetween(1,5),
                    'describeRating' => $faker->numberBetween(1,5),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                )
            ));
        }


        // for dsp
        DB::table('delivery_services')->insert(array(
            array(
                'id' => 1,
                'user_id' => 3,
                'service_title' => 'Isalampur to Tilagarh',
                'service_description' => $faker->paragraph,
                'service_area' => $faker->secondaryAddress,   
                'service_hours_start' => $faker->time($format = 'H:i:s', $max = 'now'),
                'service_hours_end' => $faker->time($format = 'H:i:s', $max = 'now'),
                'service_charge' =>$faker->numberBetween(100,500),
                'min_delivery_time' =>$faker->time($format = 'H:i:s', $max = 'now'),
                'max_delivery_time' =>$faker->time($format = 'H:i:s', $max = 'now'),
            )
        ));

        //for dishes
        $categories = array('Chicken','Beef','Mutton','Fish','Vegetables',
        'Fast Food/Snacks','Continental','Platter','Other');

        $subcat = array(
            array('Chicken Biriyani', 'Chicken Masala', 'Jaal Fry', 'Roast', 'Kabab', 'Grilled', 'Other',),
            array('Beef Biriyani', 'Beef Curry', 'Beef Masala', 'Beef Kurma', 'Ginger Beef', 'Beef Cabab', 'Other',),
            array('Mutton Biriyani', 'Mutton Bhuna', 'Mutton Curry', 'Mutton Kurma', 'Other',),
            array('Prawn', 'Hilsha', 'Pabda', 'Rui', 'Sea Fish', 'Small Fish', 'Other',),
            array('Mixed Vegetable', 'Chicken Vegetable', 'Special Vegetable Bharta', 'Other',),
            array('Pizza', 'Burger', 'Sandwich', 'Hot Dog', 'Noodles/Spaghetti', 'Pasta', 'Other',),
            array('Indian', 'Italian', 'Arabian', 'Other', ),
            array('Special Platter', 'Sale Platter', 'Other',),
            array('Rice', 'Nan/Porota', 'Soup', 'Salad', 'Desserts', 'Sizzling', 'Appetizers', 'Other', ),
        );

        $cat_ind = $faker->numberBetween(0, count( $categories)-1);
        $sub_ind = $faker->numberBetween(0, count($subcat[$cat_ind]) - 1);

       /* $dsps = DB::table('delivery_services')->pluck( 'id')->all();

        $dsp_1 = $faker->randomElement($dsps);
        $dsp_2 = $faker->randomElement($dsps);
        $dsp_3 = $faker->randomElement($dsps);
        $i = 0;
        while ($dsp_2 == $dsp_1 and $i < 10000) {
            $dsp_2 = $faker->randomElement($dsps);
            $i++;
        }

        $j = 0;
        while ($dsp_3 == $dsp_1 or $dsp_3 == $dsp_2) {
            $dsp_3 = $faker->randomElement($dsps);
            $j++;
            if ($j > 10000) {
                break;
            }
        }*/

        $dish_adjectives = array('Delicious', 'Spicy', 'Crunchy', 'Bitter', 'Sweet', 'Awesome', 'Bland', 'Smoky', 'Creamy');
        $dish_name = $faker->randomElement($dish_adjectives) . ' ' . $subcat[$cat_ind][$sub_ind];
        if($subcat[$cat_ind][$sub_ind] == 'Other' or $subcat[$cat_ind][$sub_ind] == 'Indian') {
            $dish_name = $faker->randomElement($dish_adjectives) . ' ' . $faker->randomElement(array('Dish', 'Platter', 'Curry'));
        }

        for( $i=0; $i<3; $i++ )
        {
            DB::table('dishes')->insert(array(
                array(
                    'profile_id' => 2,
                    'dish_category' => $categories[$cat_ind],
                    'dish_subcategory' => $subcat[$cat_ind][$sub_ind],
                    'dish_name' => $dish_name,
                    'dish_description' =>$faker->paragraph,
                    'dish_price' => $faker->numberBetween(100,500),
                    'preparation_time' => $faker->numberBetween(1, 4),
            //        'preparation_time' => $faker->time($format = 'H:i:s', $max = 'now'),
            //        'dish_thumbnail' => $faker->imageUrl($width = 640, $height = 480),
                    'dish_thumbnail' => $faker->randomElement(array('t1.jpg', 't2.jpg', 't3.jpg')),
            //        'dish_image_1' =>$faker->imageUrl($width = 640, $height = 480),
                    'dish_image_1' =>$faker->randomElement(array('img1.jpg', 'img2.jpg', 'img3.jpg')),
                    'dish_image_2' =>$faker->randomElement(array('img1.jpg', 'img2.jpg', 'img3.jpg')),
                    'dish_image_3' =>$faker->randomElement(array('img1.jpg', 'img2.jpg', 'img3.jpg')),
            //        'dish_image_2' => $faker->imageUrl($width = 640, $height = 480),
            //        'dish_image_3' => $faker->imageUrl($width = 640, $height = 480),
                    'is_approved' => $faker->boolean,                    
                    'item_tags' =>$faker->name,
                    'remember_token' => str_random(10),
                    'dsp_1' => 1,
                    'dsp_2' => 2,
                    'dsp_3' => 3,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                )
            ));
        }




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
