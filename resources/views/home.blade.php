@extends('layouts.app')
@section('title', 'Balance - Your Financial Place')

@section('content')
@include('partials.overview')
@auth
<section class="section m-0">
    <div class="columns is-centered m-1">

        <div class="column is-6">
            <h3 class="title is-3">{{__('general.my-notes')}}</h3>
                <tasks :tasks="{{$user->tasks()}}"></tasks>
        </div>
    </div>
</section>
@endauth

@endsection
