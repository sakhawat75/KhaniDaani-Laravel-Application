<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Area
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Area extends \Eloquent {}
}

namespace App{
/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCategory[] $subcategories
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App{
/**
 * App\City
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Area[] $areas
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class City extends \Eloquent {}
}

namespace App{
/**
 * App\DeliveryService
 *
 * @property array|null|string min_delivery_time
 * @property array|null|string max_delivery_time
 * @property int $id
 * @property int $user_id
 * @property string $service_title
 * @property string $service_description
 * @property string $service_area
 * @property string $service_hours_start
 * @property string $service_hours_end
 * @property float $service_charge
 * @property int $min_delivery_time
 * @property int $max_delivery_time
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereMaxDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereMinDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceHoursEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceHoursStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereUserId($value)
 * @mixin \Eloquent
 */
	class DeliveryService extends \Eloquent {}
}

namespace App{
/**
 * App\Dish
 *
 * @property int $id
 * @property int $profile_id
 * @property int|null $dsp_1
 * @property int|null $dsp_2
 * @property int|null $dsp_3
 * @property string $dish_category
 * @property string $dish_subcategory
 * @property string $dish_name
 * @property string $dish_description
 * @property float $dish_price
 * @property string $preparation_time
 * @property string $dish_thumbnail
 * @property string $dish_image_1
 * @property string $dish_image_2
 * @property string $dish_image_3
 * @property int $is_approved
 * @property string $item_tags
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Profile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishSubcategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDsp1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDsp2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDsp3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereItemTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish wherePreparationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Dish extends \Eloquent {}
}

namespace App{
/**
 * App\Order
 *
 * @property int $id
 * @property int $buyer_user_id
 * @property string $buyer_fullname
 * @property string $buyer_contact_n
 * @property string|null $buyer_cn_opt
 * @property int $dish_id
 * @property int $dsp_id
 * @property float $dsp_service_charge
 * @property float $dish_price
 * @property float $khanidaani_charge
 * @property float $total_price
 * @property int $preparation_time
 * @property string $delivery_address
 * @property string $delivery_address_hint
 * @property string $payment_type
 * @property int $delivery_time
 * @property int|null $rating
 * @property int|null $chef_is_dish_ready
 * @property int|null $chef_is_dish_delivered
 * @property int|null $dsp_is_dish_recieved
 * @property int|null $dsp_is_dish_delivered
 * @property int|null $is_order_complited
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Dish $dish
 * @property-read \App\DeliveryService $dsp
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBuyerCnOpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBuyerContactN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBuyerFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBuyerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereChefIsDishDelivered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereChefIsDishReady($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDeliveryAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDeliveryAddressHint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDishId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDishPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDspId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDspIsDishDelivered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDspIsDishRecieved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDspServiceCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereIsOrderComplited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereKhanidaaniCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePreparationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App{
/**
 * App\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_name
 * @property string $fullname
 * @property string $mobile_no
 * @property string $dob
 * @property string $city
 * @property string $area
 * @property string|null $address
 * @property string|null $address_hint
 * @property string $cover_image
 * @property string $profile_image
 * @property string $description
 * @property float $avgRating
 * @property float $communicationRating
 * @property float $presentationRating
 * @property float $timingRating
 * @property float $describeRating
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dish[] $dish
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAddressHint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAvgRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCommunicationRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereDescribeRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereMobileNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile wherePresentationRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereTimingRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserName($value)
 * @mixin \Eloquent
 */
	class Profile extends \Eloquent {}
}

namespace App{
/**
 * App\Rating
 *
 */
	class Rating extends \Eloquent {}
}

namespace App{
/**
 * App\SubCategory
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SubCategory extends \Eloquent {}
}

namespace App{
/**
 * App\SystemVariables
 *
 * @property int $id
 * @property int $service_percentage
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SystemVariables whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SystemVariables whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SystemVariables whereServicePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SystemVariables whereUpdatedAt($value)
 */
	class SystemVariables extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DeliveryService[] $delivery_services
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Profile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

