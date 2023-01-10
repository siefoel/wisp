<?php
namespace Modul\Auth\Controllers;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        return view('Modul\Auth\Views\login_v');
    }

    public function register()
    {
        return view('Modul\Auth\Views\register_v');
    }
    public function forgout()
    {
        return view('Modul\Auth\Views\forgout_v');
    }
    public function reset()
    {
        return view('Modul\Auth\Views\resetpassword_v');
    }
}
