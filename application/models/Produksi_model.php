<?php

class Produksi_model extends CI_Model {

    private $id_produksi;
    private $id_pesanan;
    private $id_barang;
    private $jumlah_produksi;
    private $lead_time;
    private $proses;

    public function __construct() {
        $this->load->database();
    }

    function setId_Produksi($id_produksi) {
        $this->id_produksi = $id_produksi;
    }

    function setId_Pesanan($id_pesanan) {
        $this->id_pesanan = $id_pesanan;
    }

    function setId_Barang($id_barang) {
        $this->id_barang = $id_barang;
    }

    function setJumlah_Produksi($jumlah_produksi) {
        $this->jumlah_produksi = $jumlah_produksi;
    }

    function setLead_Time($lead_time) {
        $this->lead_time = $lead_time;
    }

    function setProses($proses) {
        $this->proses = $proses;
    }

    function getId_Produksi() {
        return $id_produksi;
    }

    function getId_Pesanan() {
        return $id_pesanan;
    }

    function getId_Barang() {
        return $id_barang;
    }

    function getJumlah_Produksi() {
        return $jumlah_produksi;
    }

    function getLead_Time() {
        return $lead_time;
    }

    function getProses() {
        return $proses;
    }

    function LihatPesanan() {
        $query = "SELECT pemesanan.id_pesanan, pemesanan.nama_pemesan, pemesanan.proses,
            barang.nama_barang, pemesanan.jumlah_pesanan FROM
            barang INNER JOIN pemesanan ON barang.id_barang = pemesanan.id_barang
            WHERE id_pesanan ORDER BY id_pesanan";
        $lihatPesanan = $this->db->query($query)->result_array();

        return $lihatPesanan;
    }

    function LihatPesananBelumProses() {
        $query = "SELECT pemesanan.id_pesanan, pemesanan.nama_pemesan, pemesanan.proses,
            barang.nama_barang, pemesanan.jumlah_pesanan FROM
            barang INNER JOIN pemesanan ON barang.id_barang = pemesanan.id_barang
            WHERE proses = 0 ORDER BY id_pesanan DESC";
        $lihatPesanan = $this->db->query($query)->result_array();

        return $lihatPesanan;
    }

    function findPesananById($id) {
        try {
            $query = "SELECT * FROM pemesanan WHERE id_pesanan = ?";
            $findPesananById = $this->db->query($query, [$id])->result_array();

            return $findPesananById;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function ProduksiTambah() {
        try {
            $query = "INSERT INTO produksi (id_produksi, id_pesanan, id_barang, jumlah_produksi, lead_time) VALUES (?, ?, ?, ?, ?)";
            $sqlAddProduksi = $this->db->query($query, [$this->id_produksi, $this->id_pesanan, $this->id_barang, $this->jumlah_produksi, $this->lead_time])->result_array();

            $query2 = "UPDATE pemesanan SET proses = 1 WHERE id_pesanan = ?";
            $updatePemesanan = $this->db->query($query, [$this->id_pesanan])->result_array();

            return $updatePemesanan;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function DaftarProduksi() {
        $query = "SELECT nama_pemesan, id_pesanan, nama_barang, jumlah_pesanan, jumlah_produksi, lead_time
            FROM produksi
            NATURAL JOIN pemesanan
            NATURAL JOIN barang
            ORDER BY id_pesanan ASC";
        $daftarProduksi = $this->db->query($query)->result_array();

        return $daftarProduksi;
    }

}

?>