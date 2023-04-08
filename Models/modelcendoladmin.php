<?php namespace App\Models;

use CodeIgniter\Model;

class Modelcendoladmin extends Model
{
    //table name
    protected $table = "admin";

    //allowed fields
    protected $allowedFields = 
    [
        'nama',
        'bagian',
        'alamat'
    ];

    public function getcendoladmin()
    {
        return $this->findAll();
    }


    public function getcendoladminById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_admin' => $id]);
        }   
    }
	
	public function updatecendoladmin($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_admin' => $id));
        return $query;
    }
	
	public function deletecendoladmin($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_admin' => $id));
        return $query;
    }

    public function insertcendoladmin($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>