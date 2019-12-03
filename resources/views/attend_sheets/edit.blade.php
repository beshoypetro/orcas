@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Attend Sheet
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($attendSheet, ['route' => ['attendSheets.update', $attendSheet->id], 'method' => 'patch']) !!}

                        @include('attend_sheets.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection