<?php
namespace Modul\User\Models;
use CodeIgniter\Model;

class Muser extends Model
{
    public function autoKode()
    {
      $q = $this->db->query("SELECT MAX(id) as id FROM user")->getRowArray();
      $awal = (!empty($q)) ? $q['id'] : 0 ;
      $urut = ($awal != 0 ) ? (int) substr($awal, 3, 4) : 0;
      $urut++;
      $kode = 'URW' . sprintf("%04s", $urut);
      return $kode;
    }
    public function simpan($table,$data)
    {
        
            $builder = $this->db->table($table);
            $result = $builder->insert($data);
        return $result;
    }
    

}
