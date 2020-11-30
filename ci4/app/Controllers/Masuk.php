<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;


class Masuk extends BaseController
{
	public function index()
	{
        $data=[];

        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new Pelanggan_M();
            $pelanggan = $model->where(['email'=>$email,  'aktif'=> 1])->first();

            if (empty($pelanggan)) {
                $data['info']= "Email Salah !";
                session()->setFlashdata('pesan', $data['info']);
                return redirect()->to(base_url('masuk'));
            } else {
                if ($password == $pelanggan['password']) {
                    $this->setSession($pelanggan);
                    return redirect()->to(base_url());
                } else {
                    $data['info']= "Password Salah !";
                    session()->setFlashdata('pesan', $data['info']);
                    return redirect()->to(base_url('masuk'));
                    // echo $data['info'];
                }
                
            }
            

        } else {
            return view('masuk', $data);
        }
        
		
    } 
    
    public function setSession($pelanggan)
    {
        $data = [
            'pelanggan' => $pelanggan['pelanggan'],
            'email' => $pelanggan['email'],
            'idpelanggan' => $pelanggan['idpelanggan'],
            'loggedIn' =>true

        ];

        session()->set('pelanggan',$data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url(''));
    }

	//--------------------------------------------------------------------

}
