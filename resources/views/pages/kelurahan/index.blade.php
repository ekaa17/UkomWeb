@extends('layouts.main')

@section('content')
    <div class="pagetitle mb-4">
        <h1>Data Kelurahan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Data Kelurahan</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex align-items-center justify-content-between m-3">
                            <h5 class="card-title">Total: {{ $data->count() }} Kelurahan</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kelurahan
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Kelurahan</th>
                                        <th>Kode Kecamatan</th>
                                        <th>Nama Kelurahan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_kelurahan }}</td>
                                            <td>{{ $item->kecamatan->kode_kecamatan }}</td>
                                            <td>{{ $item->nama_kelurahan }}</td>
                                            <td>
                                                <!-- Edit Button -->
                                                <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>
                                                
                                                <!-- Delete Button -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>

                                                <!-- Modal Confirm Delete -->
                                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus kelurahan ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('kelurahan.destroy', $item->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Kelurahan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('kelurahan.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="kode_kelurahan" class="form-label">Kode Kelurahan</label>
                                                                <input type="text" class="form-control" id="kode_kelurahan" name="kode_kelurahan" value="{{ $item->kode_kelurahan }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_kecamatan" class="form-label">Kode Kecamatan</label>
                                                                <select class="form-select" id="id_kecamatan" name="id_kecamatan" required>
                                                                    <option value="">Pilih Kecamatan</option>
                                                                    @foreach ($kecamatan as $kec)
                                                                        <option value="{{ $kec->id }}" {{ $item->id_kecamatan == $kec->id ? 'selected' : '' }}>
                                                                            {{ $kec->kode_kecamatan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama_kelurahan" class="form-label">Nama Kelurahan</label>
                                                                <input type="text" class="form-control" id="nama_kelurahan" name="nama_kelurahan" value="{{ $item->nama_kelurahan }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Kelurahan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kelurahan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kode_kelurahan" class="form-label">Kode Kelurahan</label>
                            <input type="text" class="form-control" id="kode_kelurahan" name="kode_kelurahan" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_kecamatan" class="form-label">Kode Kecamatan</label>
                            <select class="form-select" id="id_kecamatan" name="id_kecamatan" required>
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($kecamatan as $kec)
                                    <option value="{{ $kec->id }}">{{ $kec->kode_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_kelurahan" class="form-label">Nama Kelurahan</label>
                            <input type="text" class="form-control" id="nama_kelurahan" name="nama_kelurahan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
