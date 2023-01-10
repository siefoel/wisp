<?php
namespace Modul\Dashboard\Controllers;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title_page' => 'Dashboard',
            'breadcumb' => ''

        ];
        return view('Modul\Dashboard\Views\dashboard_v', $data);
    }
    public function paket()
    {
        return "selamat datang di Paket 2";
    }
}
