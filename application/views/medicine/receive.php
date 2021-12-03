<script type="text/javascript" src="<?php echo base_url(); ?>js/medicine/receive.js"></script>

<style>
	.icon-container{
		width: 50px !important;
	}
</style>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Receive List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Receive List</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-body">
					<div align="right">
						<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btnAddItem"><i class="fas fa-plus fa-sm text-white-50"></i> Add Transaction</a>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
							<tr>
								<th>ID</th>
								<th>SUPPLIER NANE</th>
								<th>DESCRIPTION</th>							
								<th>TRANSACTION DATE</th>					
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
				<h4 class="modal-title">Manage Receive</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div >
					<input type="text" class="form-control data-id" placeholder="" name="id" id="i-id" hidden>
				</div>
                <div class="row">
					<div class="col-6">
						<div class="form-group">
							<label>Supplier Name</label>
                    		<input type="text" class="form-control" id="i-supplier_name" placeholder="Supplier Name" name="supplier_name" required="true">
                  		</div>
					</div>
                    <div class="col-6">
						<div class="form-group">
							<label>Transaction</label>
                    		<input type="date" class="form-control" id="i-transaction_date" placeholder="Transaction Date" name="transaction_date" required="true">
                  		</div>
					</div>					
				</div>
                <div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Description</label>
                    		<textarea class="form-control" name="description" id="i-description" placeholder="Description" ></textarea>
                  		</div>
					</div>					
				</div>

				<div class="table-responsive">
					<table class="table table-bordered" id="tableList" width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>ID</th>
							<th>NAME</th>
							<th>TYPE</th>
							<th>BRAND</th>
							<th>DESCRIPTION</th>
                            <th>QUANTITY</th>
                            <th>EXPIRY DATE</th>
							<th>ACTION</th>
						</tr>
						</thead>
					</table>
				</div>

			</div>
			<div class="modal-footer" align="right">
				<button type="submit" id="btnSaveItem" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>




