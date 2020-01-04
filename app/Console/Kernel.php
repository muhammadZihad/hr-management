<?php

namespace App\Console;

use App\Profile;
use App\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Hash;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $user = User::create([
                'name' => 'Muhammad Zihad',
                'email' => 'me@mail.com',
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
            $p->fname = 'Muhammad';
            $p->lname = 'Zihad';
            $p->phone = '01842372731';
            $p->city = 'Dhaka';
            $p->dob = '1997-01-01';
            $p->national_id = '201942554839234';
            $p->country_id = 1;
            $p->address = 'Dhanmondi-27';


            $user->profile()->save($p);
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}