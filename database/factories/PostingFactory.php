<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Models\Status\Posting::class, function (Faker $faker) {
    return [
        'id' => '12345678',
        'name' => $faker->name,
        'status' => 'this is my status',
        'likes' => 5,
        'image' => '/img/friend.png',
        'token' => 'generate',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
