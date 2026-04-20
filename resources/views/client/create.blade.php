@extends('layouts.app')

@section('title', 'Tambah Client Baru')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Client Baru</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('client.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Client <span class="text-danger">*</span></label>
                                <input type="text" name="nama_client" class="form-control @error('nama_client') is-invalid @enderror"
                                    value="{{ old('nama_client') }}" required>
                                @error('nama_client')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama PIC <span class="text-danger">*</span></label>
                                <input type="text" name="nama_pic" class="form-control @error('nama_pic') is-invalid @enderror"
                                    value="{{ old('nama_pic') }}" required>
                                @error('nama_pic')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. Handphone <span class="text-danger">*</span></label>
                                <input type="text" name="no_handphone" class="form-control @error('no_handphone') is-invalid @enderror"
                                    value="{{ old('no_handphone') }}" placeholder="08xxxxxxxxxx" required>
                                @error('no_handphone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('client.index') }}" class="btn btn-secondary me-md-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection