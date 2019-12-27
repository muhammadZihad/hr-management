<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dep = [
            'Design',
            'Admin',
            'Development',
            'Research',
        ];

        foreach ($dep as $d) {
            Department::create([
                'name' => $d
            ]);
        };
    }
}