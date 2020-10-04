<?php 

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Order extends BaseController
{
	public function index()
	{
        $pager = \Config\Services::pager();
        $db = \Config\Database::connect();


        $sql= "SELECT * FROM vorder ";
        $result = $db->query($sql);
        $row = $result->getResult('array');

        $total = count($row);
        $tampil = 6;

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $mulai = ($tampil * $page )- $tampil;
            $sql= "SELECT * FROM vorder ORDER BY status ASC LIMIT $mulai, $tampil";
        }else {

            $sql= "SELECT * FROM vorder ORDER BY status ASC LIMIT 0, $tampil";
        }
        $result = $db->query($sql);
        $row = $result->getResult('array');

        $data = [
            'judul' => 'DATA ORDER ',
            'order' =>$row,
            'pager' =>$pager,
            'perPage' =>$tampil,
            'total' =>$total
        ];

        echo view('order/select', $data);
	}

	//--------------------------------------------------------------------

}
