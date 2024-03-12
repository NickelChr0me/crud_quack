<?php

namespace App\Http\Controllers;

use App\Models\Quack;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('quacks.index');
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $request->user()->quacks()->create($validated);

        return redirect(route('quacks.index'));
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
    public function update(Request $request, Quack $quack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quack $quack)
    {
        //
    }
}
