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
            <div class="card-header">New Employee</div>
            <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" class="form-control" aria-required="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" aria-required="true">
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
                                    <option value="{{$item->id}}">{{$item->name}}</option>
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
                                    <option value="{{$item->id}}">{{$item->name}}</option>
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
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="type" id="" class="form-control">
                                    <option disabled selected hidden>Select one</option>
                                    @foreach($types as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Salary Amount</label>
                                <input type="number" class="form-control" name="salary" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">National ID</label>
                                <input type="text" class="form-control" name="id_no">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Date of Birth</label>
                                <input type="date" name="dob" id="" class="form-control">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" id="" class="form-control">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" name="city" id="" class="form-control">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Country</label>
                                <select name="country" class="form-control">
                                    <option disabled selected hidden>Select one</option>
                                    @foreach($countries as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Please select a profile picture</label>
                                <input class="form-control" type="file" name="image" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check ">
                            <input class="form-check-input" name="admin" type="checkbox" id="gridCheck">
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