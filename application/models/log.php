<?php
	Class Log extends CI_Model
	{
		function addlog($username, $nama_file, $jenis_log)
		{
			$data = array('username' => $username,
							'nama_file' => $nama_file,
							'jenis_log' => $jenis_log);
			$this->db->insert('log', $data);
			return true;
		}
	}
?>