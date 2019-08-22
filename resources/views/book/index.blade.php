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
                                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm btn-primary m-1">Edit</a>
                                    <form method="post" action="{{ route('book.destroy', $book->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
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
