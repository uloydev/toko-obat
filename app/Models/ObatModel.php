<?php
namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'data_obat';
    protected $primaryKey = 'kode_obat';
    protected $useTimestamps = false;
    protected $allowedFields = [
        "kode_obat",
        "nama_obat",
        "bentuk_obat",
        "tanggal_produksi",
        "tanggal_kadaluarsa",
        "harga",
        "id_obat"
    ];
}