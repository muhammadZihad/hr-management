@extends('layouts.layout')

@section('content')
    @if (!auth()->user()->isCheckedIn())
        <a href="{{ route('checkIn', ['id' => Auth::id()]) }}" class="btn btn-success">Check In</a>
    @else
        @if (auth()->user()->isCheckedOut())
           <button class="btn btn-danger" disabled>Checked Out</button>
        @else
            <a href="{{ route('checkOut', ['id' => Auth::id()]) }}" class="btn btn-danger">Check Out</a>
        @endif
    @endif

    <a href="{{ route('askVacation')}}" class="btn btn-info">Ask for vacation</a>
@endsection