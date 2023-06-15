<?php

namespace App\Http\Controllers;

use App\Models\Titre;
use Illuminate\Http\Request;

class TitreController extends Controller
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
        $titre = Titre::create($request->all());
        return response()->json($titre);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $titre = Titre::findOrFail($id);
        return response()->json($titre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $titre = Titre::findOrFail($id);
        $titre->update($request->all());
        return response()->json($titre, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $titre = Titre::findOrFail($id);
        $titre->delete();

        return response()->json(null, 204);
    }
}
