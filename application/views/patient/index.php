<script type="text/javascript" src="<?php echo base_url(); ?>js/patient/patient.js"></script>
<!-- Begin Page Content -->

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Patient List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Patient List</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="card shadow mb-4">
				<div class="card-body">
						<div align="right">
						<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btnAddItem"><i class="fas fa-plus fa-sm text-white-50"></i> Add Record</a>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
							<tr>
								<th>ID</th>
								<th>FULL NAME</th>
								<th>BIRTH DATE</th>
								<th>LAST CHECK UP</th>				
								<th>STATUS</th>					
								<th>ACTION</th>
							</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="modalManage">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Manage Check-up</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<div class="row">
					<div class="col-6" >
						<div class="form-group" hidden="">
                    		<input type="text" class="form-control" placeholder="" name="id" id="i-id" >
                    		<input type="text" class="form-control" placeholder="" name="patient_id" id="i-patient_id" >
                  		</div>
					</div>
					<div class="col-6">
						<div class="form-group" id="div_resident">
	                        <label>Resident Name</label>
	                        <select class="form-control select2" name="resident_id" id="i-resident_id"  style="width: 100%; ">	                       	                    
	                        </select>
                      	</div>
					</div>					
				</div>				
				<div class="row">
					<div class="col-6">
						<div class="form-group">
                    		<label>Check-up Date</label>
                    		<input type="date" class="form-control" id="i-checkup_date" placeholder="Birth Date" name="checkup_date" required="true">
                  		</div>
					</div>
					<div class="col-6">
						<div class="form-group">
                    		<label >Last Check-up Date</label>
                    		<input type="date" class="form-control" id="i-last_checkup_date" placeholder="Birth Place" name="last_checkup_date">
                  		</div>
					</div>							
				</div>			
				<div class="row">
					<div class="col-3">
						<div class="form-group">
							<label>Weight</label>
	                        <input type="text" class="form-control" id="i-weight" placeholder="Weight" name="weight">
                      	</div>
					</div>
					<div class="col-3">
						<div class="form-group">
							<label>Blood Pressure</label>
	                        <input type="text" class="form-control" id="i-blood_pressure" placeholder="Height" name="blood_pressure">
                      	</div>
					</div>
					<div class="col-3">
						<div class="form-group">
							<label>Temperature</label>
	                        <input type="text" class="form-control" id="i-temperature" placeholder="Temperature" name="temperature">
                      	</div>
					</div>			
				</div>				
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Remarks</label>
	                        <textarea type="text" style="height: 150px;" class="form-control" id="i-remarks" placeholder="Remarks" name="remarks"></textarea>
                      	</div>
					</div>										
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Diagnosis</label>
	                        <textarea type="text" style="height: 150px;" class="form-control" id="i-diagnosis" placeholder="Diagnosis" name="diagnosis"></textarea>
                      	</div>
					</div>										
				</div>							
			</div>
			<div class="modal-footer" align="right">
				<button type="submit" class="btn btn-primary" id="btnSaveItem">Save changes</button>
			</div>
		</div>
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalViewRecord">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Check-Up Records</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div hidden="">
					<input type="text" class="form-control data-id" placeholder="" name="id" id="i-id" >
					<input type="text" class="form-control" placeholder="" name="is_enable" id="i-is_enable" >
				</div>
				
				<div class="container">				  
				  <div id="accordion">
				  
				  
				  </div>
				</div>

			</div>
			<div class="modal-footer" align="right">
				<!-- <button type="submit" id="btnStatusChange" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>

