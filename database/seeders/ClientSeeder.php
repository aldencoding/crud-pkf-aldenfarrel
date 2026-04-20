<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'nama_client'   => 'PT. Maju Bersama',
                'alamat'        => 'Jl. Sudirman No. 45, Jakarta Selatan',
                'email'         => 'info@majubersama.co.id',
                'nama_pic'      => 'Budi Santoso',
                'no_handphone'  => '081234567890',
            ],
            [
                'nama_client'   => 'CV. Sejahtera Abadi',
                'alamat'        => 'Jl. Ahmad Yani No. 123, Bandung',
                'email'         => 'contact@sejahteraabadi.com',
                'nama_pic'      => 'Siti Rahayu',
                'no_handphone'  => '085678901234',
            ],
            [
                'nama_client'   => 'UD. Jaya Makmur',
                'alamat'        => 'Jl. Veteran No. 67, Surabaya',
                'email'         => 'ud.jayamkmr@gmail.com',
                'nama_pic'      => 'Ahmad Fauzi',
                'no_handphone'  => '087812345678',
            ],
            [
                'nama_client'   => 'PT. Teknologi Inovasi',
                'alamat'        => 'Gedung Menara 88, Lt. 12, Jakarta Pusat',
                'email'         => 'hrd@teknologi-inovasi.id',
                'nama_pic'      => 'Dewi Lestari',
                'no_handphone'  => '082134567890',
            ],
            [
                'nama_client'   => 'Toko Elektronik ABC',
                'alamat'        => 'Jl. Raya Bogor Km. 12, Depok',
                'email'         => 'tokoabc@email.com',
                'nama_pic'      => 'Rudi Hermawan',
                'no_handphone'  => '089876543210',
            ],
        ];

        foreach ($clients as $data) {
            $lastClient = Client::orderBy('id_client', 'desc')->first();
            $nextNumber = $lastClient
                ? intval(substr($lastClient->id_client, 4)) + 1
                : 1;

            $id_client = 'PKF-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

            Client::create([
                'id_client'     => $id_client,
                'nama_client'   => $data['nama_client'],
                'alamat'        => $data['alamat'],
                'email'         => $data['email'],
                'nama_pic'      => $data['nama_pic'],
                'no_handphone'  => $data['no_handphone'],
            ]);
        }

        $this->command->info('✅ ' . count($clients) . ' data Client berhasil di-seed!');
    }
}
