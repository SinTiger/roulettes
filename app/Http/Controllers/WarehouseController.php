<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Warehouse;
use App\Http\Requests\WarehouseRequest;

class WarehouseController extends Controller
{
    public function index()
    {
        $items = Warehouse::all();
        $link = 'warehouse';
        return view('warehouse.index', compact('link', 'items'));
    }

    public function create()
    {
        $link = 'warehouse';
        return view('warehouse.create', compact('link'));
    }

    public function store(WarehouseRequest $request)
    {
        $data = $request->validated();
        $newItem = Warehouse::firstOrCreate($data);
        return redirect()->route('warehouse.index');
    }

    public function show(Warehouse $warehouse)
    {
        $link = 'warehouse';
        return view('warehouse.show', compact('link', 'warehouse'));
    }

    public function edit(Warehouse $warehouse)
    {
        $link = 'warehouse';
        return view('warehouse.edit', compact('link', 'warehouse'));
    }

    public function update(WarehouseRequest $request, Warehouse $warehouse)
    {
        $data = $request->validated();
        $warehouse->update($data);
        return redirect()->route('warehouse.show', $warehouse->id);
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('warehouse.index');
    }
}
