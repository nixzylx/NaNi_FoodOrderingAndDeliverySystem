<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('owner.dashboard', compact('menus'));
    }

    public function userMenu()
    {
        $menus = Menu::all();
        return view('dashboard.user', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        Menu::create($request->all());
        return redirect()->back()->with('success', 'Menu item saved!');
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->back()->with('success', 'Menu deleted!');
    }
}
