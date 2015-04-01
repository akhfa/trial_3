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

		function getlog()
		{
			$session_data = $this->session->userdata('logged_in');

			$group_name = $this->getgroupname();
			$this->db->select('nama_file, username, group_name, jenis_log, waktu');
			$this->db->from('log');
			$this->db->join('group', 'group.id = log.group_id');
			$this->db->where('group_name', $group_name);

			$query = $this->db->get();

			if($query->num_rows())
			{
				return $query->result();
			}
			else
			{
				return FALSE;
			}
		}
		function getgroupname()
		{
			return $this->uri->segment(3);
		}
	}
?>