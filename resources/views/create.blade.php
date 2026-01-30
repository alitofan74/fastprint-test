@extends('main')
@section('subtitle', "// Tambah Baru")
@section('content')
<form action="{{route("produk.save")}}" method="post">
@method("POST")
@csrf
<div class="form-group">
    <label>NAMA PRODUK</label>
    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{old("nama_produk")}}">
    @error('nama_produk')
    <div class="text-danger">{{$message}}</div>   
    @enderror
</div>
<div class="form-group">
    <label>KATEGORI</label>
    <select class="form-control" name="kategori_id">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($kategori as $kategori)
            <option value="{{ $kategori->id }}"
                {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
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
    <select class="form-control" name="status_id">
        <option value="">-- Pilih Status --</option>
        @foreach ($status as $status)
            <option value="{{ $status->id }}"
                {{ old('status_id') == $status->id ? 'selected' : '' }}>
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
    <input type="number" class="form-control" id="harga" name="harga" value="{{old("harga")}}">
    @error('harga')
    <div class="text-danger">{{$message}}</div>   
    @enderror
</div>

<button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
<a href="{{route("produk.index")}}" class="btn btn-danger btn-sm">BATAL</a>
</form>
@endsection

