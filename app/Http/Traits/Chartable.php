<?php


namespace App\Http\Traits;


use App\Activity;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

trait Chartable
{
    public function buildChartData($type){

        $paymentAmountArray = [];
        for($i = 1; $i <= 12; $i++){
            $amount = Activity::where('type_id', $type->id)->where('user_id', Auth::user()->id)->whereMonth('paid_at', $i)->pluck('amount');
            $noAmount = count($amount);
            $noAmount != 0 ? array_push($paymentAmountArray, $amount) : array_push($paymentAmountArray, $noAmount);
        }
         return Arr::flatten($paymentAmountArray);
    }
}
