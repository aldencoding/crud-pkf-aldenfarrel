<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_client';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_client',
        'nama_client',
        'alamat',
        'email',
        'nama_pic',
        'no_handphone'
    ];
}
