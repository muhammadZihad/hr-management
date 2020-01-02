@extends('layouts.layout')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-group">
        @foreach ($errors->all() as $item)
        <li class="list-group-item">
            {{$item}}
        </li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Update {{$user->name}}'s profile </div>
            <form action="{{route('employee.update',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" class="form-control" value=" {{$user->profile->fname}} "
                                    required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" value=" {{$user->profile->lname}} " class="form-control"
                                    aria-required="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value=" {{$user->email}} " class="form-control"
                                    aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Deparment</label>
                                <select name="department" class="form-control" required>
                                    <option disabled selected hidden>Select one</option>
                                    @foreach($departments as $item)
                                    <option @if ($user->department_id == $item->id)
                                        selected
                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Designation</label>
                                <select name="designation" id="" class="form-control" required>
                                    <option disabled selected hidden>Select one</option>
                                    @foreach($designations as $item)
                                    <option @if ($user->designation_id == $item->id)
                                        selected
                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" id="" class="form-control" aria-placeholder="Select one" required>
                                    <option disabled selected hidden>Select one</option>
                                    @foreach($roles as $item)
                                    <option @if ($user->role_id == $item->id)
                                        selected
                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="type" id="" class="form-control">
                                    <option disabled selected hidden>Select one</option>
                                    @foreach($types as $item)
                                    <option @if ($user->type_id == $item->id)
                                        selected
                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Salary Amount</label>
                                <input type="number" class="form-control" value="{{$user->salary}}" name="salary"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">National ID</label>
                                <input type="text" class="form-control" value=" {{$user->profile->national_id}} "
                                    name="id_no">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" value=" {{$user->profile->phone}} "
                                    name="phone">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Date of Birth</label>
                                <input type="date" name="dob" id="" value="{{$user->profile->dob}}"
                                    class="form-control"></input>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" id="" value=" {{$user->profile->address}} "
                                    class="form-control">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" name="city" id="" value=" {{$user->profile->city}} "
                                    class="form-control">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Country</label>
                                <select name="country" class="form-control">
                                    <option disabled selected hidden>Select one</option>
                                    @foreach($countries as $item)
                                    <option @if ($user->profile->country_id == $item->id)
                                        selected
                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Please select a profile picture</label>
                                <img src="{{asset('storage/'.$user->image)}}" alt="" class="img-thumbnail d-block"
                                    style="max-width:250px;">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check ">
                            <input class="form-check-input" name="admin" type="checkbox" @if ($user->admin ==
                            1)
                            checked
                            @endif >
                            <label class="form-check-label" for="gridCheck">
                                Check it it is a Admin account
                            </label>
                        </div>
                    </div>

                </div>
                <div class="card-footer d-block text-center ">
                    <input type="submit" value="Submit" class="btn btn-sm btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection