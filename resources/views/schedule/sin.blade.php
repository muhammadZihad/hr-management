@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="main-card card">
            <div class="card-header">{{ $item->title }}</div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-5">
                        <div class="main-card card">
                            <div class="card-header">Details</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td>Title</td>
                                        <td class="h6"> {{ $item->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td class="h6">{{ $item->description }} Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. Nesciunt amet magnam, magni, ea incidunt esse quae eum
                                            perspiciatis quibusdam exercitationem facere dignissimos sunt sequi
                                            repellendus nobis commodi! Cum, vel animi.</td>
                                    </tr>
                                    <tr>
                                        <td>Start Date</td>
                                        <td class="h6">{{ $item->from }}</td>
                                    </tr>
                                    <tr>
                                        <td>End Date</td>
                                        <td class="h6">{{ $item->to }}</td>
                                    </tr>
                                    <tr>
                                        <td>Leader</td>
                                        <td class="h6"><a
                                                href="{{ route('employee.show',$item->leader_id) }}">{{ $users->where('id',$item->leader_id)->first()->name }}</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="main-card card">
                            <div class="card-header">Members</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>#</td>
                                        <th>Name</td>
                                        <th>Email</td>
                                        <th>Role</th>
                                    </tr>
                                    @foreach ($users as $u)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <a href="{{ route('employee.show',$u->id) }}">{{ $u->name }}</a> </td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->role->name }}</td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection