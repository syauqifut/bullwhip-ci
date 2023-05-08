<?php

class Pesanan extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('pesanan_model');
    }

    public function index()
    {
        $this->load->view('pesanan/index');
    }

    public function pesanan()
    {
        $data['DaftarPesanan'] = $this->pesanan_model->PesananList();
        $this->load->view('pesanan/pesanan/index', $data);
    }

    public function barangBaru()
    {
        $this->load->view('pesanan/barangBaru/index');
    }
}

?>