<?php namespace App\Controllers;

use App\Models\ObatModel;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function test()
	{
		$model = new ObatModel();
		return var_dump($model->find('KPRNS1723'));
	}
	//--------------------------------------------------------------------

}
