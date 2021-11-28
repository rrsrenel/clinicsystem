<?php

class Infant_model extends CI_Model {

    public function __construct() {
        
        $this->load->database();
        $this->db->reconnect();
    }


	public function getInfantList() {
		$query = $this->db->query("SELECT 
									    A.infant_id,
									    A.resident_id,
									    CONCAT(first_name, ' ', last_name) AS full_name,
									    C.birth_date,
									    A.status,
									    number_of_months,
									    MAX(B.checkup_date) AS last_checkup
									FROM
									    infant_tbl A
									        LEFT JOIN
									    infant_detail B ON A.infant_id = B.infant_id
									        INNER JOIN
									    resident_tbl C ON C.id = A.resident_id
									WHERE
									    status = 'PENDING'
									GROUP BY A.infant_id");
		return $query->result_array();
	}

	function manageInfant() {

		$id = $this->input->post('id');

		$infant_id = $this->input->post('infant_id');
		$resident_id = $this->input->post('resident_id');

		if ($infant_id == "") {
			$infant_id = $this->getId('IN','infant_id','infant_tbl')->ID;			
			$result = $this->db->insert('infant_tbl',array('resident_id' => $resident_id ,'infant_id' => $infant_id ));
		}		

		$data = array(
			'infant_id' => $infant_id,
			'checkup_date' => $this->input->post('checkup_date'),
			'last_checkup_date' => $this->input->post('last_checkup_date'),			
			'number_of_months' => $this->input->post('number_of_months'),
			'weight' => $this->input->post('weight'),
			'height' => $this->input->post('height'),
			'vacinne' => $this->input->post('vacinne'),	
			'remarks' => $this->input->post('remarks'),
			'diagnosis' => $this->input->post('diagnosis'),
		);

		if ($id != "") {
			$this->db->set('checkup_date', $data['checkup_date']);
			$this->db->set('last_checkup_date', $data['last_checkup_date']);
			$this->db->set('number_of_months', $data['number_of_months']);
			$this->db->set('weight', $data['weight']);
			$this->db->set('height', $data['height']);
			$this->db->set('vacinne', $data['vacinne']);
			$this->db->set('remarks', $data['remarks']);
			$this->db->set('diagnosis', $data['diagnosis']);
			
			$this->db->where('id', $id);
			$result = $this->db->update('infant_detail');
			return $result;
		}

		
		$result = $this->db->insert('infant_detail', $data);

		return $result;
	}

	public function getRecordList() {
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT 
										B.id,
									    A.infant_id,
									    A.resident_id,
									    CONCAT(first_name, ' ', last_name) AS full_name,
									    C.birth_date,
									    A.status,
									    weight,
									    height,
									    vacinne,
									    remarks,
									    diagnosis,
									    checkup_date
									FROM
									    infant_tbl A
									        LEFT JOIN
									    infant_detail B ON A.infant_id = B.infant_id
									        INNER JOIN
									    resident_tbl C ON C.id = A.resident_id
									WHERE
									    A.infant_id = '$id'
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
