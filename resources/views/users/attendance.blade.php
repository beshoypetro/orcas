@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Users
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <br class="row" style="padding-left: 20px">
                @foreach($attendances as $attend)
                    <div class="form-group">
                        {!! Form::label('day', 'Day:'.$attend->date) !!}
                        <p> checkIn :: {{ $attend->checkIn }} ______ CheckOut:: {{ $attend->checkOut }}  _______    Number of Hours:: {{ $attend->hours / 60 }} </p>
                    </div>
                @endforeach
                <h3>total month Hours :: {{$monthHours->hours/60}}</h3>
                <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
    </div>
@endsection
