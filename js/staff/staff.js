$(document).ready(function () {

	let json_data =[];
	$('.select2').select2()

	$.ajax({
		url: '../staff/getStaffList',
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
						"data": "staff_name"
					},			
                    {
						"targets": 3,
						"data": "address"
					},	    
                    {
						"targets": 4,
						"data": "contact"
					},		
                    {
						"targets": 5,
						"data": "email"
					},	
                    {
						"targets": 6,
						"data": "gender"
					},	
					{
						"targets": 7,
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
					},
                    {
						"targets": 4,
						"className": "text-center",
					},
                    {
						"targets": 5,
						"className": "text-center",
					},
                    {
						"targets": 6,
						"className": "text-center",
					},
					{
						"targets": 7,
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
			staff_role_id:$('#modalManage').find('#i-staff_role_id').val(),
			first_name:$('#modalManage').find('#i-first_name').val(),
			last_name:$('#modalManage').find('#i-last_name').val(),
			middle_name:$('#modalManage').find('#i-middle_name').val(),
            address:$('#modalManage').find('#i-address').val(),
            contact:$('#modalManage').find('#i-contact').val(),
            email:$('#modalManage').find('#i-email').val(),
            username:$('#modalManage').find('#i-username').val(),
            password:$('#modalManage').find('#i-password').val(),
            gender:$('#modalManage').find('#i-gender').val(),
		}

		$.ajax({
			type: 'POST',
			url: '../staff/manageStaff',
			data: postData,
			success: function (data) {		
				$('#modalCategory').modal("hide");
				Swal.fire({
					title: 'Action is succe ssfully executed',
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
		$("#i-staff_role_id").val(result.staff_role_id);
		$("#i-first_name").val(result.first_name);
		$("#i-last_name").val(result.last_name);
		$("#i-middle_name").val(result.middle_name);
        $("#i-address").val(result.address);
        $("#i-email").val(result.email);
		$("#i-gender").val(result.gender);
        $("#i-username").val(result.username);
        $("#i-password").val(result.password);
		$("#i-contact").val(result.contact);
	
	

		$('#modalManage').modal('show');
	});


    $.ajax({
        url: '../staff/getStaffRoleList',
        dataType: 'json',
        type: 'post',
        success: function (response) {
            var len = response.length;
            $("#i-staff_role_id").empty();
            $("#i-staff_role_id").append("<option value=''>Select Role</option>");
            for( var i = 0; i<len; i++){
                var id = response[i]['id'];
                var name = response[i]['name'];
                var is_enable = response[i]['is_enable'];
                if (is_enable == 1){
                    $("#i-staff_role_id").append("<option value='"+id+"'>"+name+"</option>");
                }
            }				
        },
        error: function () {
            alert("wew");
        }
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
			url: '../staff/manageStaffStatus',
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
