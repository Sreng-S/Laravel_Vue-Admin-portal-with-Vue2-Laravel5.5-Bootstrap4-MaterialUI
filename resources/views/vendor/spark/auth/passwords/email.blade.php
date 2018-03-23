@extends('spark::layouts.app')

<!-- Main Content -->
@section('content')
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h4 class="text-center"> Reset Password </h4>
            </div>

            <div class="p-20">
                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                    {!! csrf_field() !!}
                    <div class="alert alert-info alert-dismissable">
                        Enter your <b>Email</b> and instructions will be sent to you!
                    </div>
                    <!-- E-Mail Address -->
                    <div class="form-group-custom m-t-40 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" name="email" value="{{ old('email') }}" autofocus required="required"/>
                        <label class="control-label" for="user-email">E-Mail Address</label><i class="bar"></i>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <!-- Send Password Reset Link Button -->
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-success btn-block text-uppercase waves-effect waves-light" type="submit"><i class="fa fa-btn fa-envelope"></i> Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
