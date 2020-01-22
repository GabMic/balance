@extends('layouts.app')
@section('title','Reset Password')
@section('css')
    <style>
        .hero.is-success {
            background: #F2F6FA;
        }
        .box {
            margin-top: 5rem;
        }
        .avatar {
            margin-top: -70px;
            padding-bottom: 20px;
        }
        .avatar img {
            padding: 5px;
            background: #fff;
            border-radius: 50%;
            -webkit-box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
            box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
        }
        input {
            font-weight: 500;
        }
        .input {
            font-weight: 300;
            border-color: #311818;
            border-radius: 0;
        }
        p {
            font-weight: 700;
        }
    </style>
@endsection
@section('content')
    <section class="hero is-success">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns is-centered">
                    <div class="column is-4">
                        <h3 class="title has-text-grey">Reset Password</h3>
                        <div class="box">
                            <figure class="avatar">
                                <img src="{{asset('storage/icons/reset.png')}}">
                            </figure>
                            <form class="login-form" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="email" name="email" id="email" placeholder="E-Mail"  value="{{ old('email') }}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <p class="help is-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" id="password" autocomplete="on" type="password" placeholder="Password"  name="password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <p class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" id="password-confirm" autocomplete="on" type="password" placeholder="Confirm Password"  name="password_confirmation">
                                    </div>
                                </div>
                                <button class="button is-block is-info is-large is-fullwidth" type="submit">RESET</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
