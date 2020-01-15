@extends('layouts.app')
@section('title','Register to Balance')
@section('css')
    <style>
        .hero .nav, .hero.is-success .nav {
            box-shadow: none;
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
        p.subtitle {
            padding-top: 1rem;
        }
    </style>
@endsection
@section('content')
    <section class="hero">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns is-centered">
                    <div class="column is-4">
                        <div class="box">
                            <figure class="avatar">
                                <img src="{{asset('storage/icons/login.png')}}">
                            </figure>
                            <form class="login-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="text" name="name" id="name" placeholder="שם מלא"  value="{{ old('name') }}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <p class="help is-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="email" name="email" id="email" placeholder="דואר אלקטרוני"  value="{{ old('email') }}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <p class="help is-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" id="password" type="password" autocomplete="password" placeholder="סיסמה"  name="password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <p class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" id="password-confirm"  type="password" placeholder="אימות סיסמה" autocomplete="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>
                                <button class="button is-block is-info is-large is-fullwidth" type="submit">הרשמה</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
