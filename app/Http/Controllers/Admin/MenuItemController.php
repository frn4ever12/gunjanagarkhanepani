<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function create(Menu $menu)
    {
        $parentItems = $menu->items()->whereNull('parent_id')->get();
        return view('admin.menu-items.create', compact('menu', 'parentItems'));
    }

    public function store(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:50',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'integer',
            'is_active' => 'boolean',
            'opens_in_new_tab' => 'boolean',
        ]);

        $validated['menu_id'] = $menu->id;
        MenuItem::create($validated);
        return redirect()->route('admin.menus.edit', $menu)->with('success', 'Menu item created successfully.');
    }

    public function edit(MenuItem $menuItem)
    {
        $menu = $menuItem->menu;
        $parentItems = $menu->items()->where('id', '!=', $menuItem->id)->whereNull('parent_id')->get();
        return view('admin.menu-items.edit', compact('menuItem', 'menu', 'parentItems'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:50',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'integer',
            'is_active' => 'boolean',
            'opens_in_new_tab' => 'boolean',
        ]);

        $menuItem->update($validated);
        return redirect()->route('admin.menus.edit', $menuItem->menu)->with('success', 'Menu item updated successfully.');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menu = $menuItem->menu;
        $menuItem->delete();
        return redirect()->route('admin.menus.edit', $menu)->with('success', 'Menu item deleted successfully.');
    }
}
