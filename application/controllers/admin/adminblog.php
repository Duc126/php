<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminblog extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('email');
        $this->load->model('admin/adminmodel');
    }
    public function dathang()
    {
        $this->load->view('blog/index');
    }
    public function getdathang()
    {
        $firstname = $this->input->post('firstname');
       
         $lastname = $this->input->POST('lastname');
        $phone = $this->input->POST('phone');
        $email = $this->input->POST('email');

        $diachi = $this->input->POST('diachi');
        $noidung = $this->input->POST('noidung');
        $checkemail =$this->adminmodel->checkemail($email);
        if(!$checkemail ){
            $this->load->model('admin/adminmodel');
            $this->adminmodel->insertMember($firstname, $lastname, $phone,$email, $diachi,$noidung);
        }
        else {
            echo 'Trùng email';
        }
        
    }
    function email($email) {
        $this->adminmodel->checkemail($email);
      }
      
}