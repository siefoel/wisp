<?php
namespace Modul\Alamat\Models;
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
            $tblprov = $this->db->table('provinsi');
            $result = $tblprov->where('id',$id)->get()->getRow();
        }else{
            $tblprov = $this->db->table('provinsi');
            $result = $tblprov->orderBy('id','ASC')->get()->getResult();
        }
        
        return $result;
    }
    public function getKota($id = null,$p = null)
    {
        if ($id != null) {
            if ($p == 1) {
                $tblprov = $this->db->table('kota');
                $result1 = $tblprov->where('id',$id)->get()->getRow();
            }elseif($p == 2){
                $tblprov = $this->db->table('kota');
                $result1 = $tblprov->where('id_prov',$id)->orderBy('id','ASC')->get()->getResult();
            }

            $result = $result1;
            
        }else{
            $tblprov = $this->db->table('kota');
            $result = $tblprov->orderBy('id','ASC')->get()->getResult();
        }
        
        return $result;
    }
    public function getKec($id = null,$p = null)
    {
        if ($id != null) {
            if ($p == 1) {
                $tblprov = $this->db->table('kecamatan');
                $result1 = $tblprov->where('id_kota',$id)->get()->getRow();
            }elseif($p == 2){
                $tblprov = $this->db->table('kecamatan');
                $result1 = $tblprov->where('id_kota',$id)->orderBy('id','ASC')->get()->getResult();
            }

            $result = $result1;
            
        }else{
            $tblprov = $this->db->table('kecamatan');
            $result = $tblprov->orderBy('id','ASC')->get()->getResult();
        }
        
        
        return $result;
    }

    public function getDesa($id = null,$p = null)
    {
        if ($id != null) {
            if ($p == 1) {
                $tblprov = $this->db->table('desa');
                $result1 = $tblprov->where('id_desa',$id)->get()->getRow();
            }elseif($p == 2){
                $tblprov = $this->db->table('desa');
                $result1 = $tblprov->where('id_kec',$id)->orderBy('id','ASC')->get()->getResult();
            }

            $result = $result1;
            
        }else{
            $tblprov = $this->db->table('desa');
            $result = $tblprov->orderBy('id','ASC')->get()->getResult();
        }
        
        
        return $result;
    }
    

}
