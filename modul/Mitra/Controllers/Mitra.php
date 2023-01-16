<?php
namespace Modul\Mitra\Controllers;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use \Modul\User\Models\Muser;
use \Modul\Userlogin\Models\Mlogin;
use \Modul\Mitra\Models\Mmitra;

class Mitra extends BaseController
{

    protected $muser;
    protected $mlogin;
    protected $mmitra;
    public function __construct(){
        $this->muser = new Muser();
        $this->mlogin = new Mlogin();
        $this->mmitra = new Mmitra();
    }

    public function index()
    {
        $data = [
            'bc' => "Data Mitra",
            'mapp' => 1,
            'mmitra' => 1,
            'dprov' =>$this->malamat->getProv(),

        ];
        return view('Modul\Mitra\Views\mitra_v',$data);
    }
    public function datatable()
    {
        $builder = $this->db->table('mitra')->orderBy('nama_mitra', 'DESC');
    
                return DataTable::of($builder)
                ->setSearchableColumns(['lower(nama)'])
                ->add('mitra', function ($row){
                    $mitra = "<div class='d-inline-block align-middle'>
                    <img src='assets_a/images/user/avatar-4.jpg' alt='user image' class='img-radius wid-40 align-top m-r-15'>
                    <div class='d-inline-block'>
                        <h6>$row->nama_mitra</h6>
                        <p class='text-muted m-b-0'>$row->alamat $row->id_desa $row->id_kec $row->id_kota $row->id_prov</p>
                    </div>
                </div>";
                return $mitra;
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
                    return '<button type="button" class="btn btn-sm btn-warning btnedit" title="Edit Data Bank" onclick="edit(\'' . $row->id_mitra . '\');"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-danger btnhapus" title="Hapus Data Bank" onclick="hapus(\'' . $row->id_mitra . '\');"><i class="fas fa-trash"></i></button>
                            ';
                })
                ->add('level', function ($row) {
                    // $d = [$row->id ,$row->nama_level,$row->status];
                    $level = $this->db->table('ref.level')->select('nama_level')->where('id',$row->lv)->get()->getRowObject();
                    return $level->nama_level;
                })
                ->addNumbering('no')->toJson(true);
    }

    public function simpan()
    {
            $id = $this->muser->autoKode();
            $id_mitra = $this->mmitra->autoKode();
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
            $dataMitra =[
                'id_user' => $id_mitra,
                'kode_mitra' => $this->request->getVar('kd_mitra'),
                'nama_mitra' => $this->request->getVar('nama_mitra'),
                'alamat' => $this->request->getVar('alamat1'),
                'id_prov' => $this->request->getVar('prov1'),
                'id_kota' => $this->request->getVar('kota1'),
                'id_kec' => $this->request->getVar('kec1'),
                'id_desa' => $this->request->getVar('desa1'),
                'lang' => $this->request->getVar('long '),
                'long' => $this->request->getVar('lang'),
                'id_user' => $id,
                'LOGO' => '',
                'status' => $stt,

            ];
        $result = $this->muser->simpan('user',$dataUser);
        $result2 = $this->mlogin->simpan('login',$dataLogin);
        $result3 = $this->mmitra->simpan('mitra',$dataMitra);

        if($result && $result2 && $result3){
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
