<?php

namespace App\Http\Controllers;

use App\Models\Quack;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $quacks = Quack::all();

        if($quacks->isEmpty()) {
            return response()->json([], 404);
        }

        return response()->json($quacks, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $request->user()->quacks()->create($validated);

        return response()->json($validated, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quack $quack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quack $quack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quack $quack): JsonResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $request->user()->quacks()->where('id', $quack->id)->update($validated);

        return response()->json($validated, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quack $quack): JsonResponse
    {
        $quack->delete();

        return response()->json([], 204);
    }
}
