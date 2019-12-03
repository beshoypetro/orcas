<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $attendSheet->date }}</p>
</div>

<!-- Chickin Field -->
<div class="form-group">
    {!! Form::label('chickIn', 'Chickin:') !!}
    <p>{{ $attendSheet->chickIn }}</p>
</div>

<!-- Checkout Field -->
<div class="form-group">
    {!! Form::label('checkOut', 'Checkout:') !!}
    <p>{{ $attendSheet->checkOut }}</p>
</div>

<!-- Hours Field -->
<div class="form-group">
    {!! Form::label('hours', 'Hours:') !!}
    <p>{{ $attendSheet->hours }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $attendSheet->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $attendSheet->updated_at }}</p>
</div>

