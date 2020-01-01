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
        //
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

        $attendance = Attendance::create([
            'date' => $t->toDateString(),
        ]);

        $attendance->users()->attach($user_id, [
            'check_in' => $t->toTimeString(),
        ]);

        return redirect()->back();

    }

    public function checkOut($id){
        
        $t = Carbon::now('+6:00');
        $user_id = $id;
        $ck = User::find($user_id)->attendances()->where('date', $t->toDateString())->firstOrFail();
        if ($ck->pivot->check_out == Null) {
            User::find($user_id)->attendances()->updateExistingPivot($ck->id, ['check_out' => $t->toTimeString()]);
        }
        return redirect()->back();
        
        
    }
}
