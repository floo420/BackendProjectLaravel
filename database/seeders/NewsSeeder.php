<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for news
        $news = [
            [
                'Title' => 'Thai Real Estate',
                'Cover_image' => 'seeder_images/newsThailand.JPEG',
                'Content' => 'A boom in Chinese investment has pushed up property prices. Does the new Thai government have a plan to manage the impact?
                <br/><br/>Thailand’s real estate market has recently grown significantly, which can be credited to the previous government’s policies. Despite being in office for just a month, the new Prime Minister Srettha Thavisin has been proactive in collaborating with China, particularly in tourism, trade, and investment. Attracting private Chinese investments into Thailand’s real estate sector is vital for this bilateral relationship. However, it may not directly address the issue of affordable housing for Thai citizens. These investments, while economically significant, are just one aspect of the broader economic relations between the two countries. Addressing affordable housing and other socioeconomic challenges may necessitate separate policy considerations beyond foreign investments.',
                'Publishing_date' => '2024-01-15',
            ],
            
        ];

        // Insert the sample data into the 'news' table
        DB::table('news')->insert($news);
    }
}
