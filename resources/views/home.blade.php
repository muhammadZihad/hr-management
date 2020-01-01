@extends('layouts.layout')

@section('content')
@if (!auth()->user()->isCheckedIn())
<a href="{{ route('checkIn', ['id' => Auth::id()]) }}" class="btn btn-success">Check In</a>
@else
<a href="{{ route('checkIn', ['id' => Auth::id()]) }}" class="btn btn-danger">Check Out</a>
@endif
@endsection