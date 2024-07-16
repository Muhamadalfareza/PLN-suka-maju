<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categori;
use Illuminate\Http\Request;

class kategori extends Controller
{

    // crud
    public function list()
    {
        $categories = categori::all();
        return view('admin.kategori.list', compact('categories'));
    }
    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'price' => 'required|numeric',
        ]);

        categori::create($request->all());

        return redirect()->route('admin.ketegori')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
        $category = categori::findOrFail($id);
        return view('admin.kategori.show', compact('category'));
    }

    public function edit($id)
    {
        $category = categori::findOrFail($id);
        return view('admin.kategori.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'price' => 'required|numeric',
        ]);

        $category = categori::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.ketegori')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = categori::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.ketegori')->with('success', 'Category deleted successfully.');
    }
}
