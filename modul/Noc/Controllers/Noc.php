<?php
namespace Modul\Noc\Controllers;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use \Modul\Level\Models\MLevel;
use \Modul\User\Models\Muser;
use \Modul\Userlogin\Models\Mlogin;

class Noc extends BaseController
{
    protected $muser;
    protected $mlevel;
    protected $mlogin;
    public function __construct(){
        $this->mlevel = new MLevel();
        $this->muser = new Muser();
        $this->mlogin = new Mlogin();
    }
    public function index()
    {
        $data = [
            'bc' => "Data Pegawai",
            'bc1' => "NOC",
            'mpegawai' => 1,
            'smnoc' => 1,
            'dprov' =>$this->malamat->getProv(),
            'dlevel' =>$this->mlevel->levelPegawai(),

        ];
        return view('Modul\Noc\Views\noc_v',$data);
    }
    public function tableuser()
    {
        $builder = $this->db->table('user  u')
                    ->select('u.id as iduser,u.npsn as npsn,u.foto as lf,u.nama as nm,u.alamat as alamat,u.email as email,u.tlp as tlp,u.id_prov as prov,u.id_kota as kota,u.status as stt, l.id_level as lv')
                    ->join('app.login as l','l.id_user = u.id', 'LEFT')
                    ->orderBy('u.id', 'DESC');
    
                return DataTable::of($builder)
                ->setSearchableColumns(['lower(nama)'])
                ->add('person', function ($row){
                    $person = "<div class='d-inline-block align-middle'>
                    <img src='assets_a/images/user/avatar-4.jpg' alt='user image' class='img-radius wid-40 align-top m-r-15'>
                    <div class='d-inline-block'>
                        <h6>$row->nm</h6>
                        <p class='text-muted m-b-0'>$row->email</p>
                    </div>
                </div>";
                return $person;
                })
                ->add('st', function ($row) {
                    if ($row->stt > 0) {
                        $stt = "<span class='badge bg-success'>Active</span>";
                    }else{
                        $stt = "<span class='badge bg-secondary'>Tidak Active</span>";
                    }
                    return $stt;
                })
                ->add('action', function ($row) {
                    // $d = [$row->id ,$row->nama_level,$row->status];
                    return '<button type="button" class="btn btn-sm btn-warning btnedit" title="Edit Data Bank" onclick="edit(\'' . $row->iduser . '\');"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-danger btnhapus" title="Hapus Data Bank" onclick="hapus(\'' . $row->iduser . '\');"><i class="fas fa-trash"></i></button>
                            ';
                })
                ->add('level', function ($row) {
                    // $d = [$row->id ,$row->nama_level,$row->status];
                    $level = $this->db->table('ref.level')->select('nama_level')->where('id',$row->lv)->get()->getRowObject();
                    return $level->nama_level;
                })
                ->addNumbering('no')->toJson(true);
    }
}
