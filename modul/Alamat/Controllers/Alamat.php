<?php
namespace Modul\Ref\Controllers;
use App\Controllers\BaseController;

class Alamat extends BaseController
{
    public function index()
    {
        $data = [
            'mref' => 1,
            'smalamat' => 1,
            'dprov' => $this->malamat->getProv(),
            'dkota' => $this->malamat->getKota(),
            'dkec' => $this->malamat->getKec(),
            'ddesa' => $this->malamat->getDesa(),

        ];
        return view('Modul\Ref\Views\alamat_v',$data);
    }

    public function simpan()
    {
        if ($this->request->getVar('pilih') == 1) {
            $data =[
                'id' => $this->request->getVar('kd_prov'),
                'nama_prov' => $this->request->getVar('nama_prov'),
            ];
            $table = 'ref.prov';
        }elseif ($this->request->getVar('pilih') == 2){
            $data =[
                'id' => $this->request->getVar('kd_kota'),
                'id_prov' => $this->request->getVar('prov'),
                'nama_kota' => $this->request->getVar('nama_kota'),
            ];
            $table ='ref.kota';
        }elseif ($this->request->getVar('pilih') == 3) {
            $data =[
                'id' => $this->request->getVar('kd_kec'),
                'id_kota' => $this->request->getVar('kota'),
                'nama_kecamatan' => $this->request->getVar('nama_kec'),
            ];
            $table ='ref.kecamatan';
        }else{
            $data =[
                'id' => $this->request->getVar('kd_desa'),
                'id_kecamatan' => $this->request->getVar('kec'),
                'nama_desa' => $this->request->getVar('nama_desa'),
            ];
            $table ='ref.desa';
        }
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
    public function getkota()
    {
        
        $id = $this->request->getVar('id');
        $dkota= $this->malamat->getKota($id,2);
            echo "<option value=''></option>";
            foreach ($dkota as $kota) {
                echo "<option value='$kota->id'>$kota->nama_kota</option>";
            }

    }
    public function getkec()
    {
        
        $id = $this->request->getVar('id');
        $dkota= $this->malamat->getKec($id,2);
            echo "<option value=''></option>";
            foreach ($dkota as $kota) {
                echo "<option value='$kota->id'>$kota->nama_kota</option>";
            }

    }
}
