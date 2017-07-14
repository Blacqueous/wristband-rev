
@extends('template.admin', ['type' => 1, 'menu' => 4])

@section('title', 'Orders')

@section('css')
<!-- Additional CSS plugins -->
        <link href="{{ URL::asset('css/admin.pages.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('global/sweetalert.js/sweetalert.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('global/DataTables-1.10.15/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('global/DataTables-1.10.15/css/responsive.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('global/DataTables-1.10.15/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('global/iCheck/skins/square/blue.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('global/bootstrap-toggle/css/bootstrap-toggle.min.css') }}" rel="stylesheet" type="text/css">
        <style>
			.row-actions {
				padding: 0px;
                margin-bottom: 10px;
				margin-left: -15px;
				margin-right: -15px;
			}
			.text-authnet {
				color: #E09719;
				font-weight: bold;
			}
			.text-paypal {
				color: #2196F3;
				font-weight: bold;
			}
			.text-success {
				color: #4CAF50;
			}
            .row .col-sm-12 {
                overflow-x: auto;
                margin: 5px 0 15px 0;
            }
			.table-striped > tbody > tr:nth-of-type(odd) {
			    background-color: #fafafa;
			}
			.table-hover > tbody > tr:hover {
				background-color: #f0f0f0;
			}
			table.dataTable {
				width: 100% !important;
			}
            table.dataTable thead .sorting,
            table.dataTable thead .sorting_asc,
            table.dataTable thead .sorting_desc {
                background-image: none;
            }
 			table.dataTable thead:first-child  tr:first-child th:first-child {
				/*padding-left: 30px;*/
				width: auto !important;
            }
		    table.dataTable tbody td {
				cursor: pointer;
				line-height: 34px;
		        min-height: 34px;
		    }
		    table.dataTable tbody tr.has-icheck {
				background-color: #fffbe6;
				font-weight: bold;
			}
		    table.dataTable tbody tr.has-icheck:hover {
				background-color: #fffbe6;
			}
			table.dataTable tbody tr td.text-limit {
				max-width: 100px;
				overflow: hidden;
				/*text-overflow: ellipsis;*/
				white-space: nowrap;
			}
            table.dataTable tbody tr td.text-transno {
                color: #777;
                font-style: italic;
                font-weight: bold;
            }
            table.dataTable tbody tr.has-icheck td.text-transno {
                color: #333;
            }
            div.dataTables_wrapper div.dataTables_processing {
                border-color: transparent;
                height: auto;
            }
            div.dataTables_wrapper div.dataTables_info {
                text-align: left;
            }
			table.dataTable.dtr-inline.collapsed > tbody > tr > td:first-child:before,
			table.dataTable.dtr-inline.collapsed > tbody > tr > th:first-child:before {
			    background-color: #4CAF50;
			    border: 2px solid #4CAF50;
			    border-radius: 14px;
			    box-shadow: none;
			    box-sizing: content-box;
			    color: white;
			    content: '\f067';
			    display: block;
			    font-family: FontAwesome;
			    font-size: 12px;
				font-weight: normal !important;
			    height: 14px;
			    left: 4px;
			    position: absolute;
			    line-height: 14px;
			    text-align: center;
				top: 18px;
			    width: 14px;
			}
			table.dtr-details {
				margin-bottom: 5px;
			}
			table.dtr-details tr td {
				border-bottom: 1px solid #e5e5e5;
			}
			table.dtr-details tr td {
				padding-bottom: 10px;
				padding-top: 10px;
    			vertical-align: top;
				word-break: break-word;
			}
			table.dtr-details tr:first-child {
				display: none;
			}
			table.dtr-details tr:nth-child(2) td {
				padding-top: 0px;
			}
			table.dtr-details tr:last-child td {
				padding-bottom: 0px;
				border-width: 0px;
			}
			table.dtr-details tr:last-child td:first-child {
				color: #fff;
			}
			table.dtr-details tr td:first-child {
				font-weight: bold;
				width: 30% !important;
				padding-right: 15px;
			}
			div.loadingoverlay {
				z-index: 99999 !important;
			}
            .form-group-inline {
                display: inline-block;
                margin-bottom: 0px;
                margin-left: 10px;
            }
            .text-primary {
                color: #337AB7;
                font-weight: bold;
            }
            .text-warning {
                color: #E6AE04;
                font-weight: bold;
            }
        </style>
