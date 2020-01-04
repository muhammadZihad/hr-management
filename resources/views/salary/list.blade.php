@extends('layouts.layout')
@section('top')

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Salary List of Employees
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover sortable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Month</th>
                            <th class="text-center">Paid Amount</th>
                            <th class="text-center">Due Amount</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Details</th>
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
                                            <div class="widget-heading">{{$item->user->name}}</div>
                                            <div class="widget-subheading opacity-7">{{$item->user->email}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                {{ $month->where('id',$item->created_at->format('m')+0)->first()->name }}</td>
                            <td class="text-center">
                                <div class="badge badge-info">
                                    {{ $item->paid_amount }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-warning">
                                    {{ $item->due_amount }}
                                </div>
                            </td>
                            <td class="text-center">@if ($item->status + 0==2)
                                <div class="badge badge-success">
                                    Paid
                                </div>

                                @elseif($item->status + 0==1)
                                <div class="badge badge-secondary">
                                    Pending
                                </div>
                                @else
                                <div class="badge badge-danger">
                                    Due
                                </div>
                                @endif</td>
                            <td class="text-center">
                                <a href="{{ route('salary.edit',$item->id) }}"
                                    class="btn btn-primary btn-sm">Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                @if (count($list)==0)
                No Data Found
                @endif
            </div>
        </div>
    </div>
</div>
@endsection