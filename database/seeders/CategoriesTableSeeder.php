<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \DB::insert('INSERT INTO categories (name, status) VALUES(?, ?)', ['test', 0]);

        $categories = [
            ['name'=>'artisan', 'description'=>'Artisan Categories', 'status'=>1 ],
            ['name'=>'php', 'description'=>'PHP Categories', 'status'=>0],
            ['name'=>'laravel', 'description'=>'Laravel Categories', 'status'=>1],
          ];

        foreach ($categories as $category) {
            \DB::insert('INSERT INTO categories (name, status, description, created_at, updated_at) VALUES(?, ?, ? , ?, ?)', [

                $category['name'],
                $category['status'],
                $category['description'],
                now(),
                now()
            ]);

        }



    }
}
