<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Discription Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discription', 'Discription:') !!}
    {!! Form::text('discription', null, ['class' => 'form-control']) !!}
</div>

<!-- Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('day', 'Day:') !!}
    {!! Form::date('day', null, ['class' => 'form-control','id'=>'day']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#day').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', "1", null) !!} Yes
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "0", null) !!} No
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('requests.index') }}" class="btn btn-default">Cancel</a>
</div>
