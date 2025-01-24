<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Supply;
use App\Http\Requests\SupplyRequest;
use App\Models\Warehouse;

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
        $warehouses = Warehouse::all();
        $link = 'supply';
        return view('supply.create', compact('link', 'suppliers', 'products', 'warehouses'));
    }

    public function store(SupplyRequest $request)
    {
        $data = $request->validated();

        // добавляем товары на склад
        $warehouse = Warehouse::find($data['warehouse_id']);
        $product = $warehouse->products()->find($data['product_id']);
        if (!empty($product)) { // если товар уже есть, добавляем кол-во
            $product->pivot->update(['quantity' => $product->pivot->quantity + $data['quantity']]);
        } else { // иначе создаем новый товар на складе
            $product = Product::find($data['product_id']);
            $warehouse->products()->attach($product);
            $product = $warehouse->products()->find($data['product_id']);
            $product->pivot->update(['quantity' => $data['quantity']]);
        }

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
        $warehouses = Warehouse::all();
        $link = 'supply';
        return view('supply.edit', compact('link', 'supply', 'suppliers', 'products', 'warehouses'));
    }

    public function update(SupplyRequest $request, Supply $supply)
    {
        $data = $request->validated();

        $after_quantity = $supply->quantity; // получаем кол-во, сколько было
        // обновление данных о товарах на складе
        $warehouse = Warehouse::find($data['warehouse_id']);
        $product = $warehouse->products()->find($data['product_id']);
        $product->pivot->update(['quantity' => $product->pivot->quantity - $after_quantity + $data['quantity']]); // вычитаем сколько было, добавляем сколько стало

        $supply->update($data);
        return redirect()->route('supply.show', $supply->id);
    }

    public function destroy(Supply $supply)
    {
        // обновление данных о товарах на складе
        $warehouse = $supply->warehouse;
        $product = $warehouse->products()->find($supply->product);
        $product->pivot->update(['quantity' => $product->pivot->quantity - $supply->quantity]); // вычитаем сколько было в удаляемой записи

        $supply->delete();
        return redirect()->route('supply.index');
    }
}
