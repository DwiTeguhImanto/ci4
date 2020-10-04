<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;

class Pelanggan extends BaseController
{
	public function index()
	{
        $pager = \Config\Services::pager();
		$model = new Pelanggan_M();
		

		$data = [
			'judul' => 'DATA PELANGGAN',
			'pelanggan' => $model->paginate(3, 'page'),
            'pager' => $model->pager

		];

		
		// return view("kategori/select",$data);
        echo view('pelanggan/select',$data);
        
    }
    



	//--------------------------------------------------------------------

}
