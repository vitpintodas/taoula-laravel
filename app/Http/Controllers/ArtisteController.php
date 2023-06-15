<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;

class ArtisteController extends Controller
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
        $artiste = Artiste::create($request->all());
        return response()->json($artiste);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artiste = Artiste::findOrFail($id);
        return response()->json($artiste);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artiste = Artiste::findOrFail($id);
        $artiste->update($request->all());
        return response()->json($artiste, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artiste = Artiste::findOrFail($id);
        $artiste->delete();

        return response()->json(null, 204);
    }
}
