
<div id="wrist_color_container_dual_lg" class="wrist-color-container">

    <!-- content -->
    <div class="content">
        <div id="dual-fig-reg" class="tab-pane js-color" data-value="0.01" data-color="Dual">
            <h3>Dual Colors</h3>

            @if(isset($colors['dual_lg']))
            <button id="addCustomDual" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-4 box-color">
                    <img class="dualPreviewColorModal" src="assets/images/src/custom.png"/>
                    <button id="custom-color-button" data-toggle="modal" data-target="#ColorDualModal">Custom Color</button>
                    <!-- Modal -->
                    <div class="modal fade" id="ColorDualModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pick Custom Color</h4>
                                </div>
                                <div class="modal-body">
                                    <?php // include "dual-color-template.php";?>
                                    <div class="clearfix"></div>
                                </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- End modal content -->
                        </div>
                    </div>
                    <!-- End modal div -->
                    <div class="clearfix"></div>
                    <div class="col-xs-4 col-sm-4"><label>Adult Qty</label><input reftitle="" ref="" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="" ref="" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Youth Qty</label><input reftitle="" ref="" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
                    <div class="clearfix"></div>
                    <!-- Start text color options -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color options -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content">
                        <div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="" ref="" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-4 col-sm-6"><label>Extra Large Qty</label><input reftitle="" ref="" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>

                @foreach($colors['dual_lg'] as $key => $value)
				<div class="col-xs-4 box-color">
                    <img class="wb-unveil" src="assets/images/placeholder.png" data-src="{{ $value['image'] }}" />
					<div class="nocustom_pick">{{ $value['name'] }}</div>
					<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
					<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
					<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach"type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
					<div class="clearfix"></div>
					<!---------Start text color option------------>
						<div class="color-text" style="display:none">
							<div class="col-sm-1">
								<?php // include "colorAdult-template.php";?>
							</div>
							<div class="col-sm-1">
								<?php // include "colorMedium-template.php";?>
							</div>
							<div class="col-sm-1">
								<?php // include "colorYouth-template.php";?>
							</div>
								<div class="clearfix"></div>
						</div>
					<!-------End text color-------------->
					<span class="view-more col-xs-12">View More Sizes</span>
					<div class="show-content">
						<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
						<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
					</div>
				</div>
                @endforeach

                <div class="clearfix"></div>
            </div>
            @endif
        </div>
    </div>
    <!-- End: content -->
</div>
