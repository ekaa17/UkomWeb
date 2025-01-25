@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Data Penduduk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Data Penduduk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-xl-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex align-items-center justify-content-between m-3">
                            <h5 class="card-title">Total: {{ $penduduks->count() }} Penduduk</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPendudukModal">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Penduduk
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable" id="pendudukTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Kelurahan</th>
                                        <th>Kecamatan</th>
                                        <th>Nama Pencatat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penduduks as $penduduk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penduduk->nik }}</td>
                                            <td>{{ $penduduk->nama }}</td>
                                            <td>{{ $penduduk->alamat }}</td>
                                            <td>{{ $penduduk->kelurahan->nama_kelurahan }}</td>
                                            <td>{{ $penduduk->kecamatan->nama_kecamatan }}</td>
                                            <td>{{ $penduduk->staff->name}}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editPendudukModal{{ $penduduk->id }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>

                                                <!-- Tombol Hapus -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePendudukModal{{ $penduduk->id }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editPendudukModal{{ $penduduk->id }}" tabindex="-1" aria-labelledby="editPendudukModalLabel{{ $penduduk->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editPendudukModalLabel{{ $penduduk->id }}">Edit Data Penduduk</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="nik" class="form-label">NIK</label>
                                                                <input type="text" class="form-control" id="nik" name="nik" value="{{ $penduduk->nik }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $penduduk->nama }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="alamat" class="form-label">Alamat</label>
                                                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $penduduk->alamat }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_kelurahan" class="form-label">Kelurahan</label>
                                                                <select class="form-select" id="id_kelurahan" name="id_kelurahan" required>
                                                                    @foreach ($kelurahans as $kel)
                                                                        <option value="{{ $kel->id }}" {{ $penduduk->id_kelurahan == $kel->id ? 'selected' : '' }}>
                                                                            {{ $kel->nama_kelurahan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="id_kecamatan" class="form-label">Kecamatan</label>
                                                                <select class="form-select" id="id_kecamatan" name="id_kecamatan" required>
                                                                    @foreach ($kecamatans as $kec)
                                                                        <option value="{{ $kec->id }}" {{ $penduduk->id_kecamatan == $kec->id ? 'selected' : '' }}>
                                                                            {{ $kec->nama_kecamatan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_staff" class="form-label">Operator</label>
                                                                <select class="form-select" id="id_staff" name="id_staff" required>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->id }}" {{ $penduduk->id_staff == $staff->id ? 'selected' : '' }}>
                                                                            {{ $staff->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
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

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="deletePendudukModal{{ $penduduk->id }}" tabindex="-1" aria-labelledby="deletePendudukModalLabel{{ $penduduk->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletePendudukModalLabel{{ $penduduk->id }}">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data penduduk ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data penduduk.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="createPendudukModal" tabindex="-1" aria-labelledby="createPendudukModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPendudukModalLabel">Tambah Data Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('penduduk.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                       
                        <div class="mb-3">
                            <label for="id_staff" class="form-label">Operator</label>
                            <select class="form-select" id="id_staff" name="id_staff" required>
                                <option>Pilih Operator</option>
                                @foreach ($staffs as $staff)
                                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_kelurahan" class="form-label">Kelurahan</label>
                            <select class="form-select" id="id_kelurahan" name="id_kelurahan" required>
                                <option>Pilih Kelurahan</option>
                                @foreach ($kelurahans as $kelurahan)
                                    <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama_kelurahan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_kecamatan" class="form-label">Kecamatan</label>
                            <select class="form-select" id="id_kecamatan" name="id_kecamatan" required>
                                <option>Pilih Kecamatan</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                @endforeach
                            </select>
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
