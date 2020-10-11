<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderDetail_M;

class OrderDetail extends BaseController
{
	public function index()
	{
		$pager = \Config\Services::pager();
		$model = new OrderDetail_M();


		$data = [
			'judul' => 'DATA RINCIAN DETAIL ORDER ',
			'orderdetail' => $model->paginate(3, 'page'),
            'pager' => $model->pager

		];


		return view("orderdetail/select",$data);

	}

	//--------------------------------------------------------------------

}
