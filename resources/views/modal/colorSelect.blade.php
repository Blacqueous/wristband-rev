<div class="modal fade" id="modalColorSelect" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center">Font Color Picker</h4>
			</div>
			<div class="modal-body">
                <div class="pick-solid box-opt-color">
            		<h5>Select Font Color</h5>
                </div>
                <ul class="font-color-list">
                    @foreach($list as $key => $value)
                    <li class="font-selected font-color-list-{{ $value['color'] }}" ref="{{ $value['id'] }}" ref-color="{{ $value['color'] }}" ref-name="{{ $value['name'] }}">
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
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- End Modal Content -->
	</div>
</div>
