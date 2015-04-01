<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	Class Log_Controller extends CI_Controller
	{
		function __construct()
	   {
	     parent::__construct();
	     $this->load->model('log', '', TRUE);
	     // $this->load->model('group','',TRUE);
	     // $this->load->model('user','',TRUE);
	     // $this->load->library('user_agent');
	     // $this->load->library('../controllers/file_controller.php');
	     // $this->load->library('form_validation');
	   }

		function addlog($nama_file, $jenis_log, $group_id)
		{
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
		}

		function viewlog()
		{
			$result = $this->log->getlog();

			$session_data = $this->session->userdata('logged_in');
			$data['group_name'] = $session_data['group_name'];
			$data['role'] = $session_data['role'];
			$data['daftar_log'] = $result;
			$this->load->view('log_view', $data);
		}
	}
?>