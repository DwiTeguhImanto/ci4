<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;

class Menu extends BaseController
{
	public function index()
	{
        $pager = \Config\Services::pager();
		$model = new Menu_M();

		$data = [
			'judul' => 'DATA MENU',
			// 'kategori' => $kategori,
			'menu' => $model->paginate(3, 'page'),
            'pager' => $model->pager

		];

		// echo view("template/header");
		return view("menu/select",$data);
		// echo view("template/footer");
        
    }

    public function read()
    {
		$pager = \Config\Services::pager();
		if (isset($_GET['idkategori'])) {
			$id = $_GET['idkategori'];

			$model = new Menu_M();
			$jumlah = $model->where('idkategori', $id)->findAll();
			$count = count($jumlah);

			$tampil = 3 ;
			$mulai = 0;
			
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				$mulai = ($tampil * $page )- $tampil;
			}

			$menu = $model->where('idkategori', $id)->findAll($tampil, $mulai);

			$data = [
				'judul' => 'DATA PENCARIAN MENU',
				'menu' => $menu,
				'pager' => $pager,
				'tampil' => $tampil,
				'total' => $count
	
			];
	
			return view("menu/cari",$data);
		}
	}
	
	public function create()
	{
		$model = new Kategori_M();
		$kategori = $model->findAll();
		$data = [
			'kategori'=> $kategori
		];	
		return view("menu/insert", $data);
		
	}

	public function insert()
	{
	
		$request = \Config\Services::request();
		$file = $request->getFile('gambar');
		$name = $file->getName();

		$data = [
			'idkategori' => $request->getPost('idkategori'),
			'menu' => $request->getPost('menu'),
			'gambar' => $name,
			'harga' => $request->getPost('harga')
		];

		// print_r($data);
		$model = new Menu_M();
		$model -> insert($data);
		$file->move('./upload');
		return redirect()->to(base_url("/admin/menu"));

		// if ($model -> insert($_POST)===false) {
		// 	$error = $model->errors();
		// 	session()->setFlashdata('info', $error['kategori']);
		// 	return redirect()->to(base_url("/admin/kategori/create"));
		// }else {
		// 	return redirect()->to(base_url("/admin/kategori"));
		// }

		
	}
    
    public function option()
    {
        $model = new Kategori_M();
		$kategori = $model->findAll();
		$data = [
			'kategori'=> $kategori
		];
		return view('template/option', $data);
	}
	
	public function delete($id = null)
	{
		
		$model = new Menu_M();
		$model -> delete($id);
		return redirect()->to(base_url("/admin/menu"));
	}

	//--------------------------------------------------------------------

}
