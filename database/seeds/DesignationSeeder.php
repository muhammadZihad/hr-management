<?php

use App\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $des = [
            'Designer',
            'CEO',
            'Developer',
            'Researcher',
        ];

        foreach ($des as $d) {
            Designation::create([
                'name' => $d
            ]);
        };
    }
}