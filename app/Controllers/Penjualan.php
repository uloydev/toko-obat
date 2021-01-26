<?php namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\HasilPenjualanModel;

class Penjualan extends BaseController
{
	public function __construct()
	{
		$this->penjualan = new HasilPenjualanModel();
	}

	public function januari()
    {
        echo view('penjualan_view', [
            'bulan' => 'januari',
            'data' => $this->penjualan->getJanuari()
        ]);
    }

    public function februari()
    {
        echo view('penjualan_view', [
            'bulan' => 'februari',
            'data' => $this->penjualan->getFebruari()
        ]);
    }

    public function maret()
    {
        echo view('penjualan_view', [
            'bulan' => 'maret',
            'data' => $this->penjualan->getMaret()
        ]);
    }
}
