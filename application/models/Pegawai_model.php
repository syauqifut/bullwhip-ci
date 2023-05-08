<?php
class Pegawai_model extends CI_Model
{
	private $id_pegawai;
	private $username;
	private $password;
	private $nama_pegawai;
	private $alamat_pegawai;
	private $hp_pegawai;
	private $id_bagian;

	public function __construct()
	{
		$this->load->database();
	}

	function setId_Pegawai($id_pegawai)
	{
		$this->id_pegawai = $id_pegawai;
	}
	function setUsername($username)
	{
		$this->username = $username;
	}
	function setPassword($password)
	{
		$this->password = $password;
	}
	function setNama_Pegawai($nama_pegawai)
	{
		$this->nama_pegawai = $nama_pegawai;
	}
	function setAlamat_Pegawai($alamat_pegawai)
	{
		$this->alamat_pegawai = $alamat_pegawai;
	}
	function setHp_Pegawai($hp_pegawai)
	{
		$this->hp_pegawai = $hp_pegawai;
	}
	function setId_Bagian($id_bagian)
	{
		$this->id_bagian = $id_bagian;
	}
	function getId_Pegawai()
	{
		return $id_pegawai;
	}
	function getUsername()
	{
		return $username;
	}
	function getPassword()
	{
		return $password;
	}
	function getNama_Pegawai()
	{
		return $nama_pegawai;
	}
	function getAlamat_Pegawai()
	{
		return $alamat_pegawai;
	}
	function getHp_Pegawai()
	{
		return $hp_pegawai;
	}
	function getId_bagian()
	{
		return $id_bagian;
	}
	function AddPegawai()
	{
		try {
			$query = "INSERT INTO pegawai (id_pegawai, username, password, nama_pegawai, alamat_pegawai, hp_pegawai, id_bagian) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$sqlAddPegawai = $this->db->query($query, [$this->id_pegawai, $this->username, $this->password, $this->nama_pegawai, $this->alamat_pegawai, $this->hp_pegawai, $this->id_bagian])->result_array();

			return $sqlAddPegawai;
		} catch (Exception $e) {
			throw $e;
		}
	}
	function PegawaiList()
	{
		$query = "SELECT id_pegawai, username, password, nama_pegawai, alamat_pegawai, hp_pegawai, nama_bagian FROM pegawai NATURAL JOIN bagian ORDER BY nama_pegawai ASC";
		$pegawaiList = $this->db->query($query)->result_array();

		return $pegawaiList;
	}
	function findPegawaiById($id)
	{
		try {
			$query = "SELECT * FROM pegawai WHERE id_pegawai = ?";
			$findPegawaiById = $this->db->query($query, [$id])->result_array();

			return $findPegawaiById;
		} catch (Exception $e) {
			throw $e;
		}
	}
	function PegawaiUpdate()
	{
		try {
			$query = "UPDATE pegawai SET username = ?, password = ?, nama_pegawai = ?, alamat_pegawai = ?, hp_pegawai = ?, id_bagian = ? WHERE id_pegawai = ?";
			$pegawaiUpdate = $this->db->query($query, [$this->username, $this->password, $this->nama_pegawai, $this->alamat_pegawai, $this->hp_pegawai, $this->id_bagian, $this->id_pegawai])->result_array();

			return $pegawaiUpdate;
		} catch (Exception $e) {
			throw $e;
		}
	}
	function PegawaiDelete($id)
	{
		try {
			$query = "DELETE FROM pegawai WHERE id_pegawai = ?";
			$pegawaiDelete = $this->db->query($query, [$id])->result_array();

			return $pegawaiDelete;
		} catch (Exception $e) {
			throw $e;
		}
	}
}
