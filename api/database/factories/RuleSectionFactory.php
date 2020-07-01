<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RuleSection;
use Faker\Generator as Faker;

$factory->define(RuleSection::class, function (Faker $faker) {
    return [
        'section_id'   => factory(App\Section::class),
        'rule_id'     => factory(App\Rule::class),
    ];
});

