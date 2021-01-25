<?php
namespace App\Models;

use CodeIgniter\Model;

class StokObatModel extends Model
{
    protected $table = 'stok_obat';
    protected $primaryKey = 'id_obat';
    protected $useTimestamps = false;
    protected $allowedFields = [
        "kode_obat",
        "jumlah",
    ];
}