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
                    @include('users.show_fields')
                    <h1> get attendance sheet </h1>
                    <form action="{{url('getAttendanceSheet')}}" method="post">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id" value="{{$users->id}}">


                        <h5> month </h5>
                        <select name="month">
                            @for($i=1;$i<=12;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>
                    </br>
                        <h5> year </h5>
                        <select name="year">
                            @for($i=2019;$i<=2025;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <input type="submit">
                    </form>
                </br>
                    <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
