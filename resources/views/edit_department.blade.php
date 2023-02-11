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
            <form action="{{ route('department.department_validation') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="department_name"><b>Department Name</b></label>
                        <input type="text" id="department_name" name="department_name" class="form-control" placeholder="Department Name" value="{{ $data->department_name }}">
                        @if($errors->has('department_name'))
                            <pre class="text-danger my-1">{{ $errors->first('department_name') }}</pre>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_person"><b>Contact Person</b></label>
                        <input type="text" id="contact_person" name="contact_person" class="form-control" placeholder="Contact Person" value="{{ $data->contact_person }}">
                        @if($errors->has('contact_person'))
                            <pre class="text-danger my-1">{{ $errors->first('contact_person') }}</pre>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="hidden_id" name="hidden_id" value="{{ $data->id }}">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection