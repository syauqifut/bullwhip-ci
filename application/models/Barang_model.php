<?php
	class Barang_model extends CI_Model
	{
		private $id_barang;
		private $nama_barang;

		public function __construct() {
			$this->load->database();
		}

		function setId_Barang ($id_barang)
		{
			$this->id_barang = $id_barang;
		}
		function setNama_Barang ($nama_barang)
		{
			$this->nama_barang = $nama_barang;
		}
		function getId_Barang ()
		{
			return $this->id_barang;
		}
		function getNama_Barang ()
		{
			return $this->nama_barang;
		}
		function AddBarang ()
		{
			try {
				$query = "INSERT INTO barang (id_barang, nama_barang) VALUES (?, ?)";
				$sqlAddBarang = $this->db->query($query, [$this->id_barang, $this->nama_barang])->result_array();

				return $sqlAddBarang;
			} catch (Exception $e) {
				throw $e;
			}
		}
		function BarangList ()
		{
			$query = "SELECT * FROM barang ORDER BY nama_barang ASC";
			$barangList = $this->db->query($query)->result_array();

			return $barangList;
		}
		function FindBarangById ($id)
		{
			try {
				$query = "SELECT * FROM barang WHERE id_barang = ?";
				$findBarangById = $this->db->query($query, [$id])->result_array();

				return $findBarangById;
			} catch (Exception $e) {
				throw $e;
			}
		}
		function BarangUpdate ()
		{
			try {
				$query = "UPDATE barang SET nama_barang = ? WHERE id_barang = ?";
				$barangUpdate = $this->db->query($query, [$this->nama_barang, $this->id_barang])->result_array();

				return $barangUpdate;
			} catch (Exception $e) {
				throw $e;
			}
		}
		function BarangDelete ($id)
		{
			try {
				$query = "DELETE FROM barang WHERE id_barang = ?";
				$barangDelete = $this->db->query($query, [$id])->result_array();

				return $barangDelete;
			} catch (Exception $e) {
				throw $e;
			}
		}
		function StokBarang ()
		{
			try {
				$query = "SELECT
					barang.nama_barang,
					SUM(DISTINCT produksi.jumlah_produksi) as total_produksi,
					SUM(DISTINCT pengambilan.jumlah_pengambilan) as total_pengambilan,
					(
						SUM(DISTINCT produksi.jumlah_produksi) -
						SUM(DISTINCT 	pengambilan.jumlah_pengambilan)
					) as stok_barang
				FROM
					barang
				JOIN produksi USING (id_barang)
				JOIN pengambilan USING (id_barang)
				GROUP BY nama_barang";
				$stokBarang = $this->db->query($query)->result_array();

				return $stokBarang;
			} catch (Exception $e) {
				throw $e;
			}
		}
		function BE ()
		{
			try {
				$query = "SELECT
					barang.nama_barang,
					ROUND(STDDEV(jumlah_pesanan), 3) AS s_order,
					ROUND(
						AVG(pemesanan.jumlah_pesanan),
						3
					) AS mean_order,
					ROUND(STDDEV(jumlah_produksi), 3) AS s_demand,
					ROUND(
						AVG(produksi.jumlah_produksi),
						3
					) AS mean_demand,
					ROUND(
						(
							STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)
						),
						3
					) AS cv_order,
					ROUND(
						(
							STDDEV(jumlah_produksi) / AVG(jumlah_produksi)
						),
						3
					) AS cv_demand,
					ROUND(
						(
							(
								STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)
							) / (
								STDDEV(jumlah_produksi) / AVG(jumlah_produksi)
							)
						),
						3
					) AS BE,
					produksi.lead_time,
					ROUND(
						(
							1 + ((2 * produksi.lead_time) / 30) + (
								(2 * produksi.lead_time ^ 2) / (30 ^ 2)
							)
						),
						3
					) AS parameter,
					ROUND(
						(
							(
								STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)
							) / (
								STDDEV(jumlah_produksi) / AVG(jumlah_produksi)
							)
						) > 1 + ((2 * produksi.lead_time) / 30) + (
							(2 * produksi.lead_time ^ 2) / (30 ^ 2)
						),
						3
					) AS Bullwhip_Effect
					FROM
						barang
					INNER JOIN pemesanan ON pemesanan.id_barang = barang.id_barang
					INNER JOIN produksi ON produksi.id_barang = pemesanan.id_barang
					GROUP BY
						barang.nama_barang, produksi.lead_time";
				$be = $this->db->query($query)->result_array();

				return $be;
			} catch (Exception $e) {
				throw $e;
			}
		}


	}
?>