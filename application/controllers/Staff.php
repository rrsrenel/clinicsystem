<?php

class Staff extends CI_Controller {

    function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Singapore');
    }
    
    public function index() {
		$this->load->view('templates/adminheader');
		$this->load->view('staff/index');
		$this->load->view('templates/adminfooter');
	}

	public function role() {
		$this->load->view('templates/adminheader');
		$this->load->view('staff/role');
		$this->load->view('templates/adminfooter');
	}

    
    

    public function getStaffRoleList() {
		$data = $this->staff_model->getStaffRoleList();
		echo json_encode($data);
	}
    
    public function manageStaffRole() {
		$data = $this->staff_model->manageStaffRole();
	}

    public function manageStaffRoleStatus(){
		$this->staff_model->manageStaffRoleStatus();
	}

    public function getStaffList() {
		$data = $this->staff_model->getStaffList();
		echo json_encode($data);
	}

	public function manageStaff() {
		$this->staff_model->manageStaff();
	}

	public function manageStaffStatus(){
		$this->staff_model->manageStaffStatus();
	}

	


}
