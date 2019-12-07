<div class="table-responsive">
    <table class="table" id="requests-table">
        <thead>
            <tr>
                <th>Type</th>
        <th>Discription</th>
        <th>Day</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($requests as $requests)
            <tr>
                <td>{{ $requests->type }}</td>
            <td>{{ $requests->discription }}</td>
            <td>{{ $requests->day }}</td>
            <td>{{ $requests->status }}</td>
                <td>
                    {!! Form::open(['route' => ['requests.destroy', $requests->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('requests.show', [$requests->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('requests.edit', [$requests->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
