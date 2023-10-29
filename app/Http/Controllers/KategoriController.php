<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'desc')->paginate(10);
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string']
        ]);

        Kategori::create([
            'nama' => $request->nama,
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('kategori.index'));
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string']
        ]);

        Kategori::where('id', $id)->update([
            'nama' => $request->nama
        ]);

        return redirect(route('kategori.index'));
    }

    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect(route('kategori.index'));
    }
}
