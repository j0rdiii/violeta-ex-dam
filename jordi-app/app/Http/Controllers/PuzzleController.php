<?php

namespace App\Http\Controllers;

use App\Models\Puzzle;
use Illuminate\Http\Request;

class PuzzleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puzzles = Puzzle::all();
        return view('puzzles.index', compact('puzzles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('puzzles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'difficulty' => 'required|in:easy,medium,hard',
            'solution' => 'required',
        ]);

        Puzzle::create($request->all());
        return redirect()->route('puzzles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $puzzle = Puzzle::findOrFail($id);
        return view('puzzles.show', compact('puzzle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $puzzle = Puzzle::findOrFail($id);
        return view('puzzles.edit', compact('puzzle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'difficulty' => 'required|in:easy,medium,hard',
            'solution' => 'required',
        ]);

        $puzzle = Puzzle::findOrFail($id);
        $puzzle->update($request->all());
        return redirect()->route('puzzles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $puzzle = Puzzle::findOrFail($id);
        $puzzle->delete();
        return redirect()->route('puzzles.index');
    }
}
