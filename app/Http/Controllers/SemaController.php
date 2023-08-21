<?php

namespace App\Http\Controllers;

use App\Models\Sema;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class SemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Semas/Index', [
            //
            'semas' => Sema::with('user:id,name')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->semas()->create($validated);

        return redirect(route('semas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Sema $sema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sema $sema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sema $sema)
    {
        $this->authorize('update', $sema);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $sema->update($validated);

        return redirect(route('semas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sema $sema)
    {
        //
    }
}
