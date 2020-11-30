<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;


class Daftar extends BaseController
{
	public function index()
	{
		return view('daftar');
	}
	
	public function regis()
	{
		$model = new Pelanggan_M();
		$data = [
			'pelanggan' => $this->request->getPost('pelanggan'),
			'alamat' => $this->request->getPost('alamat'),
			'telp' => $this->request->getPost('telp'),
			'email' => $this->request->getPost('email'),
			'pelanggan' => $this->request->getPost('pelanggan'),
			'password' => $this->request->getPost('password'),
			'aktif' => 1
		];

		if ($model -> insert($data)===false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("daftar"));
		}else {
			return redirect()->to(base_url("masuk"));
		}
	}

	//--------------------------------------------------------------------

}
