<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rule;
use Faker\Generator as Faker;

/**
 *  I'm assuming, the rules will be defined in laravel rules format eg. integer|min:21
 *
 *  Converted the rules into laravel validation type strings
 *
 *  Here, I've defined rules in an array format and storing raandom rule it into the rules column
 *
 */
$factory->define(Rule::class, function (Faker $faker) {

    $rule = [
        'income'        => ['Annual Income'         => 'numeric|min:40000|required'],
        'age'           => ['Borrowers Age'         => 'numeric|min:21|max:75'],
        'loan_capacity' => ['affordability'         => 'numeric|max:3*annual_income|required'],
        'finance_term'  => ['Loan length in Months' => 'numeric|max:12|required'],
        'finance_max'   => ['Loan Amount'           => 'numeric|max:500000|required']
    ];

    return [
        'rule' => serialize([
            $faker->randomElement(
                [
                    $rule['income'],
                    $rule['age'],
                    $rule['loan_capacity'],
                    $rule['finance_term'],
                    $rule['finance_max']
                ]
            )
        ])
    ];
});
