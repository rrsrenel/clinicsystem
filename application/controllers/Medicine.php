<?php

class Medicine extends CI_Controller {

    function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Singapore');
    }

	public function index() {

		$this->load->view('templates/adminheader');
		$this->load->view('medicine/index');
		$this->load->view('templates/adminfooter');
	}

	public function getMedicineList() {
		$data = $this->medicine_model->getMedicineList();
		echo json_encode($data);
	}

	public function manageMedicine() {
		$this->medicine_model->manageMedicine();
	}

	public function manageStatus(){
		$this->medicine_model->manageStatus();
		
	}

	public function receive() {

		$this->load->view('templates/adminheader');
		$this->load->view('medicine/receive');
		$this->load->view('templates/adminfooter');
	}

	public function getReceive() {
		$data = $this->medicine_model->getReceive();
		echo json_encode($data);
	}
	
	public function getReceiveDetails() {
		$data = $this->medicine_model->getReceiveDetails();
		echo json_encode($data);
	}

	public function manageReceive() {

		$data = $this->input->post('array_data');
		$date = $this->input->post('date');
		$description = $this->input->post('description');
		$supplier_name = $this->input->post('supplier_name');
		$id = $this->input->post('id');
		$medicine_receive_id="";

		if($id==""){
			$medicine_receive_id=$this->medicine_model->getId('IM','medicine_receive_id','medicine_receive_tbl')->ID;
			$this->medicine_model->addReceive($medicine_receive_id,$date,$description,$supplier_name);
		}else{
			$medicine_receive_id=$id;
			$this->medicine_model->removeReceive($medicine_receive_id,$date,$description,$supplier_name);
		}
		
		foreach ($data as $r) {
			$this->medicine_model->manageReceive($medicine_receive_id,$r['id'],$r['quantity'],$r['expiration_date']);
		}		
	}

	public function release() {

		$this->load->view('templates/adminheader');
		$this->load->view('medicine/release');
		$this->load->view('templates/adminfooter');
	}

	public function getRelease() {
		$data = $this->medicine_model->getRelease();
		echo json_encode($data);
	}

	public function getReleaseDetails() {
		$data = $this->medicine_model->getReleaseDetails();
		echo json_encode($data);
	}

	public function manageRelease() {

		$data = $this->input->post('array_data');
		$date = $this->input->post('date');
		$description = $this->input->post('description');
		$resident_id = $this->input->post('resident_id');
		$id = $this->input->post('id');
		$medicine_release_id="";

		if($id==""){
			$medicine_release_id=$this->medicine_model->getId('RM','medicine_release_id','medicine_release_tbl')->ID;
			$this->medicine_model->addRelease($medicine_release_id,$date,$description,$resident_id);
		}else{
			$medicine_release_id=$id;
			$this->medicine_model->removeRelease($medicine_release_id,$date,$description,$resident_id);
		}
		
		foreach ($data as $r) {
			$this->medicine_model->manageRelease($medicine_release_id,$r['id'],$r['quantity']);
		}		
	}



}
