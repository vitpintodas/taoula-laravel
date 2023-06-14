<?php

namespace App\Http\Controllers;

use App\Models\Sondagedefisconcour;
use Illuminate\Http\Request;

class SondageDefisConcourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sondageDefisConcour = Sondagedefisconcour::findOrFail($id);
        return response()->json($sondageDefisConcour);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
