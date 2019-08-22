@extends('layouts.app')

@section('title')
User
@endsection

@section('header')
User
@endsection

@section('header-desc')
List
@endsection

@section('header-button')
<a class="btn btn-primary btn-sm" href={{ route('user.create') }}>Add User</a>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        @if ($msg = Session::get('message'))
        <div class="alert @if($type = Session::get('alert_type')) {{ $type }} @else alert-info @endif alert-block">
            <p>{{ $msg }}</p>
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
<script>
    $(() => {
        $('#table').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': "{{ route('user.getData') }}",
            'columns': [
                { "data": "name" },
                { "data": "email" },
                { "data": "role.name" },
                { render: (data, type, row) => {
                    return `
                        <div class="row">
                            <div class="col-xs-2">
                                <a href="/user/${row.id}/edit" 
                                class="btn btn-sm btn-primary m-1">
                                    Edit
                                </a>
                            </div>
                            <div class="col-xs-2">
                                <form method="post" action="/user/${row.id}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                    `;
                }}
            ]
        });
    })
</script>
@endsection
