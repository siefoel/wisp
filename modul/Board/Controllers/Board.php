<?php
namespace Modul\Board\Controllers;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
// use \Modul\User\Models\Muser;

class Board extends BaseController
{
    protected $muser;
    public function __construct(){
        // $this->muser = new Muser();
    }
    public function index()
    {
        $data = [
            'bc' => "Board",
            'mapp' => 1,
            'muser' => 1

        ];
        return view('Modul\Board\Views\board_v',$data);
    }
    public function add()
    {
        $data = [
            'bc' => "Board",
            'bc1' => "Add Board",
            'mapp' => 1,
            'muser' => 1

        ];
        return view('Modul\Board\Views\add_v',$data);
    }
    public function datatable()
    {
        $builder = $this->db->table('user')
                    ->select('id,nik,nama_user,tmp_lahir,tgl_lahir,alamat,id_prov,id_kota,id_kec,id_desa,no_hp,email,status');
    
                return DataTable::of($builder)
                ->setSearchableColumns(['lower(nama_user)'])
                ->add('person', function ($row){
                    $person = "<div class='d-inline-block align-middle'>
                    <img src='assets/images/user/avatar-4.jpg' alt='user image' class='img-radius wid-40 align-top m-r-15'>
                    <div class='d-inline-block'>
                        <h6>$row->nama_user</h6>
                        <p class='text-muted m-b-0'>$row->email</p>
                    </div>
                </div>";
                return $person;
                })
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
                    return '<button type="button" class="btn btn-sm btn-warning btnedit" title="Edit Data Bank" onclick="edit(\'' . $row->id . '\');"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-danger btnhapus" title="Hapus Data Bank" onclick="hapus(\'' . $row->id . '\');"><i class="fas fa-trash"></i></button>
                            ';
                })
                ->addNumbering('no')->toJson(true);
    }
}
