<?php
    namespace App\Controllers;
    use App\Models\Modelcendolmahasiswa;

    class cendolmahasiswa extends BaseController
    {
        public function index()
        {
            $Modelcendolmahasiswa = new Modelcendolmahasiswa();
            $pager = \Config\Services::pager();

            $data = array (
                'Modelcendolmahasiswa' => $Modelcendolmahasiswa->paginate(10, 'cendolmahasiswa'),
                'pager' => $Modelcendolmahasiswa->pager
            );

            return view('cendolmahasiswa', $data);
        }

        public function update($id)
        {
            $model = new Modelcendolmahasiswa();   
            $data['cendolmahasiswa'] = $model->getcendolmahasiswaById($id)->getRow();
            echo view('cendolmahasiswaedit', $data);
        }

        public function edit()
        {
            $model = new Modelcendolmahasiswa();
            $id = $this->request->getPost('id');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'prodi' => $this->request->getPost('prodi'),
            );
            $model->updatecendolmahasiswa($data, $id);
            return redirect()->to('/cendolmahasiswa');

        }

        public function delete($id)
        {
            $model = new Modelcendolmahasiswa();
            $model->deletecendolmahasiswa($id);
            return redirect()->to('/cendolmahasiswa');
        }

        public function input()
        {
            echo view('cendolmahasiswaInput');
        }

        public function insert()
        {
            $model = new Modelcendolmahasiswa();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'prodi' => $this->request->getPost('prodi'),
            );
            $model->insertcendolmahasiswa($data);
            return redirect()->to('/cendolmahasiswa');   
        }

    }
    

?>