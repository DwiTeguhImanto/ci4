<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Libraries\WFcart;
use App\Models\Order_M;

class Keranjang extends BaseController
{
    protected $db;
    protected $tblorderdetail;
    protected $tblorder;
    public function __construct()
    {
        $this->db=\Config\Database::connect();
        $this->tblorderdetail = $this->db->table('tblorderdetail');
        $this->tblorder = $this->db->table('tblorder');
    }

    public function index()
	{
    
        $cart = new WFcart();
		if (!empty(session()->get('cart'))) {
            $quantity_total = $cart->quantity_totals();
        }else {
            $quantity_total = 0;
        }
		$kategori = new Kategori_M();

		
		$data = [
			'judul' => 'DATA MENU ',
			'kategori' => $kategori->paginate(),
			'items' => $cart->totals(),
            'quantity_total' => $quantity_total,
            'total' => $cart->count_totals()

		];

		return view("keranjang",$data);

    }
    
    public function tambah_keranjang($id=null)
    {
        $cart = new WFcart();
        $user = session()->get('pelanggan');
        $menu = new Menu_M();
        $menu = $menu->where('idmenu',$id)
        ->first();

        $data = [
            'idpelanggan'   =>  $user['idpelanggan'],
            'id'            =>  $id,
            'menu'          =>  $menu['menu'],
            'price'         =>  $menu['harga'],
            'quantity'      =>  1,
        ];

        $cart->add_cart($id, $data);

        return redirect()->to(base_url('keranjang'));
    }

    public function min($id = null){
        $cart = new WFcart();
        $cart->minus($id);
        return redirect()->to(base_url('keranjang'));
    }

    public function plus($id = null){
        $cart = new WFcart();
        $cart->plus($id);
        return redirect()->to(base_url('keranjang'));
    }

    public function remove($id = null){
        $cart = new WFcart();
        $menu = new Menu_M();
        $menu = $menu->where('idmenu',$id)
        ->first();
        // var_dump($this->cart->remove($id));
        if($menu != null){
            $cart->remove($id);
            session()->setFlashdata('pesan', '<div class="alert alert-success my-2" role="alert">
                '. $menu['menu'] .' berhasil dihapus
            </div>');
        }else{
            session()->setFlashdata('pesan', '<div class="alert alert-danger my-2" role="alert">
                Gagal menghapus
            </div>');
        }
        return redirect()->to(base_url('keranjang'));
    }

    public function prosesPesan(){
        date_default_timezone_set('Asia/jakarta');
        $cart = new WFcart();
        $user = session()->get('pelanggan');
        $idpelanggan = $user['idpelanggan'];
        $order = new Order_M();
        $keranjang = session()->get('cart');
        $dataOrder = [
            'idpelanggan'       =>  $idpelanggan,
            'tglorder'          =>  date('Y-m-d'),
            'total'             =>  $cart->count_totals(),
            'bayar'             =>  0,
            'kembali'           =>  0,
            'status'            =>  0
        ];
        $this->tblorder->insert($dataOrder);
        $idOrder = $this->db->insertID();
        foreach($keranjang as $key){
            $dataOrderDetail = [
                'idorder'       =>  $idOrder,
                'idmenu'        =>  $key['id'],
                'jumlah'        =>  $key['quantity'],
                'hargajual'     =>  $key['price']
            ];
            $this->tblorderdetail->insert($dataOrderDetail);
        }
        session()->remove('cart');
        session()->setFlashdata('pesan', '<div class="alert alert-success my-2" role="alert">
            Pesanan anda telah di proses, terimakasih telah memesan
        </div>');
        return redirect()->to(base_url());
    }
	
	

	


	//--------------------------------------------------------------------

}
