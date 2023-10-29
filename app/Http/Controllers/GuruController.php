<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = User::where('level', 'guru')->orderBy('id', 'desc')->paginate(10);
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'min:3'],
            'no_induk' => ['required', 'string', 'min:3', Rule::unique(User::class)],
            'jk' => ['required', 'string'],
            'alamat' => ['required', 'string','min:3'],
            'tahun_masuk' => ['required', 'string'],
        ]);

        User::create([
            'nama' => $request->nama,
            'no_induk' => $request->no_induk,
            'password' => Hash::make('Gptu22ks'),
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'level' => 'guru',
            'tahun_masuk' => $request->tahun_masuk
        ]);

        return redirect()->route('guru.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $guru = User::find($id);
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'min:3'],
            'no_induk' => ['required', 'string', 'min:3', Rule::unique(User::class)->ignore($id)],
            'jk' => ['required', 'string'],
            'alamat' => ['required', 'string','min:3'],
            'tahun_masuk' => ['required', 'string'],
        ]);

        User::where('id', $id)->update([
            'nama' => $request->nama,
            'no_induk' => $request->no_induk,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'tahun_masuk' => $request->tahun_masuk
        ]);

        return redirect(route('guru.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect(route('guru.index'));
    }
}
