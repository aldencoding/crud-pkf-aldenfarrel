<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('client.index', compact('clients'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_client'   => 'required',
            'alamat'        => 'required',
            'email'         => 'required|email|unique:clients',
            'nama_pic'      => 'required',
            'no_handphone'  => 'required|regex:/^08[0-9]{8,11}$/'
        ], [
            'no_handphone.regex' => 'Nomor handphone harus dimulai dengan 08 dan hanya boleh berisi angka (contoh: 08123456789).',
        ]);

        $lastClient = Client::latest('id_client')->first();
        $nextNumber = $lastClient ? intval(substr($lastClient->id_client, 4)) + 1 : 1;
        $id_client = 'PKF-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        Client::create([
            'id_client'     => $id_client,
            'nama_client'   => $request->nama_client,
            'alamat'        => $request->alamat,
            'email'         => $request->email,
            'nama_pic'      => $request->nama_pic,
            'no_handphone'  => $request->no_handphone,
        ]);

        return redirect()->route('client.index')
            ->with('success', 'Data client berhasil ditambahkan');
    }

    public function show(Client $client)
    {
        return view('client.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nama_client'   => 'required',
            'alamat'        => 'required',
            'email'         => 'required|email|unique:clients,email,' . $client->id_client . ',id_client',
            'nama_pic'      => 'required',
            'no_handphone'  => 'required|regex:/^08[0-9]{8,11}$/'
        ], [
            'no_handphone.regex' => 'Nomor handphone harus dimulai dengan 08 dan hanya boleh berisi angka (contoh: 08123456789).',
        ]);

        $client->update($request->only([
            'nama_client',
            'alamat',
            'email',
            'nama_pic',
            'no_handphone'
        ]));

        return redirect()->route('client.index')
            ->with('success', 'Data client berhasil diupdate');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index')
            ->with('success', 'Data client berhasil dihapus');
    }
}
