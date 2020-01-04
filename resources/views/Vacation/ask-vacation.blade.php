@extends('layouts.layout')

@section('content')

{{-- @if($errors->has())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
@endforeach
@endif --}}

<div class="row">
  <div class="col-12">
    <div class="main-card card">
      <div class="card-header">Ask for vacation</div>
      <form method="POST" action="{{ route('submitVacation') }}">
        {{ csrf_field() }}
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">From</label>
              <input type="date" class="form-control" id="inputEmail4" placeholder="From" name="from">
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">To</label>
              <input type="date" class="form-control" id="inputEmail4" placeholder="To" name="to">
            </div>

            <div class="form-group col-md-8">
              <label for="exampleFormControlTextarea1">Describe vacation asking reason</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" style="padding:10px"
                name="description"></textarea>
            </div>

          </div>
        </div>
        <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</div>




@endsection