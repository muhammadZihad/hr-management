<?php

namespace App\Console\Commands;

use App\Salary;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SalaryData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'month:salary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create salary data fot employees';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            $i = count($user->salaries()->whereMonth('created_at', Carbon::now('+6:00')->month)->get());
            if ($i == 0) {
                Salary::create([
                    'user_id' => $user->id,
                    'due_amount' => $user->salary,
                    'paid_amount' => 0,
                    'status' => '1'
                ]);
            } else {
                echo $user->name . "'s data already exist for this month";
            }
        }
    }
}