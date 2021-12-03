$(document).ready(function () {

	$.ajax({
		url: '../medicine/getReceive',
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
						"data": "medicine_receive_id",

					},
					{
						"targets": 1,
						"data": "supplier_name"
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
						"data": "medicine_receive_id",
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
        let supplier_name = parent.find('td:eq(1)').text();
        let description = parent.find('td:eq(2)').text();
		let date = parent.find('td:eq(3)').text();

		$('#i-id').val(id);
        $('#i-supplier_name').val(supplier_name);
        $('#i-description').val(description);
		$('#i-transaction_date').val(moment(date).format('YYYY-MM-DD'));

		$('#modalManage').modal('show');
		get_rawmats_inventory(id);

	});

	function get_rawmats_inventory(id){

		$('#tableList').DataTable().destroy();
		$.ajax({
			url: '../medicine/getReceiveDetails',
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
							"data":   "expiration_date",
							"render": function ( data, type, row ) {
								if(data==0){
									return '<input type="date"  disabled class="text-center">';
								}
								else{
									return '<input type="date" value="'+moment(data).format('YYYY-MM-DD')+'" class="text-center">';
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
						},
						{
							"targets": 7,
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
		let date = parent.find('td:eq(6)');
		let data = $(e.currentTarget);

		if (checkbox.prop("checked")) {
			text.find('input').removeAttr('disabled');
			date.find('input').removeAttr('disabled');
		} else {
			text.find('input').attr('disabled', 'disabled');
			date.find('input').attr('disabled', 'disabled');
		}

	});

	$('#modalManage').find('#btnSaveItem').on('click',function () {
		
		let array_data = get_checked_data();
		let id = $('#modalManage').find('#i-id').val();
        let description = $('#modalManage').find('#i-description').val();
        let supplier_name = $('#modalManage').find('#i-supplier_name').val();
		let date = moment($('#modalManage').find('#i-transaction_date').val()).format('YYYY-MM-DD');

		$.ajax({
			type: 'POST',
			url: '../medicine/manageReceive',
			data: {				
				id:id,
				date:date,
                description:description,
                supplier_name:supplier_name,
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
			data.push(
				{
					id:id,
					quantity: quantity,
				}
			)
		});
		return data;
	}








});
