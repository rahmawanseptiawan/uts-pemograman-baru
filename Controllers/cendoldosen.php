<?php
    namespace App\Controllers;
    use App\Models\Modelcendoldosen;

    class cendoldosen extends BaseController
    {
        public function index()
        {
            $Modelcendoldosen = new Modelcendoldosen();
            $pager = \Config\Services::pager();

            $data = array (
                'Modelcendoldosen' => $Modelcendoldosen->paginate(10, 'cendoldosen'),
                'pager' => $Modelcendoldosen->pager
            );

            return view('cendoldosen', $data);
        }

        public function update($id)
        {
            $model = new Modelcendoldosen();   
            $data['cendoldosen'] = $model->getcendoldosenById($id)->getRow();
            echo view('cendoldosenedit', $data);
        }

        public function edit()
        {
            $model = new Modelcendoldosen();
            $id = $this->request->getPost('id_dosen');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'nidn' => $this->request->getPost('nidn'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->updatecendoldosen($data, $id);
            return redirect()->to('/cendoldosen');

        }

        public function delete($id)
        {
            $model = new Modelcendoldosen();
            $model->deletecendoldosen($id);
            return redirect()->to('/cendoldosen');
        }

        public function input()
        {
            echo view('cendoldoseninput');
        }

        public function insert()
        {
            $model = new Modelcendoldosen();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'nidn' => $this->request->getPost('nidn'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->insertcendolmahasiswa($data);
            return redirect()->to('/cendoldosen');   
        }

    }
    

?>