@extends('dashboard')
@section('content')
<h4 class="mt-3">Sub User Management</h4>
<nav>
  	<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/sub_user">Sub Management</a></li>
        <li class="breadcrumb-item active">Edit Sub User</li>
  	</ol>
</nav>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h5>Edit Profile</h5></div>
            <div class="card-body">
                <form action="{{ route('sub_user.edit_validation') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username"><b>User Name</b></label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="User Name" value="{{ $data->name }}">
                        @if($errors->has('username'))
                            <pre class="text-danger">{{ $errors->first('username') }}</pre>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="User Name" value="{{ $data->email }}">
                        @if($errors->has('email'))
                            <pre class="text-danger">{{ $errors->first('email') }}</pre>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Pasword">
                    </div>
                    <div class="form-group">
		        		<input type="submit" id="edit" name="edit" class="btn btn-primary 
                        btn-sm" value="Updated" />
                        <input type="hidden" name="hidden_id" value="{{ $data->id }}" />
		        	</div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection