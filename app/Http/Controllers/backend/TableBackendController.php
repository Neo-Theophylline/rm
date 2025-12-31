<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableBackendController extends Controller
{
    public function index()
    {
        $tables = Table::latest()->paginate(10);

        return view('pages.backend.table.index', compact('tables'));
    }

    public function create()
    {
        return view('pages.backend.table.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_name' => 'required|string|max:50',
            'floor'      => 'required|string|max:50',
            'status'     => 'required',
            'type'       => 'required',
        ]);

        Table::create($request->all());

        return redirect()
            ->route('table.index')
            ->with('success', 'Table berhasil ditambahkan');
    }

    public function edit(Table $table)
    {
        return view('pages.backend.table.edit', compact('table'));
    }

    public function update(Request $request, Table $table)
    {
        $request->validate([
            'table_name' => 'required|string|max:50',
            'floor'      => 'required|string|max:50',
            'status'     => 'required',
            'type'       => 'required',
        ]);

        $table->update($request->all());

        return redirect()
            ->route('table.index')
            ->with('success', 'Table berhasil diupdate');
    }

    public function destroy(Table $table)
    {
        $table->delete();

        return back()->with('success', 'Table berhasil dihapus');
    }
}
