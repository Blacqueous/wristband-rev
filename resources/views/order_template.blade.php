<?php //include_once 'queryDB.php'; ?>

<?php
    //
	// // Set variables needed
	// $dataJSONpriceWband = $priceWband = [];
	// $dataJSONpriceAddon = $priceAddon = [];
    //
	// // Start :: For JSON wristband prices
	// // Get query string
	// $sql = getPriceJSON();
	// // Run SQL
	// $resultPrice = $conn->query($sql);
	// // Get results
	// if ($resultPrice->num_rows > 0) {
	// 	while($row = $resultPrice->fetch_assoc()) {
	// 		$priceWband[strtolower($row['style_code'])][$row['size_code']][$row['qty']] = $row['price'];
	// 	}
	// 	$dataJSONpriceWband = $priceWband;
	// }
	// // End :: For JSON wristband prices
    //
	// // Start :: For JSON add-on prices
	// // Get query string
	// $sql = getAddOnJSON();
	// // Run SQL
	// $resultAddOnPrice = $conn->query($sql);
	// // Get results
	// if ($resultAddOnPrice->num_rows > 0) {
	// 	while($row = $resultAddOnPrice->fetch_assoc()) {
	// 		$priceAddon[strtolower($row['code'])][$row['qty']] = $row['price'];
	// 	}
	// 	$dataJSONpriceAddon = $priceAddon;
	// }
	// // End :: For JSON add-on prices
    //
	// // Get wristband style
	$qstyle = strtolower((isset($_GET['q'])&&!empty($_GET['q'])) ? $_GET['q'] : "printed");
	// // Double check if existing
	// if(!isset($dataJSONpriceWband[$qstyle])) { $qstyle = "printed"; }
?>

<script>
	var price_json = '<?php // echo(json_encode($dataJSONpriceWband)); ?>';
	var addon_json = '<?php // echo(json_encode($dataJSONpriceAddon)); ?>';
</script>