@endsection

@section('js')
<!-- Additional JS plugins -->
		<script src="{{ URL::asset('global/sweetalert.js/sweetalert.min.js') }}"></script>
		<script src="{{ URL::asset('global/jquery-loading-overlay/src/loadingoverlay.min.js') }}"></script>
        <script src="{{ URL::asset('global/DataTables-1.10.15/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('global/DataTables-1.10.15/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('global/DataTables-1.10.15/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::asset('global/DataTables-1.10.15/js/responsive.bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('global/iCheck/icheck.min.js') }}"></script>
        <script src="{{ URL::asset('global/bootstrap-toggle/js/bootstrap-toggle.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {

				$('input.check-all').iCheck({
					checkboxClass: 'icheckbox_square-blue control-checkbox',
					radioClass: 'iradio_square-blue control-radio',
					increaseArea: '20%', // optional
				});

                $('#orders').DataTable({
            		'ajax': {
            			'url': '/admin/orders/list',
            			'data': function(d) {
                            d.showRemoved = $('#showRemoved').is(':checked');
                            d.showDone = $('#showDone').is(':checked');
                        },
            		},
            		'bDestroy': true,
            		'bFilter': false,
            		'bLengthChange': false,
    				'columnDefs': [
                        { 'targets': 0, 'orderable': false },
                        // { 'targets': 1, 'orderable': false },
                        { 'targets': 2, 'orderable': false },
                        { 'targets': 5, 'className': 'text-transno' },
                        { 'targets': 7, 'className': 'text-limit' },
                        { 'targets': 8, 'className': 'text-limit' },
                        { 'targets': 9, 'className': 'text-limit' },
                        { 'targets': 10, 'className': 'text-limit' },
                        { 'targets': 11, 'className': 'text-limit' },
                        { 'targets': 22, 'className': 'text-limit' },
                        { 'targets': 23, 'className': 'text-limit' },
                        { 'targets': 24, 'className': 'text-limit' },
                        { 'targets': 25, 'className': 'text-limit' },
                        { 'targets': 26, 'className': 'text-limit' },
    				],
					'fnDrawCallback': function() {
					    $('input.check-action').iCheck({
					        checkboxClass: 'icheckbox_square-blue control-checkbox',
					        radioClass: 'iradio_square-blue control-radio',
					        increaseArea: '20%', // Optional
					    });
						$('.check-all').iCheck('uncheck');
						$('.check-action:checked').iCheck('uncheck');
					},
					'initComplete': function(settings, json) {
					    $('input.check-action').iCheck({
					        checkboxClass: 'icheckbox_square-blue control-checkbox',
					        radioClass: 'iradio_square-blue control-radio',
					        increaseArea: '20%', // Optional
					    });
						$('.check-all').iCheck('uncheck');
						$('.check-action:checked').iCheck('uncheck');
					},
            		'language': {
                        'lengthMenu': 'Display _MENU_ records per page',
                        'zeroRecords': 'Nothing found - sorry',
                        'info': 'Showing page _PAGE_ of _PAGES_',
                        'infoEmpty': 'No records available',
                        'processing': '<i class="fa fa-spin fa-circle-o-notch fa-3x fa-fw"></i>',
            		},
            		'order': [[2, 'desc']],
            		'paging': true,
            		'pageLength': 10,
            		'processing': true,
					// 'responsive': {
				    //     details: {
				    //         display: $.fn.dataTable.Responsive.display.modal({
				    //             header: function (row) {
				    //                 var data = row.data();
				    //                 return 'Details for Order #'+data[2];
				    //             },
				    //             footer: function (row) {
				    //                 return 'Details for Order';
				    //             }
				    //         }),
				    //         renderer: $.fn.dataTable.Responsive.renderer.tableAll({
				    //             tableClass: 'table',
				    //         }),
				    //     }
				    // },
                    'searching': true,
            		'serverSide': true,
            	});

				$(document).on('click', '#orders td', function(e) {
					e.preventDefault();
					var self = $(this);
					if (self.is(':first-child')) { return false; }
					var row = self.closest('tr');
					var box = row.find('td:first input[type="checkbox"]').iCheck('toggle');
					if (box.is(':checked')) {
						row.addClass('has-icheck');
					} else {
						row.removeClass('has-icheck');
					}
				});

				$(document).on('ifChanged', '#orders .check-action', function(e) {
					var self = $(this);
					if (self.is(':checked')) {
						self.closest('tr').addClass('has-icheck');
					} else {
						self.closest('tr').removeClass('has-icheck');
					}
				});

				$(document).on('ifClicked', '.check-all', function(e) {
					var self = $(this);
					if (self.is(':checked')) {
						$('.check-action:checked').iCheck('uncheck');
					} else {
						$('.check-action').not(':checked').iCheck('check');
					}
				});

                $(document).on('change', '#showRemoved, #showDone', function(e) {
                    $('#orders').DataTable().ajax.reload();
                });

                $(document).on('click', '#remOrder', function(e) {
                    e.preventDefault();
					var check = $('.check-action:checked');
					var check_len = check.length;
					if (check_len <= 0) { swal('Ooops!', 'Please select an order.', 'error'); return false; }
					var check_arr = [];
					$(check).each(function() {
						check_arr.push($(this).attr('data-id'));
					});
					if (check_arr.length <= 0) { swal('Ooops!', 'Please select an order.', 'error'); return false; }
					var content = (check_arr.length <= 1) ? 'Delete the order?' : 'Delete these selected orders?';
					var contentSuccess = (check_arr.length <= 1) ? 'The order is deleted!' : 'The selected orders are deleted!';
					var contentNone = (check_arr.length <= 1) ? 'This order is already deleted!' : 'These selected orders are already deleted!';
                    swal({
                        title: "Are you sure?",
                        text: content,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, proceed!",
                        cancelButtonText: "No, cancel!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: "/admin/orders/remove",
                                type: "POST",
                                data: {
									_token: $('meta[name="csrf-token"]').attr('content'),
                                    ids: check_arr,
                                },
                                dataType: "JSON",
								beforeSend: function() {
									swal.close();
									$.LoadingOverlay("show");
								},
								success: function(data) {
									if (data.status) {
										if (data.count > 0) {
											swal('Good Job!', contentSuccess, 'success');
											$('#orders').DataTable().ajax.reload();
										} else {
											swal('Wait!', contentNone, 'error');
										}
									} else {
										swal('Ooops!', 'Something went wrong.', 'error');
									}
									$.LoadingOverlay("hide");
								},
								error: function(data) {
									swal('Ooops!', 'Something went wrong.', 'error');
									$.LoadingOverlay("hide");
								}
                            });
                        }
                    });
                });

                $(document).on('click', '#doneOrder', function(e) {
                    e.preventDefault();
					var check = $('.check-action:checked');
					var check_len = check.length;
					if (check_len <= 0) { swal('Ooops!', 'Please select an order.', 'error'); return false; }
					var check_arr = [];
					$(check).each(function() {
						check_arr.push($(this).attr('data-id'));
					});
					if (check_arr.length <= 0) { swal('Ooops!', 'Please select an order.', 'error'); return false; }
					var content = (check_arr.length <= 1) ? 'Flag the order as done!' : 'Flag these selected orders as done!';
					var contentSuccess = (check_arr.length <= 1) ? 'The order is flagged as done!' : 'The selected orders are flagged as done!';
					var contentNone = (check_arr.length <= 1) ? 'This order is already flagged as done!' : 'These selected orders are already flagged as done!';
                    swal({
                        title: "Are you sure?",
                        text: content,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, proceed!",
                        cancelButtonText: "No, cancel!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: "/admin/orders/done",
                                type: "POST",
                                data: {
									_token: $('meta[name="csrf-token"]').attr('content'),
                                    ids: check_arr,
                                },
                                dataType: "JSON",
								beforeSend: function() {
									swal.close();
									$.LoadingOverlay("show");
								},
								success: function(data) {
									if (data.status) {
										if (data.count > 0) {
											swal('Good Job!', contentSuccess, 'success');
											$('#orders').DataTable().ajax.reload();
										} else {
											swal('Wait!', contentNone, 'error');
										}
									} else {
										swal('Ooops!', 'Something went wrong.', 'error');
									}
									$.LoadingOverlay("hide");
								},
								error: function(data) {
									swal('Ooops!', 'Something went wrong.', 'error');
									$.LoadingOverlay("hide");
								}
                            });
                        }
                    });
				});

				$(document).on('click', '#delOrder', function(e) {
					swal({
						title: "Are you sure?",
						text: "You will not be able to recover this orders!",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "Yes, delete!",
						cancelButtonText: "No, cancel!",
						closeOnConfirm: false,
						closeOnCancel: true
					},
					function(isConfirm) {
						if (isConfirm) {
							$.ajax({
								url: "/admin/orders/delete",
								type: "POST",
								data: {
									_token: $('meta[name="csrf-token"]').attr('content'),
								},
								dataType: "JSON",
								beforeSend: function() {
									swal.close();
									$.LoadingOverlay("show");
								},
								success: function(data) {
									if (data.status) {
										swal('Good Job!', 'Orders deleted.', 'success');
										$('#orders').DataTable().ajax.reload();
									} else {
										swal('Ooops!', 'Something went wrong.', 'error');
									}
									$.LoadingOverlay("hide");
								},
								error: function(data) {
									swal('Ooops!', 'Something went wrong.', 'error');
									$.LoadingOverlay("hide");
								}
							});
						}
					});
				});

            });
        </script>
