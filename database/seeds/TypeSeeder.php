<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'full-time', 'intern', 'part-time'
        ];
        foreach ($types as $type) {
            Type::create([
                'name' => $type
            ]);
        }
    }
}