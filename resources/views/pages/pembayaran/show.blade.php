@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Detail Pembayaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Detail Pembayaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12 mt-3">
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

            <div class="col-xl-12 mt-3">
                <div class="card">
                    <div class="card-body pt-3">
                        <table class="table datatable" id="pegawai">
                            <thead>
                                <tr>
                                    <th>Pelanggan</th>
                                    <th>Operator</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $pembayaranLaundry->pelanggan->nama }}</td>
                                    <td>{{ $pembayaranLaundry->staff->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center my-2">
                <a href="{{ route('pembayaran_laundry.index') }}" class="btn btn-primary">
                    Kembali ke halaman penawaran harga
                </a>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex align-items-center justify-content-between m-3">
                            <h5 class="card-title">Total : Produk</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProduk">
                                <i class="bi bi-plus"></i> Tambah Produk
                            </button>
                            <div class="modal fade" id="tambahProduk" tabindex="-1" aria-labelledby="tambahProdukLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahProdukLabel">Tambah Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('detail-pembayaran.store') }}" method="POST">
                                                @csrf
                                                <div class="row mb-3">
                                                    <input type="hidden" name="id_pembayaranlaundries" value="{{ $pembayaranLaundry->id }}">
                                                    <label for="produk" class="col-md-4 col-lg-3 col-form-label">Jenis Layanan</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <select name="produk" id="produk" class="form-control @error('produk') is-invalid @enderror" onchange="updateTotal()">
                                                            <option value="">Pilih Jenis Layanan</option>
                                                            @foreach($hargaLaundries as $p)
                                                                <option value="{{ $p->id }}" data-harga="{{ $p->harga }}" {{ old('produk') == $p->id ? 'selected' : '' }}>
                                                                    {{ $p->jenis_layanan }}  | Rp. {{ number_format($p->harga, 0, ',', '.') }} | {{ $p->unit }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('produk')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="quantity" class="col-md-4 col-lg-3 col-form-label">Quantity</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" oninput="updateTotal()">
                                                        @error('quantity')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="total" class="col-md-4 col-lg-3 col-form-label">Total</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input type="number" class="form-control @error('total') is-invalid @enderror" id="total" name="total" value="{{ old('total') }}" readonly>
                                                        @error('total')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable" id="pegawai">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Layanan</th>
                                        <th>Harga</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail_pembayaran as $index => $data)
                                        <tr>
                                            <td> {{ $index + 1 }} </td>
                                            <td> {{ $data->hargalaundry->jenis_layanan ?? '-' }} </td>
                                            <td> Rp. {{ number_format($data->hargalaundry?->harga, 0, ',', '.') }} </td>
                                            <td> {{ $data->quantity }} {{ $data->hargaLaundry->unit ?? '-' }}</td>
                                            <td> Rp {{ number_format($data->total, 0, ',', '.') }} </td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel{{ $data->id }}">Hapus Produk Dalam List</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus produk <strong>{{ $data->hargalaundry?->jenis_layanan ?? 'Produk tidak tersedia' }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('detail-pembayaran.destroy', $data->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    </section>

    <script>
        function updateTotal() {
            const produkSelect = document.getElementById('produk');
            const selectedOption = produkSelect.options[produkSelect.selectedIndex];
            const harga = parseFloat(selectedOption.getAttribute('data-harga')) || 0;
            const quantity = parseFloat(document.getElementById('quantity').value) || 0;
            const total = harga * quantity;
            
            document.getElementById('total').value = total;
        }
    </script>  
@endsection
