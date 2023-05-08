<?php

class Login extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('login/login');
    }

    public function process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Check if the user exists in the database
        $this->user_model->setUsername(trim(strip_tags($username)));
        $this->user_model->setPassword(trim(strip_tags($password)));
        $data = $this->user_model->Authentication();
        
        if(!empty($data)){
            foreach ($data as $key => $value) {

                $this->session->set_userdata('statusLogin', true);
                $this->session->set_userdata('bagian', $value['id_bagian']);
                $this->session->set_userdata('nama', $value['nama_pegawai']);

                // redirect by role
                if ($value['id_bagian'] == '7')
                {
                    redirect('admin');
                }
                elseif($value['id_bagian'] == '8')
                {
                    redirect('manajer');
                }
                elseif($value['id_bagian'] == '9')
                {
                    redirect('gudang');
                }
                elseif($value['id_bagian'] == '10')
                {
                    redirect('pesanan');
                }
                elseif($value['id_bagian'] == '11')
                {
                    redirect('produksi');
                }
                // else
                // {
                //     // unset($_SESSION["statuslogin"]);
                //     $sError="Invalid Bagian";
                //     header("Location: index.php?sError=".urlencode($sError));
                // }
                var_dump($this->session->all_userdata(), $value['id_bagian']);die();
            }
        }
        else
        {
            $sError="Invalid Username and/or Password";
            header("Location: index.php?sError=".urlencode($sError));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['statusLogin', 'bagian', 'nama']);
        $this->session->sess_destroy();

        // Redirect the user to the login page or another page as desired
        redirect('login');
    }
}

?>