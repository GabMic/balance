<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
        $month = Carbon::now()->monthName;
        $currentMonthBudget = auth()->user()->budget();
        $totalExpensesThisMonth = auth()->user()->activity();
        $budgetStatus = $currentMonthBudget - $totalExpensesThisMonth;
//        dd($currentMonthBudget, $totalExpensesThisMonth, $budgetStatus, $month);

        return view('budget.index', compact('currentMonthBudget', 'totalExpensesThisMonth', 'budgetStatus', 'month'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate(['budget' => 'required|numeric|min:1|max:1000000']);
        Budget::create($attr + ['user_id' => Auth::user()->id]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Budget $budget
     * @return Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Budget $budget
     * @return Response
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Budget $budget
     * @return Response
     */
    public function update(Request $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Budget $budget
     * @return Response
     */
    public function destroy(Budget $budget)
    {
        //
    }
}
