<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Countries;
class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $countries = [
            ['country_name' => 'India', 'country_code' => 'INR'],
            ['country_name' => 'Oman', 'country_code' => 'OMR'],
            ['country_name' => 'UAE', 'country_code' => 'AED'],
            ['country_name' => 'Qatar', 'country_code' => 'QAR'],
        ];

        foreach ($countries as $country) {
            Countries::create($country);
        }
    }
}
