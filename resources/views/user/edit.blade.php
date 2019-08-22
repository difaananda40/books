@extends('layouts.app')

@section('title')
User
@endsection

@section('header')
User
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
            <form role="form" method="POST" action={{ route('user.update', $user->id) }}>
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="name">Name</label>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="name" placeholder="Enter name">
                        @error('name')
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="email">Email</label>
                        <input name="email" value="{{ $user->email }}" type="text" class="form-control" id="email" placeholder="Enter email">
                        @error('email')
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group @error('role') has-error @enderror">
                        <label for="role">Role</label>
                        <select class="form-control" name="role_id" id="role">
                            <option disabled selected hidden>Pick Role</option>
                            <option value="1" @if($user->role_id == 1) selected @endif>User</option>
                            <option value="2" @if($user->role_id == 2) selected @endif>Admin</option>
                        </select>
                        @error('role')
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer text-right">
                    <a class="btn btn-danger" href="{{ route('user.index') }}">Back</a>
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
