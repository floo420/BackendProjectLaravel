<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed properties data
        $propertiesData = [
            [
                'condo_picture' => 'condo_pictures/bayHill1.JPG',
                'condo_title' => 'Patong BayHill Suite - SeaView',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'max_occupancy' => 3,
                'price' => 2000.00,
                'location' => 'Patong',
            ],
            [
                'condo_picture' => 'condo_pictures/6thAv1.JPG',
                'condo_title' => '6th Avenue - Suite',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'max_occupancy' => 3,
                'price' => 1500.00,
                'location' => '6th Avenue',
            ],
            [
                'condo_picture' => 'condo_pictures/Aristo2.JPG',
                'condo_title' => 'The Aristo 2 - Big Suite',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'max_occupancy' => 4,
                'price' => 2000.00,
                'location' => 'Aristo 2',
            ],
            [
                'condo_picture' => 'condo_pictures/AristoPatong.JPG',
                'condo_title' => 'Aristo Patong Suite - SeaView',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'max_occupancy' => 3,
                'price' => 2500.00,
                'location' => 'Patong',
            ],
        ];

        // Insert properties into the database
        Property::insert($propertiesData);
    }
}
