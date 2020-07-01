<?php

use Illuminate\Database\Seeder;

class RuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * we are creating 20 records
     *
     * @return void
     */
    public function run()
    {
        factory(App\Rule::class, 20)->create();
    }
}
