@extends('layout.app')

@section('title','CRUD Tiket Event')

@section('judul')
<label class="font-weight-bold">Tambah Event</label>
@endsection

@section('konten')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Kode Event</label>
                            <input type="text" class="form-control @error('kode_event') is-invalid @enderror" name="kode_event" value="{{ old('kode_event') }}" placeholder="Masukkan Kode Event">
                            <!-- error message untuk title -->
                            @error('kode_event')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Event</label>
                            <input type="text" class="form-control @error('nama_event') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Event">
                            <!-- error message untuk nama_event -->
                            @error('nama_event')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- buat validasi email!!!!!!!!!!!!!!!! -->
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Event">
                            <!-- error message untuk email -->
                            @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nomor Telepon</label>
                            <input type="number" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp123" value="{{ old('no_tlp') }}" placeholder="Masukkan Nomor Telepon">
                            <!-- error message untuk no_tlp -->
                            @error('no_tlp')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                            <!-- error message untuk title -->
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kategori</label>
                            <select class="custom-select @error('kategori') is-invalid @enderror" name="kategori" value="{{old('kategori')}}">
                                <option value="">Masukkan Kategori</option>
                                <option value="Anak-anak">Anak-anak</option>
                                <option value="Dewasa">Dewasa</option>
                                <option value="Orang Tua">Orang Tua</option>
                            </select>
                            <!-- error message untuk kategori -->
                            @error('kategori')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection