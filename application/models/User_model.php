<?php

class User_model extends CI_Model
{
    private $username;
    private $password;

    public function __construct() {
        $this->load->database();
    }

    function setUsername($username)
    {
        $this->username = $username;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }

    public function Authentication()
    {
        try {
            $query = "SELECT * FROM pegawai where username=? AND password=?";
            $checkUserExist = $this->db->query($query, array($this->username, $this->password))->result_array();
            if(count($checkUserExist) > 0){
                return $checkUserExist;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>