<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement(['pending','delivered','cancel']),
        'paid' => $faker->boolean(50),
        'track_code'=> md5(uniqid(rand(),true))
    ];
});
