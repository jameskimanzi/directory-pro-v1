<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use App\Administration;
$factory->define(Administration::class, function (Faker $faker) {
    return [
        
        'county' => $faker->county,
        'constituency' => $faker->constituency,
        'ward' => $faker->ward,
        'location' => $faker->location
        

    ];
});
