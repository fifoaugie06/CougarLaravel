<?php

namespace App\Exports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TransactionsExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct()
    {

    }

    public function query()
    {
        $transactions = Transaction::query()
            ->join('customers', 'customers.id', '=', 'transactions.customer_id')
            ->join('products', 'products.id', '=', 'transactions.product_id')
            ->select('customers.nama', 'customers.alamat', 'customers.kota',
                'products.namabarang', 'products.merk', 'products.type',
                'products.harga', 'transactions.created_at')
            ->orderBy('transactions.created_at', 'desc');

        return $transactions;
    }

    public function headings(): array
    {
        return ['Nama Pembeli', 'Alamat', 'Kota', 'Jenis Barang', 'Merk Barang',
            'Type Barang', 'Harga', 'Tanggal Pembelian'];
    }
}
