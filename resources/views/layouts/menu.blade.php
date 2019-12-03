@if(Auth::user()->hasRole('admin'))

    <li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>emplyee</span></a>
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
