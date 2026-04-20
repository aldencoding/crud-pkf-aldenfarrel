@extends('layouts.app')

@section('title', 'Daftar Client')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0">
            <i class="bi bi-people-fill me-2"></i> Daftar Client
        </h1>
        <a href="{{ route('client.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus-lg"></i> Tambah Client Baru
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="clientTable" class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="130">ID Client</th>
                            <th>Nama Client</th>
                            <th>Nama PIC</th>
                            <th>No. Handphone</th>
                            <th>Email</th>
                            <th width="170" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clients as $client)
                        <tr>
                            <td><strong class="text-primary">{{ $client->id_client }}</strong></td>
                            <td>{{ $client->nama_client }}</td>
                            <td>{{ $client->nama_pic }}</td>
                            <td>
                                <a href="https://wa.me/{{ substr($client->no_handphone, 1) }}"
                                    target="_blank" class="text-success text-decoration-none">
                                    <i class="bi bi-whatsapp"></i> {{ $client->no_handphone }}
                                </a>
                            </td>
                            <td>{{ $client->email }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('client.show', $client) }}"
                                        class="btn btn-info text-white" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('client.edit', $client) }}"
                                        class="btn btn-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('client.destroy', $client) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus client ini?')" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox display-4"></i>
                                <p class="mt-3">Belum ada data client</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#clientTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/2.3.7/i18n/id.json'
            },
            pageLength: 10,
            order: [
                [0, 'desc']
            ],
            responsive: true,
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
            columnDefs: [{
                    targets: [3, 4, 5], // Kolom ke-4 (No. HP), ke-5 (Email), ke-6 (Aksi)
                    searchable: false // Matikan fitur pencarian
                },
                {
                    targets: [3, 4, 5],
                    orderable: false
                }
            ]
        });
    });
</script>
@endsection