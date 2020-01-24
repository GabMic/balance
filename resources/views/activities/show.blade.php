@extends('layouts.app')

@section('title')
    {{__('general.activity-meta-title')}}
@endsection

@section('content')
    <h1 class="title is-1-mobile has-text-centered">{{__('general.activity-overview')}}</h1>
<div class="columns is-centered m-1">

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
                {{__('general.payment-method')}}: {{$activity->method->type}}
            </a>
        </div>
    </div>
    <div class="column is-5">
        <figure class="image is-3by2">
            @if($activity->image)
                <a href="{{asset($activity->image)}}" download>
                    <img src="{{asset($activity->image)}}" title="{{__('general.click-to-download')}}">
                </a>
            @else
                <img src="{{asset('storage/icons/no-image.png')}}">
            @endif
        </figure>
        <p class="help is-info">{{__('general.click-to-download')}}</p>
    </div>
</div>
@endsection
