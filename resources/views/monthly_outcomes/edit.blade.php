@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Monthly Outcome
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($monthlyOutcome, ['route' => ['monthlyOutcomes.update', $monthlyOutcome->id], 'method' => 'patch']) !!}

                        @include('monthly_outcomes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection