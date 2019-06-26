@extends('inside::layouts.login')
@section('content')
<div class="cls-content-sm panel">
    <div class="panel-body">
        <p class="pad-btm"><strong>Đăng nhập hệ thống</strong></p>
        <form method="post">

            @if(\Session::has('message'))
            <div class="alert alert-danger fade in">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                {{\Session::get('message')}}
            </div>
            @endif

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input name="email" type="text" placeholder="Email" class="form-control" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                    <input name="password" type="password" class="form-control" value="{{ old('password') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 text-left checkbox">
                    <label class="form-checkbox form-normal form-primary form-text">
                        <input type="checkbox" name="is_remember_me" value="1"> Ghi nhớ
                    </label>
                </div>
                <div class="col-lg-7 col-lg-offset-3">
                    <button type="submit" class="btn btn-primary btn-labeled fa fa-user fa-lg" name="signup" value="Sign up">Đăng nhập</button>
                    <input type="hidden" value="{!! csrf_token() !!}" name="_token">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection