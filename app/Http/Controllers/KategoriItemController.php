<?php
namespace App\Http\Controllers;

use App\Models\KategoriItem;
use Illuminate\Http\Request;

class KategoriItemController extends Controller
{
    public function index(Request $request)
    {
        $query = KategoriItem::query();
        if ($request->kode) $query->where('kode', 'LIKE', '%' . $request->kode . '%');
        if ($request->nama) $query->where('nama', 'LIKE', '%' . $request->nama . '%');
        $kategori = $query->get();
        return view('kategori_items.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori_items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:kategori_items',
            'nama' => 'required'
        ]);
        KategoriItem::create($request->only('kode', 'nama'));
        return redirect()->route('kategori-items.index');
    }

    public function show($id)
    {
        $kategori = KategoriItem::with('masterItems')->findOrFail($id);
        return view('kategori_items.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = KategoriItem::findOrFail($id);
        return view('kategori_items.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriItem::findOrFail($id);
        $kategori->update($request->only('kode', 'nama'));
        return redirect()->route('kategori-items.index');
    }

    public function destroy($id)
    {
        KategoriItem::findOrFail($id)->delete();
        return redirect()->route('kategori-items.index');
    }
}