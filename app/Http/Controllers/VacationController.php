<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacation;
use App\User;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('Vacation.index')->with('vac', Vacation::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Vacation.ask-vacation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
            'description' => 'required',
        ]);

        $v = Vacation::create([
            'user' => $user_id,
            'from' => $request->from,
            'to' => $request->to,
            'description' => $request->description,
        ]);

        $v->users()->attach($user_id);
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

    public function vacApprove($id){
        $v = Vacation::find($id);
        $v->status = 'approved';
        $v->decidedBy = auth()->user()->id;
        $v->save();

        return redirect()->back();
    }
    public function vacReject($id){
        $v = Vacation::find($id);
        $v->status = 'rejected';
        $v->decidedBy = auth()->user()->id;
        $v->save();

        return redirect()->back();
    }

    // public function askVacation($id){
    //     return "working".$id;
    // }
}
