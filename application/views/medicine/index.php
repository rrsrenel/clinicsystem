<script type="text/javascript" src="<?php echo base_url(); ?>js/medicine/medicine.js"></script>
<!-- Begin Page Content -->

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Medicine List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Medicine List</li>
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
						<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btnAddItem"><i class="fas fa-plus fa-sm text-white-50"></i> Add Medicine</a>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
							<tr>
								<th>ID</th>
								<th>NAME</th>
								<th>TYPE</th>
								<th>BRAND</th>
								<th>DESCRIPTION</th>
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
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Manage Medicine</h4>
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
				</div>		
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Name</label>
                    		<input type="text" class="form-control" id="i-name" placeholder="Name" name="name" required="true">
                  		</div>
					</div>					
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
	                        <label>Type</label>
	                        <select class="form-control" name="type" id="i-type" required="true">
								<option value="">Enter Type</option>
								<option value="Capsule">Capsule</option>
	                        	<option value="Tablet">Tablet</option>
	                        	<option value="Syrup">Syrup</option>	         
	                        </select>
                      	</div>
					</div>							
				</div>

				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Brand</label>
	                        <input type="text" class="form-control" id="i-brand" placeholder="Brand" name="brand">
                      	</div>
					</div>							
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Description</label>
	                        <textarea class="form-control" id="i-description" placeholder="Description" name="description"> </textarea>
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


