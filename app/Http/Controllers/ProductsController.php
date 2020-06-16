<?php

namespace App\Http\Controllers;

use App\Comentar;
use App\Like;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('/');
        } else {
            $products = Product::all();
            return view('product.index', compact('products'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Session::get('login')) {
            return redirect('/');
        } else {
            return view('product.create');
        }
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
        if (!Session::get('login')) {
            return redirect('/');
        } else {
            $comentars = Comentar::where('product_id', $product->id)
                ->join('customers', 'comentars.customer_id', '=', 'customers.id')
                ->select('customers.nama', 'comentars.created_at', 'comentars.isi_komentar')
                ->orderBy('comentars.created_at', 'desc')
                ->get();

            $likesCount = Like::where('product_id', $product->id)->get()->count();

            $conditionLike = Like::where('product_id', $product->id)
                ->where('customer_id', Session::get('id'))
                ->get()
                ->count();

            $stok = Product::select('stok')->where('id', $product->id)->first();

            return view('home.detailproduct', compact('product', 'comentars', 'likesCount', 'conditionLike', 'stok'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (!Session::get('login')) {
            return redirect('/');
        } else {
            return view('product.update', compact('product'));
        }
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

    public function search(Request $request){
        $products = Product::where('namabarang', 'like', '%' . $request->keyword . '%')
            ->orWhere('merk', 'like', '%' . $request->keyword . '%')
            ->orWhere('type', 'like', '%' . $request->keyword . '%')
            ->orWhere('description', 'like', '%' . $request->keyword . '%')
            ->orWhere('harga', 'like', '%' . $request->keyword . '%')
            ->orWhere('stok', 'like', '%' . $request->keyword . '%')
            ->get();
        return view('product.index', compact('products'));
    }
}
