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
            'title' => 'first news',
            'description' => 'first manchette',
            'writer_id' => 1,
        ],
        [
            'title' => 'second news',
            'description' => 'second manchette',
            'writer_id' => 2,
        ],
        [
            'title' => 'third news',
            'description' => 'third manchette',
            'writer_id' => 1,
        ],
        [
            'title' => 'fourth news',
            'description' => 'fourth manchette',
            'writer_id' => 2,
        ],
        [
            'title' => 'fifth news',
            'description' => 'fifth manchette',
            'writer_id' => 1,
        ],
        [
            'title' => 'sixth news',
            'description' => 'sixth manchette',
            'writer_id' => 2,
        ],
        ]);
    }
}