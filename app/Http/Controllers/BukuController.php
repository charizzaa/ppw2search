<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        // fungsi index
        $data_buku = Buku::all();
        $data_buku_sort = Buku::all()->sortByDesc('id');
        $no = 1;
        $count_data = Buku::count();
        $sum_harga = Buku::sum('harga');

        return view('buku.index', compact('data_buku', 'data_buku_sort', 'no', 'count_data', 'sum_harga'));
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'judul'=> 'required|string',
            'penulis'=> 'required|string|max:30',
            'harga'=> 'required|numeric',
            'tgl_terbit'=> 'required|date',
        ]);
        $buku = new Buku;
        $buku->judul =$request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('message','Data Buku Berhasil Disimpan');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }

    public function update($id){
        $buku = Buku::find($id);
        return view('buku.update', compact('buku'));
    }

    public function updatedata(Request $request, $id){
        $this->validate($request, [
            'judul'=> 'string',
            'penulis'=> 'string|max:30',
            'harga'=> 'numeric',
            'tgl_terbit'=> 'date',
        ]);
        $buku = Buku::find($id);
        $buku->judul =$request->judul;
        $buku->penulis =$request->penulis;
        $buku->harga =$request->harga;
        $buku->tgl_terbit =$request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('message','Data Buku Berhasil Diedit');
    }

    public function show($id){
        $buku = Buku::find($id);
        return view('buku.show', compact('buku'));
    }

    // fungsi search data buku
    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku_cari = Buku::where('judul', 'like', '%'.$cari.'%')->orwhere('penulis','like', '%'.$cari.'%')->paginate($batas);
        $jumlah_buku = $data_buku_cari->count();
        return view('buku.search', compact('jumlah_buku', 'data_buku_cari', 'cari'));
    }
}
