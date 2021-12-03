$(document).ready(function () {

	let json_data =[];
	$('.select2').select2()

	$.ajax({
		url: 'getStaffRoleList',
		dataType: 'json',
		type: 'post',
		success: function (response) {
			json_data = response;
			$('#dataTable').DataTable({
				"dom": '<"dt-buttons"Bf><"clear">lirtp',
				"paging": true,
				"autoWidth": true,
				"data": response,
				"columns": [
					{
						"targets": 0,
						"data": "id",
					},
					{
						"targets": 1,
						"data": "name",
					},
					{
						"targets": 2,
						"data": "description"
					},				
					{
						"targets": 3,
						"data": "is_enable",
						"render": function (data, type, row, meta) {
							if(data==1){
								return  '<a href="#" class="btn btn-primary btn-icon-split table-button update-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-edit"></i></span></a>' +
									'<a href="#" class="btn btn-danger btn-icon-split table-button enable-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-trash"></i></span></a>'
							}
							else{
								return  '<a href="#" class="btn btn-primary btn-icon-split table-button update-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-edit"></i></span></a>' +
									'<a href="#" class="btn btn-success btn-icon-split table-button enable-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-arrow-up"></i></span></a>'
							}

						}
					}
				],
				'columnDefs': [
					{
						"targets": 0, // your case first column
						"className": "text-center",
						"width": "5%"
						
					},
					{
						"targets": 1,
						"className": "text-center",
					},
					{
						"targets": 2,
						"className": "text-center",
					},
					{
						"targets": 3,
						"className": "text-center",	
						"width": "15%"				
					}]
			});
		},
		error: function () {
			alert("wew");
		}

	});


		

	$('#btnAddItem').on('click', function () {
		$('#modalManage').find("input,textarea,select").val('').end(); //to clear all the inputs
		$('#modalManage').modal('show');
	});


	$('#modalManage').find('#btnSaveItem').on('click',function () {

		let postData = {
			id:$('#modalManage').find('#i-id').val(),
			name:$('#modalManage').find('#i-name').val(),
			description:$('#modalManage').find('#i-description').val(),
		}

		$.ajax({
			type: 'POST',
			url: 'staff/manageStaffRole',
			data: postData,
			success: function (data) {		
				$('#modalCategory').modal("hide");
				Swal.fire({
					title: 'Action is successfully executed',
					icon:'success',
				  	confirmButtonText: 'OK',
				}).then((result) => {
				 	if (result.isConfirmed) {
				  		location.reload();
					}
				})
			},
			error: function (error) {
				alert('Error: ' + error);
			}
		});

	});


	$('#dataTable').delegate('.table-button.update-data', 'click', function () {
		let id = $(this).closest('tr').find('td:eq(0)').text(); //get the id on table
		let result = json_data.find( element => element.id == id );

		// let result = json_data.filter( function (a){ return a.id == id }); //search entry on the json data (data table data)
		// result = result[0];
		$("#i-id").val(result.id);
		$("#i-resident_type").val(result.resident_type);
		$("#i-first_name").val(result.first_name);
		$("#i-last_name").val(result.last_name);
		$("#i-middle_name").val(result.middle_name);
		$("#i-birth_date").val(result.birth_date);
		$("#i-birth_place").val(result.birth_place);
		$("#i-gender").val(result.gender);
		$("#i-civil_status").val(result.civil_status);
		$("#i-educational_attainment").val(result.educational_attainment);
		$("#i-occupation").val(result.occupation);
		$("#i-religion").val(result.religion);
		$("#i-citizenship").val(result.citizenship);
		$("#i-contact").val(result.contact);
		$("#i-street").val(result.street);
		$("#i-municipality").val(result.municipality);
		$("#i-house_number").val(result.house_number);
	

		$('#modalManage').modal('show');
	});

	$('#dataTable').delegate('.table-button.enable-data', 'click', function () {
		let parent = $(this).closest('tr');
		let id = parent.find('td:eq(0)').text();
		let is_enable = $(this).attr('data-id');

		if(is_enable=="0"){
			$('#i-is_enable').val(1);
			$('#pEnable').html('Are you sure you want to "Enable" this information?')
		}
		else{
			$('#i-is_enable').val(0);
			$('#pEnable').html('Are you sure you want to "Disable" this information?')
		}

		$('.data-id').val(id);
		$('#modalEnable').modal('show');

	});

	$('#modalEnable').find('#btnStatusChange').on('click',function () {

		let postData = {
			id:$('#modalEnable').find('#i-id').val(),
			is_enable:$('#modalEnable').find('#i-is_enable').val(),
		}

		$.ajax({
			type: 'POST',
			url: 'staff/manageStaffRoleStatus',
			data: postData,
			success: function (data) {
				$('#modalEnable').modal('hide');
				Swal.fire({
					title: 'Action is successfully executed',
					icon:'success',
				  	confirmButtonText: 'OK',
				}).then((result) => {
				 	if (result.isConfirmed) {
				  		location.reload();
					}
				})			
			},
			error: function (error) {
				alert('Error: ' + error);
			}
		});

	});

	

});
