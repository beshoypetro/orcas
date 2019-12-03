<div class="table-responsive">
    <table class="table" id="attendSheets-table">
        <thead>
            <tr>
                <th>Date</th>
        <th>Chickin</th>
        <th>Checkout</th>
        <th>Hours</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($attendSheets as $attendSheet)
            <tr>
                <td>{{ $attendSheet->date }}</td>
            <td>{{ $attendSheet->chickIn }}</td>
            <td>{{ $attendSheet->checkOut }}</td>
            <td>{{ $attendSheet->hours }}</td>
                <td>
                    {!! Form::open(['route' => ['attendSheets.destroy', $attendSheet->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('attendSheets.show', [$attendSheet->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('attendSheets.edit', [$attendSheet->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
