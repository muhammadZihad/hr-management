@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">All Employees
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover sortable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Department</th>
                            <th class="text-center">Designation</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                        <tr>
                            <td class="text-center text-muted">#{{$loop->iteration}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">

                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{$item->name}}</div>
                                            <div class="widget-subheading opacity-7">{{$item->email}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{$item->department->name}}</td>
                            <td class="text-center">{{$item->designation->name}}</td>
                            <td class="text-center">
                                <div class="badge badge-warning">{{$item->type->name}}</div>
                            </td>
                            <td class="text-center">
                                <a href="{{route('employee.show',$item->id)}}"
                                    class="btn btn-primary btn-sm">Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">

            </div>
        </div>
    </div>
</div>
@endsection