$(document).ready(function () {

	let json_data =[];
	$('.select2').select2()

	$.ajax({
		url: '../patient/getPatientList',
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
						"data": "patient_id",
					},
					{
						"targets": 1,
						"data": "full_name",
					},
					{
						"targets": 2,
						"data": "birth_date"
					},
					{
						"targets": 3,
						"data": "last_checkup"
					},						
					{
						"targets": 4,
						"data": "status"
					},				
					{
						"targets": 5,
						"data": "id",
						"render": function (data, type, row, meta) {
							if(data==1){
								return  '<a href="#" class="btn btn-primary btn-icon-split table-button update-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-list"></i></span></a>' +
								'<a href="#" class="btn btn-danger btn-icon-split table-button enable-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-plus"></i></span></a>' +
									'<a href="#" class="btn btn-info btn-icon-split table-button update-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-print"></i></span></a>' 
									
							}
							else{
								return '<a href="#" class="btn btn-primary btn-icon-split table-button view-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-list"></i></span></a>' +
								'<a href="#" class="btn btn-success btn-icon-split table-button add-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-plus"></i></span></a>' +
									'<a href="#" class="btn btn-info btn-icon-split table-button update-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-print"></i></span></a>' +
									'<a href="#" class="btn btn-warning btn-icon-split table-button update-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-check"></i></span></a>' 
									
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
					},
					{
						"targets": 4,
						"className": "text-center",					
					},			
					{
						"targets": 5,
						"className": "text-center",	
						"width": "15%"				
					}]
			});
		},
		error: function () {
			alert("wew");
		}

	});

	$.ajax({
			url: '../resident/getResidentList',
			dataType: 'json',
			type: 'post',
			success: function (response) {
				var len = response.length;
	            $("#i-resident_id").empty();
	            $("#i-resident_id").append("<option value=''>Select Resident</option>");
	            for( var i = 0; i<len; i++){
					var id = response[i]['id'];
					var name = response[i]['full_name'];
					$("#i-resident_id").append("<option value='"+id+"'>"+name+"</option>");
	            }				
			},
			error: function () {
				alert("wew");
			}
		});
		

	$('#btnAddItem').on('click', function () {
		$('#modalManage').find("input,textarea,select").val('').end(); //to clear all the inputs
		$('#modalManage').removeAttr('readonly');
		$('#div_resident').removeClass("d-none");
		$('#i-number_of_months').removeAttr('disabled');
		$('#modalManage').modal('show');
	});

	$('#modalManage').find('#btnSaveItem').on('click',function () {
		let postData = {
			id:$('#modalManage').find('#i-id').val(),
			patient_id:$('#modalManage').find('#i-patient_id').val(),
			resident_id:$('#modalManage').find('#i-resident_id').val(),
			checkup_date:$('#modalManage').find('#i-checkup_date').val(),
			last_checkup_date:$('#modalManage').find('#i-last_checkup_date').val(),
			weight:$('#modalManage').find('#i-weight').val(),
			temperature:$('#modalManage').find('#i-temperature').val(),
			blood_pressure:$('#modalManage').find('#i-blood_pressure').val(),		
			remarks:$('#modalManage').find('#i-remarks').val(),
			diagnosis:$('#modalManage').find('#i-diagnosis').val(),		
		}

		$.ajax({
			type: 'POST',
			url: '../patient/managePatient',
			data: postData,
			success: function (data) {		
				$('#modalManage').modal("hide");
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

	$('#dataTable').delegate('.table-button.view-data', 'click', function () {
		let id = $(this).closest('tr').find('td:eq(0)').text(); //get the id on table
		$.ajax({
			type: 'POST',
			url: '../patient/getRecordList',
			data: {id:id},
			dataType: 'json',
			success: function (data) {
				var html="";
				$("#accordion").empty();

				for(var count = 0; count < data.length; count++) {
					html =$('<div class="card">')
						.append($('<div class="card-header">')
							.append('<a class="card-link" data-toggle="collapse" href="#collapse'+data[count].id+'"> '+data[count].checkup_date+'</a>'))
						.append($('<div id="collapse'+data[count].id+'" class="collapse " data-parent="#accordion">')
							.append($('<div class="card-body">')
								.append($('<div class="row">')
									.append($('<div class="col-3">')
										.append($('<div class="form-group">')
											.append('<label>Weight</label>')
											.append('<input type="text" class="form-control" id="i-weight" placeholder="" name="weight" value="'+data[count].weight+'" disabled>')))
									.append($('<div class="col-3">')
										.append($('<div class="form-group">')
											.append('<label>Blood Pressure</label>')
											.append('<input type="text" class="form-control" id="i-blood_pressure" placeholder="" name="blood_pressure" value="'+data[count].blood_pressure+'" disabled>')))
									.append($('<div class="col-3">')
										.append($('<div class="form-group">')
											.append('<label>Temperature</label>')
											.append('<input type="text" class="form-control" id="i-temperature" placeholder="" name="temperature" value="'+data[count].temperature+'" disabled>'))))
								.append($('<div class="row">')
									.append($('<div class="col-12">')
										.append($('<div class="form-group">')
											.append('<label>Remarks</label>')
											.append('<textarea type="text" style="height: 150px;" class="form-control" id="i-remaks" placeholder="Remarks" name="remaks" disabled>'+data[count].remarks+'</textarea>'))))
								.append($('<div class="row">')
									.append($('<div class="col-12">')
										.append($('<div class="form-group">')
											.append('<label>Diagnosis</label>')
											.append('<textarea type="text" style="height: 150px;" class="form-control" id="i-remaks" placeholder="Remarks" name="remaks" disabled>'+data[count].diagnosis+'</textarea>'))))));

					$("#modalViewRecord").find('#accordion').append(html);
				}				
			},
			error: function (error) {
				alert('Error: ' + error);
			}
		});			
		$('#modalViewRecord').modal('show');
	});

	$('#dataTable').delegate('.table-button.add-data', 'click', function () {
		$('#modalManage').find("input,textarea,select").val('').end();
		let parent = $(this).closest('tr');
		let id = parent.find('td:eq(0)').text();
		let last_checkup = parent.find('td:eq(3)').text();		

		$('#i-last_checkup_date').val(last_checkup);
		$('#i-patient_id').val(id);

		$('#div_resident').addClass("d-none");
		$('#modalManage').modal('show');
	});

	
});
