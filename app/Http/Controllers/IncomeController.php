<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IncomeController extends Controller
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

        $incomeInfo = Auth::user()->income()->get();


        return view('income.index', compact('incomeInfo'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $attr = $request->validate(['amount' => 'required|numeric|min:0|max:1000000', 'info' => 'required']);
        Income::updateOrCreate(['user_id' => Auth::id()], $attr);
        return back()->with('flash', 'ההכנסה עודכנה');
    }
}
