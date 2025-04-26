<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris'; // nama tabel di database
    protected $fillable = ['nama_kategori']; // field yang bisa diisi massal (seperti saat create/update)
}
