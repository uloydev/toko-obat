<?php namespace App\Controllers;

use App\Models\StokObatModel;

class Stokobat extends BaseController
{
	public function __construct()
	{
		$this->stokObat = new StokObatModel();
	}

	public function index()
    {
        echo view('stok_obat_view');
    }
 
    public function all()
    {
        $data = $this->stokObat->getAll();
        return json_encode($data);
    }
 
    public function update($id = null){
        $json = $this->request->getJSON();
        $dataObat = [
            "kode_obat" => $json->kode_obat,
            "jumlah" => $json->jumlah
        ];
        $this->stokObat->where('id_obat', $id)->set($dataObat)->update();   
		return 'ok';
    }
}
