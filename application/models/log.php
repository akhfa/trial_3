<?php
	Class Log extends CI_Model
	{
		function addlog($username, $nama_file, $group_name,$jenis_log)
		{
			$result = $this->getgroupid($group_name);
			foreach ($result as $key) {
				$group_id = $key->id;
			}

			$data = array('username' => $username,
							'nama_file' => $nama_file,
							'group_id' => $group_id,
							'jenis_log' => $jenis_log);

			return $this->db->insert('log', $data);
			//return true;
		}

		function getgroupid($group_name)
		{
			$CI =& get_instance();
	        $CI->load->model('group');
	        return $CI->group->getid($group_name);
		}
	}
?>