@endsection

@section('content')
    <div class="container">
	    <h1>Manage Orders</h1>
		<br>
		<br>
		<div class="row row-actions">
            <div class="pull-left">
    			<button type="button" id="remOrder" class="btn btn-primary"><i class="fa fa-trash"></i> Delete</button>
    			<!-- <button type="button" id="remOrder" class="btn btn-primary"><i class="fa fa-remove"></i> Flag as Removed</button> -->
    			<!-- <button type="button" id="doneOrder" class="btn btn-warning"><i class="fa fa-bookmark"></i> Flag as Done</button> -->
    			<!-- <button type="button" id="delOrder" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All Done Orders</button> -->
            </div>
            <!-- <div class="pull-right">
                <div class="form-group-inline">
                    <label for="showRemoved">Show Remove?</label>
                    <input type="checkbox" id="showRemoved" data-toggle="toggle"/>
                </div>
                <div class="form-group-inline">
                    <label for="showRemoved">Show Done?</label>
                    <input type="checkbox" id="showDone" data-toggle="toggle" data-onstyle="warning"/>
                </div>
            </div> -->
		</div>
        <div class="row table-row">
			<table id="orders" class="table table-bordered table-hover table-striped nowrap" cellspacing="0">
                <thead>
                    <tr>
                        <th><input type='checkbox' class='check-all'/></th>
                        <!-- <th>Status</th> -->
                        <th>ID</th>
                        <th>Paid</th>
                        <th>Payment Type</th>
                        <th>Paid Date</th>
                        <th>Trans ID</th>
                        <th>PayPal Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Address 2</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip Code</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Production Charge</th>
                        <th>Production Days</th>
                        <th>Delivery Charge</th>
                        <th>Delivery Days</th>
                        <th>Discount Code</th>
                        <th>Discount Percent</th>
                        <th>Shipping First Name</th>
                        <th>Shipping Last Name</th>
                        <th>Shipping Address</th>
                        <th>Shipping Address 2</th>
                        <th>Shipping City</th>
                        <th>Shipping State</th>
                        <th>Shipping Zip Code</th>
                        <th>Shipping Country</th>
                        <th>IP Address</th>
                        <!-- <th></th> -->
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
@endsection
