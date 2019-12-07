@if(Auth::user()->hasRole('admin'))

    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>employee</span></a>
    </li>
    <li class="{{ Request::is('hr*') ? 'active' : '' }}">
        <a href="{!! route('hr.index') !!}"><i class="fa fa-edit"></i><span>hr</span></a>
    </li>
@endif
@if(Auth::user()->hasRole('emplyee'))
    <li class="{{ Request::is('attendSheets*') ? 'active' : '' }}">
        <a href="{!! route('attendSheets.index') !!}"><i class="fa fa-edit"></i><span>attendSheets</span></a>
    </li>
    <li class="{{ Request::is('monthlyOutcomes*') ? 'active' : '' }}">
        <a href="{!! route('monthlyOutcomes.index') !!}"><i class="fa fa-edit"></i><span>monthlyOutcomes</span></a>
    </li>
@endif
@if(Auth::user()->hasRole('hr'))
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>employee</span></a>
    </li>
@endif
<li class="{{ Request::is('requests*') ? 'active' : '' }}">
    <a href="{{ route('requests.index') }}"><i class="fa fa-edit"></i><span>Requests</span></a>
</li>

