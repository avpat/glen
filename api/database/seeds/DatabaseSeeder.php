<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SurveyTableSeeder::class);
         $this->call(SectionTableSeeder::class);
         $this->call(RuleTableSeeder::class);
         $this->call(RuleSectionTableSeeder::class);
    }
}
