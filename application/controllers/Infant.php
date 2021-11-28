<?php

class Infant extends CI_Controller {

    function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Singapore');		
    }

	public function index() {

		$this->load->view('templates/adminheader');
		$this->load->view('infant/index');
		$this->load->view('templates/adminfooter');
	}

	public function getInfantList() {
		$data = $this->infant_model->getInfantList();
		echo json_encode($data);
	}

	public function manageInfant() {
		$this->infant_model->manageInfant();
	}

	public function getRecordList() {
		$data = $this->infant_model->getRecordList();
		echo json_encode($data);
	}


}
