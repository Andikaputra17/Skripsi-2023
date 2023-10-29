<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $level = Auth::user()->level;
        $siswa = User::where('level', 'siswa')->orderBy('id', 'desc')->paginate(10);
        return view('siswa.index', compact('siswa', 'level'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'min:3'],
            'no_induk' => ['required', 'string', 'min:3', Rule::unique(User::class)],
            'nisn' => ['required', 'string', 'min:3', Rule::unique(User::class)],
            'jk' => ['required', 'string'],
            'alamat' => ['required', 'string','min:3'],
            'tahun_masuk' => ['required', 'string'],
        ]);

        User::create([
            'nama' => $request->nama,
            'no_induk' => $request->no_induk,
            'nisn' => $request->nisn,
            'password' => Hash::make('Sdn22dp'),
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'level' => 'siswa',
            'tahun_masuk' => $request->tahun_masuk
        ]);

        return redirect()->route('siswa.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = User::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'min:3'],
            'no_induk' => ['required', 'string', 'min:3', Rule::unique(User::class)->ignore($id)],
            'nisn' => ['required', 'string', 'min:3', Rule::unique(User::class)->ignore($id)],
            'jk' => ['required', 'string'],
            'alamat' => ['required', 'string','min:3'],
            'tahun_masuk' => ['required', 'string'],
        ]);

        User::where('id', $id)->update([
            'nama' => $request->nama,
            'no_induk' => $request->no_induk,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'tahun_masuk' => $request->tahun_masuk
        ]);

        return redirect(route('siswa.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect(route('siswa.index'));
    }
}
