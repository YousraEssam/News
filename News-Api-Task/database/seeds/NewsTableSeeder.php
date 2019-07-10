<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
        [
            'name' => 'first news',
            'description' => 'first manchette',
            'writer_id' => 1,
        ],
        [
            'name' => 'second news',
            'description' => 'second manchette',
            'writer_id' => 2,
        ],
        [
            'name' => 'third news',
            'description' => 'third manchette',
            'writer_id' => 1,
        ],
        [
            'name' => 'fourth news',
            'description' => 'fourth manchette',
            'writer_id' => 2,
        ],
        [
            'name' => 'fifth news',
            'description' => 'fifth manchette',
            'writer_id' => 1,
        ],
        [
            'name' => 'sixth news',
            'description' => 'sixth manchette',
            'writer_id' => 2,
        ],
        ]);
    }
}