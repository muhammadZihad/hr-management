<?php

namespace App\Http\Controllers;

use App\Country;
use App\Department;
use App\Designation;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdate;
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
        $user->password = bcrypt($request->fname . "123456");
        $user->save();
        $prof = new Profile;
        $prof->fname = $request->fname;
        $prof->lname = $request->lname;
        $prof->city = $request->city;
        $prof->address = $request->address;
        $prof->national_id = $request->id_no;
        $prof->phone = $request->phone;
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
    public function search(Request $request)
    {
        $user = User::where('name', 'REGEXP', '.*' . $request->name . '.*')->get();
        return view('emp.list')->with('list', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('profile.edit')
            ->with('user', User::find($id))
            ->with('departments', Department::all()->sortBy('name'))
            ->with('designations', Designation::all()->sortBy('name'))
            ->with('types', Type::all()->sortBy('name'))
            ->with('roles', Role::all()->sortBy('name'))
            ->with('countries', Country::all()->sortBy('name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $image = $request->image->store('empImage');
            $user->deleteImage();
            $user->image = $image;
        }
        $user->name = $request->fname . " " . $request->lname;
        if ($user->email != $request->email) {
            $user->email = $request->email;
        }
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
        $user->save();
        $user->profile->fname = $request->fname;
        $user->profile->lname = $request->lname;
        $user->profile->city = $request->city;
        $user->profile->address = $request->address;
        $user->profile->national_id = $request->id_no;
        $user->profile->dob = $request->dob;
        $user->profile->phone = $request->phone;
        $user->profile->country_id = $request->country;
        $user->profile->save();


        return view('profile.sin')->with('item', User::find($id));
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