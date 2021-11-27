<?php

class Pregnancy_model extends CI_Model {

    public function __construct() {
        
        $this->load->database();
        $this->db->reconnect();
    }


	public function getPregnancyList() {
		$query = $this->db->query("SELECT 
									    A.pregnancy_id,
									    A.resident_id,
									    CONCAT(first_name, ' ', last_name) AS full_name,
									    C.birth_date,
									    A.status,
									    MAX(B.checkup_date) AS last_checkup
									FROM
									    pregnancy_tbl A
									        LEFT JOIN
									    pregnancy_detail B ON A.pregnancy_id = B.pregnancy_id
									        INNER JOIN
									    resident_tbl C ON C.id = A.resident_id
									WHERE
									    status = 'PENDING'
									GROUP BY A.pregnancy_id");
		return $query->result_array();
	}

	function managePregnancy() {

		$id = $this->input->post('id');
		$pregnancy_id = $this->input->post('pregnancy_id');

		if ($pregnancy_id == "") {
			
			$pregnancy_id = $this->getId('OB','pregnancy_id','pregnancy_tbl')->ID;
			$main_data = array(
				'pregnancy_id' => $pregnancy_id,
				'resident_id' => $this->input->post('resident_id'),
			);

			$result = $this->db->insert('pregnancy_tbl',$main_data);
		}
		

		$data = array(
			'pregnancy_id' => $pregnancy_id,
			'checkup_date' => $this->input->post('checkup_date'),
			'last_checkup_date' => $this->input->post('last_checkup_date'),
			'pih' => $this->input->post('pih'),
			'lmp' => $this->input->post('lmp'),
			'edc' => $this->input->post('edc'),
			'gp' => $this->input->post('gp'),
			'remarks' => $this->input->post('remarks'),
			'diagnosis' => $this->input->post('diagnosis'),
		);

		if ($id != "") {
			$this->db->set('checkup_date', $data['checkup_date']);
			$this->db->set('last_checkup_date', $data['last_checkup_date']);
			$this->db->set('pih', $data['pih']);
			$this->db->set('lmp', $data['lmp']);
			$this->db->set('edc', $data['edc']);
			$this->db->set('gp', $data['gp']);
			$this->db->set('remarks', $data['remarks']);
			$this->db->set('diagnosis', $data['diagnosis']);
			
			$this->db->where('id', $id);
			$result = $this->db->update('pregnancy_detail');
			return $result;
		}

		
		$result = $this->db->insert('pregnancy_detail', $data);

		return $result;
	}

	public function getRecordList() {
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT 
										B.id,
									    A.pregnancy_id,
									    A.resident_id,
									    CONCAT(first_name, ' ', last_name) AS full_name,
									    C.birth_date,
									    A.status,
									    pih,
									    lmp,
									    edc,
									    gp,
									    remarks,
									    diagnosis,
									    checkup_date
									FROM
									    pregnancy_tbl A
									        LEFT JOIN
									    pregnancy_detail B ON A.pregnancy_id = B.pregnancy_id
									        INNER JOIN
									    resident_tbl C ON C.id = A.resident_id
									WHERE
									    A.pregnancy_id = '$id'
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
