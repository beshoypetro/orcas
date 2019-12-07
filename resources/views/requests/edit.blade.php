@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Requests
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($requests, ['route' => ['requests.update', $requests->id], 'method' => 'patch']) !!}

                        @include('requests.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection