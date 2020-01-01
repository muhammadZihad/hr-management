@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Attendances of: {{ $user->name }} </div>

    <div class="card-body">

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
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
                    @foreach ($attendances as $a)
                        <tr>
                            
                            <td>
                                <p>{{ $a->date }}</p>
                            </td>
                            <td>
                                <p>{{ $a->pivot->check_in }}</p>
                                {{-- {{ $user->attendances()->date }} --}}
                            </td>
                            </td>
                            <td>
                                <p>{{ $a->pivot->check_out }}</p>
                            </td>
                            </td>
                            <td>
                                <p>In Time</p>
                            </td>
                            </td>
                            <td>
                                <p>Early</p>
                            </td>
                        </tr>
                    @endforeach                  
                </tbody>
                
            </table>
        </div>
    </div>
    <div>
        {{ $attendances->links() }}
    </div>
</div>

@endsection