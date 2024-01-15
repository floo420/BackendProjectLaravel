<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for FAQ categories
        $categories = [
            ['name' => 'Thailand'],
            ['name' => 'Yiels'],
            ['name' => 'Where in Thailand ?'],
            // Add more categories as needed
        ];

        // Insert the sample data into the 'faq_categories' table
        DB::table('faq_categories')->insert($categories);
    }
}
