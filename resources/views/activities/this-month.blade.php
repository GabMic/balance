@extends('layouts.app')

@section('title')
   Balance - {{__('general.number-of-activities-made-this-month')}}
@endsection

@section('content')
    <h1 class="title is-1-mobile m-1">{{$activities->count()}} {{__('general.number-of-activities-made-this-month')}}.</h1>
    <div class="columns is-multiline m-1">
        @foreach($activities as $activity)
            <div class="column is-4">
                <div class="list is-hoverable">
                    <a class="list-item"> {{__('general.payments-list.amount')}}{{$activity->amount}} {{__('general.currency')}}</a>
                    <a class="list-item">
                        {{__('general.payments-list.info')}} {{$activity->info}}
                    </a>
                    <a class="list-item">
                        {{__('general.payments-list.bill_number')}} {{$activity->bill_id}}
                    </a>
                    <a class="list-item">
                        {{__('general.payments-list.paid_at')}} {{$activity->paid_at}}
                    </a>
                    <a class="list-item">
                        {{__('general.payment-method')}}: {{auth()->user()->locale == 'he' ? $activity->method->type :$activity->method->english_type}}
                    </a>
                    <div class="list-item">
                        <a class="button is-link " href="{{route('activities.show', $activity)}}">{{__('general.more-about-activity')}}</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
