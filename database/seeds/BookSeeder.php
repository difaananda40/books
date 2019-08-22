<?php

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();
        Book::insert([
            [
                'name' => 'Harry Potter Chapter 1',
                'writer' => 'J.K. Rowling',
                'pages' => 400,
                'release_year' => '1993',
                'is_verificated' => true,
                'user_id' => 1,
                'created_at' => date('Y-m-d')
            ],
            [
                'name' => 'Harry Potter Chapter 2',
                'writer' => 'J.K. Rowling',
                'pages' => 400,
                'release_year' => '1995',
                'is_verificated' => true,
                'user_id' => 2,
                'created_at' => date('Y-m-d')
            ],
            [
                'name' => 'A subtle art of not giving a fuck',
                'writer' => 'Difa Ananda',
                'pages' => 212,
                'release_year' => '2019',
                'is_verificated' => true,
                'user_id' => 2,
                'created_at' => date('Y-m-d')
            ]
        ]);
    }
}
