<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Chickin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chickIn', 'Chickin:') !!}
    {!! Form::date('chickIn', null, ['class' => 'form-control','id'=>'chickIn']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#chickIn').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Checkout Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checkOut', 'Checkout:') !!}
    {!! Form::date('checkOut', null, ['class' => 'form-control','id'=>'checkOut']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#checkOut').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Hours Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hours', 'Hours:') !!}
    {!! Form::number('hours', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('attendSheets.index') }}" class="btn btn-default">Cancel</a>
</div>
