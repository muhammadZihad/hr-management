@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Attendances</div>

    <div class="card-body">

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        #
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Check In
                    </th>
                    </th>
                    <th>
                        Check Out
                    </th>
                    </th>
                    <th>
                        Check In Status
                    </th>
                    </th>
                    <th>
                        Check Out Status
                    </th>

                </thead>

                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($attendances as $a)
                        @foreach ($a->users as $user)
                        <tr>
                            <td>#{{ $i++ }}</td>
                            <td><a href="{{ route('single.attendance',['id' => $user->id]) }}">{{ $user->name }}</a></td>
                            <td>
                                <p>{{ $a->date }}</p>
                            </td>
                            <td>
                                <p>{{ $user->attendances()->where('date', $a->date)->first()->pivot->check_in }}</p>
                                {{-- {{ $user->attendances()->date }} --}}
                            </td>
                            </td>
                            <td>
                                <p>{{ $user->attendances()->where('date', $a->date)->first()->pivot->check_out }}</p>
                            </td>
                            </td>
                            <td>
                                <p>{{ $user->attendances()->where('date', $a->date)->first()->pivot->check_in_status }}</p>
                            </td>
                            </td>
                            <td>
                                <p>{{ $user->attendances()->where('date', $a->date)->first()->pivot->check_out_status }}</p>
                            </td>
                        </tr>
                        @endforeach
                    @endforeach

                </tbody>
            </table>
            <div class="text-center" style="margin-top:20px">
                {{$attendances->links()}}
            </div>
        </div>
    </div>
</div>

@endsection