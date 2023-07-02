<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::all();
        return view('backend.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'bail|required|unique:menus,nama',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'foto' => 'file|max:10000',
        ]);

        $menu = new Menu();
        $menu->nama = $request->nama;
        $menu->deskripsi = $request->deskripsi;
        $menu->kategori = $request->kategori;
        $menu->harga = $request->harga;
        $menu->status = 'online';

        // Store the uploaded image
        $file = $request->file('foto');
        // $fileName = 'foto_produk_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $fileName = 'Menu/foto_produk_' . uniqid() . '.' . 'webp';
        // Intervention 
        $image = Image::make($file)->encode('webp', 90)->fit(300, 300);

        //Foto
        if (isset($image)) {
            if (!Storage::disk('public')->exists('Menu/')) {
                Storage::disk('public')->makeDirectory('Menu/');
            }
            // $image->put('storage/Menu/', $fileName);
            Storage::disk('public')->put($fileName, $image);
            $menu->foto = $fileName;
        }
        $menu->save();

        return redirect()->route('menu.index')->with(['pesan' => 'Menu Berhasil Dibuat', 'level-alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->status = 'offline';
        $menu->save();

        return redirect()->route('menu.index')->with(['pesan' => 'Menu Berhasil Dihapus', 'level-alert' => 'alert-danger']);
    }
    public function habis($id)
    {
        $menu = Menu::find($id);
        $menu->status = 'habis';
        $menu->save();

        return redirect()->route('menu.index')->with(['pesan' => 'Menu Telah Habis', 'level-alert' => 'alert-danger']);
    }
}
