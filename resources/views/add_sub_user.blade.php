@extends('dashboard')
@section('content')
<h4 class="mt-3">Sub User Management</h4>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/sub_user">Sub Management</a></li>
        <li class="breadcrumb-item active">Add New Sub User</li>
    </ol>
</nav>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h6>Add New User</h6></div>
            <div class="card-body">
                <form action="{{ route('sub_user.add_validation') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username"><b>User Name</b></label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                        @if($errors->has('username'))
                            <pre class="text-danger my-1">{{ $errors->first('username') }}</pre>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <pre class="text-danger my-1">{{ $errors->first('email') }}</pre>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        @if($errors->has('password'))
                            <pre class="text-danger my-1">{{ $errors->first('password') }}</pre>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection