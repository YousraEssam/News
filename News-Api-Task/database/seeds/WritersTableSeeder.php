<?php

use Illuminate\Database\Seeder;

class WritersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('writers')->insert([
            [
                'first_name' => 'John',
                'second_name' => 'Green'
            ],
            [
                'first_name' => 'Jane',
                'second_name' => 'Austen'
            ]
        ]);
    }
}
