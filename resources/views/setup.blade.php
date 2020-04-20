@extends('layouts.setup')
@section('title')
    {{__('general.setup-new-user.welcome-title')}}
@endsection


@section('content')
    <div class="columns is-centered m-1">
        <div class="column is-8">

            <section class="hero">
                <div class="hero-body">
                    <div class="container has-text-centered">
                        <h2 class="subtitle">{{__('general.setup-new-user.welcome-title')}}</h2>
                        <h1 class="title">{{__('general.setup-new-user.welcome-info')}}</h1>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="level is-mobile">
                    <div class="level-left">
                        <div class="level-item">
                            <a class="navbar-item he" onclick='setLanguage(this.classList[1])' style="padding-right: 0">
                                <img src="{{asset('/storage/icons/flags/il.png')}}" alt="עברית">
                            </a>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <a class="navbar-item en" onclick='setLanguage(this.classList[1])' style="padding-right: 0">
                                <img src="{{asset('/storage/icons/flags/us.png')}}" alt="English">
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <h1 class="title">{{__('general.setup-new-user.tags.title')}}</h1>
                <h4 class="subtitle is-4">{{__('general.setup-new-user.tags.info')}}</h4>
                <hr>
                <h3 class="title is-3">{{__('general.new-tag')}}</h3>
                <hr>
                <form action="{{route('types.store')}}" method="post">
                    @csrf
                    <b-field label="{{__('general.new-tag-name')}}">
                        <b-input type="text" placeholder="{{__('general.new-tag-name')}}"
                                 custom-class="@error('name') is-danger @enderror" name="name"
                                 value="{{old('name')}}"></b-input>
                    </b-field>
                    <b-button type="{{$errors->any() ? 'is-danger' : 'is-success'}} is-fullwidth" outlined
                              native-type="submit">
                        {{$errors->any() ? 'FIX ERRORS ABOVE FIRST AND RE-SEND' :  __('general.bill-form-submit')}}
                    </b-button>
                </form>

                <hr>
                @include('partials.form-errors')
            </section>

            <section class="section">
                <h1 class="title">{{__('general.setup-new-user.budget.title')}}</h1>
                <h4 class="subtitle is-4">{{__('general.setup-new-user.budget.info')}}</h4>
                <hr>

                <h5 class="subtitle is-5">{{__('general.set-new-budget-for')}} <b>{{$month ?? ''}}</b></h5>
                <form action="{{route('budget.store')}}" method="post">
                    @csrf
                    <div class="field">
                        <div class="control">
                            <input type="number" class="input @error('budget') is-danger @enderror" step="0.01" min="1"
                                   name="budget" placeholder="{{__('general.what-budget-would-you-like-to-hold')}}">
                        </div>
                    </div>
                    <button
                        class="button is-fullwidth is-success is-outlined">{{__('general.bill-form-submit')}}</button>
                </form>

                <a href="/" class="button is-success is-fullwidth"
                   style="margin-top: 1.5rem">{{__('general.setup-new-user.finish-setup')}}</a>
            </section>
        </div>
    </div>
@endsection
