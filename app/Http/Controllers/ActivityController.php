<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Method;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreActivity;
use Illuminate\Contracts\View\Factory;

class ActivityController extends Controller
{

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
        $day = request('day');
        return Auth::user()->activityForToday($day)->pluck('amount')->sum();
        //return view('activities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $methods = Method::all(['id', 'type', 'english_type']);
        $types = Auth::user()->type()->orderBy('name', 'asc')->get();
        return view('activities.create', compact('methods', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreActivity $request
     * @return RedirectResponse
     */
    public function store(StoreActivity $request)
    {
        $request->file('image') ? $image = UploadImage::upload($request->file('image')) : $image = '';

        $attributes = $request->validated();

        Activity::create(["user_id" => Auth::id()] + $attributes + ['image' => $image]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Activity $activity
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function show(Activity $activity)
    {
        $this->authorize('view', $activity);
        return view('activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Activity $activity
     * @return Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Activity $activity
     * @return Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Activity $activity
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect('/');

    }

    public function today(){
        $day = Carbon::now()->day;
        $activities = Auth::user()->activityForToday($day)->get();
        return view('activities.today', compact('activities'));
    }
}
