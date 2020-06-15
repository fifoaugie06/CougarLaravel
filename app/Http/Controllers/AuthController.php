<?php

namespace App\Http\Controllers;

use App\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Session::get('login')) {
            return redirect('/homes');
        } else {
            return view('auth.login');
        }
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
        //
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required'
        ]);

        Auth::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/register')->with('status', 'Berhasil Mendaftarkan Account');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Auth $auth
     * @return \Illuminate\Http\Response
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Auth $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Auth $auth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Auth $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auth $auth)
    {
        //
    }

    public function register()
    {
        return view('auth.register');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        $data = Auth::where('email', '=' ,$email)
            ->where('deleted_at', '=', null)
            ->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('id', $data->id);
                Session::put("username", $data->nama);
                Session::put('email', $data->email);
                Session::put('login', TRUE);
                return redirect('/homes');
            } else {
                return redirect('/')->with('alert', 'Email atau Password, Salah !');
            }
        } else {
            return redirect('/')->with('alert', 'Email atau Password, Salah !');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
