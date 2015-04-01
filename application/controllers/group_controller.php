<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	Class Group_Controller extends CI_Controller
	{
		function __construct()
	   {
	     parent::__construct();
	     $this->load->model('group','',TRUE);
	     $this->load->model('user','',TRUE);
	     $this->load->library('user_agent');
	     $this->load->library('../controllers/file_controller.php');
	     $this->load->library('form_validation');
	   }

		function delgroup()
		{
			if($this->user->deluserbygroup($this->getgroupname()))
			{
				if($this->group->delgroup($this->getgroupname()))
				{
					$this->file_controller->delgroupfile();
				}
			}
			
		}

		function getgroupname()
		{
			return $this->uri->segment(3);
		}

		function managegroup()
		{
			$groupname = $this->getgroupname();
			$data['daftaruser'] = $this->group->getmember($groupname);
			$data['groupname'] = $groupname;
			$this->load->view('managegroup_view', $data);
		}

		function addgroup()
		{
			$this->load->view('addgroup_view');
		}
	}
?>