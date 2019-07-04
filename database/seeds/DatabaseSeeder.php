<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => str_random(5),
            'quantity' => Integer::random(5)->default('100'),
            'reorder_level' => Integer::random(5)->default('20'),
            'description' => str_random(5),

        ]);
    }
}
