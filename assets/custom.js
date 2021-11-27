//$(document).ready(function () {
//
//        $.ajax({
//            url: 'http://localhost/ecommerce/admins/getProduct',
//            dataType: 'json',
//            type: 'post',
//            success: function (response) {
//                $('#dataTable').DataTable({
//                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
//                    "paging": false,
//                    "autoWidth": true,
//                    "data": response,
//                    "columns": [
//                        {"targets": 0, "data": "productID"},
//                        {"targets": 1, "data": "productName"},
//                        {"targets": 2, "data": "productDescription"},
//                        {"targets": 3, "data": "productDetail"},
//                        {"targets": 4, "data": "productPrice"},
//                        {"targets": 5, "data": "productClassification"},
//                        {"targets": 6, "data": "categoryName"},
//                        {
//                            "data": "image1",
//                            "render": function (data, type, row, meta) {
//                                return '<img height="100" width="100" src="data:image/jpeg;base64,' + data + '" />'
//                            }
//                        }
//                    ],
//                    "buttons": [{
//                            extend: 'copyHtml5',
//                        }, {
//                            extend: 'csvHtml5',
//                        }, {
//                            extend: 'excelHtml5',
//                        }, {
//                            extend: 'pdfHtml5',
//                        }, {
//                            extend: 'print',
//                            exportOptions: {
//                                columns: [0, 1, 2, 3, 4, 5]
//                            }
//                        }]
//                });
//            },
//            error: function () {
//                alert("wew");
//            }
//
//        });
//
////        $('#dataTable').DataTable({
////            ajax: {
////                url: '<?php echo base_url(); ?>admins/getProduct',
////                dataType: 'json',
////                type: 'POST',
////                dataSrc: 'data'
////            },
////            columns: [
////                {data: 'productID'},
////                {data: 'productName'},
////                {data: 'productDescription'},
////                {data: 'productDetail'},
////                {data: 'productPrice'},
////                {data: 'productClassification'},
////                {data: 'categoryName'}
////            ]
////        });
//
//
//        $('#addProduct').on('click', function () {
//            $('#modal-default').modal('show');
//        });
//
//
//        function readURL(input, _thisImage) {
//            if (input.files && input.files[0]) {
//
//                var reader = new FileReader();
//
//                reader.onload = function (e) {
//                    $('#' + _thisImage).attr('src', e.target.result);
//                }
//                reader.readAsDataURL(input.files[0]); // convert to base64 string
//            }
//        }
//
//        $(".imageInp").change(function () {
//            var _thisImage = $(this).attr('data-id');
//            readURL(this, _thisImage);
//        });
//
//
//        $('#addProduct').on('click', function ()
//        {
//            $(".imageInp").val("");
//            $("#productName").val("");
//            $("#productDescription").val("");
//            $("#productDetail").val("");
//            $("#productPrice").val("");
//            $('.imagePreview').attr('scr') = "";
////            $("#productClassification").val("");
////            $("#categoryID").val("");
//        });
//
//    });