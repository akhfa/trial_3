<?php
	Class Group extends CI_Model
	{
		
		function getgroup()
		{
			$this->db->select('id, group_name');
			$this->db->from('group');
			$this->db->where('group_name !=', 'default');
			$this->db->order_by("group_name", "asc");
			
			$query = $this->db->get();

			if($query->num_rows())
			{
				return $query->result();
			}
			else {
				return false;
			}
		}

		function getmember($groupname)
		{
			$this->db->select('username, group, role');
			$this->db->from('users');
			$this->db->join('group','users.group = group.id');
			$this->db->where('group_name', $groupname);
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

		function delgroup($group)
		{
			$this->db->where('group_name', $group); 
			if($this->db->delete('group'))
				return true;
			else
				return false;
			
		}

		function updategroup($prev_group, $newgroup)
		{
			$data = array(
               'group_name' => $newgroup
            );
			$this->db->where('group_name', $prev_group);
			return $this->db->update('group', $data);
		}

		function addgroup($group_name)
		{
			$this->db->select('group_name');
			$this->db->from('group');
			$this->db->where('group_name', $group_name);
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 1)
			{
				return false;
			}
			else 
			{
				$data = array('group_name' => $group_name);
				$this->db->insert('group', $data);
				return true;
			}
		}

		function getid($group_name)
		{
			$this->db->select('id');
			$this->db->from('group');
			$this->db->where('group_name', $group_name);
			$query = $this->db->get();
			return $query->result();
		}
	}
?>