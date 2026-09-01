<?php

namespace App\Http\Controllers;

use App\Models\Sorteo;

class SorteoController extends Controller
{
    public function index()
    {
        $sorteos = Sorteo::with('productos')->get();

        return response()->json($sorteos);
    }
}