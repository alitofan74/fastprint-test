@extends('main')
@section('subtitle', "// Edit Data")
@section('content')
<form action="{{route("produk.update")}}" method="post">
@method("POST")
@csrf
<input type="hidden" name="id" value="{{$produk->id}}">
<div class="form-group">
    <label>NAMA PRODUK</label>
    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{old("nama_produk") ? old("nama_produk") : $produk->nama_produk}}">
    @error('nama_produk')
    <div class="text-danger">{{$message}}</div>   
    @enderror
</div>
<div class="form-group">
    <label>KATEGORI</label>
    @php
        $selected = old('kategori_id') ? old('kategori_id') : $produk->kategori_id; 
    @endphp
    <select class="form-control" name="kategori_id">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($kategori as $kategori)
            <option value="{{ $kategori->id }}"
                {{ $selected == $kategori->id ? 'selected' : '' }}>
                {{ $kategori->nama_kategori }}
            </option>
        @endforeach
    </select>
    @error('kategori_id')
    <div class="text-danger">{{$message}}</div>   
    @enderror
</div>
<div class="form-group">
    <label>STATUS</label>
    @php
        $selected = old('status_id') ? old('status_id') : $produk->status_id; 
    @endphp
    <select class="form-control" name="status_id">
        <option value="">-- Pilih Status --</option>
        @foreach ($status as $status)
            <option value="{{ $status->id }}"
                {{ $selected == $status->id ? 'selected' : '' }}>
                {{ $status->nama_status }}
            </option>
        @endforeach
    </select>
    @error('status_id')
    <div class="text-danger">{{$message}}</div>   
    @enderror
</div>
<div class="form-group">
    <label>HARGA</label>
    <input type="number" class="form-control" id="harga" name="harga" value="{{old("harga") ? old("harga") : $produk->harga}}">
    @error('harga')
    <div class="text-danger">{{$message}}</div>   
    @enderror
</div>

<button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
<a href="{{route("produk.index")}}" class="btn btn-danger btn-sm">BATAL</a>
</form>
@endsection

