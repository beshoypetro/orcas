@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Users</h1>
    <h1 class="pull-right">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('hr.create') }}">Add New</a>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            {{--                    @include('users.table')--}}
            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>pin</th>
                    <th>Created At</th>
                    <th>action</th>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatableHr') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'pin', name: 'pin' },
                { data: 'created_at', name: 'created_at' },
                {data: 'action', name: 'edit', orderable: false, searchable: false},


            ]
        });
    });

</script>
@endsection
