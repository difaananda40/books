@extends('layouts.app')

@section('title')
Book
@endsection

@section('header')
Pending Approval Book
@endsection

@section('header-desc')
List
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        @if ($msg = Session::get('message'))
        <div class="alert alert-info alert-block">
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
                            <th>Writer</th>
                            <th>Pages</th>
                            <th>Release Year</th>
                            <th>Created by</th>
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
            'ajax': "{{ route('book.getDataPending') }}",
            'columns': [
                { "data": "name" },
                { "data": "writer" },
                { "data": "pages" },
                { "data": "release_year" },
                { "data": "user.name" },
                { render: (data, type, row) => {
                    return `
                        <div class="row">
                            <div class="col-xs-3">
                                <a href="/book/verify/${row.id}" 
                                class="btn btn-sm btn-success m-1">
                                    Verify
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <a href="/book/reject/${row.id}" 
                                class="btn btn-sm btn-danger m-1">
                                    Reject
                                </a>
                            </div>
                        </div>
                    `;
                }}
            ]
        });
    })

</script>
@endsection
