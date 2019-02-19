<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker, $uid) {
    return [
        'uid' => $uid,
        'name' => $faker->name,
        'email' => $faker->email,
        'email_verified_at' => Carbon::now(),
        'id' => Str::uuid(),
        'password' => bcrypt('interact'), // interact (or min 8 chars)
        'remember_token' => str_random(64),
    ];
});
