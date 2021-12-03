<script type="text/javascript" src="<?php echo base_url(); ?>js/staff/staff.js"></script>
<!-- Begin Page Content -->

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Staff List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Staff List</li>
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
								<th>ROLE</th>
								<th>STAFF NAME</th>
								<th>ADDRESS</th>
								<th>CONTACT</th>		
								<th>EMAIL</th>	
								<th>GENDER</th>				
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
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Manage Staff</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<div class="row">
					<div class="col-2">
						<div class="form-group">
	                        <label>Staff Role</label>
                      	</div>
					</div>
					<div class="col-10">
						<div class="form-group">
							<input type="text"  name="id" id="i-id" hidden>
	                        <select class="form-control bootstrap-select" name="staff_role_id" id="i-staff_role_id">	                            
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
					<div class="col-12">
						<div class="form-group">
                    		<label>Address</label>
                    		<input type="text" class="form-control" id="i-address" placeholder="Address" name="address">
                  		</div>
					</div>
											
				</div>

				<div class="row">
					<div class="col-3">
						<div class="form-group">
	                        <label>Gender</label>
	                        <select class="form-control" name="gender" id="i-gender" required="true">
	                        	<option value="">Select Gender</option>
	                        	<option value="male">Male</option>
	                        	<option value="female">Female</option>	         
	                        </select>
                      	</div>
					</div>
					<div class="col-4">
						<div class="form-group">
                    		<label >Contacts</label>
                    		<input type="text" class="form-control" id="i-contact" placeholder="Contacts" name="contact">
                  		</div>	
					</div>	
					<div class="col-5">
						<div class="form-group">
	                        <label>Email</label>
	                        <input type="text" class="form-control" id="i-email" placeholder="Email" name="email">
                     	</div>
					</div>							
				</div>
				<div class="row">
				
					<div class="col-6">
						<div class="form-group">
							<label>Username</label>
	                        <input type="text" class="form-control" id="i-username" placeholder="Username" name="username">
                      	</div>
					</div>	
					<div class="col-6">
						<div class="form-group">
							<label>Password</label>
	                        <input type="password" class="form-control" id="i-password" placeholder="Password" name="password">
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
