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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        JavaScript::put(['emptyNotes' => __('general.no-notes')]);

        if(Auth::check()){
            $user = Auth::user();
            $currentMonthBudget = Auth::user()->budget();
            $totalExpensesThisMonth = Auth::user()->activity();
            $budgetStatus =($totalExpensesThisMonth / $currentMonthBudget)* 100;
//            dd($currentMonthBudget, $totalExpensesThisMonth, $budgetStatus);
            return view('home', compact('user', 'budgetStatus', 'currentMonthBudget', 'totalExpensesThisMonth'));
        }else{
            $tasks = null;
            $currentMonthBudget = null;
            $totalExpensesThisMonth = null;
            $budgetStatus = null;
            return view('home', compact('tasks', 'budgetStatus', 'currentMonthBudget', 'totalExpensesThisMonth'));

        }
    }
}
