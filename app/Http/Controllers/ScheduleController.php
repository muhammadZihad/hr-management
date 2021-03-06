<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('schedule.list')->with('list', Schedule::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.create')
            ->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'from' => 'required',
            'to' => 'required',
            'users' => 'required'
        ]);
        $schedule = Schedule::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'Running',
            'leader_id' => $request->leader,
            'from' => $request->from,
            'to' => $request->to
        ]);
        $schedule->users()->attach($request->users);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);
        return view('schedule.sin')
            ->with('users', User::all())
            ->with('item', $schedule);
    }

    public function mySchedule()
    {
        return view('schedule.list')->with('list', auth()->user()->schedules);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        return view('schedule.update')
            ->with('users', User::all())
            ->with('item', $schedule);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'fromDate' => 'required',
            'toDate' => 'required',
            'users' => 'required'
        ]);
        $schedule = Schedule::find($id);
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->status = $request->status;
        $schedule->leader_id = $request->leader;
        $schedule->from = $request->fromDate;
        $schedule->to = $request->toDate;

        $schedule->users()->sync($request->users);
        $schedule->save();
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
}