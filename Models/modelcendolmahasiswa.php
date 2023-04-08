<?php namespace App\Models;

use CodeIgniter\Model;

class Modelcendolmahasiswa extends Model
{
    //table name
    protected $table = "t_mahasiswa13";

    //allowed fields
    protected $allowedFields = 
    [
        'nama',
        'nim',
        'prodi'
    ];

    public function getcendolmahasiswa()
    {
        return $this->findAll();
    }


    public function getcendolmahasiswaById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_mahasiswa' => $id]);
        }   
    }
	
	public function updatecendolmahasiswa($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_mahasiswa' => $id));
        return $query;
    }
	
	public function deletecendolmahasiswa($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_mahasiswa' => $id));
        return $query;
    }

    public function insertcendolmahasiswa($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>