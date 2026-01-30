<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\StatusModel;

class FastPrintController extends Controller
{
    public function sync(){
        return view("sync");
    }

    public function saveSync(Request $request){

        $username = $request->username;
        $passwordPlain = $request->password;
        $password = md5($passwordPlain);

         $response = Http::asForm() // kirim sebagai form body
            ->timeout(10)
            ->post('https://recruitment.fastprint.co.id/tes/api_tes_programmer', [
                'username' => $username,
                'password' => $password,
            ]);

        $result = $response->json();

        if ($result['error'] !== 0) {
            return redirect()->route("sync.index")->with('error', $result["ket"]);
        }

        foreach ($result['data'] as $item) {
            // kategori
            $kategori = KategoriModel::firstOrCreate([
                'nama_kategori' => $item['kategori']
            ]);

            // status
            $status = StatusModel::firstOrCreate([
                'nama_status' => $item['status']
            ]);

            // produk
            ProdukModel::updateOrCreate(
                ['id_produk_api' => $item['id_produk']],
                [
                    'nama_produk' => $item['nama_produk'],
                    'harga' => (int) $item['harga'],
                    'kategori_id' => $kategori->id,
                    'status_id' => $status->id,
                ]
            );
        }

        return redirect()->route("produk.index");
    }
}
