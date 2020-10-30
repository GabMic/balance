@extends('layouts.app')
@section('title', 'יצירת שיטת תשלום חדשה')

@section('content')
<div class="columns is-centered m-1">
    <div class="column is-5">
        @if($errors->any())
            @include('partials.form-errors')
        @endif
        <h1 class="title is-1-mobile">הוספת שיטת תשלום</h1>
        <form action="{{route('methods.store')}}" method="post">
            @csrf
            <b-field label="שם השיטה בעברית">
                <b-input type="text" placeholder="שם השיטה בעברית" custom-class="@error('type') is-danger @enderror" name="type" value="{{old('type')}}"></b-input>
            </b-field>

            <b-field label="שם השיטה באנגלית">
                <b-input type="text" placeholder="שם השיטה באנגלית" custom-class="@error('english_type') is-danger @enderror" name="english_type" value="{{old('english_type')}}"></b-input>
            </b-field>

            <b-button  type="{{$errors->any() ? 'is-danger' : 'is-success'}} is-fullwidth"  outlined native-type="submit">
                {{$errors->any() ? 'FIX ERRORS ABOVE FIRST AND RE-SEND' :  __('general.bill-form-submit')}}
            </b-button>
        </form>
    </div>
</div>
@endsection
