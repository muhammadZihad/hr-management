<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            'Bangladesh',
            'India',
            'USA',
            'Canada',
            'Japan'
        ];
        foreach ($countries as $item) {
            Country::create([
                'name' => $item
            ]);
        }
    }
}