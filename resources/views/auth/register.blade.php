@extends('dashboard')
@section('content')
    <main class="register-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-header"><h4 class="card-title">Register</h4></div>
                        <div class="card-body">
                            <form action="{{ route('register.custom') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                                    @if($errors->has('username'))
                                        <pre class="text-danger my-1">{{ $errors->first('username') }}</pre>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <pre class="text-danger my-1">{{ $errors->first('email') }}</pre>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                    @if($errors->has('password'))
                                        <pre class="text-danger my-1">{{ $errors->first('password') }}</pre>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Register</button>
                                </div>
                            </form>
                            <div class="text-right">
                                <a href="{{ route('login') }}">Already have an account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection