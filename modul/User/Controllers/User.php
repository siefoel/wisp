<?php
namespace Modul\User\Controllers;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use \Modul\Level\Models\MLevel;
use \Modul\User\Models\Muser;
use \Modul\Userlogin\Models\Mlogin;

class User extends BaseController
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
            'bc' => "Data User",
            'mapp' => 1,
            'muser' => 1,
            'dprov' =>$this->malamat->getProv(),
            'dlevel' =>$this->mlevel->levelUser(),

        ];
        return view('Modul\User\Views\user_v',$data);
    }
    public function datatable()
    {
        $builder = $this->db->table('user')
                    ->select('id,nik,nama_user,tmp_lahir,tgl_lahir,alamat,id_prov,id_kota,id_kec,id_desa,no_hp,email,status');
    
                return DataTable::of($builder)
                ->setSearchableColumns(['lower(nama_user)'])
                ->add('person', function ($row){
                    $person = "
                    <div class='d-flex justify-content-start align-items-center user-name'><div class='avatar-wrapper'><div class='avatar avatar-sm me-3'><img src='assets/img/avatars/1.png' alt='Avatar' class='rounded-circle'></div></div><div class='d-flex flex-column'><a href='#' class='text-body text-truncate'><span class='fw-semibold'>$row->nama_user</span></a><small class='text-muted'>$row->email</small></div></div>";
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
                    return '
                    <div class="d-inline-block text-nowrap">
                        <button class="btn btn-sm btn-icon" onclick="edit(\'' . $row->id . '\');"><i class="bx bx-edit"></i></button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="hapus(\'' . $row->id . '\');"><i class="bx bx-trash"></i></button>
                    </div>
                            ';
                })
                ->addNumbering('no')->toJson(true);
    }

    public function simpan()
    {
            $id = $this->muser->autoKode();
            $stt = (!empty($this->request->getVar('status'))) ? 1 : 0;
            $dataUser =[
                'id' => $id,
                'nik' => $this->request->getVar('nik'),
                'nama_user' => $this->request->getVar('nm_user'),
                'tmp_lahir' => $this->request->getVar('tmp_lahir'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'gender' => $this->request->getVar('gender'),
                'alamat' => $this->request->getVar('alamat'),
                'id_prov' => $this->request->getVar('prov'),
                'id_kota' => $this->request->getVar('kota'),
                'id_kec' => $this->request->getVar('kec'),
                'id_desa' => $this->request->getVar('desa'),
                'no_hp' => $this->request->getVar('tlp'),
                'email' => $this->request->getVar('email'),
                'pekerjaan' => $this->request->getVar('pekerjaan'),
                'status' => $stt,
            ];
            $dataLogin =[
                'id' => '',
                'id_user' => $id,
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'id_level' => $this->request->getVar('level'),
                'status' => $stt,

            ];
        $result = $this->muser->simpan('user',$dataUser);
        $result2 = $this->mlogin->simpan('login',$dataLogin);

        if($result && $result2){
            $responsd =[
                "status" => TRUE
            ];
        }else{
            $responsd =[
                "status" => FALSE
            ];
        }
        echo json_encode($responsd);
    }
}
