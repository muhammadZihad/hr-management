<?php

namespace App\Http\Controllers;

use App\Country;
use App\Department;
use App\Designation;
use App\Http\Requests\UserRequest;
use App\Profile;
use App\Role;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emp.list')->with('list', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create')
            ->with('departments', Department::all()->sortBy('name'))
            ->with('designations', Designation::all()->sortBy('name'))
            ->with('types', Type::all()->sortBy('name'))
            ->with('roles', Role::all()->sortBy('name'))
            ->with('countries', Country::all()->sortBy('name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $image = $request->image->store('empImage');
        $user = new User;
        $user->name = $request->fname . " " . $request->lname;
        $user->email = $request->email;
        $user->salary = $request->salary;
        $user->department_id = $request->department;
        $user->designation_id = $request->designation;
        $user->role_id = $request->role;
        $user->type_id = $request->type;
        if ($request->admin == "on") {
            $user->admin = 1;
        } else {
            $user->admin = 0;
        }
        $user->image = $image;
        $user->password = bcrypt($request->fname);
        $user->save();
        $prof = new Profile;
        $prof->fname = $request->fname;
        $prof->lname = $request->lname;
        $prof->city = $request->city;
        $prof->address = $request->address;
        $prof->national_id = $request->id_no;
        $prof->dob = $request->dob;
        $prof->country_id = $request->country;
        $user->profile()->save($prof);

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('profile.sin')->with('item', User::find($id));
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
}