
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
		<?php //print_r($detail);?>
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
			   @foreach(array_slice($posts, 0, 1) as $post)
			  
					<!---<p><span style="font-weight:bold">Order ID:</span> {{ $post->OrderID}}</p>---->
					<p><span style="font-weight:bold">Order Number:</span> {{ $post->OrderNumber}}</p>
					<p><span style="font-weight:bold">Date Created:</span> {{ $post->DateCreated}} </p>
				
				@endforeach
				<br />
				<p><span style="font-weight:bold;font-size:18px;color:#00516f">Order Item Details</span></p>
				@foreach($detail as $details)
					<div style="margin-left:20px;"><p><span style="font-weight:bold;color: #DC8510;">Item Description: </span> {{ $details['BandStyle']}}</p></div>
					<div class="item-carts-details" style="margin-left:34px">
							@if (($details['BandSize']) == "0-25inch")
								<p><span style="font-weight:bold">Band Size:</span> 1/4 Inch ({{ $details['BandSize']}})</p>
							@elseif (($details['BandSize']) == "0-50inch")
								<p><span style="font-weight:bold">Band Size:</span> 1/2 Inch ({{ $details['BandSize']}})</p>
							@elseif (($details['BandSize']) == "0-75inch")
								<p><span style="font-weight:bold">Band Size:</span> 3/4 Inch ({{ $details['BandSize']}})</p>
							@elseif (($details['BandSize']) == "1-00inch")
								<p><span style="font-weight:bold">Band Size:</span> 1 Inch {{ $details['BandSize']}}</p>
							@elseif (($details['BandSize']) == "1-50inch")
								<p><span style="font-weight:bold">Band Size:</span> 1 1/2 Inch ({{ $details['BandSize']}})</p>
							@elseif (($details['BandSize']) == "2-00inch")
							   `<p><span style="font-weight:bold">Band Size:</span> 2 Inch ({{ $details['BandSize']}})</p>
							@endif
							<p></p>
							<p><span style="font-weight:bold">Font:</span> {{ $details['Font']}} </p>
							<p><span style="font-weight:bold">Front Message:</span> {{ $details['FrontMessage']}} </p>
							<p><span style="font-weight:bold">Back Message:</span> {{ $details['BackMessage']}} </p>
							<p><span style="font-weight:bold">Inside Message:</span> 
							     <?php 
									$data = json_decode($details['arInsideMessage'], true);
									echo " "; print_r($data['text']);
								 ?>

							</p>
							<p><span style="font-weight:bold">Continuous Message:</span> {{ $details['ContinuousMessage']}} </p>
							<p><span style="font-weight:bold">Font:</span> {{ $post->Font}} </p>
							<p><span style="font-weight:bold">Front Message Start Clipart:</span> {{ $details['FrontMessageStartClipart']}} </p>
							<p><span style="font-weight:bold">Front Message End Clipart:</span> {{ $details['FrontMessageEndClipart']}} </p>
							<p><span style="font-weight:bold">Back Message Start Clipart:</span> {{ $details['BackMessageStartClipart']}} </p>
							<p><span style="font-weight:bold">Back Message End Clipart:</span> {{ $details['BackMessageEndClipart']}} </p>
							<p><span style="font-weight:bold">Continuous Message Start Clipart:</span> {{ $details['ContinuousMessageStartClipart']}} </p>
							<p><span style="font-weight:bold">Continuous Message End Clipart:</span> {{ $details['ContinuousEndClipart']}} </p>	
				    </div>
                    	<br />				
			   @endforeach
			   <p><span style="font-weight:bold;font-size:18px;color:#00516f">Band Style and Color(s)</span></p>
			   <div style="margin-left:20px;">
			   @foreach($posts as $post)
							<?php 
								$data = json_decode($post->arInfo, true);
								echo "Name: "; print_r($data['Name']); echo "<br />";
								$string = array('[',']','"');
								echo "Custom Solid/Pantone Color: ";print_r(str_replace($string,"",$data['CustomColors'])); echo "<br />";
								echo "Font Solid/Pantone Color: "; print_r($data['FontColor']); echo "<br />";
								echo "Qty: "; print_r($data['Qty']); echo "<br />";
							?>
							</p>
				 @endforeach
				 </div>
			   
			    
				@foreach($detail as $details)
				<br /><p><span style="font-weight:bold;font-size:18px;color:#00516f">Shipping Details</span></p>
				<div style="margin-left:20px;"><p><span style="font-weight:bold;color: #DC8510;">Item Description: </span> {{ $details['BandStyle']}}</p>
				<p></p>	
						
							<p><span style="font-weight:bold">Production:</span><br />
									<?php $data1 = json_decode($details['arProduction'], true); 
										echo "Days: ";print_r($data1['days']);echo "<br />";
										echo "Price: $";print_r($data1['price']);echo "<br />";
									?>
							</p>
							<p><span style="font-weight:bold">Shipping:</span><br />
									<?php $data2 = json_decode($details['arShipping'], true); 
										echo "Days: ";print_r($data2['days']);echo "<br />";
										echo "Price: $";print_r($data2['price']);echo "<br />";
									?>
							</p>
				
				<br /><p><span style="font-weight:bold;font-size:18px;color:#00516f">Add Ons</span></p>
					<?php $data = $details['arAddons'];
						if(isset($data['3mmThick'])){
							echo "3mm Thick: ";
							echo "Price: $";print_r($data['3mmThick']['price']);echo " | ";
							echo "Qty: ";print_r($data['3mmThick']['quantity']);echo " | ";
							echo "Total: $";print_r($data['3mmThick']['total']);echo "<br />";
						}	

					    if(isset($data['DigitalPrint'])){
							echo "Digital Print: ";
							echo "Price: $";print_r($data['DigitalPrint']['price']);echo " | ";
							echo "Qty: ";print_r($data['DigitalPrint']['quantity']);echo " | ";
							echo "Total: $";print_r($data['DigitalPrint']['total']);echo "<br />";
						}	

						if(isset($data['Ecofriendly'])){
							echo "Eco friendly: ";
							echo "Price: $";print_r($data['Ecofriendly']['price']);echo " | ";
							echo "Qty: ";print_r($data['Ecofriendly']['quantity']);echo " | ";
							echo "Total: $";print_r($data['Ecofriendly']['total']);echo "<br />";
						}

						if(isset($data['Individual_Pack'])){
							echo "Individual Pack: ";
							echo "Price: $";print_r($data['Individual_Pack']['price']);echo " | ";
							echo "Qty: ";print_r($data['Individual_Pack']['quantity']);echo " | ";
							echo "Total: $";print_r($data['Individual_Pack']['total']);echo "<br />";
						}

						if(isset($data['Glitters'])){
							echo "Glitters: ";
							echo "Price: $";print_r($data['Glitters']['price']);echo " | ";
							echo "Qty: ";print_r($data['Glitters']['quantity']);echo " | ";
							echo "Total: $";print_r($data['Glitters']['total']);echo "<br />";
						}

						if(isset($data['Keychain'])){
							echo "Converted to Keychain/s: ";
							echo "Price: $";print_r($data['Keychain']['price']);echo " | ";
							echo "Qty: ";print_r($data['Keychain']['Qty']);echo " | ";
							echo "Total: $";print_r($data['Keychain']['total']);echo "<br /><br />";
						}
					?>
					
				<br />
				<p><span style="font-weight:bold">Free Wristbands:</span></p>
				
					<?php 
                        foreach ($details['arFree'] as $key => $value) {

                            $data = json_decode($value, true);

    						if(isset($data['wristbands']['data']['Name'])){
    							echo "Name: ";print_r($data['wristbands']['data']['Name']);echo "<br />";
    						}

    						if(isset($data['wristbands']['data']['CustomColors'])){
    							$string = array('[',']','"');
    							echo "Custom Solid/Pantone Color: ";print_r(str_replace($string,"",$data['wristbands']['data']['CustomColors']));echo "<br />";
    						}

    						if(isset($data['wristbands']['data']['FontColor'])){
    							echo "Font Color: ";print_r($data['wristbands']['data']['FontColor']);echo "<br />";
    						}

    						if(isset($data['wristbands']['data']['Qty'])){
    							echo "Qty: ";print_r($data['wristbands']['data']['Qty']);echo "<br /><br />";
    						}						

                        }
					?>
					
				<p><span style="font-weight:bold">Free Keychains:</span></p>
				
					<?php
                        foreach ($details['arFree'] as $key => $value) {

                            $data = json_decode($value, true);

    						if(isset($data['keychains']['data']['Name'])){
    							echo "Name: ";print_r($data['keychains']['data']['Name']);echo "<br />";
    						}

    						if(isset($data['keychains']['data']['CustomColors'])){
    							$string = array('[',']','"');
    							echo "Custom Solid/Pantone Color: ";print_r(str_replace($string,"",$data['keychains']['data']['CustomColors']));echo "<br />";
    						}

    						if(isset($data['keychains']['data']['FontColor'])){
    							echo "Font Color: ";print_r($data['keychains']['data']['FontColor']);echo "<br />";
    						}

    						if(isset($data['keychains']['data']['Qty'])){
    							echo "Qty: ";print_r($data['keychains']['data']['Qty']);echo "<br /><br />";
    						}

                        }
					?>
				</div>
				@endforeach
				
				@foreach(array_slice($posts, 0, 1) as $post)
                <br /><br />
				<p><span style="font-weight:bold;font-size:18px;color:#00516f">Payment Info</span></p>
				<div style="margin-left:20px;">
					<p><span style="font-weight:bold">Payment Method: </span>{{ $post->PaymentMethod }} </p>
					
					<?php 
						if($post->PaymentMethod=="paypal"){
							echo "Transaction ID: ";print_r($post->TransNo);echo "<br />";
							echo "Paypal Email: ";print_r($post->PaypalEmail);echo "<br />";
						}else{
							echo "Authorize Transaction ID: ";print_r($post->AuthorizeTransID);echo "<br />";
						}
					?>
				</div>
				<br /><br />
				<p><span style="font-weight:bold;font-size:18px;color:#00516f">Billing Info</span></p>
				<div style="margin-left:20px;">
					<p><span style="font-weight:bold">Full Name:</span> {{ $post->FirstName}} {{ $post->LastName}}</p>
					<p><span style="font-weight:bold">Email:</span> {{ $post->EmailAddress}}</p>
					<p><span style="font-weight:bold">Phone:</span> {{ $post->Phone}}</p>
					<p><span style="font-weight:bold">Address:</span> {{ $post->Address}}</p>
					<p><span style="font-weight:bold">Address2:</span> {{ $post->Address2}}</p>
					<p><span style="font-weight:bold">City:</span> {{ $post->City}}</p>
					<p><span style="font-weight:bold">State:</span> {{ $post->State}}</p>
					<p><span style="font-weight:bold">ZipCode:</span> {{ $post->ZipCode}}</p>
					<p><span style="font-weight:bold">Country:</span> {{ $post->Country}}</p>
					<br /><br />
				</div>
				
				<p><span style="font-weight:bold;font-size:18px;color:#00516f">Shipping Info</span></p>
				<div style="margin-left:20px;">
					<p><span style="font-weight:bold">Full Name:</span> {{ $post->ShipFirstName}} {{ $post->ShipLastName}}</p>
					<p><span style="font-weight:bold">Email Address:</span> {{ $post->EmailAddress}} </p>
					<p><span style="font-weight:bold">Address 1:</span> {{ $post->ShipAddress}} </p>
					<p><span style="font-weight:bold">Address 2:</span> {{ $post->ShipAddress2}} </p>
					<p><span style="font-weight:bold">City: </span> {{ $post->ShipCity}} </p>
					<p><span style="font-weight:bold">Zipcode:</span> {{ $post->ShipZipCode}} </p>
					<p><span style="font-weight:bold">State:</span> {{ $post->ShipState}} </p>
					<p><span style="font-weight:bold">Country:</span> {{ $post->ShipCountry}} </p>
					<p><span style="font-weight:bold">Total Amount:</span> $<span style="font-size:17px;color:#ff0000">{{ $post->Total}}</span> </p>
				</div>	
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
