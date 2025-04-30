<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category; 
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('item', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('add.item', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|min:2|max:10',
            'price' => 'required|integer|min:2',
            'stock' => 'required|integer|min:1',
        ]);

        Item::create([
            'category_id' => $request -> category_id,
            'name' => $request -> name,
            'price' => $request -> price,
            'stock' => $request -> stock,
        ]);


        return redirect()->route('item.index')->with('ItemAdd', 'Item berhasil berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('edit.item', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:10',
            'price' => 'required|integer|min:2',
            'stock' => 'required|integer|min:0',
        ]);

        $item->update($request->all());

        return redirect()->route('item.index')->with('ItemEdit', 'Item berhasil berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index')->with('ItemDelete', 'Item berhasil dihapus!');
    }
}