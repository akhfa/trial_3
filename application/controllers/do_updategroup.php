<?php 

  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(-1);

  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Do_UpdateGroup extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('group','',TRUE);
   $this->load->helper('URL');
 }
 
 function index()
 {
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('prev_group', 'Previous Group', 'trim|required|xss_clean');
   $this->form_validation->set_rules('group_name', 'Nama Group', 'trim|required|xss_clean|callback_update');
 
   if($this->form_validation->run() == FALSE)
   {
     $this->load->view('failed_view', array('jenis' => 'update_group' ));
   }
   else
   {
     $this->load->view('success_view', array('jenis' => 'update_group' ));
   }
 
 }

function update($group_name)
 {
   $prev_group = $this->input->post('prev_group');

   $result = $this->group->updategroup($prev_group, $group_name);

   if($result)
   {
     //$this->load->view('successregister_view');
     return TRUE;
   }
   else
   {
     // $this->load->view('failedregister_view');
     return FALSE;
   }
 }
}
?>