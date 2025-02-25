<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Like::create([
            'product_id' => $request->product_id,
            'customer_id' => Session::get('id')
        ]);
        return redirect('/products/' . $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Like $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Like $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Like $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Like $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Like::where('product_id', $request->product_id)
            ->where('customer_id', Session::get('id'))
            ->firstOrFail()->delete();

        return redirect('/products/' . $request->product_id);
    }
}
