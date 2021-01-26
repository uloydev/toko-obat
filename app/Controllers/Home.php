<?php namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\StokObatModel;
use App\Models\LogHargaModel;
use App\Models\LogStokModel;


class Home extends BaseController
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
		$total_stok = 0;
		$stok = $this->stokObat->findAll();
		foreach( $stok as $item) {
			$total_stok += intval($item['jumlah']);
		}
		return view('dashboard_view', [
			'totalObat' => count($this->obat->findAll()),
			'totalStok' => $total_stok,
			'totalLogHarga' => count($this->logHarga->findAll()),
			'totalLogStok' => count($this->logStok->findAll()),
		]);
	}

}
