<?php
namespace App\Models;

use CodeIgniter\Model;

class LogHargaModel extends Model
{
    protected $table = 'log_harga';
    protected $primaryKey = 'log_id';
    protected $useTimestamps = false;
    protected $allowedFields = [
        "kode_obat",
        "harga_lama",
        "harga_baru",
        "waktu_perubahan"
    ];

    public function getAll()
    {
        return $this->db->table('log_harga')->select('*')->join('data_obat', 'data_obat.kode_obat = log_harga.kode_obat' , 'inner')->get()->getResult();
    }
}