@extends('layout.app')

@section('title','CRUD Tiket Event')

@section('judul')
Edit Event
@endsection

@section('konten')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">Kode Event</label>
                            <input type="text" class="form-control @error('kode_event') is-invalid @enderror" name="kode_event" value="{{ old('kode_event', $event->kode_event) }}" placeholder="Masukkan Kode Event">

                            <!-- error message untuk kode_event -->
                            @error('kode_event')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Event</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $event->nama) }}" placeholder="Masukkan Nama Event">

                            <!-- error message untuk nama -->
                            @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $event->email) }}" placeholder="Masukkan Email">

                            <!-- error message untuk email -->
                            @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nomor Telepon</label>
                            <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" value="{{ old('no_tlp', $event->no_tlp) }}" placeholder="Masukkan Nomor Telepon">

                            <!-- error message untuk no_tlp -->
                            @error('no_tlp')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori', $event->kategori) }}" placeholder="Masukkan Kategori">

                            <!-- error message untuk kategori -->
                            @error('kategori')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection