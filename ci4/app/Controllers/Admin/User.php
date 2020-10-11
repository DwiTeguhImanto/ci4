<?php 

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\User_M;

class User extends BaseController
{

   

	public function index()
	{
		$pager = \Config\Services::pager();
		$model = new User_M();


		$data = [
			'judul' => 'DATA USER',
			'user' => $model->paginate(3, 'page'),
            'pager' => $model->pager

		];
		return view("user/select",$data);
	

	}
	

}
