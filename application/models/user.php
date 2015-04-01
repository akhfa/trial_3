<?php
	Class User extends CI_Model
	{
		function login ($username, $password)
		{
			$this->db->select('users.id, username, password, group_name, role');
			$this->db->from('users');
			$this->db->join('group', 'users.group = group.id');
			$this->db->where('username', $username);
			$this->db->where('password', MD5($password));
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 1)
			{
				return $query->result();
			}
			else {
				return false;
			}
		}


		function register($username, $password)
		{
			$this->db->select('id, username, password');
			$this->db->from('users');
			$this->db->where('username', $username);
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 1)
			{
				return false;
			}
			else 
			{
				$data = array('username' => $username,
						  		'password' => MD5($password));
				$this->db->insert('users', $data);
				return true;
			}
		}

		function changepassword($username, $password)
		{
			$data = array(
               'password' => MD5($password)
            );

			$this->db->where('username', $username);
			if($this->db->update('users', $data))
				return true;
			else
				return false;
		}

		function getuser()
		{
			$session_data = $this->session->userdata('logged_in');
	       $data['username'] = $session_data['username'];

			$this->db->select('username, group_name, role');
			$this->db->from('users');
			$this->db->join('group', 'group = group.id');
			$this->db->where('username !=', $session_data['username']);
			$this->db->order_by("username", "asc");
			
			$query = $this->db->get();

			if($query->num_rows())
			{
				return $query->result();
			}
			else {
				return false;
			}
		}

		function deluser($username)
		{
			$this->db->where('username', $username); 
			if($this->db->delete('users'))
				return true;
			else
				return false;
			
		}

		function deluserbygroup($group_name)
		{
			//Cari group id
			$result = $this->getgroupid($group_name);
			foreach ($result as $key) {
				$group_id = $key->id;
			}

			$this->db->where('group', $group_id); 
			
			return ($this->db->delete('users'));
		}

		function updateuser($username, $group_name, $role)
		{
			//Cari group id
			$result = $this->getgroupid($group_name);
			foreach ($result as $key) {
				$group_id = $key->id;
			}

			//Update data
			$data = array(
               'group' => $group_id,
               'role' => $role
            );

			$this->db->where('username', $username);
			return $this->db->update('users', $data);
		}

		function getgroupid($group_name)
		{
			$CI =& get_instance();
	        $CI->load->model('group');
	        return $CI->group->getid($group_name);
		}
	}
?>