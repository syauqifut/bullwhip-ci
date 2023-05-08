<?php

class Gudang extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('barang_model');
        $this->load->model('pengambilan_model');
    }

    public function index()
    {
        $this->load->view('gudang/index');
    }

    public function stok()
    {
        $data['DataStok'] = $this->barang_model->StokBarang();
        $this->load->view('gudang/stok/index', $data);
    }

    public function pengambilan()
    {
        $data['DaftarPengambilan'] = $this->pengambilan_model->AmbilBarangList();
        $this->load->view('gudang/pengambilan/index', $data);
    }
}

?>