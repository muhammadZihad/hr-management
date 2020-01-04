<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::orderBy('created_at', 'desc')->paginate(20);
        return view('attendance.index')->with('attendances', $attendances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkIn($id)
    {
        $t = Carbon::now('+6:00');
        $user_id = $id;
        $timeTen = new Carbon('today 10am', '+6:00');


        $attendance = Attendance::create([
            'date' => $t->toDateString(),
        ]);

        if ($timeTen >= Carbon::now('+6:00')) {
            $attendance->users()->attach($user_id, [
                'check_in' => $t->toTimeString(),
                'check_in_status' => "In Time",
            ]);
        } else {
            $attendance->users()->attach($user_id, [
                'check_in' => $t->toTimeString(),
                'check_in_status' => 'Late',
            ]);
        }


        return redirect()->back();
    }

    public function checkOut($id)
    {

        $t = Carbon::now('+6:00');
        $timeFive = new Carbon('today 5pm', '+6:00');
        $user_id = $id;
        $ck = User::find($user_id)->attendances()->where('date', $t->toDateString())->firstOrFail();
        if ($ck->pivot->check_out == Null) {
            if ($timeFive >= Carbon::now('+6:00')) {
                User::find($user_id)->attendances()->updateExistingPivot($ck->id, [
                    'check_out' => $t->toTimeString(),
                    'check_out_status' => 'Early',
                ]);
            } else {
                User::find($user_id)->attendances()->updateExistingPivot($ck->id, [
                    'check_out' => $t->toTimeString(),
                    'check_out_status' => 'In Time',
                ]);
            }
        }
        return redirect()->back();
    }

    public function singleAttendance($id)
    {
        $u = User::find($id);
        return view('attendance.single-attendance')->with('attendances', $u->attendances()->paginate(20))->with('user', $u);
    }
}