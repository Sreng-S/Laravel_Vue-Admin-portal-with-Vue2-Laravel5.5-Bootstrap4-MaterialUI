@extends('spark::layouts.app')

@section('content')
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="card-box">
            <div class="panel-heading">
                <h4 class="text-center"> Login to <strong>PI.TEAM</strong></h4>
            </div>
            <div class="p-20">
                @include('spark::shared.errors')
                <form class="form-horizontal m-t-20" role="form" method="POST" action="/login">
                    {{ csrf_field() }}
                    <div class="form-group-custom">
                        <input type="email" id="user-name" name="email" value="{{ old('email') }}" autofocus required="required"/>
                        <label class="control-label" for="user-name">E-Mail Address</label><i class="bar"></i>
                    </div>
                    <div class="form-group-custom">
                        <input type="password" id="user-password" name="password" required="required"/>
                        <label class="control-label" for="user-password">Password</label><i class="bar"></i>
                    </div>
                    <div class="form-group ">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" name="remember">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-12">
                            <button class="btn btn-success btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Log In
                            </button>
                        </div>
                    </div>
                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-12">
                            <a class="text-dark" href="{{ url('/password/reset') }}"><i class="fa fa-lock m-r-5"></i>Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="text-white">Don't have an account? <a href="/register" class="text-white m-l-5"><b>Sign Up</b></a>
                </p>

            </div>
        </div>
    </div>
@endsection
