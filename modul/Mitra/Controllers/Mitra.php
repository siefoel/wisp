<?php
namespace Modul\Mitra\Controllers;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class Mitra extends BaseController
{
    public function index()
    {
        $data = [
            'bc' => "Data Mitra",
            'mapp' => 1,
            'mmitra' => 1

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
}
