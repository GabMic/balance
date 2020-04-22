<?php


namespace App\Http\Traits;


use Carbon\Carbon;

trait GetSubMonthsArray
{
    public function getSubMonthsArray()
    {
        $subMonthesArray = [];
        for($i = 1; $i <= 6; $i++ ){
            $obj = (object) [];
            $month = Carbon::now()->subMonth($i)->month;
            $monthName = Carbon::now()->subMonth($i)->monthName;
            $year = Carbon::now()->subMonth($i)->year;
            $obj->month = $month;
            $obj->year = $year;
            $obj->monthName = $monthName;
            array_push($subMonthesArray, $obj);
            $obj = (object) [];
        }
        return $subMonthesArray;
    }
}
