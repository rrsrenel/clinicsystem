<?php

class Resident_model extends CI_Model {

    public function __construct() {
        
        $this->load->database();
        $this->db->reconnect();
    }


	public function getResidentList() {
		$query = $this->db->query("SELECT 
									    *,
									    CONCAT(first_name, ' ', last_name) AS full_name,
									    CONCAT(house_number,
									            ' ',
									            street,
									            ', ',
									            municipality) AS address
									FROM
									    resident_tbl");
		return $query->result_array();
	}

	function manageResident() {

		$id = $this->input->post('id');

		$data = array(
			'resident_type' => $this->input->post('resident_type'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'middle_name' => $this->input->post('middle_name'),
			'birth_date' => $this->input->post('birth_date'),
			'birth_place' => $this->input->post('birth_place'),
			'gender' => $this->input->post('gender'),
			'civil_status' => $this->input->post('civil_status'),
			'educational_attainment' => $this->input->post('educational_attainment'),
			'occupation' => $this->input->post('occupation'),
			'religion' => $this->input->post('religion'),
			'citizenship' => $this->input->post('citizenship'),
			'contact' => $this->input->post('contact'),
			'house_number' => $this->input->post('house_number'),
			'street' => $this->input->post('street'),
			'municipality' => $this->input->post('municipality'),
		);

		if ($id != "") {
			$this->db->set('resident_type', $data['resident_type']);
			$this->db->set('first_name', $data['first_name']);
			$this->db->set('last_name', $data['last_name']);
			$this->db->set('middle_name', $data['middle_name']);
			$this->db->set('birth_date', $data['birth_date']);
			$this->db->set('birth_place', $data['birth_place']);
			$this->db->set('gender', $data['gender']);
			$this->db->set('civil_status', $data['civil_status']);
			$this->db->set('educational_attainment', $data['educational_attainment']);
			$this->db->set('occupation', $data['occupation']);
			$this->db->set('religion', $data['religion']);
			$this->db->set('citizenship', $data['citizenship']);
			$this->db->set('contact', $data['contact']);
			$this->db->set('house_number', $data['house_number']);
			$this->db->set('street', $data['street']);
			$this->db->set('municipality', $data['municipality']);
			$this->db->where('id', $id);
			$result = $this->db->update('resident_tbl');
			return $result;
		}

		$result = $this->db->insert('resident_tbl', $data);

		return $result;
	}

	function manageStatus(){

		$id = $this->input->post('id');
		$is_enable = $this->input->post('is_enable');

		$this->db->set('is_enable', $is_enable);
		$this->db->where('id', $id);
		$result = $this->db->update('resident_tbl');

		return $result;
	}


}
