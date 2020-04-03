@extends('layouts.app')
@section('title'){{__('general.new-tag')}}@endsection

@section('content')
<div class="columns is-centered m-1">
    <div class="column is-5">
        @if($errors->any())
            @include('partials.form-errors')
        @endif
        <h1 class="title is-1-mobile">{{__('general.new-tag')}}</h1>
        <form action="{{route('types.store')}}" method="post">
            @csrf
            <b-field label="{{__('general.new-tag-name')}}">
                <b-input type="text" placeholder="{{__('general.new-tag-name')}}" custom-class="@error('name') is-danger @enderror" name="name" value="{{old('name')}}"></b-input>
            </b-field>
            <b-button  type="{{$errors->any() ? 'is-danger' : 'is-success'}} is-fullwidth"  outlined native-type="submit">
                {{$errors->any() ? 'FIX ERRORS ABOVE FIRST AND RE-SEND' :  __('general.bill-form-submit')}}
            </b-button>
        </form>
    </div>
</div>
@endsection
