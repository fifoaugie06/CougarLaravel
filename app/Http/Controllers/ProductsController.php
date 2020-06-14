<?php

namespace App\Http\Controllers;

use App\Comentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'namabarang' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'description' => 'required'
        ]);

        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = storage_path('\app\public\images');
        $file->move($tujuan_upload, $nama_file);

        Product::create([
            'gambar' => $nama_file,
            'namabarang' => $request->namabarang,
            'merk' => $request->merk,
            'type' => $request->type,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'description' => $request->description
        ]);
        return redirect('/products')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $comentars = Comentar::where('product_id', $product->id)
            ->join('customers', 'comentars.customer_id', '=', 'customers.id')
            ->select('customers.nama', 'comentars.created_at', 'comentars.isi_komentar')
            ->orderBy('comentars.created_at', 'desc')
            ->get();

        return view('home.detailproduct', compact('product', 'comentars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'namabarang' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'description' => 'required'
        ]);

        $file = $request->file('gambar');

        if (is_null($file)) {
            Product::where('id', $product->id)
                ->update([
                    'gambar' => $product->gambar,
                    'namabarang' => $request->namabarang,
                    'merk' => $request->merk,
                    'type' => $request->type,
                    'harga' => $request->harga,
                    'stok' => $request->stok,
                    'description' => $request->description
                ]);
        }else{
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = storage_path('\app\public\images');
            $file->move($tujuan_upload, $nama_file);
            Product::where('id', $product->id)
                ->update([
                    'gambar' => $nama_file,
                    'namabarang' => $request->namabarang,
                    'merk' => $request->merk,
                    'type' => $request->type,
                    'harga' => $request->harga,
                    'stok' => $request->stok,
                    'description' => $request->description
                ]);
        }

        return redirect('/products')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        return redirect('/products')->with('status', 'Data Berhasil Dihapus');
    }
}
