$(document).ready(function () {

    $.ajax({
        url: '../resident/getResidentList',
        dataType: 'json',
        type: 'post',
        success: function (response) {
            var len = response.length;
            $("#i-resident_id").empty();
            $("#i-resident_id").append("<option value=''>Resident</option>");
            for( var i = 0; i<len; i++){
                var id = response[i]['id'];
                var name = response[i]['first_name']+' '+ response[i]['last_name'];
                var is_enable = response[i]['is_enable'];
                if (is_enable == 1){
                    $("#i-resident_id").append("<option value='"+id+"'>"+name+"</option>");
                }
            }				
        },
        error: function () {
            alert("wew");
        }
    });

	$.ajax({
		url: '../medicine/getRelease',
		dataType: 'json',
		type: 'post',
		success: function (response) {
			$('#dataTable').DataTable({
				"dom": '<"dt-buttons"Bf><"clear">lirtp',
				"paging": true,
				"autoWidth": true,
				"data": response,
				"columns": [
					{
						"targets": 0,
						"data": "medicine_release_id",

					},
					{
						"targets": 1,
						"data": "full_name"
					},
					{
						"targets": 2,
						"data": "description"
					},
				
                    {
						"targets": 3,
						"data": "transaction_date"
					},
					{
						"data": "resident_id",
						"render": function (data, type, row, meta) {
							return  '<a href="#" class="btn btn-primary btn-icon-split table-button update-data" data-id="'+data+'"><span class="icon text-white-50"><i class="fas fa-edit"></i></span></a>'

						}
					}
				],
				'columnDefs': [
					{
						"targets": 0, // your case first column
						"className": "text-center",
						"width": "10%"
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
						"width": "10%"
					}]
			});
		},
		error: function () {
			alert("wew");
		}
	});

	$('#btnAddItem').on('click', function () {
		$('#modalManage').find("input,textarea,select").val('').end()
		get_rawmats_inventory("");
		$('#modalManage').modal('show');
	}); 

	$('#dataTable').delegate('.update-data', 'click', function () {
		let parent = $(this).closest('tr');
		let id = parent.find('td:eq(0)').text();
        let resident_id = $(this).attr('data-id');
        let description = parent.find('td:eq(2)').text();
		let date = parent.find('td:eq(3)').text();

		$('#i-id').val(id);
        $('#i-resident_id').val(resident_id);
        $('#i-description').val(description);
		$('#i-transaction_date').val(moment(date).format('YYYY-MM-DD'));

		$('#modalManage').modal('show');
		get_rawmats_inventory(id);

	});

	function get_rawmats_inventory(id){

		$('#tableList').DataTable().destroy();
		$.ajax({
			url: '../medicine/getReleaseDetails',
			dataType: 'json',
			type: 'post',
			data:{
				id:id
			},
			success: function (response) {
				console.log(response);
				$('#tableList').DataTable({
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
							"data": "name"
						},
						{
							"targets": 2,
							"data": "type"
						},
						{
							"targets": 3,
							"data": "brand"
						},
						{
							"targets": 4,
							"data": "description"
						},
						{
							"data":   "quantity",
							"render": function ( data, type, row ) {
								if(data==0){
									return '<input type="text"  disabled class="text-center">';
								}
								else{
									return '<input type="text" value="'+data+'" class="text-center">';
								}
							},
						},
						{
							"data":   "flag",
							"render": function ( data, type, row ) {
								if ( type === 'display' ) {
									if(data==0){
										return '<input type="checkbox" class="checkbox-flag" >';
									}
									else {
										return '<input type="checkbox" class="checkbox-flag" checked>';
									}
								}
								return data;
							},
						},
					],
					'columnDefs': [
						{
							"targets": 0, // your case first column
							"className": "text-center",
							"width": "10%"
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
							"width": "10%"
						},
						{
							"targets": 6,
							"className": "text-center",
							"width": "10%"
						}]
				});
			},
			error: function () {
				alert("wew");
			}
		});

	}

	$('#tableList').delegate('.checkbox-flag', 'click', function (e) {

		let checkbox = $(this);
		let parent = $(this).closest('tr');
		let text = parent.find('td:eq(5)');
		let data = $(e.currentTarget);

		if (checkbox.prop("checked")) {
			text.find('input').removeAttr('disabled');
		} else {
			text.find('input').attr('disabled', 'disabled');
		}

	});

	$('#modalManage').find('#btnSaveItem').on('click',function () {
        
		let array_data = get_checked_data();
		let id = $('#modalManage').find('#i-id').val();
        let description = $('#modalManage').find('#i-description').val();
        let resident_id = $('#modalManage').find('#i-resident_id').val();
		let date = moment($('#modalManage').find('#i-transaction_date').val()).format('YYYY-MM-DD'); 

		$.ajax({
			type: 'POST',
			url: '../medicine/manageRelease',
			data: {
				id:id,
				date:date,
                description:description,
                resident_id:resident_id,
				array_data:array_data
			},
			success: function (response) {
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

	})

	function get_checked_data(){
		let checkbox = $('#tableList').find('.checkbox-flag:checked');
		let data = [];
		checkbox.each(function(i, obj) {
			let id = $(this).closest('tr').find('td:eq(0)').html();
			let quantity = $(this).closest('tr').find('td:eq(5)').find('input').val();
			let expiration_date = $(this).closest('tr').find('td:eq(6)').find('input').val();
			data.push(
				{
					id:id,
					quantity: quantity,
					expiration_date: expiration_date,
				}
			)
		});
		return data;
	}


});
