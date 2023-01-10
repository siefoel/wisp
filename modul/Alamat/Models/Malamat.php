<?php
namespace Modul\Ref\Models;
use CodeIgniter\Model;

class Malamat extends Model
{

    public function simpan($table,$data)
    {
        
            $builder = $this->db->table($table);
            $result = $builder->insert($data);
        return $result;
    }
    public function getProv($id = null)
    {
        if ($id != null) {
            $tblprov = $this->db->table('ref.prov');
            $result = $tblprov->where('id',$id)->get()->getRow();
        }else{
            $tblprov = $this->db->table('ref.prov');
            $result = $tblprov->orderBy('id','ASC')->get()->getResult();
        }
        
        return $result;
    }
    public function getKota($id = null,$p = null)
    {
        if ($id != null) {
            if ($p == 1) {
                $tblprov = $this->db->table('ref.kota');
                $result1 = $tblprov->where('id',$id)->get()->getRow();
            }elseif($p == 2){
                $tblprov = $this->db->table('ref.kota');
                $result1 = $tblprov->where('id_prov',$id)->orderBy('nama_kota','ASC')->get()->getResult();
            }

            $result = $result1;
            
        }else{
            $tblprov = $this->db->table('ref.kota');
            $result = $tblprov->orderBy('nama_kota','ASC')->get()->getResult();
        }
        
        return $result;
    }
    public function getKec($id = null,$p = null)
    {
        if ($id != null) {
            if ($p == 1) {
                $tblprov = $this->db->table('ref.kecamatan');
                $result1 = $tblprov->where('id',$id)->get()->getRow();
            }elseif($p == 2){
                $tblprov = $this->db->table('ref.kecamatan');
                $result1 = $tblprov->where('id_kota',$id)->orderBy('nama_kecamatan','ASC')->get()->getResult();
            }

            $result = $result1;
            
        }else{
            $tblprov = $this->db->table('ref.kecamatan');
            $result = $tblprov->orderBy('nama_kecamatan','ASC')->get()->getResult();
        }
        
        
        return $result;
    }

    public function getDesa($id = null,$p = null)
    {
        if ($id != null) {
            if ($p == 1) {
                $tblprov = $this->db->table('ref.desa');
                $result1 = $tblprov->where('id',$id)->get()->getRow();
            }elseif($p == 2){
                $tblprov = $this->db->table('ref.desa');
                $result1 = $tblprov->where('id_kecamatan',$id)->orderBy('nama_desa','ASC')->get()->getResult();
            }

            $result = $result1;
            
        }else{
            $tblprov = $this->db->table('ref.desa');
            $result = $tblprov->orderBy('nama_desa','ASC')->get()->getResult();
        }
        
        
        return $result;
    }
    

}
