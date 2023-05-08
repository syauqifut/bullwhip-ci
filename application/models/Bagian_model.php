<?php
class Bagian_model extends CI_Model
{
	private $id_bagian;
	private $nama_bagian;

	public function __construct()
	{
        $this->load->database();
	}

	function setId_Bagian($id_bagian)
	{
		$this->id_bagian = $id_bagian;
	}
	function setNama_Bagian($nama_bagian)
	{
		$this->nama_bagian = $nama_bagian;
	}
	function getId_Bagian()
	{
		return $id_bagian;
	}
	function getNama_Bagian()
	{
		return $nama_bagian;
	}
	function AddBagian()
	{
		try {
			$query = "INSERT INTO bagian (id_bagian, nama_bagian) VALUES (?, ?)";
			$prepareDB = $this->conn->prepare($query);
			$sqlAddBagian = $prepareDB->execute([$this->id_bagian, $this->nama_bagian]);

			return $sqlAddBagian;
		} catch (Exception $e) {
			throw $e;
		}
	}
	function BagianList()
	{
		$query = "SELECT * FROM bagian ORDER BY nama_bagian ASC";
        $bagianList = $this->db->query($query)->result_array();

		return $bagianList;
	}
	function findBagianById($id)
	{
		try {
			$query = "SELECT * FROM bagian WHERE id_bagian = ?";
			$findBagianById = $this->db->query($query, array($id))->result_array();

			return $findBagianById;
		} catch (Exception $e) {
			throw $e;
		}
	}
	function BagianUpdate()
	{
		try {
			$query = "UPDATE bagian SET nama_bagian = ? WHERE id_bagian = ?";
			$prepareDB = $this->conn->prepare($query);
			$bagianUpdate = $prepareDB->execute([$this->nama_bagian, $this->id_bagian]);

			return $bagianUpdate;
		} catch (Exception $e) {
			throw $e;
		}
	}
	function BagianDelete($id)
	{
		try {
			$query = "DELETE FROM bagian WHERE id_bagian = ?";
			$prepareDB = $this->conn->prepare($query);
			$bagianDelete = $prepareDB->execute([$id]);

			return $bagianDelete;
		} catch (Exception $e) {
			throw $e;
		}
	}
}
