@extends('layouts.app')
@section('content')
<div class="login-box" >
    <div class="login-logo">
            
          

              
        <div class="login-logo">
            <a href="#">
             {{-- <i>DIRECTORY PRO </i> --}}
            </a>
        </div>
    </div>
    <div class="card">

        <div class="card-body login-card-body">
                
                <h3 ><img src="images/logo.jpg" style="width:120px;height:90px;margin-left:90px"></h3>
               
            <p class="login-box-msg" ><i class="fa fa-lock">

                </i>-<strong>Sign in to start your session</strong> </p>
            @if(\Session::has('message'))
                <p class="alert alert-info">
                    {{ \Session::get('message') }}
                </p>
            @endif
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="{{ trans('global.login_email') }}" name="email" required>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="{{ trans('global.login_password') }}" name="password">
                    </div>
                </div>
                <div class="row">
                   
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn btn-block btn-flat" style="background:#d07c7c;margin-left:230px">{{ trans('global.login') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>



           {{-- <p class="mb-1">
                <a class="" href="{{ route('password.request') }}">
                    {{ trans('global.forgot_password') }}
                </a>
            </p>
            <p class="mb-0">

            </p>
            <p class="mb-1">

            </p>--}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection