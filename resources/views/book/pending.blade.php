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
                <table id="example2" class="table table-bordered table-hover">
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
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->writer }}</td>
                            <td>{{ $book->pages }}</td>
                            <td>{{ $book->release_year }}</td>
                            <td>{{ $book->user->name }}</td>
                            <td>
                                <a class="btn btn-success btn-sm"
                                    href="{{ route('book.verify', $book->id) }}">Verify</a>
                                <a class="btn btn-danger btn-sm"
                                    href="{{ route('book.reject', $book->id) }}">Reject</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
<script>
    $(() => {
        $('#example2').DataTable();
    })

</script>
@endsection
