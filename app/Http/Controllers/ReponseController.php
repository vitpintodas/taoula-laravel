<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use Illuminate\Http\Request;

class ReponseController extends Controller
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
        $reponse = Reponse::findOrFail($request);
        return response()->json($reponse);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reponse = Reponse::findOrFail($id);
        return response()->json($reponse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reponse = Reponse::findOrFail($id);
        $reponse->update($request->all());
        return response()->json($reponse, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reponse = Reponse::findOrFail($id);
        $reponse->delete();

        return response()->json(null, 204);
    }
}
