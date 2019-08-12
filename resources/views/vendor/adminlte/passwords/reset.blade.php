@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <b>{{ config('app.name', 'Laravel') }}</b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.password_reset_message') }}</p>
            <form action="{{ route('password.update') }}" method="post">
                {!! csrf_field() !!}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ isset($email) ? $email : old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('senha') ? 'has-error' : '' }}">
                    <input type="password" name="senha" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('senha'))
                        <span class="help-block">
                            <strong>{{ $errors->first('senha') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('senha_confirmacao') ? 'has-error' : '' }}">
                    <input type="password" name="senha_confirmacao" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('senha_confirmacao'))
                        <span class="help-block">
                            <strong>{{ $errors->first('senha_confirmacao') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('adminlte::adminlte.reset_password') }}</button>
            </form>
			<div class="auth-links">
                <a href="{{ route('login') }}"
                   class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
