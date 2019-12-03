<div class="table-responsive">
    <table class="table" id="monthlyOutcomes-table">
        <thead>
            <tr>
                <th>Month</th>
        <th>Year</th>
        <th>Hours</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($monthlyOutcomes as $monthlyOutcome)
            <tr>
                <td>{{ $monthlyOutcome->month }}</td>
            <td>{{ $monthlyOutcome->year }}</td>
            <td>{{ $monthlyOutcome->hours }}</td>
                <td>
                    {!! Form::open(['route' => ['monthlyOutcomes.destroy', $monthlyOutcome->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('monthlyOutcomes.show', [$monthlyOutcome->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('monthlyOutcomes.edit', [$monthlyOutcome->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
