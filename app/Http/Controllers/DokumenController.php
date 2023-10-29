<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    public function index()
    {
        $level = Auth::user()->level;
        $id = Auth::user()->id;
        if ($level === 'siswa') {
            $dokumen = Dokumen::where('siswa_id', $id)->orderBy('id', 'desc')->paginate(10);
        } else {
            $dokumen = Dokumen::orderBy('id', 'desc')->paginate(10);
        }
        return view('dokumen.index', compact('dokumen', 'level'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $siswa = User::where('level', 'siswa')->get();
        return view('dokumen.add', ['kategori' => $kategori, 'siswa' => $siswa]);
    }

    public function store(Request $request)
    {
        $str_random = Str::random('15');
        $request->validate([
            'kategori' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'file' => ['required', 'mimes:pdf', 'max:2048'],
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('dokumen', $filename);

        Dokumen::create([
            'no' => $str_random,
            'nama' => $request->nama,
            'kategori_id' => $request->kategori,
            'user_id' => Auth::user()->id,
            'siswa_id' => $request->siswa,
            'deskripsi' => $request->deskripsi,
            'file' => $filename
        ]);

        return redirect()->route('dokumen.index');
    }

    public function download($value)
    {
        return response()->download(storage_path('app/dokumen/' . $value));
    }

    public function edit($id)
    {
        $dokumen = Dokumen::find($id);
        $kategori = Kategori::all();
        $siswa = User::where('level', 'siswa')->get();
        return view('dokumen.edit', ['dokumen' => $dokumen, 'kategori' => $kategori, 'siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'file' => ['mimes:pdf'],
        ]);

        $dokumen = Dokumen::find($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->storeAs('dokumen', $filename);

            $exist_file = $dokumen['file'];

            if (isset($exist_file) && file_exists(storage_path('app/dokumen/' . $exist_file))) {
                unlink(storage_path('app/dokumen/' . $exist_file));
            }

            $dokumen->update([
                'kategori_id' => $request->kategori,
                'siswa_id' => $request->siswa,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'file' => $filename,
                'updated_at' => now()
            ]);
        } else {
            $dokumen->update([
                'kategori_id' => $request->kategori,
                'siswa_id' => $request->siswa,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'file' => $dokumen['file'],
                'updated_at' => now()
            ]);
        }   

        return redirect()->route('dokumen.index');
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::find($id);
        $exist_file = $dokumen['file'];
        unlink(storage_path('app/dokumen/' . $exist_file));
        $dokumen->delete();
        return redirect(route('dokumen.index'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $level = Auth::user()->level;
        $id = Auth::user()->id;
        if ($level === 'siswa') {
            $dokumen = Dokumen::where('nama', 'like', '%'.$search.'%')->where('siswa_id', $id)->orderBy('id', 'desc')->paginate(10);
        } else {
            $dokumen = Dokumen::where('nama', 'like', '%'.$search.'%')->orderBy('id', 'desc')->paginate(10);
        }
        return view('dokumen.index', compact('dokumen', 'level', 'search'));
    }
}
