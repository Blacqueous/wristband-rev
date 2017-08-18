
@extends('template.admin', ['type' => 1, 'menu' => 4])

@section('title', 'Cart Orders')

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
				padding-left: 30px;
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
           
                   

        </script>
@endsection

@section('content')
    <div class="container">
	    <h1>Order Details</h1>
		<br>
		<br>
		<div class="row row-actions">
            <div class="pull-left">
    		
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
		  <div class="col-sm-12">
          	<div style="text-align:left!important;padding:14px!important;">
			   @foreach($posts as $post)
			   	<p><span style="font-weight:bold">Order ID:</span> {{ $post->OrderID}}</p>
			   	<p><span style="font-weight:bold">Date Created:</span> {{ $post->DateCreated}} </p>
			   	<p><span style="font-weight:bold">Total Amount:</span> ${{ $post->Total}} </p>
			   	<p><span style="font-weight:bold">Item Description:</span> {{ $post->BandStyle}}</p>
			   			@if (($post->BandSize) == "0-25inch")
							<p><span style="font-weight:bold">Band Size:</span> 1/4 Inch ({{ $post->BandSize}})</p>
						@elseif (($post->BandSize) == "0-50inch")
						    <p><span style="font-weight:bold">Band Size:</span> 1/2 Inch ({{ $post->BandSize}})</p>
						@elseif (($post->BandSize) == "0-75inch")
						  	<p><span style="font-weight:bold">Band Size:</span> 3/4 Inch ({{ $post->BandSize}})</p>
						@elseif (($post->BandSize) == "1-00inch")
						    <p><span style="font-weight:bold">Band Size:</span> 1 Inch {{ $post->BandSize}}</p>
						@elseif (($post->BandSize) == "1-50inch")
						    <p><span style="font-weight:bold">Band Size:</span> 1 1/2 Inch ({{ $post->BandSize}})</p>
						@elseif (($post->BandSize) == "2-00inch")
						   `<p><span style="font-weight:bold">Band Size:</span> 2 Inch ({{ $post->BandSize}})</p>
						@endif
				<p><span style="font-weight:bold">Band Color(s):</span> {{ $post->arColors}} </p>
				<p></p>
				<p><span style="font-weight:bold">Font:</span> {{ $post->Font}} </p>
				<p><span style="font-weight:bold">Front Message:</span> {{ $post->FrontMessage}} </p>
				<p><span style="font-weight:bold">Back Message:</span> {{ $post->BackMessage}} </p>
				<p><span style="font-weight:bold">Continous Message:</span> {{ $post->ContinuousMessage}} </p>
			   @endforeach
		  	</div>
		  	<!----  End Container -->
		  </div>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
@endsection
