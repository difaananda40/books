@extends('layouts.app')

@section('title')
Book
@endsection

@section('header')
Book
@endsection

@section('header-desc')
List
@endsection

@section('header-button')
<a class="btn btn-primary btn-sm" href={{ route('book.create') }}>Add Book</a>
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
            'ajax': "{{ route('book.getData') }}",
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
                                <a href="/book/${row.id}/edit" 
                                class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <form method="post" action="/book/${row.id}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    `;
                }}
            ]
        });
    })

</script>
@endsection
