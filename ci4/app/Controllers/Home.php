<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Models\OrderDetail_M;
use App\Libraries\WFcart;


class Home extends BaseController
{
	
	protected $db;
    protected $tblorderdetail;
	protected $tblorder;
	protected $vorderdetail;
    public function __construct()
    {
        $this->db=\Config\Database::connect();
        $this->tblorderdetail = $this->db->table('tblorderdetail');
		$this->tblorder = $this->db->table('tblorder');
		$this->vorderdetail = new OrderDetail_M();
    }

	public function index()
	{
        $pager = \Config\Services::pager();
		$model = new Menu_M();
		$kategori = new Kategori_M();
		$cart = new WFcart();
		if (!empty(session()->get('cart'))) {
            $quantity_total = $cart->quantity_totals();
        }else {
            $quantity_total = 0;
        }

		$menu = $model;

		$data = [
			'judul' => 'DATA MENU ',
			'kategori' => $kategori->paginate(),
			'menu' => $menu->paginate(3, 'page'),
			'quantity_total' => $quantity_total,
            'pager' => $menu->pager

		];

		return view("homeview",$data);

	}
	
	public function select($id)
	{
		$pager = \Config\Services::pager();
		$kategori = new Kategori_M();
		$model = new Menu_M();

		$cart = new WFcart();
		if (!empty(session()->get('cart'))) {
            $quantity_total = $cart->quantity_totals();
        }else {
            $quantity_total = 0;
        }

		$jumlah = $model->where('idkategori', $id)->findAll();
		$count = count($jumlah);

		$tampil = 3;
		$mulai = 0;

		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			$mulai = ($tampil * $page) - $tampil;
		}

		$menu = $model->where('idkategori', $id)->findAll($tampil, $mulai);

		$data = [
			'judul' => 'daftar',
			'kategori'=> $kategori->findAll(),
			'menu' => $menu,
			'pager' => $pager,
			'tampil' => $tampil,
			'total' => $count,
			'quantity_total' => $quantity_total
		];

		return view('cari', $data);
	}

		public function history(){
		$user = session()->get('pelanggan');
		$cart = new WFcart();
		$idpelanggan = $user['idpelanggan'];
		if(isset($_POST['cari-tanggal'])){
            $orderdetail = $this->vorderdetail->where('idpelanggan', $idpelanggan)->where('tglorder >= ', $this->request->getPost('tanggal-mulai'))
                ->where('tglorder <= ', $this->request->getPost('tanggal-akhir'))->paginate(3, 'page');
        }else {
            $orderdetail = $this->vorderdetail->where('idpelanggan', $idpelanggan)->paginate(3, 'page');
		}
		
		if(!empty(session()->get('cart'))){
			$quantity_total = $cart->quantity_totals();
		}else{
			$quantity_total = 0;
		}
		$kategori = new Kategori_M();
        $data = [
			'kategori'		=>	$kategori->paginate(),
            'orderdetail'   =>  $orderdetail,
			'pager'         =>  $this->vorderdetail->pager,
			'quantity_total'=>	$quantity_total
        ];
        return view('history', $data);

		}


	//--------------------------------------------------------------------

}
