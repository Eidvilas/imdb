@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="row">
                                    <div class="col-md-6 checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="/fb/login"><img src="data:image/png;base64,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" width="170" height="45" alt="" ></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
