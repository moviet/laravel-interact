<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Network\Profile::class, function (Faker $faker, $id) {
    return [
        'id' => $id,
        'name' => $faker->name,
        'email' => $faker->email,
        'token' => 'generate',
    ];
});
