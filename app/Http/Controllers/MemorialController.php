<?php

namespace App\Http\Controllers;

use App\Models\Memorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemorialController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $memorials = Memorial::when($search, function ($query) use ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('hubungan', 'like', "%{$search}%");
        })->latest()->get();

        return view('memorials.index', compact('memorials', 'search'));
    }

    public function create()
    {
        return view('memorials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:255',
            'hubungan' => 'required|max:255',
            'status' => 'required|in:Masih Hidup,Telah Berpulang',
            'tanggal_dibuat' => 'nullable|date',
            'foto' => 'nullable|image|max:2048',
            'cerita' => 'required',
            'doa' => 'nullable',
        ]);

        $data['tanggal_dibuat'] = $data['tanggal_dibuat'] ?? now()->toDateString();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('memorials', 'public');
        }

        Memorial::create($data);

        return redirect()->route('memorials.index')
            ->with('success', 'Kenangan berhasil ditambahkan.');
    }

    public function show(Memorial $memorial)
    {
        return view('memorials.show', compact('memorial'));
    }

    public function edit(Memorial $memorial)
    {
        return view('memorials.edit', compact('memorial'));
    }

    public function update(Request $request, Memorial $memorial)
    {
        $data = $request->validate([
            'nama' => 'required|max:255',
            'hubungan' => 'required|max:255',
            'status' => 'required|in:Masih Hidup,Telah Berpulang',
            'tanggal_dibuat' => 'nullable|date',
            'foto' => 'nullable|image|max:2048',
            'cerita' => 'required',
            'doa' => 'nullable',
        ]);

        if ($request->hasFile('foto')) {
            if ($memorial->foto) {
                Storage::disk('public')->delete($memorial->foto);
            }

            $data['foto'] = $request->file('foto')->store('memorials', 'public');
        }

        $memorial->update($data);

        return redirect()->route('memorials.index')
            ->with('success', 'Kenangan berhasil diperbarui.');
    }

    public function destroy(Memorial $memorial)
    {
        if ($memorial->foto) {
            Storage::disk('public')->delete($memorial->foto);
        }

        $memorial->delete();

        return redirect()->route('memorials.index')
            ->with('success', 'Kenangan berhasil dihapus.');
    }
}