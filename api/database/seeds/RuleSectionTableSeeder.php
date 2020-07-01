<?php

use Illuminate\Database\Seeder;

class RuleSectionTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     * Here we are attaching random rule to the section
     *
     * @return void
     */
    public function run()
    {
        $rules = App\Rule::all();

        App\Section::all()->each(function ($section) use ($rules) {
           $section->rules()->attach(
                $rules->random(rand(1, 3))->pluck('id')->toArray()
           );
        });
    }
}
