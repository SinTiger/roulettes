<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    public function index()
    {
        $items = Supplier::all();
        $link = 'supplier';
        return view('supplier.index', compact('link', 'items'));
    }

    public function create()
    {
        $link = 'supplier';
        return view('supplier.create', compact('link'));
    }

    public function store(SupplierRequest $request)
    {
        $data = $request->validated();
        $newItem = Supplier::firstOrCreate($data);
        return redirect()->route('supplier.index');
    }

    public function show(Supplier $supplier)
    {
        $link = 'supplier';
        return view('supplier.show', compact('link', 'supplier'));
    }

    public function edit(Supplier $supplier)
    {
        $link = 'supplier';
        return view('supplier.edit', compact('link', 'supplier'));
    }

    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $data = $request->validated();
        $supplier->update($data);
        return redirect()->route('supplier.show', $supplier->id);
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index');
    }
}
