<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use stdClass;

class BudgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {


        $currentMonthBudget = Arr::first( Auth::user()->budget()->pluck('budget'));
        $totalExpensesThisMonth = Auth::user()->activity()->whereMonth('paid_at', Carbon::now()->month)->sum('amount');
        $budgetStatus = $currentMonthBudget - $totalExpensesThisMonth;

        $budgetInfo = (object)[
            "forMonth" => Carbon::now()->monthName,
            "currentMonthBudget" => $currentMonthBudget,
            "totalExpensesThisMonth" => $totalExpensesThisMonth,
            "budgetStatus" => $budgetStatus
        ];


        return view('budget.index', compact('budgetInfo'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $attr = $request->validate(['budget' => 'required|numeric|min:1|max:1000000']);
        Budget::updateOrCreate(['user_id' => Auth::id()], $attr);
        return back()->with('flash', 'התקציב נוצר בהצלחה');
    }

}
