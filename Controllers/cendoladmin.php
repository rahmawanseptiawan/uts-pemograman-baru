<?php
    namespace App\Controllers;
    use App\Models\Modelcendoladmin;

    class cendoladmin extends BaseController
    {
        public function index()
        {
            $Modelcendoladmin = new Modelcendoladmin();
            $pager = \Config\Services::pager();

            $data = array (
                'Modelcendoladmin' => $Modelcendoladmin->paginate(10, 'cendoladmin'),
                'pager' => $Modelcendoladmin->pager
            );

            return view('cendoladmin', $data);
        }

        public function update($id)
        {
            $model = new Modelcendoladmin();   
            $data['cendoladmin'] = $model->getcendoladminById($id)->getRow();
            echo view('cendoladminedit', $data);
        }

        public function edit()
        {
            $model = new Modelcendoladmin();
            $id = $this->request->getPost('id_admin');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'bagian' => $this->request->getPost('bagian'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->updatecendoladmin($data, $id);
            return redirect()->to('/cendoladmin');

        }

        public function delete($id)
        {
            $model = new Modelcendoladmin();
            $model->deletecendoladmin($id);
            return redirect()->to('/cendoladmin');
        }

        public function input()
        {
            echo view('cendoladminInput');
        }

        public function insert()
        {
            $model = new Modelcendoladmin();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'bagian' => $this->request->getPost('bagian'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->insertcendoladmin($data);
            return redirect()->to('/cendoladmin');   
        }

    }
    

?>