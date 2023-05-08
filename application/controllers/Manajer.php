<?php

class Manajer extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('barang_model');
        $this->load->model('pengambilan_model');
    }

    public function index()
    {
        $this->load->view('manajer/index');
    }

    public function table()
    {
        $data['DaftarBE'] = $this->barang_model->BE();
        $this->load->view('manajer/table/index', $data);
    }

    public function grafik()
    {
        $data['DaftarBE'] = $this->barang_model->BE();
        $this->load->view('manajer/grafik/index', $data);
    }
}

?>