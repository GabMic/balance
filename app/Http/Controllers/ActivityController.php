<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {

        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'type_id' => 'required',
            'paid_at' => 'required',
            'amount' => 'required',
            'confirmation' => 'required',
            'info' => 'required',
            'bill_id' => 'required',
            'method_id' => 'required'
        ]);

        $request->file('image') ? $image = UploadImage::upload($request->file('image')): $image = '';

        Activity::create(["user_id" => Auth::user()->id, 'image' => $image] + $attributes);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Activity $activity
     * @return Factory|View
     * @throws \Illuminate\Auth\Access\AuthorizationException
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
     * @return Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
