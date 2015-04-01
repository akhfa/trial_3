<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	Class File_Controller extends CI_Controller
	{
		function __construct()
	   {
	     parent::__construct();
	     $this->load->helper('file');
	   }
	   
		function delFile()
		{
			$session_data = $this->session->userdata('logged_in');
			$group_name = $session_data['group_name'];
			$role = $session_data['role'];
			
			$dir = './uploads/'.$group_name.'/';
			
			$namaFile = $this->getNamaFile();
			if($role == 'user')
				echo "Hanya admin dan group leader yang bisa menghapus file.";
			else
			{
				if(unlink($dir.$namaFile))	
				{
					//log
					$CI =& get_instance();
			        $CI->load->model('log');
			        $CI->log->addlog($session_data['username'], $dir.$namaFile, 'delete');
					
					redirect('home', 'refresh');
				}
				else
					echo "Hapus file gagal";
			}
		}

		function getNamaFile()
		{
			return $this->uri->segment(3);
		}

		function delgroupfile()
		{
			$session_data = $this->session->userdata('logged_in');
			$group_name = $this->getgroupname(); //Gak bisa pake session karena sessionnya adalah group admin
			
			$dir = './uploads/'.$group_name.'/';
			
			$this->rrmdir($dir);

			redirect('home', 'refresh');

		}

		function getgroupname()
		{
			return $this->uri->segment(3);
		}

		function rrmdir($dir) { 
		  foreach(glob($dir . '/*') as $file) { 
		    if(is_dir($file)) rrmdir($file); 
		    else
		    {
		    	unlink($file);
		    	//log
		    	$session_data = $this->session->userdata('logged_in');
				$CI =& get_instance();
		        $CI->load->model('log');
		        $CI->log->addlog($session_data['username'], $file, 'delete');
		    } 
		    	 
		  } rmdir($dir); 
		}
	}
?>