<div id="main-page-content">
	<div class="container">

		<!-- Example row of columns -->
		<div id="banner-pricing">

			<!-- PRINTED -->
			<table class="table-area-printed-half uk-table uk-table-bordered js-pricing-table" data-pricing-tbl="" style="display:none;">
				<caption class="uk-margin-bottom js-wb-caption">Pricing for <span class="style">Printed</span> wristbands (&quot;<span class="size">1/2</span>&quot;) as of July, 2016</caption>
				<thead>
					<tr id="priceHeader">
					<th data-uk-tooltip="{pos:'top'}" title="Quantity" class="uk-text-primary">Qty</th>
					<!-- <th data-uk-tooltip="{pos:'top'}" title="20 to 29">20</th>
					<th data-uk-tooltip="{pos:'top'}" title="30 to 99">30</th>
					<th data-uk-tooltip="{pos:'top'}" title="100 to 199">100</th>
					<th data-uk-tooltip="{pos:'top'}" title="200 to 299">200</th>
					<th data-uk-tooltip="{pos:'top'}" title="300 to 499">300</th>
					<th data-uk-tooltip="{pos:'top'}" title="500 to 999">500</th>
					<th data-uk-tooltip="{pos:'top'}" title="1000 to 1999">1,000</th>
					<th data-uk-tooltip="{pos:'top'}" title="2000 to 2999">2,000</th>
					<th data-uk-tooltip="{pos:'top'}" title="3000 to 4999">3,000</th>
					<th data-uk-tooltip="{pos:'top'}" title="5000 to 9999">5,000</th>
					<th data-uk-tooltip="{pos:'top'}" title="10000 to 19999">10,000</th>
					<th data-uk-tooltip="{pos:'top'}" title="20000 to 49999">20,000</th>
					<th data-uk-tooltip="{pos:'top'}" title="50000 to 99999">50,000</th>
					<th data-uk-tooltip="{pos:'top'}" title="100000 to 199999">100,000</th> -->
					</tr>
				</thead>
				<tbody>
					<tr id="priceTable">
						<td class="uk-text-primary">Price</td>
					</tr>
				</tbody>
			</table>
			<!-- END BLANK STYLE -->
		</div>
		<!-- WRIST STYLE -->

		<!---<form id="order-form" action="" method="post" novalidate enctype="multipart/form-data">---->
		<div class="wrist-style">
			<div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-2 offerpv float-left">Step <span class="sRename">1</span></div>
				<div class="col-xs-9 col-sm-10 offer-details float-left">Select Wristband Style </div>
				<div class="clearfix"></div>
			</div>
			<div class="wrist_style_container">
				<div class="popup-order-gallery">
					<div class="col-md-4 prod js-style <?php echo(($qstyle==='printed')?'active':''); ?>"  value="printed">
						<div class="zoom"><a href="assets/images/src/Printed.png" title="Printed Wristband"><img src="assets/images/src/zoom.png" class="galleryimg"></a></div>
						<div class="box-thumb"><img src="assets/images/src/Printed.png"></div>
						<input type="radio" name="wrist_style" id="printed" class="wrist_style" value="printed" data-style="printed" <?php echo(($qstyle==="printed")?'checked="checked"':''); ?> >
						<h2>Printed</h2>
					</div>
					<div class="col-md-4 prod js-style <?php echo(($qstyle==='debossed')?'active':''); ?>"  value="debossed">
						<div class="zoom"><a href="assets/images/src/Debossed.png" title="Debossed Wristband"><img src="assets/images/src/zoom.png" class="galleryimg"></a></div>
						<div class="box-thumb"><img src="assets/images/src/Debossed.png"></div>
						<input type="radio" name="wrist_style" id="debossed" class="wrist_style" value="debossed" data-style="debossed" <?php echo(($qstyle==="debossed")?'checked="checked"':''); ?> >
						<h2>Debossed</h2>
					</div>
					<div class="col-md-4 prod js-style <?php echo(($qstyle==='ink-injected')?'active':''); ?>"  value="ink-injected">
						<div class="zoom"><a href="assets/images/src/Color-Filled.png" title="Color-Filled Wristband"><img src="assets/images/src/zoom.png" class="galleryimg"></a></div>
						<div class="box-thumb"><img src="assets/images/src/Color-Filled.png"></div>
						<input type="radio" name="wrist_style" id="ink-injected" class="wrist_style" value="ink-injected" data-style="ink-injected" <?php echo(($qstyle==="ink-injected")?'checked="checked"':''); ?> >
						<h2>Ink Injected</h2>
					</div>
					<div class="col-md-4 prod js-style <?php echo(($qstyle==='embossed')?'active':''); ?>"  value="embossed">
						<div class="zoom"><a href="assets/images/src/Embossed.png" title="Embossed Wristband"><img src="assets/images/src/zoom.png" class="galleryimg"></a></div>
						<div class="box-thumb"><img src="assets/images/src/Embossed.png"></div>
						<input type="radio" name="wrist_style" id="embossed" class="wrist_style" value="embossed" data-style="embossed" <?php echo(($qstyle==="embossed")?'checked="checked"':''); ?> >
						<h2>Embossed</h2>
					</div>
					<div class="col-md-4 prod js-style <?php echo(($qstyle==='dual-layer')?'active':''); ?>"  value="dual-layer">
						<div class="zoom"><a href="assets/images/src/Dual-Layer.png" title="Dual-Layer Wristband"><img src="assets/images/src/zoom.png" class="galleryimg"></a></div>
						<div class="box-thumb"><img src="assets/images/src/Dual-Layer.png"></div>
						<input type="radio" name="wrist_style" id="dual-layer" class="wrist_style" value="dual-layer" data-style="dual-layer" <?php echo(($qstyle==="dual-layer")?'checked="checked"':''); ?> >
						<h2>Dual layer</h2>
					</div>
					<div class="col-md-4 prod js-style <?php echo(($qstyle==='embossed-printed')?'active':''); ?>" value="embossed-printed">
						<div class="zoom"><a href="assets/images/src/Embossed-Printed.png" title="Embossed-Printed Wristband"><img src="assets/images/src/zoom.png" class="galleryimg"></a></div>
						<div class="box-thumb"><img src="assets/images/src/Embossed-Printed.png"></div>
						<input type="radio" name="wrist_style" id="embossed-printed" class="wrist_style" value="embossed-printed" data-style="embossed-printed" <?php echo(($qstyle==="embossed-printed")?'checked="checked"':''); ?> >
						<h2>Embossed Printed</h2>
					</div>
					<div class="col-md-4 prod js-style <?php echo(($qstyle==='figured')?'active':''); ?>" value="figured">
						<div class="zoom"><a href="assets/images/src/Figured.png" title="Figured Wristband"><img src="assets/images/src/zoom.png" class="galleryimg"></a></div>
						<div class="box-thumb"><img src="assets/images/src/Figured.png"></div>
						<input type="radio" name="wrist_style" id="figured" class="wrist_style" value="figured" data-style="figured" <?php echo(($qstyle==="figured")?'checked="checked"':''); ?> >
						<h2>Figured</h2>
					</div>
					<div class="col-md-4 prod js-style <?php echo(($qstyle==='blank')?'active':''); ?>" value="blank">
						<div class="zoom"><a href="assets/images/src/Blank.png" title="Blank Wristband"><img src="assets/images/src/zoom.png" class="galleryimg"></a></div>
						<div class="box-thumb"><img src="assets/images/src/Blank.png"></div>
						<input type="radio" name="wrist_style" id="blank-style" class="wrist_style" value="blank" data-style="blank" <?php echo(($qstyle==="blank")?'checked="checked"':''); ?> >
						<h2>Blank</h2>
					</div>
					<div class="clearfix"></div>
					<input type="hidden" name="style_info" class="style_info">
				</div><!-- end popupgallery -->
			</div>
			<!-- END WRIST STYLE -->
		</div>
		<div class="clearfix"></div>

		<!-- WRIST SIZE -->
		<div class="wrist-size">
			<div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-2 offerpv float-left">Step <span class="sRename">2</span></div>
				<div class="col-xs-9 col-sm-10 offer-details float-left">Select Wristband Size </div>
				<div class="clearfix"></div>
			</div>
			<div class="wsize-default">
				<div class="col-md-4 prod-size js-size" id="quarter" style="display:<?php echo (in_array($qstyle, ['printed','debossed','ink-injected','embossed','embossed-printed','blank']))?'block':'none'; ?>">
					<div class="box-thumb"><img src="assets/images/src/sizes/1-4.png"></div>
					<input type="radio" name="wrist_size"  class="wrist_size" value="1/4" data-size="1/4">
					<h2>1/4 Inch</h2>
				</div>
				<div class="col-md-4 prod-size js-size active"  id="half" style="display:<?php echo (in_array($qstyle, ['printed','debossed','ink-injected','embossed','embossed-printed','blank','dual-layer','figured']))?'block':'none'; ?>">
					<div class="box-thumb"><img src="assets/images/src/sizes/1-2.png"></div>
					<input type="radio" name="wrist_size" class="wrist_size" value="1/2" data-size="1/2" checked="checked">
					<h2>1/2 Inch</h2>
				</div>
				<div class="col-md-4 prod-size js-size" id="three" style="display:<?php echo (in_array($qstyle, ['printed','debossed','ink-injected','embossed','embossed-printed','blank','dual-layer','figured']))?'block':'none'; ?>">
					<div class="box-thumb"><img src="assets/images/src/sizes/3-4.png"></div>
					<input type="radio" name="wrist_size"  class="wrist_size" value="3/4" data-size="3/4">
					<h2>3/4 Inch</h2>
				</div>
				<div class="col-md-4 prod-size js-size" id="one" style="display:<?php echo (in_array($qstyle, ['printed','debossed','ink-injected','embossed','embossed-printed','blank','dual-layer']))?'block':'none'; ?>">
					<div class="box-thumb"><img src="assets/images/src/sizes/1.png"></div>
					<input type="radio" name="wrist_size"  class="wrist_size" value="1" data-size="1">
					<h2>1 Inch</h2>
				</div>
				<div class="col-md-4 prod-size js-size" id="onehalf" style="display:<?php echo (in_array($qstyle, ['printed','debossed','ink-injected','embossed','embossed-printed','blank']))?'block':'none'; ?>">
					<div class="box-thumb"><img src="assets/images/src/sizes/11-2.png"></div>
					<input type="radio" name="wrist_size"  class="wrist_size" value="1.5" data-size="1.5">
					<h2>1.5 Inch</h2>
				</div>
				<div class="col-md-4 prod-size js-size" id="two" style="display:<?php echo (in_array($qstyle, ['printed','debossed','ink-injected','embossed','embossed-printed','blank']))?'block':'none'; ?>">
					<div class="box-thumb"><img src="assets/images/src/sizes/2.png"></div>
					<input type="radio" name="wrist_size" class="wrist_size" value="2" data-size="2">
					<h2>2 Inch</h2>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- END WRIST SIZE -->

		<!-- WRIST COLOR -->
		<div class="wrist-color-quantity">
			<div class="wristband-view-color regular-color-size" style="display:<?php echo (in_array($qstyle, ['printed','debossed','ink-injected','embossed','embossed-printed','blank']))?'block':'none'; ?>">
				<?php // include "wrist-regularbandcolor.php"; ?>
			</div>
			<div class="wristband-view-color large-color-size" style="display:none">
				<?php // include "wrist-largebandcolor.php"; ?>
			</div>
			<div class="wristband-view-color regular-figured-size" style="display:<?php echo (in_array($qstyle, ['figured']))?'block':'none'; ?>">
				<?php // include "wrist-regularfigured.php"; ?>
			</div>
			<div class="wristband-view-color large-figured-size" style="display:none">
				<?php // include "wrist-largefigured.php"; ?>
			</div>
			<div class="wristband-view-color regular-dual-size" style="display:<?php echo (in_array($qstyle, ['dual-layer']))?'block':'none'; ?>">
				<?php // include "wrist-regulardual.php"; ?>
			</div>
			<div class="wristband-view-color large-dual-size" style="display:none">
				<?php // include "wrist-largedual.php"; ?>
			</div>
			<div class="wristband-view-color thin-color-size" style="display:none">
				<?php // include "wrist-thinbandcolor.php"; ?>
			</div>
		</div>
		<!-- END WRIST COLOR -->

		<!-- WRISTBAND MESSAGE -->
		<div class="wrist-messsage" style="display:<?php echo($qstyle != 'blank')?'block':'none'; ?>">
			<div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-2 offerpv float-left">Step <span class="sRename">4</span></div>
				<div class="col-xs-9 col-sm-10 offer-details float-left">Enter Message for preview</div>
				<div class="clearfix"></div>
			</div>
			<div class="main-content-preview">
				<div id="text-design">
					<h3>INPUT TEXT DESIGN MESSAGE</h3>
				</div>
				<div class="message-selection">
					<div class="col-sm-3">
						<input class="band-text-design front-back-select" type="radio" value="front-back-select" name="font-back-select" checked="checked"/>Font/Back Message
					</div>
					<div class="col-sm-3">
						<input class="band-text-design cont-select" type="radio" value="cont-select" name="cont-select"/>Continuous Message
					</div>
					<div class="clearfix"></div>
				</div>
				<div id="band-text" class="margin-div">
					<div class="f-input">
						<div class="col-sm-5"   style="border-right:2px solid #154360;margin-left:50px;">
							<span>Front Message:</span><br />
							<span class="note-m">* Maximum of 22 characters for both front and back</span>
							<input id="input-front-text" type="text" name="front-text" class="band-text" value=""  placeholder="Enter Front Message" maxlength="22">
							<div class="clip-sec col-xs-6">
								<button class="fclip-1" data-toggle="modal" data-target="#ClipArtModal" style="margin-left:-14px;">Front Start Clipart</button><br />
								<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-1">or Upload your own art</a>
								<div id="upload-1" class="collapse">
									<label for="file">Choose Photo:</label>
									<input type="file" name="file_array[]" class="file-1" required><br>
									<a href="javascript:void(0)" id="remove-1">Remove File</a>
								</div>
							</div>
							<div class="clip-sec col-xs-6">
								<button class="fclip-2" data-toggle="modal" data-target="#ClipArtModal">Front End Clipart</button><br />
								<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-2">or Upload your own art</a>
								<div id="upload-2" class="collapse">
									<label for="file">Choose Photo:</label>
									<input type="file" name="file_array[]" class="file-2" required><br>
									<a href="javascript:void(0)" id="remove-2">Remove File</a>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="clip-sec col-xs-6 figarea" style="display:none;">
								<button class="fclip-3" data-toggle="modal" data-target="#ClipArtModal">Figured Center Clipart</button><br />
								<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-7">or Upload your own art</a>
								<div id="upload-7" class="collapse">
									<label for="file">Choose Photo:</label>
									<input type="file" name="file_array[]" class="file-7" required><br>
									<a href="javascript:void(0)" id="remove-2">Remove File</a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-sm-5" style="margin-left:60px;">
							<span>Back Message:</span><br />
							<span class="note-m">* Maximum of 22 characters for both front and back</span>
							<input id="input-back-text" type="text" name="back-text" class="band-text" value="" placeholder="Enter Back Message" maxlength="22">
							<div class="clip-sec col-xs-6">
								<button class="bclip-1" data-toggle="modal" data-target="#ClipArtModal" style="margin-left:-14px;">Back Start Clipart</button><br />
								<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-3">or Upload your own art</a>
								<div id="upload-3" class="collapse">
									<label for="file">Choose Photo:</label>
									<input type="file" name="file_array[]" class="file-3" required><br>
									<a href="javascript:void(0)" id="remove-3">Remove File</a>
								</div>
							</div>
							<div class="clip-sec col-xs-6">
								<button class="bclip-2" data-toggle="modal" data-target="#ClipArtModal">Back End Clipart</button><br />
								<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-4">or Upload your own art</a>
								<div id="upload-4" class="collapse">
									<label for="file">Choose Photo:</label>
									<input type="file" name="file_array[]" class="file-4" required><br>
									<a href="javascript:void(0)" id="remove-4">Remove File</a>
								</div>
								<div></div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="c-input" style="display:none;margin-left:52px;">
						<div class="col-sm-12">
						<span class="inside-m">Continuous Text:</span><br /> &nbsp;
						* Maximum of 50 characters for message<br />
						<input id="input-continue-text" type="text" name="continue-text" class="band-text" value=""  placeholder="Enter Continuous Message" maxlength="50" style="width:100%;">
						</div>
						<div class="clearfix"></div>
						<div class="clip-sec" style="float:left;width:20%;margin-left:16px;">
							<button class="cclip-1" data-toggle="modal" data-target="#ClipArtModal">Start Clipart</button><br />
							<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-5">or Upload your own art</a>
							<div id="upload-5" class="collapse">
								<label for="file">Choose Photo:</label>
								<input type="file" name="file_array[]" class="file-5" required><br>
								<a href="javascript:void(0)" id="remove-5">Remove File</a>
							</div>
						</div>
						<div class="clip-sec" style="float:left;width:20%;">
							<button class="cclip-2" data-toggle="modal" data-target="#ClipArtModal">End Clipart</button><br />
							<a href="javascript:void(0)" data-toggle="collapse" data-target="#upload-6">or Upload your own art</a>
							<div id="upload-6" class="collapse">
								<label for="file">Choose Photo:</label>
								<input type="file" name="file_array[]" class="file-6" required><br>
								<a href="javascript:void(0)"id="remove-6">Remove File</a>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="i-input" style=";margin-left:52px;">
						<div class="col-sm-12">
							<br />
							<span class="inside-m">Inside Text:</span><br /> &nbsp;
							* Maximum of 50 characters for message <br />&nbsp;
							* Inside Message will be embossed with the same color of the inside of the band
							<br />
							<input id="input-inside-text" type="text" name="inside-text" class="band-text" value=""  placeholder="Enter Inside Message" maxlength="50" style="width:100%;">
							<br /><br />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
					<!-- Start modal here -->
					<div class="modal fade" id="ClipArtModal" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Pick Clipart</h4>
								</div>
								<div class="modal-body">
									<?php // include "clipart-template.php";?>
									<div class="clearfix"></div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
							<!-- End Modal Content -->
						</div>
					</div>
					<div class="clear"></div>
					<!-- End Modal Div -->
				</div>

				<?php // include_once 'preview_template.php'; ?>
				<?php // include_once 'preview_band_template.php'; ?>

				<h3>PREVIEW</h3>
				<div id="preview-pane" class="preview-panel">
					<div class="fb-select">
						<div id="front-view" class="band <?php echo(($qstyle==='figured')?'set-height-fig':'set-height-reg'); ?>">
						<span class="start-fc"></span>
						<span class="end-fc"></span>
						<span class="fig-fc"></span>
							<div class="preview-text faded" id="front-text">
								Front Message
							</div>
						</div>
						<div id="back-view" class="band <?php echo(($qstyle==='figured')?'set-height-fig':'set-height-reg'); ?>">
							<span class="back-mc"></span>
							<span class="backend-mc"></span>
							<div class="preview-text faded" id="back-text">
								Back Message
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="c-select" style="display:none;">
						<div id="continue-view" class="band <?php echo(($qstyle==='figured')?'set-height-fig':'set-height-reg'); ?>">
							<span class="start-cc"></span>
							<span class="end-cc"></span>
							<div class="preview-text faded" id="continue-text">
								Continuous Message
							</div>
						</div>
					</div>
				</div>
				<div id="preview-pane" class="preview-panel">
					<div class="i-select" style="display:block;">
						<div id="inside-view" class="band <?php echo(($qstyle==='figured')?'set-height-fig':'set-height-reg'); ?>">
							<span class="startIn-cc"></span>
							<span class="endIn-cc"></span>
							<div class="preview-text faded" id="inside-text">
								Inside Message
							</div>
						</div>
					</div>
				</div>
					<div class="text-center">
						<div class="click-pre" style="display:none">Click below to preview wristband colors</div>
						<ul id="preview-pane-selection" class="nav nav-pills preview-pane-colors" style="width:100%;">
						</ul>
					</div>
			</div>
			<!-- End preview pane -->
			<div id="font-color" style="display:none;">
				<h3 style="text-align: left;">Select Font Color</h3>
				<button id="font-button" class="pull-left" data-toggle="modal" data-target="#FontColorModal">Select Font Color</button><div id="preview-textcolor"></div>
					<!-- Modal -->
					<div class="modal fade" id="FontColorModal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Pick Custom Text Color</h4>
							</div>
							<div class="modal-body">
								<?php // include "font-color-template.php";?>
								<div class="clearfix"></div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!-- End Modal Content -->
					</div>
				</div>
				<!-- End Modal Div -->
				<div class="clearfix"></div>
			</div>
			<div id="add-design">
				<!--<button>Clear</button>-->
				<h3 style="text-align: left;">Select Font Style</h3>
				<button id="font-button" class="pull-left" data-toggle="modal" data-target="#FontModal">Choose Font Style</button><div id="preview-textfont"></div>
				<div class="modal fade" id="FontModal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Select Font Style</h4>
							</div>
							<div class="modal-body">
								<?php // include "fonts-template.php";?>
								<div class="clearfix"></div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!-- End Modal Content -->
					</div>
				</div>
				<!-- End Modal Div -->
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- END WRISTBAND MESSAGE -->

		<!-- ADD ONS -->
		<div class="product-add-ons">
			<div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
				<div class="col-xs-3 col-sm-2 offerpv float-left step-5" style="display:<?php echo($qstyle != 'blank')?'block':'none'; ?>">Step <span class="sRename">5</span></div>
				<div class="col-xs-3 col-sm-2 offerpv float-left step-4" style="display:<?php echo($qstyle == 'blank')?'block':'none'; ?>">Step <span class="sRename">4</span></div>
				<div class="col-xs-9 col-sm-10 offer-details float-left">ADD ONS (Optional)</div>
				<div class="clearfix"></div>
			</div>
			<div class="popup-order-gallery">
				<?php // include "promo-keychain-10.php"; ?>
			</div>

			<!-- End conversion wristbands -->
			<div class="col-md-4 add-ons">
				<div class="box-thumb"><a href="assets/images/src/add-ons/3mm-thick.png" title="3mm thick option"><img src="assets/images/src/add-ons/3mm-thick.png" class="galleryimg"></a></div>
				<div class="icon-img"><img src="assets/images/src/icon.png"/> <div class="icon-text" style="width:150px;">Available for 1/2 and 3/4 inch wristbands only.</div></div>
				<div class="add-ons-radio">
					<input type="checkbox" name="add-ons-extra" class="add-ons" data-code="3mm-thick"/>
					<h2>3mm Thick Option</h2>
				</div>
			</div>
			<div class="col-md-4 add-ons">
				<div class="box-thumb"><a href="assets/images/src/add-ons/Digital-Proof.png" title="Digital Proof"><img src="assets/images/src/add-ons/Digital-Proof.png" class="galleryimg"></a></div>
				<div class="icon-img"><img src="assets/images/src/icon.png"/> <div class="icon-text" style="width:150px;">We'll send you a proof for approval before production begins.</div></div>
				<div class="add-ons-radio">
					<input type="checkbox" name="add-ons-extra" class="add-ons" data-code="digital-proof"/>
					<h2>Digital Proof</h2>
				</div>
			</div>
			<div class="col-md-4 add-ons">
				<div class="box-thumb"><a href="assets/images/src/add-ons/ecofriendly.png" title="Eco Friendly"><img src="assets/images/src/add-ons/ecofriendly.png" class="galleryimg"></a></div>
				<div class="add-ons-radio">
					<input type="checkbox" name="add-ons-extra" class="add-ons" data-code="eco-friendly"/>
					<h2>Eco Friendly</h2>
				</div>
			</div>
			<div class="col-md-4 add-ons">
				<div class="box-thumb"><a href="assets/images/src/add-ons/Glitters.png" title="Glitters"><img src="assets/images/src/add-ons/Glitters.png" class="galleryimg"></a></div>
				<div class="add-ons-radio">
					<input type="checkbox" name="add-ons-extra" class="add-ons" data-code="glitters"/>
					<h2>Glitters</h2>
				</div>
			</div>
			<div class="col-md-4 add-ons">
				<div class="box-thumb"><a href="assets/images/src/add-ons/Individual-pack.png" title="Individual pack"><img src="assets/images/src/add-ons/Individual-pack.png" class="galleryimg"></a></div>
				<div class="icon-img"><img src="assets/images/src/icon.png"/> <div class="icon-text" style="width:200px;">Professionally sealed on biodegradable bags with clear back to see product inside.</div></div>
				<div class="add-ons-radio">
					<input type="checkbox" name="add-ons-extra" class="add-ons" data-code="individual"/>
					<h2>Individually Pack</h2>
				</div>
			</div>
			<div class="col-md-4 add-ons">
				<div class="box-thumb"><a href="assets/images/src/add-ons/KeyChain.png" title="KeyChain"><img src="assets/images/src/add-ons/KeyChain.png" class="galleryimg"></a></div>
				<div class="icon-img"><img src="assets/images/src/icon.png"/> <div class="icon-text" style="width:132px;"> Available for 1/2 inch wristbands only.</div></div>
				<div class="add-ons-radio">
					<input type="checkbox" name="add-ons-extra" class="add-ons" data-code="key-chain"/>
					<h2>Keychain</h2>
				</div>
			</div>

			<div id="convert-keychain" class="col-md-12" style="display:none;">
				<div class="box-thumb clearfix" style="padding:20px 14px;">
					<div class="row row-title">
						<h3 style="color:#008da9;"><strong>Convert My Wristbands to Keychain.</strong></h3>
						<span style="color:#8f8fa5;">Convert your wristbands to keychain.</span>
						<div class="col-xs-12" style="padding:20px 0;">
							<div class="message-selection">
								<div class="col-sm-3 col-sm-offset-3">
									<input type="radio" name="convert-keychain" class="convert-keychain-input" id="convert-keychain-input-all" value="all" checked="checked" /><h2>Convert All</h2>
								</div>
								<div class="col-sm-3">
									<input type="radio" name="convert-keychain" class="convert-keychain-input" id="convert-keychain-input-some" value="some" /><h2>Convert Some</h2>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="row row-content">
						<div id="convert-keychain-area-all" class="col-md-12 convert-keychain-area" style="display:block;">
							<div class="convert-keychain-area-all">
								<h4><i class="glyphicon glyphicon-ok"></i> Convert all <strong id="convert-keychain-area-all-qty">0</strong> wristbands to keychain.</h4>
							</div>
						</div>
						<div id="convert-keychain-area-some" class="col-md-12 convert-keychain-area" style="display:none;">
							<div class="convert-keychain-area-some">
								<div class="row">
									<div class="col-md-6 col-sm-12 fwb-text fwb-text-header text-center list-header">
										<div class="col-xs-4 key-text-header"><h4>STYLE</h4></div>
										<div class="col-xs-4 fwb-text-header"><h4>COLOR</h4></div>
										<div class="col-xs-4 fwb-text-header"><h4>SIZE</h4></div>
									</div>
									<div class="col-md-6 fwb-text fwb-text-header hidden-sm hidden-xs text-center list-header">
										<div class="col-xs-12 fwb-text-header"><h4>INPUT QUANTITY</h4></div>
									</div>
								</div>
								<ul id="convert-keychain-some-list" class="convert-keychain-some-list" style="margin-bottom:0px;padding-left:0px;">
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="js-keychain-add-ons-save" style="display:none">
								<div style="color:#00C273;text-align:center;">
									<div>Converted Keychains have been saved.</div>
								</div>
							</div>
							<div class="submit">
								<button id="done_convert_keychain" class="btn-wristband btn-lg" type="button"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Done</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="clearfix"></div>
		</div>
		<!-- END ADD ONS -->

		<div class="clearfix"></div>

		<!-- TOTAL -->
		<div class="total-area">
			<div class="js-total" style="display:none;">
				<div class="prod-ship col-md-4" style="display:none;">
					<h5>Production Time</h5>
					<select name="ProductionTime" id="ProductionTime" class="uk-form-large uk-width-1-1 js-production-options js-time-options" data-title="Production" required="" data-validation-error="Please select production time." data-validation-slide-pos="production-shipping">
					</select>
					<div style="padding-top:10px;"></div>
					<h5>Shipping Time</h5>
					<select name="Delivery" id="ShippingTime" class="uk-form-large uk-width-1-1 js-shipping-options js-time-options" data-title="Shipping" required="" data-validation-error="Please select shipping time." data-validation-slide-pos="production-shipping">
					</select>
				</div>
				<div class="col-md-6" id="summary-order">
					<div id="order-summary">
						<h3>Order Summary</h3>
						<div class="summary-table">
							<div class="row">
								<div class="col-md-12">
									<p>
										<strong>Style : </strong>
										<u><span id="wristband_style"></span></u>
										<br />
										<strong>Size : </strong>
										<u><span id="wristband_size"></span></u>
										<br />
										<br />
										<strong>Add-Ons Total : </strong>
										<u><span id="wristband_add_ons" data-addon-total="0">$0.00</span></u>
										<br />
										<span id="wristband_add_on_list"></span>
										<br />
										<strong>Production Time : </strong>
										<u><span id="wristband_ptime" data-production-time="0" data-production-price="0">0 Days ($0.00)</span></u>
										<br />
										<strong>Shipping Time : </strong>
										<u><span id="wristband_stime" data-shipping-time="0" data-shipping-price="0">0 Days ($0.00)</span></u>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6"><strong>Colors : </strong></div>
								<div class="col-xs-6 align-right"><strong>Subtotal</strong></div>
							</div>
							<div class="summary-list-item js-item-summary">
							</div>
							<div class="row total-summary-free" style="display:none;">
								<br/>
								<div class="col-xs-12"><strong>Free : </strong></div>
								<div class="col-xs-12 align-right"><strong></strong></div>
								<div class="col-sm-12 align-right"><strong></strong></div>
							</div>
							<div class="row total-summary-after" style="display:none;"></div>
							<div class="summary-list-item js-free-summary total-summary-free" style="display:none;">
							</div>
						</div>
					</div>
					<hr>
					<h1 class="align-right">Total: <span id= "totalPrice" data-total="0">$0.00</span></h1>
				</div>
				<div class="col-md-12">
					<div class="button-cart">
						<?php // include "submit_type.php"; ?>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="js-no-total">
				<h1>Minimum order should be at least <u>20 pieces.</u></h1>
			</div>
		</div>
		<!-- End TOTAL -->

	</div>
</div>

@include('modal.alertMessage')

@include('modal.confirmMail')

@include('modal.confirmMail')

<?php i// include_once "popup_message.php"; ?>

<?php // include_once "popup_confirm_email.php"; ?>

<?php // include_once "custom_wristband.php"; ?>
