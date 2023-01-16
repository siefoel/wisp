<?php
namespace Modul\Mitra\Models;
use CodeIgniter\Model;

class Mmitra extends Model
{
    public function autoKode()
    {
      $q = $this->db->query("SELECT MAX(id_mitra) as id FROM mitra")->getRowArray();
      $awal = (!empty($q)) ? $q['id'] : 0 ;
      $urut = ($awal != 0 ) ? (int) substr($awal, 3, 4) : 0;
      $urut++;
      $kode = 'MTW' . sprintf("%04s", $urut);
      return $kode;
    }
    public function simpan($table,$data)
    {
        
            $builder = $this->db->table($table);
            $result = $builder->insert($data);
        return $result;
    }
    

}
