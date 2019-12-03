<!-- Month Field -->
<div class="form-group">
    {!! Form::label('month', 'Month:') !!}
    <p>{{ $monthlyOutcome->month }}</p>
</div>

<!-- Year Field -->
<div class="form-group">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $monthlyOutcome->year }}</p>
</div>

<!-- Hours Field -->
<div class="form-group">
    {!! Form::label('hours', 'Hours:') !!}
    <p>{{ $monthlyOutcome->hours }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $monthlyOutcome->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $monthlyOutcome->updated_at }}</p>
</div>

