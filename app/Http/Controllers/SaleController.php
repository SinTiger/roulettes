<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use App\Models\Product;
use App\Models\Buyer;

class SaleController extends Controller
{
    public function index()
    {
        $items = Sale::all();
        $link = 'sale';
        return view('sale.index', compact('link', 'items'));
    }

    public function create()
    {
        $buyers = Buyer::all();
        $products = Product::all();
        $link = 'sale';
        return view('sale.create', compact('link', 'buyers', 'products'));
    }

    public function store(SaleRequest $request)
    {
        $data = $request->validated();
        $newItem = Sale::firstOrCreate($data);
        return redirect()->route('sale.index');
    }

    public function show(Sale $sale)
    {
        $link = 'sale';
        return view('sale.show', compact('link', 'sale'));
    }

    public function edit(Sale $sale)
    {
        $buyers = Buyer::all();
        $products = Product::all();
        $link = 'sale';
        return view('sale.edit', compact('link', 'sale', 'buyers', 'products'));
    }

    public function update(SaleRequest $request, Sale $sale)
    {
        $data = $request->validated();
        $sale->update($data);
        return redirect()->route('sale.show', $sale->id);
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sale.index');
    }
}
