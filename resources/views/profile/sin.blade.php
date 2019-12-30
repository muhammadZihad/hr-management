@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-header">{{$item->name." ".$item->profile->lname}}</div>
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
                                <td class="pl-5 py-1 h5">{{$item->profile->fname}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Last Name :</td>
                                <td class="pl-5 py-1 h5">{{$item->profile->lname}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Email :</td>
                                <td class="pl-5 py-1 h5">{{$item->email}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Department :</td>
                                <td class="pl-5 py-1 h5">{{$item->department->name}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Designation :</td>
                                <td class="pl-5 py-1 h5">{{$item->designation->name}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Role :</td>
                                <td class="pl-5 py-1 h5">{{$item->role->name}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Type :</td>
                                <td class="pl-5 py-1 h5">{{$item->type->name}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Address :</td>
                                <td class="pl-5 py-1 h5">{{$item->profile->address}}</td>
                            </tr>
                            <tr>
                                <td class="h6">City :</td>
                                <td class="pl-5 py-1 h5">{{$item->profile->city}}</td>
                            </tr>
                            <tr>
                                <td class="h6">Country :</td>
                                <td class="pl-5 py-1 h5">{{$item->profile->country->name}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection