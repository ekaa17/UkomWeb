@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Data Operator</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Data Operator</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
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
                            <h5 class="card-title">Total: Karyawan |Admin</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createStaffModal">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Data Baru
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable" id="staffsTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>No. Telepon</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Profile</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data  as $staff)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $staff->name }}</td>
                                            <td>{{ $staff->no_telepon }}</td>
                                            <td>{{ $staff->email }}</td>
                                            <td>{{ $staff->role }}</td>
                                            <td>
                                                @if($staff->profile)
                                                    <img src="{{ asset('assets/img/profile/' . $staff->profile) }}" alt="profile" width="50">
                                                @else
                                                    Tidak Ada Profile
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editStaffModal{{ $staff->id }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>

                                                <!-- Tombol Hapus -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteStaffModal{{ $staff->id }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editStaffModal{{ $staff->id }}" tabindex="-1" aria-labelledby="editStaffModalLabel{{ $staff->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editStaffModalLabel{{ $staff->id }}">Edit Data Staff</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('data-operator.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="name" name="name" value="{{ $staff->name }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="no_telepon" class="form-label">No. Telepon</label>
                                                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $staff->no_telepon }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" value="{{ $staff->email }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Password</label>
                                                                <input type="password" class="form-control" id="password" name="password">
                                                                <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="role" class="form-label">Role</label>
                                                                <select class="form-select" id="role" name="role" required>
                                                                    <option value="Admin" {{ $staff->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                                    <option value="Karyawan" {{ $staff->role == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="profile" class="form-label">Profile</label>
                                                                <input type="file" class="form-control" id="profile" name="profile">
                                                                <small class="text-muted">Kosongkan jika tidak ingin mengubah profile</small>
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
                                        <div class="modal fade" id="deleteStaffModal{{ $staff->id }}" tabindex="-1" aria-labelledby="deleteStaffModalLabel{{ $staff->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteStaffModalLabel{{ $staff->id }}">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('data-operator.destroy', $staff->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
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
            </div>
        </div>
    </section>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="createStaffModal" tabindex="-1" aria-labelledby="createStaffModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createStaffModalLabel">Tambah Data Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('data-operator.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="Admin">Admin</option>
                                <option value="Karyawan">Karyawan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="profile" class="form-label">Profile</label>
                            <input type="file" class="form-control" id="profile" name="profile">
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
