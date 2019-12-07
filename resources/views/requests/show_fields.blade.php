<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $requests->type }}</p>
</div>

<!-- Discription Field -->
<div class="form-group">
    {!! Form::label('discription', 'Discription:') !!}
    <p>{{ $requests->discription }}</p>
</div>

<!-- Day Field -->
<div class="form-group">
    {!! Form::label('day', 'Day:') !!}
    <p>{{ $requests->day }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $requests->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $requests->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $requests->updated_at }}</p>
</div>

