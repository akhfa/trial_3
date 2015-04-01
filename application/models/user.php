<?php
	Class User extends CI_Model
	{
		function login ($username, $password)
		{
			$this->db->select('id, username, password, group, role');
			$this->db->from('users');
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

			$this->db->select('username, group, role');
			$this->db->from('users');
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
			$this->db->where('group', $group_name); 
			
			return ($this->db->delete('users'));
		}

		function updateuser($username, $group, $role)
		{
				$data = array(
	               'group' => $group,
	               'role' => $role
	            );

				$this->db->where('username', $username);
				if($this->db->update('users', $data))
					return true;
				else
					return false;
				return $query->result();

		}
	}
?>