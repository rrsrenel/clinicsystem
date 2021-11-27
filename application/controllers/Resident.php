<?php

class Resident extends CI_Controller {

    function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Singapore');
//        $this->load->library('datatables');
//        $this->load->library('pdf');
//        $this->check_isvalidated();
    }

	public function index() {

		$this->load->view('templates/adminheader');
		$this->load->view('resident/index');
		$this->load->view('templates/adminfooter');
	}

	public function getResidentList() {
		$data = $this->resident_model->getResidentList();
		echo json_encode($data);
	}

	public function manageResident() {
		$this->resident_model->manageResident();
	}

	public function manageStatus(){
		$this->resident_model->manageStatus();
		
	}


}
