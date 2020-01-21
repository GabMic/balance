@extends('layouts.app')
@section('title')
    {{__('general.new-activity')}}
@endsection

@section('content')
<div class="columns is-centered m-1">
    <div class="column is-5">
        <h1 class="title is-1-mobile"> {{__('general.new-activity')}}</h1>
        @if($errors->any())
            @include('partials.form-errors')
        @endif
        <form action="{{route('activities.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <b-field label="{{__('general.payment-type')}}">

                <b-select placeholder="{{__('general.payment-type')}}"   name="type_id" style="text-align: {{auth()->check() && auth()->user()->locale == 'he' ? 'right' : 'left'}}">

                    @forelse($globalBalanceData['types'] as $type)
                        <option value="{{$type->id}}">{{ $type->name }}</option>
                        @empty
                        <option>{{__('general.no-tags-added')}}</option>
                    @endforelse

                </b-select>

            </b-field>
            <b-field label="{{__('general.amount-paid')}}">
                <b-input type="number" placeholder="{{__('general.amount-paid')}}" custom-class="@error('amount') is-danger @enderror"  name="amount" step="0.01" value="{{old('amount')}}"></b-input>
            </b-field>
            <b-field label="{{__('general.payment-method')}}">
                <b-select placeholder="{{__('general.payment-method')}}" name="method_id" style="text-align: {{auth()->check() && auth()->user()->locale == 'he' ? 'right' : 'left'}}">
                    @forelse($globalBalanceData['methods'] as $method)
                        <option value="{{$method->id}}">{{ auth()->check() && auth()->user()->locale == 'he' ? $method->type : $method->english_type }}</option>
                    @empty
                        <option>{{__('general.problem-with-methods')}}</option>
                    @endforelse
                </b-select>
            </b-field>
            <b-field label="{{__('general.payment-confirmation')}}">
                <b-input type="number" placeholder="{{__('general.payment-confirmation')}}" custom-class="@error('confirmation') is-danger @enderror"  name="confirmation" value="{{old('confirmation')}}"></b-input>
            </b-field>
            <b-field label="{{__('general.bill-number')}}">
                <b-input type="number"  placeholder="{{__('general.bill-number')}}" custom-class="@error('bill_id') is-danger @enderror"  name="bill_id" value="{{old('bill_id')}}"></b-input>
            </b-field>
            <b-field label="{{__('general.bill-paid-at')}}">
                <input type="datetime-local" id="paid_at" name="paid_at" class="input @error('paid_at') is-danger @enderror" value="{{old('paid_at')}}">
            </b-field>
            <b-field label="{{__('general.additional-info')}}">
                <b-input type="text" placeholder="{{__('general.additional-info')}}" custom-class="@error('info') is-danger @enderror" name="info" value="{{old('info')}}"></b-input>
            </b-field>
            <b-field label="{{__('general.bill-picture')}}">
                <b-input type="file" placeholder="{{__('general.bill-picture')}}"  name="image"></b-input>
            </b-field>
            <b-button  type="{{$errors->any() ? 'is-danger' : 'is-success'}} is-fullwidth"  outlined native-type="submit">
                {{$errors->any() ? 'FIX ERRORS ABOVE FIRST AND RE-SEND' :  __('general.bill-form-submit')}}
            </b-button>
        </form>
    </div>
</div>
@endsection
