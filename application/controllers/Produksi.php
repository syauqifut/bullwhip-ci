<?php

class Produksi extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('produksi_model');
    }

    public function index()
    {
        $this->load->view('produksi/index');
    }

    public function pesanan()
    {
        $data['DaftarPesanan'] = $this->produksi_model->LihatPesanan();
        $this->load->view('produksi/pesanan/index', $data);
    }

    public function produksi()
    {
        $data['TabelProduksi'] = $this->produksi_model->DaftarProduksi();
        $this->load->view('produksi/produksi/index', $data);
    }

    public function pesananForm($id)
    {
        $data['Produksi'] = $this->produksi_model->findPesananById($id);
        $this->load->view('produksi/pesanan/form', $data);
    }
}

?>