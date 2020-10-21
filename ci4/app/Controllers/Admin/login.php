<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User_M;

class Login extends BaseController

{
	public function index()
	{

        $data=[];

        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new User_M();
            $user = $model->where(['email'=>$email, 'password'=>$password, 'aktif'=> 1])->first();

            if (empty($user)) {
                $data['info']= "User Atau Password Salah !";
            } else {
                $this->setSession($user);
                return redirect()->to(base_url("/admin"));
            }
               
        } else {
            # code...
        }
        
		return view('template/login', $data);
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
