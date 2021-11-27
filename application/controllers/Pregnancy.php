<?php

class Pregnancy extends CI_Controller {

    function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Singapore');
    }

	public function index() {

		$this->load->view('templates/adminheader');
		$this->load->view('pregnancy/index');
		$this->load->view('templates/adminfooter');
	}

	public function getPregnancyList() {
		$data = $this->pregnancy_model->getPregnancyList();
		echo json_encode($data);
	}

	public function managePregnancy() {
		$this->pregnancy_model->managePregnancy();
	}

	public function getRecordList() {
		$data = $this->pregnancy_model->getRecordList();
		echo json_encode($data);
	}
	


}
