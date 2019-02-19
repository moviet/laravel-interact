<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Bubble\Seeders\SeedRandom;

$factory->define(App\Models\Contact::class, function (Faker $faker, $id) {
    $dateTime = 'timestamp';
    return [
        'id' => $id,
        'name' => 'Contact Testing',
        'email' => 'moviet@simply-interact.com',
        'division' => 'Customer Service',
        'token' => 'abcdefgh-ijkl-yayayay-yayaya',
        'message'  => 'Helloow, This is just test',
        'posted_at' => $dateTime,
        'ip'  => '123456',
    ];
});