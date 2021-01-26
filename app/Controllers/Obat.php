<?php namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\StokObatModel;

class Obat extends BaseController
{
	public function __construct()
	{
		$this->obat = new ObatModel();
		$this->stokObat = new StokObatModel();
	}

	public function index()
    {
        echo view('obat_view');
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
        $this->obat->where('id_obat', $id)->delete();
		return 'ok';
    }

}
