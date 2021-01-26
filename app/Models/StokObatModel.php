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

    public function getAll()
    {
        return $this->db->table('stok_obat')->select('*')->join('data_obat', 'data_obat.id_obat = stok_obat.id_obat' , 'right')->get()->getResult();
    }
}