@extends('layouts.layout')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Schedules
                @admin
                <div class="btn-actions-pane-right">
                    <a href="{{route('schedule.create')}}" class="btn btn-success">+Add Schedule</a>
                </div>
                @endadmin
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover sortable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Title</th>
                            <th class="">Description</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($list as $item)
                        <tr>
                            <td class="text-center text-muted">#{{$i++}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{$item->title}}</div>
                                            <div class="widget-subheading opacity-7">{{$item->from_Date}} to
                                                {{$item->to_Date}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">{{$item->description}}</td>
                            <td class="text-center">
                                <div class="badge badge-warning">{{$item->status}}</div>
                            </td>
                            <td class="text-center">
                                <a href="{{route('schedule.show',$item->id)}}"
                                    class="btn btn-primary btn-sm">Details</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i
                        class="pe-7s-trash btn-icon-wrapper">
                    </i></button>
                <button class="btn-wide btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>



@endsection