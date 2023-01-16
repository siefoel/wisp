<?php
namespace Modul\Userlogin\Controllers;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class Userlogin extends BaseController
{
    public function index()
    {
        $data = [
            'mapp' => 1,
            'muserlogin' => 1

        ];
        return view('Modul\Userlogin\Views\userlogin_v',$data);
    }
    public function datatable()
    {
        $builder = $this->db->table('login')
                    ->select('id,id_user,email,id_level,status');
    
                return DataTable::of($builder)
                ->add('st', function ($row) {
                    if ($row->status > 0) {
                        $stt = "<span class='badge bg-success'>Active</span>";
                    }else{
                        $stt = "<span class='badge bg-secondary'>Tidak Active</span>";
                    }
                    return $stt;
                })
                ->add('action', function ($row) {
                    // $d = [$row->id ,$row->nama_level,$row->status];
                    return '
                    <div class="d-inline-block text-nowrap">
                        <button class="btn btn-sm btn-icon" onclick="edit(\'' . $row->id . '\');"><i class="bx bx-edit"></i></button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="hapus(\'' . $row->id . '\');"><i class="bx bx-trash"></i></button>
                    </div>
                            ';
                })
                ->addNumbering('no')->toJson(true);
    }
}
