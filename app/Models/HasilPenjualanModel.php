<?php
namespace App\Models;

use CodeIgniter\Model;

class HasilPenjualanModel extends Model
{
    protected $table = 'hasil_penjualan';
    protected $primaryKey = 'id_hasil_penjualan';
    protected $useTimestamps = false;
    protected $allowedFields = [
        "kode_obat",
        "tanggal_transaksi",
        "jumlah_terjual"
    ];

    public function getJanuari()
    {
        return $this->db->table('hasil_penjualan')->select('*')->join('data_obat', 'data_obat.kode_obat = hasil_penjualan.kode_obat' , 'inner')->where('tanggal_transaksi >=', '2019-01-01')->where('tanggal_transaksi <=', '2019-01-31')->get()->getResult();
    }
    public function getFebruari()
    {
        return $this->db->table('hasil_penjualan')->select('*')->join('data_obat', 'data_obat.kode_obat = hasil_penjualan.kode_obat' , 'inner')->where('tanggal_transaksi >=', '2019-02-01')->where('tanggal_transaksi <=', '2019-02-28')->get()->getResult();
    }

    public function getMaret()
    {
        return $this->db->table('hasil_penjualan')->select('*')->join('data_obat', 'data_obat.kode_obat = hasil_penjualan.kode_obat' , 'inner')->where('tanggal_transaksi >=', '2019-03-01')->where('tanggal_transaksi <=', '2019-03-31')->get()->getResult();
    }
}