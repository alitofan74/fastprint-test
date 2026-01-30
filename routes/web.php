<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    FastPrintController,
    ProdukController,
};

Route::get("/", [ProdukController::class, "index"])->name("produk.index");
Route::get("/input-baru", [ProdukController::class, "create"])->name("produk.create");
Route::post("/simpan", [ProdukController::class, "save"])->name("produk.save");
Route::get("/ubah-data/{id}", [ProdukController::class, "edit"])->name("produk.edit");
Route::post("/update", [ProdukController::class, "update"])->name("produk.update");
Route::get("/hapus/{id}", [ProdukController::class, "delete"])->name("produk.delete");
Route::get("/detail/{id}", [ProdukController::class, "detail"])->name("produk.detail");

Route::get("sync", [FastPrintController::class, "sync"])->name("sync.index");
Route::post("sync/save", [FastPrintController::class, "saveSync"])->name("sync.save");


