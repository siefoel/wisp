<?php
namespace Modul\Alamat\Controllers;
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
        return view('Modul\Alamat\Views\alamat_v',$data);
    }

    public function simpan()
    {
        if ($this->request->getVar('pilih') == 1) {
            $data =[
                'id' => $this->request->getVar('kd_prov'),
                'nama_prov' => $this->request->getVar('nama_prov'),
            ];
            $table = 'provinsi';
        }elseif ($this->request->getVar('pilih') == 2){
            $data =[
                'id' => '',
                'id_prov' => $this->request->getVar('prov'),
                'nama_kota' => $this->request->getVar('nama_kota'),
            ];
            $table ='kota';
        }elseif ($this->request->getVar('pilih') == 3) {
            $data =[
                'id' => '',
                'id_kota' => $this->request->getVar('kota'),
                'nama_kec' => $this->request->getVar('nama_kec'),
            ];
            $table ='kecamatan';
        }else{
            $data =[
                'id' => '',
                'id_kec' => $this->request->getVar('kec'),
                'nama_desa' => $this->request->getVar('nama_desa'),
            ];
            $table ='desa';
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
        $dkec= $this->malamat->getKec($id,2);
            echo "<option value=''></option>";
            foreach ($dkec as $kec) {
                echo "<option value='$kec->id'>$kec->nama_kec</option>";
            }

    }
    public function getdesa()
    {
        
        $id = $this->request->getVar('id');
        $ddesa= $this->malamat->getDesa($id,2);
            echo "<option value=''></option>";
            foreach ($ddesa as $desa) {
                echo "<option value='$desa->id'>$desa->nama_desa</option>";
            }

    }
}
