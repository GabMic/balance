<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use JavaScript;

class HomeController extends Controller
{

    /**
     * Show the application homepage.
     *
     * @return Factory|View
     */
    public function __invoke()
    {

        JavaScript::put(['emptyNotes' => __('general.no-notes')]);

        if (Auth::check()) {
            $currentMonthBudget = Arr::first( Auth::user()->budget()->pluck('budget'));
            $totalExpensesThisMonth = Auth::user()->activity()->whereMonth('paid_at', Carbon::now()->month)->sum('amount');
            $budgetStatus = number_format(($totalExpensesThisMonth / $currentMonthBudget) * 100, 2);
            return view('home', compact( 'budgetStatus', 'currentMonthBudget', 'totalExpensesThisMonth'));
        }
        return view('home');
    }
}
