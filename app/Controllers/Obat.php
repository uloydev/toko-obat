<?php namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\StokObatModel;
use App\Models\LogHargaModel;
use App\Models\LogStokModel;

class Obat extends BaseController
{
	public function __construct()
	{
		$this->obat = new ObatModel();
		$this->stokObat = new StokObatModel();
		$this->logHarga = new LogHargaModel();
		$this->logStok = new LogStokModel();
	}

	public function index()
    {
        echo view('obat_view');
    }

    public function kadaluarsa()
    {   
        // var_dump($this->obat->where('tanggal_kadaluarsa <', date('Y-m-d'))->get()->getResult());die;
        echo view('obat_kadaluarsa_view', [
            'data' => $this->obat->where('tanggal_kadaluarsa <', date('Y-m-d'))->get()->getResult()
        ]);
    }
 
    public function all()
    {
        $data = $this->obat->findAll();
        return json_encode($data);
    }
 
    public function save(){
        $json = $this->request->getJSON();
        $dataStokObat = [
            'kode_obat' => $json->kode_obat,
            'jumlah' => 0
        ];
        $idObat = $this->stokObat->insert($dataStokObat);
        $dataObat = [
            "kode_obat" => $json->kode_obat,
            "nama_obat" => $json->nama_obat,
            "bentuk_obat" => $json->bentuk_obat,
            "tanggal_produksi" => $json->tanggal_produksi,
            "tanggal_kadaluarsa" => $json->tanggal_kadaluarsa,
            "harga" => $json->harga,
            "id_obat" => $idObat
        ];
		$this->obat->insert($dataObat);
		return 'ok';
    }
 
    public function update($id = null){
        $json = $this->request->getJSON();
        $dataObat = [
            "kode_obat" => $json->kode_obat,
            "nama_obat" => $json->nama_obat,
            "bentuk_obat" => $json->bentuk_obat,
            "tanggal_produksi" => $json->tanggal_produksi,
            "tanggal_kadaluarsa" => $json->tanggal_kadaluarsa,
            "harga" => $json->harga
        ];
        $this->obat->where('id_obat', $id)->set($dataObat)->update();   
		return 'ok';
    }
 
    public function delete($id = null){
        $obat = $this->obat->where('id_obat', $id)->first();
        $kodeObat = $obat['kode_obat'];
        $this->obat->where('id_obat', $id)->delete();
        $this->stokObat->where('id_obat', $id)->delete();
        $this->logHarga->where('kode_obat', $kodeObat)->delete();
        $this->logStok->where('kode_obat', $kodeObat)->delete();
		return 'ok';
    }

}
