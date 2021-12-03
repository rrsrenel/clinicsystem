<?php

class Patient_model extends CI_Model {

    public function __construct() {
        
        $this->load->database();
        $this->db->reconnect();
    }


	public function getPatientList() {
		$query = $this->db->query("SELECT 
									    A.patient_id,
									    A.resident_id,
									    CONCAT(first_name, ' ', last_name) AS full_name,
									    C.birth_date,
									    A.status,
									    MAX(B.checkup_date) AS last_checkup
									FROM
									    patient_tbl A
									        LEFT JOIN
									    patient_detail B ON A.patient_id = B.patient_id
									        INNER JOIN
									    resident_tbl C ON C.id = A.resident_id
									WHERE status ='PENDING'
									GROUP BY A.patient_id");
		return $query->result_array();
	}

	function managePatient() {

		$id = $this->input->post('id');

		$patient_id = $this->input->post('patient_id');
		$resident_id = $this->input->post('resident_id');

		if ($patient_id == "") {
			$patient_id = $this->getId('PT','patient_id','patient_tbl')->ID;			
			$result = $this->db->insert('patient_tbl',array('resident_id' => $resident_id ,'patient_id' => $patient_id));
		}		

		$data = array(
			'patient_id' => $patient_id,
			'checkup_date' => $this->input->post('checkup_date'),
			'last_checkup_date' => $this->input->post('last_checkup_date'),	
			'blood_pressure' => $this->input->post('blood_pressure'),
			'weight' => $this->input->post('weight'),
			'temperature' => $this->input->post('temperature'),	
			'remarks' => $this->input->post('remarks'),
			'diagnosis' => $this->input->post('diagnosis'),
		);

		if ($id != "") {
			$this->db->set('checkup_date', $data['checkup_date']);
			$this->db->set('last_checkup_date', $data['last_checkup_date']);
			$this->db->set('blood_pressure', $data['blood_pressure']);
			$this->db->set('weight', $data['weight']);
			$this->db->set('temperature', $data['temperature']);
			$this->db->set('remarks', $data['remarks']);
			$this->db->set('diagnosis', $data['diagnosis']);
			
			$this->db->where('id', $id);
			$result = $this->db->update('patient_detail');
			return $result;
		}

		
		$result = $this->db->insert('patient_detail', $data);

		return $result;
	}

	public function getRecordList() {
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT 
										B.id,
									    A.patient_id,
									    A.resident_id,
									    CONCAT(first_name, ' ', last_name) AS full_name,
									    C.birth_date,
									    A.status,
									    weight,
									    blood_pressure,
									    temperature,
									    remarks,
									    diagnosis,
									    checkup_date
									FROM
									    patient_tbl A
									        LEFT JOIN
									    patient_detail B ON A.patient_id = B.patient_id
									        INNER JOIN
									    resident_tbl C ON C.id = A.resident_id
									WHERE
									    A.patient_id = '$id'
									ORDER BY checkup_date DESC");
		return $query->result_array();
	}

	public function getId($char,$col,$tbl){
		$query = $this->db->query("SELECT 
									    CASE
									        WHEN
									            COUNT(count_data) = 0
									        THEN
									            CONCAT('$char',
									                    DATE_FORMAT(NOW(), '%y%m%d'),
									                    '001')
									        ELSE ID
									    END AS ID
									FROM
									    (SELECT 
									        'count' AS count_data,
									            CONCAT('$char', DATE_FORMAT(NOW(), '%y%m%d'), CASE
									                WHEN DATE_FORMAT(NOW(), '%y%m%d') = SUBSTR($col, 3, 6) THEN LPAD(CONVERT( SUBSTR($col, 9, 3) , SIGNED) + 1, 3, '0')
									                ELSE '001'
									            END) AS ID
									    FROM
									        $tbl
									    ORDER BY $col DESC
									    LIMIT 1) raw");
		$ret = $query->row();
		return $ret;
	}


}
