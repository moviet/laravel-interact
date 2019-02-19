<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Models\Status\Likeable::class, function (Faker $faker) {
    return [
        'id' => '1234568',
        'bridge' => '1234567',
        'status' => 2,
        'token' => 'next_generate',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
