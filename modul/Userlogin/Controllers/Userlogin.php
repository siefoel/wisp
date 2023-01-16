<?php
namespace Modul\Userlogin\Controllers;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use \Modul\Level\Models\MLevel;
use \Modul\Userlogin\Models\Mlogin;

class Userlogin extends BaseController
{
    
    protected $mlevel;
    protected $mlogin;
    public function __construct(){
        $this->mlevel = new MLevel();
        $this->mlogin = new Mlogin();
    }
    public function index()
    {
        $data = [
            'mapp' => 1,
            'muserlogin' => 1,
            'dlevel' =>$this->mlevel->getlevel(),

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

    public function simpan()
    {
            
            $stt = (!empty($this->request->getVar('status'))) ? 1 : 0;
            $dataLogin =[
                'id' => '',
                'id_user' => '',
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'id_level' => $this->request->getVar('level'),
                'status' => $stt,

            ];
        $result = $this->mlogin->simpan('login',$dataLogin);

        if($result){
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
