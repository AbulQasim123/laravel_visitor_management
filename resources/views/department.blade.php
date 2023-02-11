@extends('dashboard')
@section('content')
<h4 class="mt-3">Department Management</h4>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Department Management</li>
    </ol>
</nav>
<div class="mt-4 mb-b">
@if(session()->has('success'))
    <div class="alert alert-success my-2">
        <a href="" class="close" data-dismiss="alert">&times;</a>
        {{ session()->get('success') }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><h6>Department Management</h6></div>
                <div class="col-md-6">
                    <a href="{{ route('department.add') }}" class="btn btn-success btn-sm float-right">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="user_table">
                    <thead>
                        <tr>
                            <th>Department Name</th>
                            <th>Contact Person</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var table = $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('department.fetchall') }}",
            columns: [
                {
                    data: 'department_name',
                    data: 'department_name'
                },
                {
                    data: 'contact_person',
                    data: 'contact_person'
                },
                {
                    data: 'created_at',
                    data: 'created_at'
                },
                {
                    data: 'updated_at',
                    data: 'updated_at'
                },
                {
                    data: 'action',
                    data: 'action',
                    orderable: false
                }
            ]
        })

        $(document).on('click', '.delete', function(){
            var id = $(this).data('id');
            if (confirm('Are you sure you want to remove it?')) {
                window.location.href= '/department/delete/' + id;
            }
        })
    })
</script>
@endsection