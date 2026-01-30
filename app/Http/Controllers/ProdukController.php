<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\KategoriModel;
use App\Models\StatusModel;
use App\Models\ProdukModel;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (ProdukModel::count() === 0) {
                return redirect('sync');
            }

            return $next($request);
        });
    }

    public function index(){
        $produk = ProdukModel::with("kategori")->where("status_id", 1)->get();

        return view("index", compact("produk"));
    }

    public function create(){
        $kategori = KategoriModel::all();
        $status = StatusModel::all();

        return view("create", compact("kategori", "status"));
    }

    public function save(Request $request){
        $validate = $this->formValidate($request);
        $save = ProdukModel::create($validate);

        return redirect()->route("produk.index")->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id){

        $produk = ProdukModel::find($id);
        $kategori = KategoriModel::all();
        $status = StatusModel::all();

        return view("edit", compact("produk", "kategori", "status"));
    }

    public function update(Request $request){
        $validate = $this->formValidate($request);
        $update = ProdukModel::find($request->id)->update($validate);

        return redirect()->route("produk.index")->with('success', 'Produk berhasil diubah');
    }

    public function detail($id){
        $produk = ProdukModel::with("kategori", "status")->find($id);
        
        return response()->json([
            'status' => $produk ? true : false,
            'data'   => $produk
        ]);
    }

    public function delete($id){
        $find = ProdukModel::find($id);
        $find->delete();

        return redirect()->route("produk.index")->with('success', 'Produk berhasil dihapus');
    }

    private function formValidate($request)
    {
        return $request->validate(
            [
                'nama_produk' => 'required|string|max:255',
                'kategori_id' => 'required',
                'status_id'   => 'required',
                'harga'       => 'required|numeric|min:0',
            ],
            [
                'nama_produk.required' => 'Nama produk wajib diisi.',
                'nama_produk.string'   => 'Nama produk harus berupa teks.',
                'nama_produk.max'      => 'Nama produk maksimal 255 karakter.',

                'kategori_id.required' => 'Kategori wajib dipilih.',
                'status_id.required'   => 'Status wajib dipilih.',

                'harga.required' => 'Harga wajib diisi.',
                'harga.numeric'  => 'Harga harus berupa angka.',
                'harga.min'      => 'Harga tidak boleh kurang dari 0.',
            ]
        );
    }

}
