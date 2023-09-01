@extends('template.main')

@section('konten')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Pembayaran</h1>
        <p class="mb-4">Manajemen Spp | Inventory Spp</p>
    </div>
    <div class="card shadow mb-4"></div>
    <div class="card-header py-3">
        <div class="d-flex flex-row justify-content-end">
            <button class="btn btn-primary float-right me-3" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
            <a href="{{ route('export-data') }}" class="btn btn-success">Export Data</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                    $no = 1; @endphp
                    @foreach ($pembayaran as $row)
                        <tr>
                            <td width="5%">{{ $no++ }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->tgl_pembayaran }}</td>
                            <td>{{ $row->jumlah }}</td>
                            <td class="d-flex flex-row">
                                <form action="{{ route('delete-pembayaran', $row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm w-100" type="submit"
                                        onclick="return confirm('Yakin Ingin menghapus data ??')">Hapus</button>
                                </form>
                                <a href="#" class="btn btn-warning h-50 w-25 btn-sm" style="margin-left: 1rem"
                                    data-target="#editData{{ $row->id }}" data-toggle="modal">Edit</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="editData{{ $row->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                role="document">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>

                                        <button class="close" type="button" data-dismiss="modal" aria- label="Close">

                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('edit-pembayaran', $row->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama">Nama Siswa</label>

                                                <input type="text" class="form-control" id="nama"
                                                    aria-describedby="nama" name="nama" value="{{ $row->nama }}">

                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal Pembayaran</label>
                                                <input type="date" class="form-control" id="tgl_pembayaran"
                                                    name="tgl_pembayaran" value="{{ $row->tgl_pembayaran }}">

                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                                    value="{{ $row->jumlah }}">

                                            </div>
                                    </div>
                                    <div class="modal-footer">

                                        <button class="btn btn-secondary" type="button" data-
                                            dismiss="modal">Cancel</button>
                                        <input type="submit" class="btn btn-primary" value="Update" name="update">

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection

<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>

                <button class="close" type="button" data-dismiss="modal" aria- label="Close">

                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add-pembayaran') }}" method="POST"> @csrf
                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>

                        <input type="text" class="form-control" id="nama" aria- describedby="nama"
                            name="nama">

                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="tgl_pembayaran" name="tgl_pembayaran">

                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah">

                    </div>
            </div>
            <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data- dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">

                </form>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        @if ($message = Session::get('dataTambah'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Data Barang Berhasil Ditambah'
            })
        @endif
    </script>
@endsection
