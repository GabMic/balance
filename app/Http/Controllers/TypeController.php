<?php

namespace App\Http\Controllers;

use App\Http\Traits\Chartable;
use App\Type;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use JavaScript;

class TypeController extends Controller
{
    // TODO complete this model CRUD functions

    use Chartable;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $types = Type::with('activity')->get();
        $sums = [];
        $types->each(function($type){
            dd($type->activity->whereMonth('paid_at', '02')->sum('amount'), $type->name);
        });

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $attributes = $request->validate([
            "name" => 'string|required',
            "consumer_number" => 'numeric'
        ]);

        Type::create($attributes + ['user_id' => auth()->user()->id]);
        return back();
    }


    public function show(Type $type)
    {
        list($year, $month) = $this->date();

        $chartData = $this->buildChartData($type, $year);

        $currentMonthTypeActivitiesList = $type->activity($month, $year)->get();

        JavaScript::put([
            "amounts" => Arr::flatten($chartData),
            "nameOfChart" => $type->name,
            'typeActivitiesList' => $currentMonthTypeActivitiesList,
            'type' => $type,
            'paymentsListString' => __('general.payments-list'),
            'monthsArray' => auth()->user()->locale == 'he' ? config('settings.months.hebrew') : config('settings.months.english'),
            'paidThisYear' => __('general.paidThisYear')
        ]);

        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Type $type
     * @return Response
     */
    public function edit(Type $type)
    {
        //
    }


    public function update($typeId)
    {
        $type = Type::find($typeId);
        $chartData = $this->buildChartData($type, request()->year);
        $typeActivitiesList = $type->activity()->get();
        if (request()->expectsJson()) {
            return ["amounts" => Arr::flatten($chartData)];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Type $type
     * @return Response
     */
    public function destroy(Type $type)
    {

    }

    /**
     * @return array
     */
    public function date(): array
    {
        $date = Carbon::now();
        $year = request()->has('year') ? request()->year : $date->year;
        $month = $date->month;
        return array($year, $month);
    }
}
