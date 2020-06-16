<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomesController extends Controller
{
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('/');
        } else {
            $products = Product::all();

            return view('home.index', compact('products'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $products = Product::where('namabarang', 'like', '%' . $request->search . '%')
            ->orWhere('merk', 'like', '%' . $request->search . '%')
            ->orWhere('type', 'like', '%' . $request->search . '%')
            ->get();
        return view('home.index', compact('products'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
