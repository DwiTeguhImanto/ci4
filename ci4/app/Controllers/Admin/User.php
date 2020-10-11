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
    
    public function create()
    {
        $data = [
            'level' => ['admin','chef','kasir']
        ];

        return view("user/insert",$data);
        
    }

    public function insert()
    {
        $model = new User_M();

        $model -> insert($_POST);

		// if ($model -> insert($_POST)===false) {
		// 	$error = $model->errors();
		// 	session()->setFlashdata('info', $error['user']);
		// 	return redirect()->to(base_url("/admin/user/create"));
		// }else {
		// 	return redirect()->to(base_url("/admin/kategori"));
        // }
        
        return redirect()->to(base_url("/admin/user"));
    }

    public function delete($id = null)
	{
		
		$model = new User_M();
		$model -> delete($id);
		return redirect()->to(base_url("/admin/user"));
    }
    
    public function update($id=null,$isi=1)
	{
		$model = new User_M();
		if ($isi == 0) {
			$isi = 1;
		} else {
			$isi = 0;
		}

		$data = [
			'aktif'=> $isi
		];

		$model->update($id,$data);
		return redirect()->to(base_url("/admin/user"));
	}
	

}
