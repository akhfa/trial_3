<?php 

  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(-1);

  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Do_AddGroup extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('group','',TRUE);
   $this->load->helper('URL');
 }
 
 function index()
 {
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('group', 'Group', 'trim|required|xss_clean|callback_addgroup');
 
   if($this->form_validation->run() == FALSE)
   {
     $this->load->view('failed_view', array('jenis' => 'addgroup'));
   }
   else
   {
     $this->load->view('success_view', array('jenis' => 'addgroup'));
   }
 
 }

function addgroup($group)
 {
    return $result = $this->group->addgroup($group);
 }
}
?>