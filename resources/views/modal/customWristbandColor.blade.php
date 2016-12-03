<div id="modalWristbandColor" class="modal fade" role="dialog" data-style="" data-type="" data-max="">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Custom Wristband Creator</h4>
			</div>
			<div class="modal-body text-center">
                <div class="pick-solid box-opt-color">
            		<h5>Select Desired Colors :</h5>
                </div>
                <div class="col-xs-12 field-container field-solid">
                    <div class="col-xs-6 col-xs-offset-3"><input class="form-control" type="text" name="custom-color-solid[]" placeholder="Color #1" ref-value="" value="" disabled></div>
                </div>
                <div class="col-xs-12 field-container field-segmented">
                    <div class="col-xs-4 field-left"><input class="form-control" type="text" name="custom-color-segmented[]" placeholder="Color #1" ref-value="" value="" disabled></div>
                    <div class="col-xs-4 field-center"><input class="form-control" type="text" name="custom-color-segmented[]" placeholder="Color #2" ref-value="" value="" disabled></div>
                    <div class="col-xs-4 field-right"><input class="form-control" type="text" name="custom-color-segmented[]" placeholder="Color #3" ref-value="" value="" disabled></div>
                    <div class="col-xs-4 field-left"><input class="form-control" type="text" name="custom-color-segmented[]" placeholder="Color #4" ref-value="" value="" disabled></div>
                    <div class="col-xs-4 field-center"><input class="form-control" type="text" name="custom-color-segmented[]" placeholder="Color #5" ref-value="" value="" disabled></div>
                    <div class="col-xs-4 field-right"><input class="form-control" type="text" name="custom-color-segmented[]" placeholder="Color #6" ref-value="" value="" disabled></div>
                </div>
                <div class="col-xs-12 field-container field-dual">
                    <div class="col-xs-6 field-left"><input class="form-control" type="text" name="custom-color-dual[]" placeholder="Color #1" value="" disabled></div>
                    <div class="col-xs-6 field-right"><input class="form-control" type="text" name="custom-color-dual[]" placeholder="Color #2" value="" disabled></div>
                </div>
                <div class="col-xs-12 field-container field-swirl">
                    <div class="col-xs-6 field-left"><input class="form-control" type="text" name="custom-color-swirl[]" placeholder="Color #1" value="" disabled></div>
                    <div class="col-xs-6 field-right"><input class="form-control" type="text" name="custom-color-swirl[]" placeholder="Color #2" value="" disabled></div>
                    <div class="col-xs-6 field-left"><input class="form-control" type="text" name="custom-color-swirl[]" placeholder="Color #3" value="" disabled></div>
                    <div class="col-xs-6 field-right"><input class="form-control" type="text" name="custom-color-swirl[]" placeholder="Color #4" value="" disabled></div>
                </div>
                <div class="clearfix"></div>
			</div>
			<div class="modal-footer">
                <ul class="custom-color-list text-center">
                    @foreach($list_colors as $key => $value)
                    <li class="custom-color-selected custom-color-list-{{ $value['color'] }}" ref="{{ $value['id'] }}" ref-color="{{ $value['color'] }}" ref-name="{{ $value['name'] }}">
                        <a>
                            <img style="background-color:#{{ $value['color'] }};border:1px solid #D7D7D7;" src="assets/images/src/clr_bg.png">
                            <b>{{ $value['name'] }}</b>
                        </a>
                    </li>
                    @endforeach
               </ul>
                <div class="clearfix"></div>
			</div>
			<div class="modal-footer">
                <button id="btnCustomClear" type="button" class="btn btn-danger pull-left"><i class="fa fa-eraser"></i> Clear</button>
				<button id="btnCustomSubmit" type="button" class="btn btn-success"><i class="fa fa-check"></i> OK</button>
    			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
		<!-- End Modal Content -->
	</div>
</div>
