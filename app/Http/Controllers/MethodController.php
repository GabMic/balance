<?php

namespace App\Http\Controllers;

use App\Method;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StoreMethod;

class MethodController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
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
     * @return Response
     */
    public function create()
    {
        return view('methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreMethod $request)
    {
        
        $attributes = $request->validated();

        Method::create($attributes);
        return back()->with('flash', 'שיטת התשלום נוצרה בהצלחה');;
    }

    /**
     * Display the specified resource.
     *
     * @param Method $method
     * @return Response
     */
    public function show(Method $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Method $method
     * @return Response
     */
    public function edit(Method $method)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Method $method
     * @return Response
     */
    public function update(Request $request, Method $method)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Method $method
     * @return Response
     */
    public function destroy(Method $method)
    {
        //
    }
}
