<?php

class Medicine_model extends CI_Model {

    public function __construct() {
        
        $this->load->database();
        $this->db->reconnect();
    }


	public function getMedicineList() {
		$query = $this->db->query("SELECT * FROM medicine_tbl");
		return $query->result_array();
	}

	function manageMedicine() {

		$id = $this->input->post('id');

		$data = array(
			'name' => $this->input->post('name'),
			'brand' => $this->input->post('brand'),
			'description' => $this->input->post('description'),
			'type' => $this->input->post('type'),	
		);

		if ($id != "") {
			$this->db->set('name', $data['name']);
			$this->db->set('brand', $data['brand']);
			$this->db->set('description', $data['description']);
			$this->db->set('type', $data['type']);			
			$this->db->where('id', $id);
			$result = $this->db->update('medicine_tbl');
			return $result;
		}

		$result = $this->db->insert('medicine_tbl', $data);

		return $result;
	}

	function manageStatus(){

		$id = $this->input->post('id');
		$is_enable = $this->input->post('is_enable');

		$this->db->set('is_enable', $is_enable);
		$this->db->where('id', $id);
		$result = $this->db->update('medicine_tbl');

		return $result;
	}

	public function getReceive() {
		$query = $this->db->query("SELECT 
										A.medicine_receive_id,
										supplier_name,
										A.description,
										transaction_date										
									FROM
										medicine_receive_tbl A																				
								");
		return $query->result_array();
	}

	public function getReceiveDetails() {
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT 									
										id,
										name,
										brand,
										description,
										type,
										IFNULL(B.quantity, 0) AS quantity,
										IFNULL(B.expiration_date,0) AS expiration_date,
										IFNULL(B.medicine_id, 0) AS flag
									FROM
										medicine_tbl A
											LEFT JOIN
										(SELECT 
											medicine_id, quantity, expiration_date
										FROM
											medicine_receive_detail
										WHERE
											medicine_receive_id = '$id') B ON A.id = B.medicine_id
									WHERE
										is_enable = 1");
		return $query->result_array();
	}


	public function removeReceive($medicine_receive_id,$transaction_date,$description,$supplier_name){
		$this->db->set('transaction_date', $transaction_date);
		$this->db->set('description',$description);
		$this->db->set('supplier_name', $supplier_name);		
		$this->db->where('medicine_receive_id', $medicine_receive_id);
		$this->db->update('medicine_receive_tbl');

		$result = $this->db->delete('medicine_receive_detail', array('medicine_receive_id' => $medicine_receive_id));
	}

	public function addReceive($medicine_receive_id,$date,$description,$supplier_name){
		$result = $this->db->insert('medicine_receive_tbl', 
				array(
					'medicine_receive_id' => $medicine_receive_id,
					'transaction_date'=>$date,
					'description'=>$description,
					'supplier_name' => $supplier_name
				));
	}

	public function manageReceive($medicine_receive_id,$medicine_id,$quantity,$expiration_date){
		$data = array(
			'medicine_receive_id' => $medicine_receive_id,
			'medicine_id' => $medicine_id,
			'quantity' => $quantity,
			'expiration_date' => $expiration_date,

		);
		$result = $this->db->insert('medicine_receive_detail', $data);

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


	public function getRelease() {
		$query = $this->db->query("SELECT 
									A.medicine_release_id,
									first_name,
									last_name,
									resident_id,
									CONCAT(first_name, ' ', last_name) AS full_name,
									A.description,
									transaction_date
								FROM
									medicine_release_tbl A
										LEFT JOIN
									resident_tbl B ON B.id = A.resident_id																			
								");
		return $query->result_array();
	}

	public function getReleaseDetails() {
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT 									
										id,
										name,
										brand,
										description,
										type,
										IFNULL(B.quantity, 0) AS quantity,
										IFNULL(B.medicine_id, 0) AS flag
									FROM
										medicine_tbl A
											LEFT JOIN
										(SELECT 
											medicine_id, quantity
										FROM
											medicine_release_detail
										WHERE
											medicine_release_id = '$id') B ON A.id = B.medicine_id
									WHERE
										is_enable = 1");
		return $query->result_array();
	}

	public function removeRelease($medicine_release_id,$transaction_date,$description,$resident_id){
		$this->db->set('transaction_date', $transaction_date);
		$this->db->set('description',$description);
		$this->db->set('resident_id', $resident_id);		
		$this->db->where('medicine_release_id', $medicine_release_id);
		$this->db->update('medicine_release_tbl');

		$result = $this->db->delete('medicine_release_detail', array('medicine_release_id' => $medicine_release_id));
	}

	public function addRelease($medicine_release_id,$date,$description,$resident_id){
		$result = $this->db->insert('medicine_release_tbl', 
				array(
					'medicine_release_id' => $medicine_release_id,
					'transaction_date'=>$date,
					'description'=>$description,
					'resident_id' => $resident_id
				));
	}

	public function manageRelease($medicine_release_id,$medicine_id,$quantity){
		$data = array(
			'medicine_release_id' => $medicine_release_id,
			'medicine_id' => $medicine_id,
			'quantity' => $quantity,		

		);
		$result = $this->db->insert('medicine_release_detail', $data);

	}


}
