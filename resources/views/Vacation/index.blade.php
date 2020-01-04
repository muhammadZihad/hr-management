@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Vacation Requests</div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover sortable">
                    <thead>
                       
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">From</th>
                            <th class="text-center">To</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Approve</th>
                            <th class="text-center">Reject</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($vac as $v)
                            @foreach ($v->users as $user)
                                @foreach ($user->vacations as $uvac)
                                @php
                                    $sUser = $uvac->where('status','approved')->orWhere('status','rejected')->first()
                                @endphp
                                    @if ($sUser)
                                        <tr>
                                            <td class="text-center text-muted">1</td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading"></div>
                                                            <div class="widget-subheading opacity-7">
                                                                {{ $user->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center">{{ $sUser->from }}</td>
                                            <td class="text-center">{{ $sUser->to }}</td>
                                            <td class="text-center">{{ $sUser->description }}</td>

                                            <td class="text-center">
                                                <a href=""
                                                    class="btn btn-success btn-sm">Approve</a>
                                            </td>
                                            <td class="text-center">
                                                <a href=""
                                                    class="btn btn-danger btn-sm">Reject</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection