@extends('layouts.app')

@section('title', 'Loyalty Tap')

@section('content')
    <div class="row" style="padding:3%;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="ch-login-box ">

                        <img src="images/loading.gif" class="ch-loading-box center-block"/>

                        <h3 class="text-center">Welcome back to XimpleTap!</h3>
                        <br /><br />
                        {{ Form::open(array('url' => '/submit_login')) }}
                        {{ Form::text('username',null,array('class'=>'form-control','placeholder'=>'Username')) }}
                        <br />
                        {{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control' ) ) }}
                        <br />
                        {{  Form::submit('Login',array('class'=>'btn btn-primary btn-block')) }}
                        <br />
                        {{  Form::button('Login with Facebook',array('class'=>'btn btn-default btn-block')) }}
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
@endsection