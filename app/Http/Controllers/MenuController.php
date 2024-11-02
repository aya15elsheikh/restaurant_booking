<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu= Menu::get();
        return view('menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|int',
            'description' => 'string'
        ]);
        $menu= Menu::create($validatedData);
        return redirect()->route('admin')->with('success', 'Menu item added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu=Menu::findOrFail($id);
        return view('menu.edit',compact('menu','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'string'
        ]);
          
          $menu= Menu::findOrFail($id);
          $menu->name = $request->name;
          $menu->description= $request->description;
          $menu->price = $request->price;
          $menu->save();

          return redirect()->route('admin')->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Menu::findOrFail($id);
        $item->delete();
        return redirect()->route('admin')->with('success', 'Menu Item deleted successfully');
    }
}
