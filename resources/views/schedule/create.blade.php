@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">New Schedule</div>
            <div class="card-body">
                <form method="POST" action="{{route('schedule.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Project title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="description" id="desc" cols="30" rows="5"
                            placeholder="Description about the project" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">From (date)</label>
                                <input type="date" class="form-control date" id="exampleInputPassword1"
                                    placeholder="Start date" name="from">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">To (date)</label>
                                <input type="date" class="form-control date" id="exampleInputPassword1"
                                    placeholder="End date" name="to">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        Team Leader:
                        <select class="form-control" name="leader" id="" aria-placeholder="Select 1">
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        Team Member:
                        <select class="form-control" name="users[]" id="users" multiple>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Add Schedule</button>
                </form>

            </div>
        </div>
    </div>
</div>


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection


@section('top')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('bottom')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('.date',{
    minDate: "today"
});


    function matchCustom(params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') {
          return data;
        }
    
        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
          return null;
        }
    
        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        if (data.text.indexOf(params.term) > -1) {
          var modifiedData = $.extend({}, data, true);
          modifiedData.text += ' (matched)';
    
          // You can return modified objects from here
          // This includes matching the `children` how you want in nested data sets
          return modifiedData;
        }
    
        // Return `null` if the term should not be displayed
        return null;
    }
    $('#users').select2({
      placeholder: 'Selecet users (max: 5)',
      maximumSelectionLength: 5,
      allowClear: true,
      matcher: matchCustom
    });
</script>
@endsection