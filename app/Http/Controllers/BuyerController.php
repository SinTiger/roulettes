<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Buyer;
use App\Http\Requests\BuyerRequest;

class BuyerController extends Controller
{
    public function index()
    {
        $items = Buyer::all();
        $link = 'buyer';
        return view('buyer.index', compact('link', 'items'));
    }

    public function create()
    {
        $link = 'buyer';
        return view('buyer.create', compact('link'));
    }

    public function store(BuyerRequest $request)
    {
        $data = $request->validated();
        $newItem = Buyer::firstOrCreate($data);
        return redirect()->route('buyer.index');
    }

    public function show(Buyer $buyer)
    {
        $link = 'buyer';
        return view('buyer.show', compact('link', 'buyer'));
    }

    public function edit(Buyer $buyer)
    {
        $link = 'buyer';
        return view('buyer.edit', compact('link', 'buyer'));
    }

    public function update(BuyerRequest $request, Buyer $buyer)
    {
        $data = $request->validated();
        $buyer->update($data);
        return redirect()->route('buyer.show', $buyer->id);
    }

    public function destroy(Buyer $buyer)
    {
        $buyer->delete();
        return redirect()->route('buyer.index');
    }
}
