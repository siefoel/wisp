<?php
namespace Modul\Level\Controllers;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use \Modul\Level\Models\MLevel;

class Level extends BaseController
{
    protected $mlevel;
    public function __construct(){
        $this->mlvel = new MLevel();
    }
    public function index()
    {
        $data = [
            'bc' => "Data Level User",
            'mref' => 1,
            'smlevel' => 1,

        ];
        return view('Modul\Level\Views\level_v',$data);
    }

    public function datatable()
    {
        // if(isLogin() == false){
        //     return redirect()->to(base_url('auth'));
        // }; 
            $builder = $this->db->table('level')->select('id,nama_level');
    
                return DataTable::of($builder)
                ->postQuery(function($builder){

                    $builder->orderBy('id', 'asc');
            
                })
                ->setSearchableColumns(['lower(nama_level)'])
                ->add('action', function ($row) {
                    // $d = [$row->id ,$row->nama_level,$row->status];
                    return '<button type="button" class="btn btn-md btn-warning btnedit" title="Edit Data Bank" onclick="edit(\'' . $row->id . '\');"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-md btn-danger btnhapus" title="Hapus Data Bank" onclick="hapus(\'' . $row->id . '\');"><i class="fas fa-trash"></i></button>
                            ';
                })
                ->toJson(true);
        
    }

    public function simpan()
    {
        $data =[
                'id' => $this->request->getVar('id_level'),
                'nama_level' => $this->request->getVar('nama_level'),
            ];
        $table = 'level';
        $result = $this->malamat->simpan($table,$data);

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
