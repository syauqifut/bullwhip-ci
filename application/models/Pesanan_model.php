<?php

class Pesanan_model extends CI_Model {

    private $id_pesanan;
    private $nama_pemesan;
    private $id_barang;
    private $jumlah_pesanan;

    public function __construct() {
        $this->load->database();
    }

    function setId_Pesanan($id_pesanan) {
        $this->id_pesanan = $id_pesanan;
    }

    function setNama_Pemesan($nama_pemesan) {
        $this->nama_pemesan = $nama_pemesan;
    }

    function setId_Barang($id_barang) {
        $this->id_barang = $id_barang;
    }

    function setJumlah_Pesanan($jumlah_pesanan) {
        $this->jumlah_pesanan = $jumlah_pesanan;
    }

    function getId_Pesanan() {
        return $id_pesanan;
    }

    function getNama_Pemesan() {
        return $nama_pemesan;
    }

    function getId_Barang() {
        return $id_barang;
    }

    function getJumlah_Pesanan() {
        return $jumlah_pesanan;
    }

    function PesananTambah() {
        try {
            $query = "INSERT INTO pemesanan (id_pesanan, nama_pemesan, id_barang, jumlah_pesanan) VALUES (?, ?, ?, ?)";
            $pesananTambah = $this->db->query($query, [$this->id_pesanan, $this->nama_pemesan, $this->id_barang, $this->jumlah_pesanan])->result_array();

            return $pesananTambah;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function PesananList() {
        $query = "SELECT pemesanan.id_pesanan, pemesanan.nama_pemesan, pemesanan.jumlah_pesanan, nama_barang FROM pemesanan JOIN barang USING (id_barang)";
        $pesananList = $this->db->query($query)->result_array();

        return $pesananList;
    }

    function PesananEditList() {
        try {
            $query = "UPDATE pemesanan
                SET nama_pemesan = ?,
                    id_barang = ?,
                    jumlah_pesanan = ?
                WHERE id_pesanan = ?";
            $pesananList = $this->db->query($query, [$this->nama_pemesan, $this->id_barang, $this->jumlah_pesanan, $this->id_pesanan])->result_array();

            return $pesananList;
        } catch (Exception $e) {
            throw $e;
        }
    }

}
