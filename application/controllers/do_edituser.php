<?php 

  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(-1);

  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Do_EditUser extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('group','',TRUE);
   $this->load->helper(array('URL','array'));
 }
 
 function index()
 {
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_change');
   
   if($this->form_validation->run())
   {
      $this->load->view('successchangegroup_view', array('username' => $this->input->post('username') ));
   }
   else
   {
      $this->load->view('failedchange_view');
   }
 
 }

  function change($username)
   {
      $selectedgroup = $this->input->post('selectedgroup');
      if($selectedgroup === 'no group')
        $selectedgroup = 'default';
      $role = $this->input->post('role');

      if($result = $this->user->updateuser($username, $selectedgroup, $role))
        return TRUE;
      else
        return FALSE;
   }
}
?>