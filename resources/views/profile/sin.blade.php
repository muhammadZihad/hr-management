@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-header">{{$item->profile->fname." ".$item->profile->lname}}
                @admin
                <div class="btn-actions-pane-right">
                    <a href="{{route('employee.edit',$item->id)}}" class="btn btn-sm btn-primary">Update</a>

                </div>
                @endadmin
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="image-container">
                            <img src="{{asset('storage/'.$item->image)}}" alt="" class="img-thumbnail rounded">
                        </div>
                    </div>
                    <div class="col-md-9 border-left border-dark">
                        <table class="c-table">
                            <tr>
                                <td class="h6">First Name :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->profile->fname}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Last Name :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->profile->lname}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Email :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->email}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Phone :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->profile->phone}}</td>
                            </tr>
                            @if ($item->id==auth()->user()->id || auth()->user()->admin)
                            <tr>
                                <td class="h6">Salary :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->salary}}</td>
                            </tr>
                            <tr>
                                <td class="h6">National Id :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->profile->national_id}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td class="h6">Department :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->department->name}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Designation :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->designation->name}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Role :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->role->name}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Type :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->type->name}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Address :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->profile->address}}</td>
                            </tr>
                            <tr>
                                <td class="h6">City :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->profile->city}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Country :</td>
                                <td class="pl-5 py-1 h6"><b>{{$item->profile->country->name}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection