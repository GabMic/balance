<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        Auth::check() ? $tasks = Auth::user()->task() : $tasks = null;
        $month = Carbon::now()->monthName;
        $currentMonthBudget = auth()->check() && auth()->user()->budget() ? auth()->user()->budget() : '1';
        $totalExpensesThisMonth = auth()->check() && auth()->user()->activity() ? auth()->user()->activity() : '1';
        $budgetStatus = number_format(($totalExpensesThisMonth / $currentMonthBudget) * 100);
        JavaScript::put(['emptyNotes' => __('general.no-notes')]);
        return view('home', compact('tasks', 'month', 'budgetStatus', 'currentMonthBudget', 'totalExpensesThisMonth'));
    }
}
