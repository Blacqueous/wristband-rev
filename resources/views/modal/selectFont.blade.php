<div class="modal fade" id="modalSelectFont" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Font Style Picker</h4>
			</div>
			<div class="modal-body text-center">
                <div class="pick-solid box-opt-color">
                </div>
                <ul class="font-style-list">
                    @foreach($list_fonts as $key => $value)
                    <li class="font-style-selected font-style-list-{{ $value['code'] }}" ref-code="{{ $value['code'] }}" ref-name="{{ $value['name'] }}" ref-font="{{ $value['font'] }}"  ref-image="{{ URL::asset($value['image']) }}">
                        <a ref="{{ $value['code'] }}">
                            <img src="{{ URL::asset($value['image']) }}" />
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
