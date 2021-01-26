<?php namespace App\Controllers;

use App\Models\LogHargaModel;
use App\Models\LogStokModel;

class Log extends BaseController
{
	public function __construct()
	{
		$this->logHarga = new LogHargaModel();
		$this->logStok = new LogStokModel();
	}

	public function harga()
    {
        echo view('log_harga_view');
    }
 
    public function allHarga()
    {
        $data = $this->logHarga->getAll();
        return json_encode($data);
    }

    public function deleteHarga($id = null){
        $this->logHarga->where('log_id', $id)->delete();
		return 'ok';
    }

    public function stokObat()
    {
        echo view('log_stok_view');
    }
 
    public function allStokObat()
    {
        $data = $this->logStok->getAll();
        return json_encode($data);
    }

    public function deleteStokObat($id = null){
        $this->logStok->where('log_id', $id)->delete();
		return 'ok';
    }
}
