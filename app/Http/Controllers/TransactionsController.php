<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Exports\TransactionsExport;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class TransactionsController extends Controller
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
            $transactions = Transaction::withTrashed()
                ->join('customers', 'customers.id', '=', 'transactions.customer_id')
                ->join('products', 'products.id', '=', 'transactions.product_id')
                ->select('customers.nama', 'customers.alamat', 'customers.kota', 'products.namabarang',
                        'products.merk', 'products.type', 'products.harga', 'transactions.created_at')
                ->orderBy('transactions.created_at', 'desc')
                ->get();

            $transactionsTotally = Transaction::withTrashed()->count();

            $earningsTotally = Transaction::withTrashed()
                ->join('products', 'products.id', '=', 'transactions.product_id')
                ->sum('products.harga');

            $totallyCustomer = Customer::withTrashed()->count();
            $customerAktif = $totallyCustomer - Customer::all()->count();
            $percentageCustomerAktif = $customerAktif/$totallyCustomer*100;

            $productsCount = Product::all()->count();

            return view('transaction.index', compact('transactions', 'transactionsTotally', 'earningsTotally', 'percentageCustomerAktif', 'productsCount'));
        }
    }

    public function export_excel()
    {
        return Excel::download(new TransactionsExport(), 'transactions.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaction::create(array_merge($request->all(), ['customer_id' => strval(Session::get('id'))]));

        Product::where('id', $request->product_id)
            ->update([
               'stok' => DB::raw('stok-1')
            ]);

        return redirect('/products/' . $request->product_id)->with('modal', 'Berhasil Membeli Product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
