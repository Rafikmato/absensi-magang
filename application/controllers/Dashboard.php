<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('in') != 'login')
        {
            $this->session->set_flashdata('alert','<div class="alert alert-danger">Maaf anda harus Login Terlebih dahulu !</div>');
            redirect('/');
        }
    }

	public function index()
	{
        $query = $this->db->query('SELECT * FROM users WHERE role = 2');
        $data['utock'] = $query->num_rows();
		$this->load->view('dashboard/_dashboard', $data);
	}
}
