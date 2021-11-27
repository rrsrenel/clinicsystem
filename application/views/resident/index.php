<script type="text/javascript" src="<?php echo base_url(); ?>js/resident/resident.js"></script>
<!-- Begin Page Content -->

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Resident List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Resident List</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- DataTales Example -->
			<div class="card shadow mb-4">

				<div class="card-body">
						<div align="right">
						<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btnAddItem"><i class="fas fa-plus fa-sm text-white-50"></i> Add Resident</a>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
							<tr>
								<th>ID</th>
								<th>FULL NAME</th>
								<th>BIRTH DATE</th>
								<th>GENDER</th>
								<th>RELIGION</th>
								<th>CIVIL STATUS</th>
								<th>LOCATION</th>
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
				<h4 class="modal-title">Manage Resident</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<div class="row">
					<div class="col-8">
						<div class="form-group">
                    		<input type="text" class="form-control" placeholder="" name="id" id="i-id" hidden>
                  		</div>
					</div>
					<div class="col-4">
						<div class="form-group">
	                        <label>Resident Type</label>
	                        <select class="form-control" name="resident_type" id="i-resident_type">	                       
	                        	<option value="Normal Resident">Normal Resident</option>
	                        	<option value="New Born">New Born</option>	         
	                        </select>
                      	</div>
					</div>					
				</div>
				<label>Full Name</label>
				<div class="row">
					<div class="col-4">
						<div class="form-group">
                    		<input type="text" class="form-control" id="i-first_name" placeholder="First Name" name="first_name" required="true">
                  		</div>
					</div>
					<div class="col-4">
						<div class="form-group">
                    		<input type="text" class="form-control" id="i-middle_name" placeholder="Middle Name" name="middle_name">
                  		</div>
					</div>
					<div class="col-4">
						<div class="form-group">
                    		<input type="text" class="form-control" id="i-last_name" placeholder="Last Name" name="last_name" required="true">
                  		</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<div class="form-group">
                    		<label>Birth Date</label>
                    		<input type="date" class="form-control" id="i-birth_date" placeholder="Birth Date" name="birth_date" required="true">
                  		</div>
					</div>
					<div class="col-8">
						<div class="form-group">
                    		<label >Birth Place</label>
                    		<input type="text" class="form-control" id="i-birth_place" placeholder="Birth Place" name="birth_place">
                  		</div>
					</div>							
				</div>

				<div class="row">
					<div class="col-6">
						<div class="form-group">
	                        <label>Gender</label>
	                        <select class="form-control" name="gender" id="i-gender" required="true">
	                        	<option value="">Select Gender</option>
	                        	<option value="male">Male</option>
	                        	<option value="female">Female</option>	         
	                        </select>
                      	</div>
					</div>
					<div class="col-6">
						<div class="form-group">
	                        <label>Civil Status</label>
	                        <select class="form-control" name="civil_status" id="i-civil_status">
	                        	<option value="">Select Civil Status</option>
	                        	<option value="Single">Single</option>
	                        	<option value="Married">Married</option>
	                        	<option value="Married">Separeted</option>      
	                        </select>
                     	</div>
					</div>							
				</div>
				<div class="row">
					<div class="col-4">
						<div class="form-group">
							<label>Religion</label>
	                        <input type="text" class="form-control" id="i-religion" placeholder="Religion" name="religion">
                      	</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label>Citezenship</label>
	                        <input type="text" class="form-control" id="i-citizenship" placeholder="Citezenship" name="citizenship">
                      	</div>
					</div>	
					<div class="col-4">
						<div class="form-group">
							<label>Contact #</label>
	                        <input type="text" class="form-control" id="i-contact" placeholder="Contact #" name="contact">
                      	</div>
					</div>											
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Educational Attainment</label>
	                        <input type="text" class="form-control" id="i-educational_attainment" placeholder="Edicational Attainment" name="educational_attainment">
                      	</div>
					</div>										
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Occupation</label>
	                        <input type="text" class="form-control" id="i-occupation" placeholder="Occupation" name="occupation">
                      	</div>
					</div>										
				</div>
				<label>Address</label>
			
				<div class="row">
					<div class="col-3">
						<div class="form-group">
	                        <input type="text" class="form-control" id="i-house_number" placeholder="House #" name="house_number">
                      	</div>
					</div>
					<div class="col-4">
						<div class="form-group">
	                        <input type="text" class="form-control" id="i-street" placeholder="Street" name="street">
                     	</div>
					</div>
					<div class="col-5">
						<div class="form-group">
	                        <input type="text" class="form-control" id="i-municipality" placeholder="Municiplaity/City" name="municipality">
                      </div>
					</div>							
				</div>						
			</div>
			<div class="modal-footer" align="right">
				<button type="submit" class="btn btn-primary" id="btnSaveItem">Save changes</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalEnable">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Manage Status</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div hidden="">
					<input type="text" class="form-control data-id" placeholder="" name="id" id="i-id" >
					<input type="text" class="form-control" placeholder="" name="is_enable" id="i-is_enable" >
				</div>
				<p id="pEnable">Are you sure you want to "Disable" this information?</p>
			</div>
			<div class="modal-footer" align="right">
				<button type="submit" id="btnStatusChange" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>


