<?php
	ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(-1);
	if(!defined('BASEPATH')) exit('Forbidded');
	class Upload_Controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url', 'array'));
		}

		function index()
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['group_name'] === "default")
				$this->load->view("upload_default_view");
			else
				$this->load->view('upload_view', array('error' => ' ' ));
		}

		function do_upload()
		{
			$session_data = $this->session->userdata('logged_in');
			$id = $session_data['id'];
			$username = $session_data['username'];
			$group_name = $session_data['group_name'];

			// Cek Folder
			if(!is_dir('./uploads/'.$group_name))
				mkdir('./uploads/'.$group_name, 0777, TRUE);

			$config['upload_path'] = './uploads/'.$group_name;
			$config['allowed_types'] = '*';
			$config['max_size']	= '1500';
			$config['max_width']  = '*';
			$config['max_height']  = '*';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('upload_view', $error);
			}
			else
			{
				//Get filename
				$data = $this->upload->data();

				//log
		    	$session_data = $this->session->userdata('logged_in');
				$CI =& get_instance();
		        $CI->load->model('log');
		        $CI->log->addlog($session_data['username'], $data['file_name'], $session_data['group_name'],'upload');

				$data = array('upload_data' => $this->upload->data());

				$this->load->view('uploadsuccess_view', $data);
			}
		}
	}
?>