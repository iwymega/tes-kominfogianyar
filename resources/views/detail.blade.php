@extends('layout.app')

@section('title','CRUD Tiket Event')

@section('judul')
Edit Event
@endsection

@section('konten')
<form action="/event/{{$event->id}}" method="POST">
    @csrf
    @method('PUT')
    <p>
        <label for="kode_event">Kode Event</label>
        <input type="text" name="kode_event" value="{{$event->kode_event}}" readonly>
    </p>
    <p>
        <label for="nama">Nama Event</label>
        <input type="text" name="nama" value="{{$event->nama}}" readonly>
    </p>
    <p>
        <label for="email">Email</label>
        <input type="text" name="email" value="{{$event->email}}" readonly>
    </p>
    <p>
        <label for="no_tlp">Nomor Telepon</label>
        <input type="text" name="no_tlp" value="{{$event->no_tlp}}" readonly>
    </p>
    <p>
        <label for="foto">Foto</label>
        <input type="text" name="foto" value="{{$event->foto}}" readonly>
    </p>
    <p>
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" value="{{$event->kategori}}" readonly>
    </p>
    <p>
        <input type="button" value="Kembali" onclick="location.href='/event'">
    </p>
</form>
@endsection