<div class="modal fade" id="modalSelectClipart" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Clipart Picker</h4>
            </div>
			<div class="modal-body text-center">
                <div class="pick-clipart box-opt-color">
            		<h5>Select a Clipart</h5>
                </div>
                <ul class="font-color-list">
                    @foreach($list_cliparts as $key => $value)
                    <li class="clipart-selected clipart-list-{{ $value['code'] }}" ref-code="{{ $value['code'] }}" ref-image="{{ URL::asset($value['image']) }}" ref-name="{{ $value['name'] }}">
                        <a ref="{{ $value['code'] }}">
                            <img src="{{ URL::asset($value['image']) }}" <?php echo ($value['code']=='none')?"style='width:80%;'":""; ?>/>
                        </a>
                        <b>{{ $value['name'] }}</b>
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
