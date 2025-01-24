<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use App\Models\Product;
use App\Models\Buyer;
use App\Models\Warehouse;

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
        $warehouses = Warehouse::all();
        $link = 'sale';
        return view('sale.create', compact('link', 'buyers', 'products', 'warehouses'));
    }

    public function store(SaleRequest $request)
    {
        $data = $request->validated();

        // смотрим, достаточно ли товаров и убавляем их
        $warehouse = Warehouse::find($data['warehouse_id']);
        $product = $warehouse->products()->find($data['product_id']);
        if ($product != null && $product->pivot->quantity >= $data['quantity']) { // если товара достаточно, то убавляем
            $product->pivot->update(['quantity' => $product->pivot->quantity - $data['quantity']]);
        } else { // иначе выдаем ошибку
            $error = 'Данного товара недостаточно на складе';
            return redirect()->back()->with('error', $error);
        }

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
        $warehouses = Warehouse::all();
        $link = 'sale';
        return view('sale.edit', compact('link', 'sale', 'buyers', 'products', 'warehouses'));
    }

    public function update(SaleRequest $request, Sale $sale)
    {
        $data = $request->validated();

        $after_quantity = $sale->quantity; // получаем кол-во, сколько было
        // обновление данных о товарах на складе
        $warehouse = Warehouse::find($data['warehouse_id']);
        $product = $warehouse->products()->find($data['product_id']);
        $product->pivot->update(['quantity' => $product->pivot->quantity + $after_quantity - $data['quantity']]); // добавляем сколько было, вычитаем сколько стало

        $sale->update($data);
        return redirect()->route('sale.show', $sale->id);
    }

    public function destroy(Sale $sale)
    {
        // обновление данных о товарах на складе
        $warehouse = $sale->warehouse;
        $product = $warehouse->products()->find($sale->product);
        $product->pivot->update(['quantity' => $product->pivot->quantity + $sale->quantity]); // добавляем сколько было в удаляемой записи
        $sale->delete();
        return redirect()->route('sale.index');
    }
}
