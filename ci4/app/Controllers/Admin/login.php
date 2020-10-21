<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User_M;

class Login extends BaseController

{
	public function index()
	{

        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new User_M();
            $user = $model->where(['email'=>$email, 'password'=>$password, 'aktif'=> 1])->first();

            print_r($user);
            $this->setSession($user);
        } else {
            # code...
        }
        
		return view('template/login');
    }
    
    public function setSession($user)
    {
        $data = [
            'user' => $user['user'],
            'email' => $user['email'],
            'level' => $user['level'],
            'loggedIn' =>true

        ];

        session()->set($data);
    }

	//--------------------------------------------------------------------

}
