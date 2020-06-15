<?php

namespace App\Http\Controllers;

use App\Comentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ComentarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return view('home.detailproduct', compact('comentars'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comentar::create([
            'isi_komentar' => $request->isi_komentar,
            'product_id' => $request->product_id,
            'customer_id' => Session::get('id')
        ]);
        return redirect('/products/' . $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Comentar $comentar
     * @return \Illuminate\Http\Response
     */
    public function show(Comentar $comentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Comentar $comentar
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentar $comentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Comentar $comentar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentar $comentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Comentar $comentar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentar $comentar)
    {
        //
    }
}
