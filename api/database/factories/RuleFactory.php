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
        'age' => [
            'borrower_age_min'  => 'integer|min:21',
            'borrower_age_max'  => 'integer|max:75'
        ],
        'affordability' => [
            'annual_income' => 'integer|min:40000',
            'loan_amount'   => 'integer|max:3*',
        ],
        'finance' => [
            'loan_length'   => 'integer|max:12',
            'loan_amount'   => 'integer|max:500000',
        ]
    ];

    return [
        'rule' => serialize([
            $faker->randomElement(
                [
                    $rule['age']['borrower_age_min'],
                    $rule['age']['borrower_age_max'],
                    $rule['affordability']['annual_income'],
                    $rule['affordability']['loan_amount'],
                    $rule['finance']['loan_length'],
                    $rule['finance']['loan_amount']
                ]
            )
        ])
    ];
});
