<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

/**
 * Factory definition for model App\User.
 */
$factory->define(App\User::class, function ($faker) {
    return [
        // Fields here
    ];
});

/**
 * Factory definition for model App\Place.
 */
$factory->define(App\Place::class, function ($faker) {
    return [
        'user_id' => $faker->fillable,key,
        'user_id' => $faker->key,
    ];
});

/**
 * Factory definition for model App\State.
 */
$factory->define(App\State::class, function ($faker) {
    return [
        // Fields here
    ];
});

/**
 * Factory definition for model App\City.
 */
$factory->define(App\City::class, function ($faker) {
    return [
        'state_id' => $faker->key,
    ];
});
