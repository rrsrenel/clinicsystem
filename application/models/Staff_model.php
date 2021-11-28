<?php

class Staff_model extends CI_Model {

    public function __construct() {
        
        $this->load->database();
        $this->db->reconnect();
    }

    public function getStaffRoleList() {
		$query = $this->db->query("SELECT id, name, description, is_enable FROM barangay_center.staff_role_tbl;");
		return $query->result_array();
	}

    public function manageStaffRole() {
		$id = $this->input->post('id');

		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			
		);

		if ($id != "") {
			$this->db->set('name', $data['name']);
			$this->db->set('description', $data['description']);
			$this->db->where('id', $id);
			$result = $this->db->update('staff_role_tbl');
			return $result;
		}

		$result = $this->db->insert('staff_role_tbl', $data);

		return $result;
	}

    function manageStaffRoleStatus(){

		$id = $this->input->post('id');
		$is_enable = $this->input->post('is_enable');

		$this->db->set('is_enable', $is_enable);
		$this->db->where('id', $id);
		$result = $this->db->update('staff_role_tbl');

		return $result;
	}

    public function getStaffList() {
    $query = $this->db->query("SELECT 
                                    A.id,
                                    A.staff_role_id,
                                    A.first_name,
                                    A.last_name,
                                    A.middle_name,
                                    A.address,
                                    A.contact,
                                    A.email,
                                    A.gender,
                                    A.username,
                                    A.password,
                                    A.is_enable,
                                    CONCAT(first_name, ' ', last_name) AS staff_name,
                                    B.name
                                FROM
                                    staff_tbl A
                                    LEFT JOIN
                                    staff_role_tbl B ON A.staff_role_id = B.id                                
                                    ");
		return $query->result_array();
	}

    function manageStaff() {

		$id = $this->input->post('id');

		$data = array(
			'staff_role_id' => $this->input->post('staff_role_id'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'middle_name' => $this->input->post('middle_name'),
			'address' => $this->input->post('address'),
			'gender' => $this->input->post('gender'),
			'contact' => $this->input->post('contact'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);

		if ($id != "") {
			$this->db->set('staff_role_id', $data['staff_role_id']);
			$this->db->set('first_name', $data['first_name']);
			$this->db->set('last_name', $data['last_name']);
			$this->db->set('middle_name', $data['middle_name']);
			$this->db->set('address', $data['address']);
			$this->db->set('gender', $data['gender']);
			$this->db->set('contact', $data['contact']);
			$this->db->set('email', $data['email']);
			$this->db->set('username', $data['username']);
			$this->db->set('password', $data['password']);
			$this->db->where('id', $id);
			$result = $this->db->update('staff_tbl');
			return $result;
		}

		$result = $this->db->insert('staff_tbl', $data);

		return $result;
	}

    function manageStaffStatus(){

		$id = $this->input->post('id');
		$is_enable = $this->input->post('is_enable');

		$this->db->set('is_enable', $is_enable);
		$this->db->where('id', $id);
		$result = $this->db->update('staff_tbl');

		return $result;
	}



	


}
