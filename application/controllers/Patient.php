<?php

class Patient extends CI_Controller {

    function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Singapore');		
    }

	public function index() {

		$this->load->view('templates/adminheader');
		$this->load->view('patient/index');
		$this->load->view('templates/adminfooter');
	}

	public function getPatientList() {
		$data = $this->patient_model->getPatientList();
		echo json_encode($data);
	}

	public function managePatient() {
		$this->patient_model->managePatient();
	}

	public function getRecordList() {
		$data = $this->patient_model->getRecordList();
		echo json_encode($data);
	}


}
