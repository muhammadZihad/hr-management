@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card text-center">
            {{-- <div class="card-header">Featured</div> --}}
            <div class="card-body">
                <div class="circleDash bg-primary text-white ">
                    <div class="cContent align-self-center">
                        {{ $tdate }}
                        <p style="font-size:18px">Sunday</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                @if (!auth()->user()->isCheckedIn())
                    <a href="{{ route('checkIn', ['id' => Auth::id()]) }}" class="btn btn-success btn-block">Check In</a>
                @else
                    @if (auth()->user()->isCheckedOut())
                    <button class="btn btn-danger btn-block" disabled>Checked Out</button>
                    @else
                        <a href="{{ route('checkOut', ['id' => Auth::id()]) }}" class="btn btn-danger btn-block">Check Out</a>
                    @endif
                @endif
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Need a break?</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="{{ route('askVacation')}}" class="btn btn-info">Ask for vacation</a>
            </div>
        </div>
    </div>
</div>
@endsection