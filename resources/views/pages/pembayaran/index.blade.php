@extends('layouts.main')

@section('content')
    <div class="pagetitle mb-4">
        <h1>Data Pembayaran Laundry</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center my-3">
                            <h5 class="card-title">Daftar Pembayaran Laundry</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                Tambah Data
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Staff</th>
                                        <th>Pelanggan</th>
                                        <th>Harga Laundry</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pembayaran as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->staff->name }}</td>
                                            <td>{{ $data->pelanggan->nama }}</td>
                                            <td>{{ number_format($data->hargaLaundry->harga, 0, ',', '.') }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}">
                                                    Edit
                                                </button>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Pembayaran Laundry</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('pembayaran_laundry.update', $data->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="id_staff" class="form-label">Staff</label>
                                                                <select name="id_staff" id="id_staff" class="form-control" required>
                                                                    @foreach ($staff as $s)
                                                                        <option value="{{ $s->id }}" {{ $data->id_staff == $s->id ? 'selected' : '' }}>
                                                                            {{ $s->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_pelanggan" class="form-label">Pelanggan</label>
                                                                <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                                                                    @foreach ($pelanggan as $p)
                                                                        <option value="{{ $p->id }}" {{ $data->id_pelanggan == $p->id ? 'selected' : '' }}>
                                                                            {{ $p->nama }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_hargalaundries" class="form-label">Harga Laundry</label>
                                                                <select name="id_hargalaundries" id="id_hargalaundries" class="form-control" required>
                                                                    @foreach ($hargalaundries as $h)
                                                                        <option value="{{ $h->id }}" {{ $data->id_hargalaundries == $h->id ? 'selected' : '' }}>
                                                                            {{ $h->berat }} Kg - Rp {{ number_format($h->harga, 0, ',', '.') }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Pembayaran Laundry</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('pembayaran_laundry.destroy', $data->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-body">
                                                                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data.</td>
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
    
        <!-- Modal Create -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pembayaran Laundry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('pembayaran_laundry.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id_staff" class="form-label">Staff</label>
                                <select name="id_staff" id="id_staff" class="form-control" required>
                                    <option value="" disabled selected>Pilih Staff</option>
                                    @foreach ($staff as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_pelanggan" class="form-label">Pelanggan</label>
                                <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                                    <option value="" disabled selected>Pilih Pelanggan</option>
                                    @foreach ($pelanggan as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_hargalaundries" class="form-label">Harga Laundry</label>
                                <select name="id_hargalaundries" id="id_hargalaundries" class="form-control" required>
                                    <option value="" disabled selected>Pilih Harga Laundry</option>
                                    @foreach ($hargalaundries as $h)
                                        <option value="{{ $h->id }}">{{ $h->berat }} Kg - Rp {{ number_format($h->harga, 0, ',', '.') }}</option>
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
    
