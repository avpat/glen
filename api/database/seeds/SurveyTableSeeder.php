<?php

use Illuminate\Database\Seeder;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * creating 3 records
     *
     * @return void
     */
    public function run()
    {
        factory(App\Survey::class, 3)->create();
    }
}
