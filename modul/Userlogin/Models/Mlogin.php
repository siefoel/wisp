<?php
namespace Modul\Userlogin\Models;
use CodeIgniter\Model;

class Mlogin extends Model
{

    public function simpan($table,$data)
    {
        
            $builder = $this->db->table($table);
            $result = $builder->insert($data);
        return $result;
    }
    public function getData()
    {
            $builder = $this->db->table($table);
            $result = $builder->insert($data);
        return $result;
    }
    

}
