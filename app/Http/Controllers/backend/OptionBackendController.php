<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::all();
        return view('pages.backend.option.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.option.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:options,name',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        Option::create([
            'name'  => $request->name,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return redirect()->route('option.index')->with('success', 'Option created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $option = Option::findOrFail($id);
        return view('pages.backend.option.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $option = Option::findOrFail($id);

        $request->validate([
            'name'  => 'required|unique:options,name,' . $option->id,
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $option->update([
            'name'  => $request->name,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return redirect()->route('option.index')->with('success', 'Option updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $option = Option::findOrFail($id);
        $option->delete();

        return redirect()->route('option.index')->with('success', 'Option deleted successfully');
    }
}
