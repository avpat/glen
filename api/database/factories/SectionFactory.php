<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Section;
use Faker\Generator as Faker;

$factory->define(Section::class, function (Faker $faker) {
    return [
        'survey_id'     => factory(App\Survey::class),
        'name'          => $faker->name,
        'description'   => $faker->text,
        'status'      => $faker->numberBetween(0, 1)
    ];
});

