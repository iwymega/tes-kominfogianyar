@extends('layout.app')

@section('title','CRUD Tiket Event')

@section('judul')
<div class="alert alert-danger">
    List Event
</div>
@endsection

@section('konten')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('event.create') }}" class="btn btn-md btn-danger mb-3">TAMBAH Event Baru</a>
                    @if($all_event->isEmpty())
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                    @else
                    <table class="table table-striped table-bordered" id="tbl_list">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Event</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Email</th>
                                <th scope="col">No Telepon</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_event as $event)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$event->kode_event}}</td>
                                <td>{{$event->nama}}</td>
                                <td>{{$event->kategori}}</td>
                                <td>{{$event->email}}</td>
                                <td>{{$event->no_tlp}}</td>
                                <td class="text-center">
                                    <img src="{{ Storage::url('public/event/').$event->image }}" class="rounded" style="width: 150px">
                                </td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('event.destroy', $event->id) }}" method="POST">
                                        <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#tbl_list').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url()->current() }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'nama_lengkap'
                },
                {
                    data: 'email',
                    name: 'email'
                },

            ]
        });
    });
</script>
@endpush