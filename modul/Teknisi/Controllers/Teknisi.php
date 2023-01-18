<?php
namespace Modul\Teknisi\Controllers;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use \Modul\Level\Models\MLevel;
use \Modul\User\Models\Muser;
use \Modul\Userlogin\Models\Mlogin;

class Teknisi extends BaseController
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
            'bc1' => "Teknisi",
            'mpegawai' => 1,
            'smteknisi' => 1,
            'dprov' =>$this->malamat->getProv(),
            'dlevel' =>$this->mlevel->levelPegawai(),

        ];
        return view('Modul\Teknisi\Views\teknisi_v',$data);
    }
    public function datatable()
    {
        $id_mitra = (empty($this->request->getVar('id_mitra'))) ? 0 : $this->request->getVar('status');
        if($id_mitra != 0){
            $builder = $this->db->table('teknisi t')
            ->select('u.id as iduser,u.nama_user as nama, u.no_hp as hp,u.email as email,t.status as stt')
            ->join('user u','u.id = t.id_user','LEFT')
            ->where("t.id_mitra = $id_mitra")
            ->orderBy('u.nama_user','DESC');
        }else{
            $builder = $this->db->table('teknisi t')
            ->select('u.id as iduser,u.nama_user as nama, u.no_hp as hp,u.email as email,t.status as stt')
            ->join('user u','u.id = t.id_user','LEFT')
            ->orderBy('u.nama_user','DESC');
        }
        
    
                return DataTable::of($builder)
                ->setSearchableColumns(['lower(nama)'])
                ->add('person', function ($row){
                    $person = "<div class='d-flex justify-content-start align-items-center user-name'><div class='avatar-wrapper'><div class='avatar avatar-sm me-3'><img src='assets/img/avatars/1.png' alt='Avatar' class='rounded-circle'></div></div><div class='d-flex flex-column'><a href='#' class='text-body text-truncate'><span class='fw-semibold'>$roe->nama</span></a><small class='text-muted'>$row->email</small></div></div>";
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
                ->addNumbering('no')->toJson(true);
    }
}
