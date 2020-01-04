<?php

namespace App\Http\Controllers;

use App\Months;
use App\Salary;
use App\SalaryPart;
use App\User;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salary.list')->with('list', Salary::all())->with('month', Months::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return view('salary.edit')->with('item', Salary::find($id))->with('month', Months::all());
    }

    public function aSalaryStore(Request $request, $id)
    {
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

        $salary =  Salary::find($id);
        SalaryPart::create([
            'salary_id' => $salary->id,
            'payer_id' => auth()->user()->id,
            'payer_name' => auth()->user()->name,
            'amount' => $request->pay
        ]);
        $salary->paid_amount = $salary->paid_amount + $request->pay;
        $salary->due_amount = $salary->due_amount - $request->pay;
        if ($salary->due_amount == 0) {
            $salary->status = '2';
        }
        $salary->save();

        return redirect(route('salary.index'));
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