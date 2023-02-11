@extends('dashboard')
@section('content')
    
    @if(Session::has('user'))
        <ul>
            <li class="nav-item">
                <a class="nav-link active">
                    Welcome - {{ Session::get('user')['password'] }}
                </a>
            </li>
        </ul>
    @endif
    
@endsection