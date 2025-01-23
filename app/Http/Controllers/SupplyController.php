<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

use App\Models\Supply;
use App\Http\Requests\SupplyRequest;

class SupplyController extends Controller
{
    public function index()
    {
        $items = Supply::all();
        $link = 'supply';
        return view('supply.index', compact('link', 'items'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $link = 'supply';
        return view('supply.create', compact('link', 'suppliers', 'products'));
    }

    public function store(SupplyRequest $request)
    {
        $data = $request->validated();
        $newItem = Supply::firstOrCreate($data);
        return redirect()->route('supply.index');
    }

    public function show(Supply $supply)
    {
        $link = 'supply';
        return view('supply.show', compact('link', 'supply'));
    }

    public function edit(Supply $supply)
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $link = 'supply';
        return view('supply.edit', compact('link', 'supply', 'suppliers', 'products'));
    }

    public function update(SupplyRequest $request, Supply $supply)
    {
        $data = $request->validated();
        $supply->update($data);
        return redirect()->route('supply.show', $supply->id);
    }

    public function destroy(Supply $supply)
    {
        $supply->delete();
        return redirect()->route('supply.index');
    }
}
