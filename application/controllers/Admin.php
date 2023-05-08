<?php

class Admin extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('bagian_model');
        $this->load->model('barang_model');
        $this->load->model('pegawai_model');
    }

    public function index()
    {
        $this->load->view('admin/index');
    }

    public function bagian()
    {
        $data['DaftarBagian'] = $this->bagian_model->BagianList();
        $this->load->view('admin/bagian/index', $data);
    }

    public function barang()
    {
        $data['DaftarBarang'] = $this->barang_model->BarangList();
        $this->load->view('admin/barang/index', $data);
    }

    public function pegawai()
    {
        $data['DaftarPegawai'] = $this->pegawai_model->PegawaiList();
        $this->load->view('admin/pegawai/index', $data);
    }
}

?>