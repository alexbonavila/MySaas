
@extends('layouts.auth')

@section('htmlheader_title')
    Pricing Table
@endsection

@section('content')
    <body class="hold-transition login-page">
    <div class="login-logo">
        <br /><a href="{{ url('/home') }}"><b>My</b>SaaS</a>
    </div><!-- /.login-logo -->

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="pricing pricing--sonam">
        <div class="pricing__item">
            <h3 class="pricing__title">Startup</h3>
            <div class="pricing__price"><span class="pricing__currency">Free</span></div>
            <p class="pricing__sentence">Small business solution</p>
            <ul class="pricing__feature-list">
                <li class="pricing__feature">Basic Dashboard</li>
                <li class="pricing__feature">Free hosting</li>
            </ul>
            <a href="{{url('register')}}" class="pricing__action">Choose plan</a>
        </div>
        <div class="pricing__item">
            <h3 class="pricing__title">Standard</h3>
            <div class="pricing__price"><span class="pricing__currency">€</span>25,00</div>
            <p class="pricing__sentence">Standard</p>
            <ul class="pricing__feature-list">
                <li class="pricing__feature">Standard Dashboard</li>
                <li class="pricing__feature">Standard hosting</li>
            </ul>
            <a href="{{url('register_subsciption')}}" class="pricing__action">Choose plan</a>
        </div>
        <div class="pricing__item">
            <h3 class="pricing__title">Professional</h3>
            <div class="pricing__price"><span class="pricing__currency">€</span>100,00</div>
            <p class="pricing__sentence">Pro</p>
            <ul class="pricing__feature-list">
                <li class="pricing__feature">Pro Dashboard</li>
                <li class="pricing__feature">Pro hosting</li>
                <li class="pricing__feature">Assistence</li>
            </ul>
            <a href="{{url('register_subsciption')}}" class="pricing__action">Choose plan</a>
        </div>
    </div>
@endsection