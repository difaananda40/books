@extends('layouts.app')

@section('title')
Book
@endsection

@section('header')
Book
@endsection

@section('header-desc')
Edit
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
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action={{ route('book.update', $book->id) }}>
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="name">Name</label>
                        <input name="name" value="{{ $book->name }}" type="text" class="form-control" id="name" placeholder="Enter book name">
                        @error('name')
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group @error('writer') has-error @enderror">
                        <label for="writer">Writer</label>
                        <input name="writer" value="{{ $book->writer }}" type="text" class="form-control" id="writer" placeholder="Enter writer's name">
                        @error('writer')
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group @error('pages') has-error @enderror">
                        <label for="pages">Pages</label>
                        <input name="pages" value="{{ $book->pages }}" type="number" class="form-control" id="pages" placeholder="Enter book's pages">
                        @error('pages')
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group @error('pages') has-error @enderror">
                        <label for="release_year">Release Year</label>
                        <input name="release_year" value="{{ $book->release_year }}" type="number" class="form-control" id="release_year" placeholder="Enter book's release year">
                        @error('release_year')
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer text-right">
                    <a class="btn btn-danger" href="{{ route('book.index') }}">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
<script>
    $(() => {
        $('#example2').DataTable();
    })

</script>
@endsection