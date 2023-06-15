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
        $sondageDefisConcour = Sondagedefisconcour::create($request->all());
        return response()->json($sondageDefisConcour);
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
        $sondageDefisConcour = Sondagedefisconcour::findOrFail($id);
        $sondageDefisConcour->update($request->all());
        return response()->json($sondageDefisConcour, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sondageDefisConcour = Sondagedefisconcour::findOrFail($id);
        $sondageDefisConcour->delete();

        return response()->json(null, 204);
    }
}
