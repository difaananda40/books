@extends('layouts.app')

@section('title')
Book
@endsection

@section('header')
Book
@endsection

@section('header-desc')
Verify
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
    <div class="col-xs-4">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <h3 class="profile-username text-center">Verify Book</h3>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Name</b> <i class="pull-right">{{ $book->name }}</i>
                    </li>
                    <li class="list-group-item">
                        <b>Writer</b> <i class="pull-right">{{ $book->writer }}</i>
                    </li>
                    <li class="list-group-item">
                        <b>Pages</b> <i class="pull-right">{{ $book->pages }}</i>
                    </li>
                    <li class="list-group-item">
                        <b>Release Year</b> <i class="pull-right">{{ $book->release_year }}</i>
                    </li>
                    <li class="list-group-item">
                        <b>Created by</b> <i class="pull-right">{{ $book->user->name }}</i>
                    </li>
                </ul>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ route('book.verify', $book->id) }}" class="btn btn-success btn-block"><b>Verify</b></a>
                <a href="{{ route('book.reject', $book->id) }}" class="btn btn-danger btn-block"><b>Reject</b></a>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
