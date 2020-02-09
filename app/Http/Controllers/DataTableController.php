<?php

namespace App\Http\Controllers;


class DataTableController extends Controller
{
    public function index()
    {
        $types = auth()->user()->Type()->get();
        $types->makeHidden(['created_at', 'updated_at']);
        $columns = ["id", "name", "consumer_number"];
        return ['dataset' => $types, 'columns' => $columns];

    }

    public function fetchAfterDeletedType()
    {
        $types = auth()->user()->Type()->get();
        $types->makeHidden(['created_at', 'updated_at']);
        return ['dataset' => $types];
    }
}
