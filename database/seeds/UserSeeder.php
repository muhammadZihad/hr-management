<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Hero',
            'email' => 'hero@mail.com',
            'admin' => 1,
            'type_id' => 1,
            'image' => 'posts/T6cWR2xHQHhtLHWTUtAoAVfy1NbMOWP2QEV8Z0Bd.jpeg',
            'salary' => 35000,
            'department_id' => 1,
            'designation_id' => 3,
            'role_id' => 4,
            'password' => Hash::make('12345')
        ]);
        $p = new Profile;
        $p->fname = 'Big';
        $p->lname = 'Hero';
        $p->phone = '01842372731';
        $p->city = 'Dhaka';
        $p->national_id = '201942554839234';
        $p->country_id = 1;
        $p->address = 'Dhanmondi-27';


        $user->profile()->save($p);

        $user2 = User::create([
            'name' => 'Zero',
            'email' => 'zero@mail.com',
            'admin' => 0,
            'type_id' => 2,
            'salary' => 3000,
            'department_id' => 2,
            'image' => 'posts/T6cWR2xHQHhtLHWTUtAoAVfy1NbMOWP2QEV8Z0Bd.jpeg',
            'designation_id' => 3,
            'role_id' => 4,
            'password' => Hash::make('12345')
        ]);
        $p = new Profile;
        $p->fname = 'Big';
        $p->lname = 'Zero';
        $p->phone = '01842372731';
        $p->city = 'Dhaka';
        $p->national_id = '201942534534543';
        $p->country_id = 3;
        $p->address = 'Puran Dhaka';


        $user2->profile()->save($p);
    }
}