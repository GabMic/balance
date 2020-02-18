@extends('layouts.app')
@section('title')
    {{__('general.new-activity')}}
@endsection
@section('css')
    <style>
        h3 {
            display: grid;
            width: 100%;
            align-items: center;
            text-align: center;
            grid-template-columns: minmax(20px, 1fr) auto minmax(20px, 1fr);
            grid-gap: 20px;
            font-weight: 400;
            font-size: 28px;
            color: #818078;
            margin: 3rem 0 3rem;
        }

        h3:before,
        h3:after {
            content: '';
            height: 1px;
        }

        h3:after {
            background: linear-gradient(to right, transparent, #818078);
        }

        h3:before {
            background: linear-gradient(to right, #818078, transparent);
        }
    </style>

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
            <div class="field">
                <label class="label">{{__('general.payment-type')}}</label>
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
            <b-field label="{{__('general.amount-paid')}}">
                <b-input type="number" placeholder="{{__('general.amount-paid')}}" custom-class="@error('amount') is-danger @enderror"  name="amount" step="0.01" value="{{old('amount')}}"></b-input>
            </b-field>
            <div class="field">
                <label class="label">{{__('general.payment-method')}}</label>
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
            <div class="field">
                <label class="label">{{__('general.bill-paid-at')}}</label>
                <div class="control">
                    <input type="datetime-local" id="paid_at" name="paid_at" class="input @error('paid_at') is-danger @enderror" value="{{old('paid_at')}}">
                </div>
            </div>

            <h3>{{__('general.optional-activity-form-inputs')}}</h3>

                <b-field label="{{__('general.payment-confirmation')}}">
                    <b-input type="number" placeholder="{{__('general.payment-confirmation')}}" custom-class="@error('confirmation') is-danger @enderror"  name="confirmation" value="{{old('confirmation')}}"></b-input>
                </b-field>

                <b-field label="{{__('general.bill-number')}}">
                    <b-input type="number"  placeholder="{{__('general.bill-number')}}" custom-class="@error('bill_id') is-danger @enderror"  name="bill_id" value="{{old('bill_id')}}"></b-input>
                </b-field>

                <b-field label="{{__('general.additional-info')}}">
                    <b-input type="text" placeholder="{{__('general.additional-info')}}" custom-class="@error('info') is-danger @enderror" name="info" value="{{old('info')}}"></b-input>
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
