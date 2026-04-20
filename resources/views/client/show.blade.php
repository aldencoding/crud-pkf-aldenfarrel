@extends('layouts.app')

@section('title', 'Detail Client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="bi bi-info-circle"></i> Detail Client</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">ID Client</th>
                            <td><strong>{{ $client->id_client }}</strong></td>
                        </tr>
                        <tr>
                            <th>Nama Client</th>
                            <td>{{ $client->nama_client }}</td>
                        </tr>
                        <tr>
                            <th>Nama PIC</th>
                            <td>{{ $client->nama_pic }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $client->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $client->email }}</td>
                        </tr>
                        <tr>
                            <th>No. Handphone</th>
                            <td>{{ $client->no_handphone }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Dibuat</th>
                            <td>{{ $client->created_at->format('d F Y H:i') }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('client.edit', $client) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="{{ route('client.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection