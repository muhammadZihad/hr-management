<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $des = [
            'Graphic Designer',
            'CEO',
            'Laravel Developer',
            'Python Developer',
            'Researcher',
        ];

        foreach ($des as $d) {
            Role::create([
                'name' => $d
            ]);
        };
    }
}