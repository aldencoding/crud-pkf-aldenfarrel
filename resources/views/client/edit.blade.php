@extends('layouts.app')

@section('title', 'Edit Client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Client</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('client.update', $client) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Form fields sama seperti create, tapi pakai value="{{ $client->nama_client }}" dll -->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Client <span class="text-danger">*</span></label>
                                <input type="text" name="nama_client" class="form-control" value="{{ old('nama_client', $client->nama_client) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama PIC <span class="text-danger">*</span></label>
                                <input type="text" name="nama_pic" class="form-control" value="{{ old('nama_pic', $client->nama_pic) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $client->alamat) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $client->email) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. Handphone <span class="text-danger">*</span></label>
                                <input type="text" name="no_handphone" class="form-control" value="{{ old('no_handphone', $client->no_handphone) }}" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('client.index') }}" class="btn btn-secondary me-md-2">Batal</a>
                            <button type="submit" class="btn btn-success">Update Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection