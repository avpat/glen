<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * creaating 10 records in the database
     *
     *
     * @return void
     */
    public function run()
    {
        factory(App\Section::class, 10)->create();
    }
}
