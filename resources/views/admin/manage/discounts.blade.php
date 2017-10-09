
@extends('template.admin', ['type' => 1, 'menu' => 5])

@section('title', 'Manage Promo Codes')

@section('css')
<!-- Additional CSS plugins -->
        <link href="{{ URL::asset('css/admin.pages.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('global/sweetalert.js/sweetalert.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('global/DataTables-1.10.15/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('global/DataTables-1.10.15/css/responsive.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('global/DataTables-1.10.15/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('global/iCheck/skins/square/blue.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('global/bootstrap-formhelpers/css/bootstrap-formhelpers.min.css') }}" rel="stylesheet" type="text/css">
        <style>
			.row-actions {
				padding: 0px;
				margin-left: -15px;
				margin-right: -15px;
				text-align: left;
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
                text-align: center;
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
				text-overflow: ellipsis;
				white-space: nowrap;
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
			table.dtr-details tr td:first-child {
				font-weight: bold;
				width: 30% !important;
				padding-right: 15px;
			}
			div.loadingoverlay {
				z-index: 99999 !important;
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
        <script src="{{ URL::asset('global/bootstrap-formhelpers/js/bootstrap-formhelpers.min.js') }}"></script>
        <script src="{{ URL::asset('global/jquery-form-validator/jquery.validate.min.js') }}"></script>
        <script src="{{ URL::asset('global/jquery-form-validator/additional-methods.min.js') }}"></script>
        <script type="text/javascript">
            var _message;
            var _table;

            $(document).ready(function() {
                _message = $('input#_message');

                if (typeof _message !== "undefined" && _message.length > 0) {
                    if (_message.val() === "error") {
                        swal("Error", "Something went wrong!", "error");
                    } else {
                        swal("Success", "Save done.", "success");
                    }
                }

				$('input.check-all').iCheck({
					checkboxClass: 'icheckbox_square-blue control-checkbox',
					radioClass: 'iradio_square-blue control-radio',
					increaseArea: '20%', // optional
				});

                _table = $('#discounts').DataTable({
            		'ajax': {
            			'url': '/admin/discounts/list',
            			'data': function(d) {},
            		},
            		'bDestroy': true,
            		'bFilter': false,
            		'bLengthChange': false,
    				'columnDefs': [
                        { 'targets': 0, 'orderable': false },
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
            		'order': [[1, 'desc']],
            		'paging': true,
            		'processing': true,
					'responsive': {
				        details: {
				            display: $.fn.dataTable.Responsive.display.modal({
				                header: function (row) {
				                    var data = row.data();
				                    return 'Details for Order #'+data[1];
				                },
				                footer: function (row) {
				                    return 'Details for Order';
				                }
				            }),
				            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
				                tableClass: 'table',
				            }),
				        }
				    },
            		'sDom': '<"top"flp>rt<"bottom"i><"clear">',
            		'serverSide': true,
            	});

				$(document).on('click', '#discounts td', function(e) {
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

				$(document).on('ifChanged', '#discounts .check-action', function(e) {
					var self = $(this);
					if (self.is(':checked')) {
						self.closest('tr').addClass('has-icheck');
					} else {
						self.closest('tr').removeClass('has-icheck');
					}
				});

				$(document).on('ifClicked', '#discounts .check-all', function(e) {
					var self = $(this);
					if (self.is(':checked')) {
						$('.check-action:checked').iCheck('uncheck');
					} else {
						$('.check-action').not(':checked').iCheck('check');
					}
				});

				$(document).on('change.bfhdatepicker', '.bfh-datepicker[data-name="DateStart"]', function(e) {
                    // var minDate = $("#addDiscountForm input[name='DateStart']").val();
                    var minDate = $(this).find("input").val();
                    $(".bfh-datepicker[data-name='DateEnd']").data("min", minDate);
				});

				$(document).on('click', 'button#delDiscount', function(e) {
                    var id_list = [];
                    $('table#discounts .check-action:checked').each(function(key, element) {
                        id_list.push($(element).attr('data-id'));
                    });
                    $.ajax({
                        url: "/admin/discounts/delete",
                        type: "POST",
                        dataType: 'JSON',
                        data: {
                            _token:	"{{ csrf_token() }}",
                            id_list: id_list
                        },
                        beforeSend: function() {
                            $("button").prop("disabled", true);
                        },
                        success: function(data) {
                            if (data.status) {
                                if (id_list.length > 1) {
                                    swal("Deleted", "Discounts successfully deleted.", "success");
                                } else {
                                    swal("Deleted", "Discount successfully deleted.", "success");
                                }
                            } else {
                                swal("Error", "Something went wrong!", "error");
                            }
                            _table.ajax.reload();
                            $("button").prop("disabled", false);
                        },
                        error: function(data) {
                            $("button").prop("disabled", false);
                        }
                    }).done(function(data) {
                        $("button").prop("disabled", false);
                    });
				});

				$(document).on('click', 'button#updDiscount', function(e) {
                    var id_list = [];
                    $('table#discounts .check-action:checked').each(function(key, element) {
                        id_list.push($(element).attr('data-id'));
                    });
                    $.ajax({
                        url: "/admin/discounts/updateStatus",
                        type: "POST",
                        dataType: 'JSON',
                        data: {
                            _token:	"{{ csrf_token() }}",
                            id_list: id_list
                        },
                        beforeSend: function() {
                            $("button").prop("disabled", true);
                        },
                        success: function(data) {
                            if (data.status) {
                                if (id_list.length > 1) {
                                    swal("Updated", "Discounts successfully updated.", "success");
                                } else {
                                    swal("Updated", "Discount successfully updated.", "success");
                                }
                            } else {
                                swal("Error", "Something went wrong!", "error");
                            }
                            _table.ajax.reload();
                            $("button").prop("disabled", false);
                        },
                        error: function(data) {
                            $("button").prop("disabled", false);
                        }
                    }).done(function(data) {
                        $("button").prop("disabled", false);
                    });
				});

            });
        </script>
@endsection

@section('content')
@if(Session::has('status'))
<input type="hidden" id="_message" value="{{Session::get('status')}}">
@endif
<div class="container">
    <h1>Manage Discount Codes</h1>
	<br>
	<br>
	<div class="row row-actions">
		<button type="button" id="addDiscount" class="btn btn-success" data-toggle="modal" data-target="#modalAddDiscount"><i class="fa fa-plus-circle"></i> Add New</button>
		<button type="button" id="delDiscount" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
		<button type="button" id="updDiscount" class="btn btn-info"><i class="fa fa-refresh fa-flip-horizontal"></i> Update Status</button>
	</div>
    <div class="row">
		<table id="discounts" class="table table-bordered table-hover table-striped dt-responsive nowrap" cellspacing="0">
            <thead>
                <tr>
                    <th><input type='checkbox' class='check-all'/></th>
                    <th>Code</th>
                    <th>Percentage</th>
                    <th>Status</th>
                    <th>Date Start</th>
                    <th>Date End</th>
                    <th>Date Created</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<br/>
<br/>
<br/>
<div id="modalAddDiscount" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title pull-left">Add Discount Code</h4>
			</div>
            <form id="addDiscountForm" action="/admin/discounts/add" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label for="Code" class="conrol-label col-md-3 text-left">Code</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="addCode" name="Code" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="Percentage" class="conrol-label col-md-3 text-left">Percentage</label>
						<div class="col-md-9">
							<input type="text" class="form-control bfh-number" id="addPercentage" name="Percentage" data-buttons="false" data-max="100" data-wrap="true" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="DateStart" class="conrol-label col-md-3 text-left">Date Start</label>
						<div class="col-md-9">
                            <div class="bfh-datepicker" data-format="y-m-d" data-min="today" data-name="DateStart" data-close="false"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="DateEnd" class="conrol-label col-md-3 text-left">Date End</label>
						<div class="col-md-9">
                            <div class="bfh-datepicker" data-format="y-m-d" data-min="today" data-name="DateEnd" data-close="false"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>	
@endsection

