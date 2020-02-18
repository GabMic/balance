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
            <form action="{{route('activities.update', $activity)}}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="field" label="{{__('general.payment-type')}}">
                    <div class="select">
                        <select placeholder="{{__('general.payment-type')}}"   name="type_id" style="text-align: {{auth()->user()->locale == 'he' ? 'right' : 'left'}}">

                            @forelse($user->type as $type)
                                <option value="{{$type->id}}">{{ $type->name }}</option>
                            @empty
                                <option>{{__('general.no-tags-added')}}</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="field" label="{{__('general.amount-paid')}}">
                    <input type="number" placeholder="{{__('general.amount-paid')}}" class="input @error('amount') is-danger @enderror"  name="amount" step="0.01" value="{{$activity->amount}}"></input>
                </div>
                <div class="field" label="{{__('general.payment-method')}}">
                    <div class="select">
                        <select placeholder="{{__('general.payment-method')}}" name="method_id" style="text-align: {{auth()->user()->locale == 'he' ? 'right' : 'left'}}">
                            @forelse($methods as $method)
                                <option value="{{$method->id}}">{{ auth()->user()->locale == 'he' ? $method->type : $method->english_type }}</option>
                            @empty
                                <option>{{__('general.problem-with-methods')}}</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="field" label="{{__('general.bill-paid-at')}}">
                    <input type="datetime-local" id="paid_at" name="paid_at" class="input @error('paid_at') is-danger @enderror" value="{{$activity->paid_at}}">
                </div>


                <label class="label" style="margin-top: 2rem; font-size: 1.3rem">{{__('general.optional-activity-form-inputs')}}</label>


                    <b-field label="{{__('general.payment-confirmation')}}">
                        <b-input type="number" placeholder="{{__('general.payment-confirmation')}}" custom-class="@error('confirmation') is-danger @enderror"  name="confirmation" value="{{$activity->confirmation}}"></b-input>
                    </b-field>

                    <b-field label="{{__('general.bill-number')}}">
                        <b-input type="number"  placeholder="{{__('general.bill-number')}}" custom-class="@error('bill_id') is-danger @enderror"  name="bill_id" value="{{$activity->bill_id}}"></b-input>
                    </b-field>


                    <b-field label="{{__('general.additional-info')}}">
                        <b-input type="text" placeholder="{{__('general.additional-info')}}" custom-class="@error('info') is-danger @enderror" name="info" value="{{$activity->info}}"></b-input>
                    </b-field>

                    <b-field label="{{__('general.bill-picture')}}">
                        <b-input type="file" placeholder="{{__('general.bill-picture')}}"  name="image" accept="image/*"></b-input>
                    </b-field>
                @if($errors->any())
                    <p class="help is-danger">{{__('general.fix-errors-in-form')}}</p>
                @endif
                <b-button onclick="this.classList.add('is-loading')" type="is-success is-fullwidth"  native-type="submit" style="margin-top: 1rem">{{__('general.bill-form-submit')}}</b-button>
            </form>
        </div>
    </div>
@endsection
