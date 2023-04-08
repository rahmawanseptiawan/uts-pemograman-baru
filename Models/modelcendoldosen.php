<?php namespace App\Models;

use CodeIgniter\Model;

class Modelcendoldosen extends Model
{
    //table name
    protected $table = "t_dosen";

    //allowed fields
    protected $allowedFields = 
    [
        'nama',
        'nidn',
        'alamat'
    ];

    public function getcendoldosen()
    {
        return $this->findAll();
    }


    public function getcendoldosenById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_dosen' => $id]);
        }   
    }
	
	public function updatecendoldosen($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_dosen' => $id));
        return $query;
    }
	
	public function deletecendoldosen($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_dosen' => $id));
        return $query;
    }

    public function insertcendolmahasiswa($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>