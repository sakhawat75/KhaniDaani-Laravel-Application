<?php

use Faker\Generator as Faker;

$factory->define(App\Dish::class, function (Faker $faker) {

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

	$dsps = DB::table('delivery_services')->pluck( 'id')->all();

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
	}

	$dish_adjectives = array('Delicious', 'Spicy', 'Crunchy', 'Bitter', 'Sweet', 'Awesome', 'Bland', 'Smoky', 'Creamy');
	$dish_name = $faker->randomElement($dish_adjectives) . ' ' . $subcat[$cat_ind][$sub_ind];
	if($subcat[$cat_ind][$sub_ind] == 'Other' or $subcat[$cat_ind][$sub_ind] == 'Indian') {
		$dish_name = $faker->randomElement($dish_adjectives) . ' ' . $faker->randomElement(array('Dish', 'Platter', 'Curry'));
	}


       return [
    	/*'profile_id' => function () {
            return factory(App\Profile::class)->create()->id;},*/
        'dish_category' => $categories[$cat_ind],
        'dish_subcategory' => $subcat[$cat_ind][$sub_ind],
        'dish_name' => $dish_name,
        'dish_description' =>$faker->paragraph,
        'dish_price' => $faker->numberBetween(100,500),
        'preparation_time' => $faker->time($format = 'H:i:s', $max = 'now'),
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
	       'dsp_1' => $dsp_1,
	       'dsp_2' => $dsp_2,
	       'dsp_3' => $dsp_3,

    ];
});
