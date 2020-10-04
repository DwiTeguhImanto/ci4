<?php 

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Order extends BaseController
{
	public function index()
	{
        $db = \Config\Database::connect();
        $sql= "SELECT * FROM vorder ORDER BY status ASC";
        
        
        $result = $db->query($sql);

        $row = $result->getResult('array');

        $data = [
            'judul' => 'DATA ORDER ',
            'order' =>$row
        ];

        echo view('order/select', $data);
	}

	//--------------------------------------------------------------------

}
