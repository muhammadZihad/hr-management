@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-6">

        <div class="main-card card mb-5">
            <div class="card-header">History</div>
            <div class="card-body">
                @if (count($item->details))
                <table class="table">
                    <tr>

                        <th>#</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Paid By</th>
                    </tr>
                    @foreach ($item->details->sortBy('created_at') as $d)
                    <tr>
                        <td>#{{ $loop->iteration }}</td>
                        <td>{{ $d->created_at->day."-".$d->created_at->month."-".$d->created_at->year }}</td>
                        <td>{{ $d->amount }}</td>
                        <td><a href="{{ route('employee.show',$d->payer_id ) }}">{{ $d->payer_name }}</a></td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
            <div class="card-footer text-center"> @if ($item->due_amount == 0)
                No due remained
                @endif
            </div>
        </div>


    </div>
    @if ($item->due_amount != 0)
    <div class="col-md-6">
        <div class="main-card card">
            <div class="card-header">Pay Salary</div>
            <form action="{{ route('salary.update', $item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="email" disabled class="form-control" id="inputEmail3"
                                value="{{ $item->user->name }}" name="lol" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" disabled class="form-control" id="inputEmail3"
                                value="{{ $item->user->email }}" name="lol" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Due (TK)</label>
                        <div class="col-sm-10">
                            <input type="number" disabled class="form-control" id="inputEmail3"
                                value="{{ $item->due_amount }}" name="lol" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Paying (TK)</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="pay" min="0" value="{{ $item->due_amount }}"
                                max="{{ $item->due_amount }}" placeholder="Amount" onkeyup=enforceMinMax(this)>
                        </div>
                    </div>

                </div>
                <div class="d-block text-center card-footer"><button class="btn btn-success px-5"
                        type="submit">Pay</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function enforceMinMax(el){
            if(el.value != ""){
                if(parseInt(el.value) < parseInt(el.min)){
                el.value = el.min;
                }
                if(parseInt(el.value) > parseInt(el.max)){
                el.value = el.max;
                }
            }
        }
    </script>
    @endif

</div>
@endsection