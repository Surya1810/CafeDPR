<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class OrderController extends Controller
{
    public function dashboard()
    {
        $order = Order::whereDate('created_at', Carbon::today())->latest()->get();
        return view('backend.order.index', compact('order'));
    }

    public function index($meja)
    {
        $spesial = Menu::where([['status', 'online'], ['kategori', 'Special']])->get();
        $makanan = Menu::where([['status', 'online'], ['kategori', 'Makanan']])->get();
        $minuman = Menu::where([['status', 'online'], ['kategori', 'Minuman']])->get();
        $id = $meja;

        $cart = Cart::content();

        return view('frontend.home', compact('makanan', 'minuman', 'spesial', 'id', 'cart'));
    }

    public function cart_store(Request $request)
    {
        $menu = Menu::findOrFail($request->id);

        Cart::add($menu->id, $menu->nama, 1, $menu->harga)->associate('\App\Models\Menu');

        return redirect('meja/' . $request->nomor_meja . '#menu')->with(['pesan' => 'Menu Berhasil Ditambahkan', 'level-alert' => 'alert-success']);
    }

    public function cart_update(Request $request)
    {
        $RowId = Cart::content()->where('id', $request->id)->first();
        Cart::update($RowId->rowId, $RowId->qty + 1);

        return redirect()->route('meja', $request->nomor_meja)->with(['pesan' => 'Menu Berhasil Ditambahkan', 'level-alert' => 'alert-success']);
    }

    public function cart_remove(Request $request)
    {
        Cart::update($request->id, $request->qty - 1);

        return redirect()->route('meja', $request->nomor_meja)->with(['pesan' => 'Menu Berhasil Dihapus', 'level-alert' => 'alert-success']);
    }

    public function bayar(Request $request)
    {
        $data = Cart::content();
        $menu = $data->pluck('name')->implode(',');
        $jumlah = $data->pluck('qty')->implode(',');
        $total = Cart::priceTotal(0, ',', '.');
        // dd($request);

        $order = new Order();
        $order->nama = $request->nama;
        $order->meja = $request->nomor_meja;
        $order->menu = $menu;
        $order->jumlah = $jumlah;
        $order->total = $total;
        $order->status = 'Belum Bayar';
        $order->save();

        Cart::destroy();
        return redirect()->route('meja', $request->nomor_meja)->with(['message' => 'Pesanan Berhasil', 'level-alert' => 'alert-success']);
    }
    public function show($id)
    {
        $order = Order::find($id);

        $order->status = 'Sudah Bayar';
        $order->save();

        return redirect()->route('order.index')->with(['pesan' => 'Pesanan Dibayar', 'level-alert' => 'alert-success']);
    }
}
