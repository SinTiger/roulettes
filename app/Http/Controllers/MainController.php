<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;

class MainController extends Controller
{
    public function index(Request $request) {
        $warehouses = Warehouse::all();
        $link = 'main';
        return view('main.index', compact('link', 'warehouses'));
    }
}
