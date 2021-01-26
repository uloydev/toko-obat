<?php
namespace App\Models;

use CodeIgniter\Model;

class LogStokModel extends Model
{
    protected $table = 'log_stok_obat';
    protected $primaryKey = 'log_id';
    protected $useTimestamps = false;
    protected $allowedFields = [
        "kode_obat",
        "jumlah_lama",
        "jumlah_baru",
        "waktu_perubahan"
    ];

    public function getAll()
    {
        return $this->db->table('log_stok_obat')->select('*')->join('data_obat', 'data_obat.kode_obat = log_stok_obat.kode_obat' , 'inner')->get()->getResult();
    }
}