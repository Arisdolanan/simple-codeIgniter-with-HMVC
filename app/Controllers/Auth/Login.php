<?php
 
namespace App\Controllers\Auth;
use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index($name = '', $age = 0)
    {
        $data['title']  = 'Title Page';
        $data['msg1']    = "Hello World";
        $data['msg2']    = 'CodeIgniter 4';
        $data['msg3']    = "My name is $name, i am $age years old";
        return view('about_view', $data);
    }

}