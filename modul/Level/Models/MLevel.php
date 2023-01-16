<?php
namespace Modul\Level\Models;
use CodeIgniter\Model;

class MLevel extends Model
{

    public function simpan($table,$data)
    {
        
            $builder = $this->db->table($table);
            $result = $builder->insert($data);
        return $result;
    }
    public function levelUser()
    {
            $result = $this->db->query("SELECT * FROM level WHERE id NOT IN ('1')")->getResult();
        
        
        return $result;
    }
    public function getlevel()
    {
            $result = $this->db->query("SELECT * FROM level")->getResult();
        
        
        return $result;
    }
    

}
