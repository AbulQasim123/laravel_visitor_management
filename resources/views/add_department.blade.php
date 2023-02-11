@extends('dashboard')
@section('content')
<h4 class="mt-3">Department Management</h4>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Department</a></li>
        <li class="breadcrumb-item"><a href="/sub_user">Department Management</a></li>
        <li class="breadcrumb-item active">Add New Sub User</li>
    </ol>
</nav>


<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h6>Add New Department</h6></div>
            <div class="card-body">
                <form action="{{ route('department.add_validation') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="department_name"><b>Department Name</b></label>
                        <input type="text" id="department_name" name="department_name" class="form-control" placeholder="Department Name" value="{{ old('department_name') }}">
                        @if($errors->has('department_name'))
                            <pre class="text-danger my-1">{{ $errors->first('department_name') }}</pre>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_person"><b>Contact Person</b></label>
                        <input type="text" id="contact_person" name="contact_person" class="form-control" placeholder="Contact Person" value="{{ old('contact_person') }}">
                        @if($errors->has('contact_person'))
                            <pre class="text-danger my-1">{{ $errors->first('contact_person') }}</pre>
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
