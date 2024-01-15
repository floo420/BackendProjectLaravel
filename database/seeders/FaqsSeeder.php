<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for FAQs
        $faqs = [
            [
                'category_id' => 3, 
                'question' => 'I go for the first time where should i go ? ',
                'answer' => 'Definetely try Chiang Mai, Bangkok and Phuket',
            ],
        ];

        // Insert the sample data into the 'faqs' table
        DB::table('faqs')->insert($faqs);
    }
}
