
<div id="wrist_color_container_figured" class="wrist-color-container">

    @if(isset($colors['fig']))
    <!-- nav -->
    <ul class="nav nav-pills js-color">
        <li class="active">
            <a class="wb-nav-pill" data-toggle="pill" href="#tab_solid_fig">Solid</a>
        </li>
        <li>
            <a class="wb-nav-pill" data-toggle="pill" href="#tab_segmented_fig">Segmented</a>
        </li>
        <li>
            <a class="wb-nav-pill" data-toggle="pill" href="#tab_swirl_fig">Swirls</a>
        </li>
        <li>
            <a class="wb-nav-pill" data-toggle="pill" href="#tab_glow_fig">Glow</a>
        </li>
    </ul>
    <!-- End: nav -->

    <!-- tab-content -->
    <div class="tab-content">
        <!-- #solid tab -->
        <div id="tab_solid_fig" class="tab-pane fade in js-color active" data-color-style="solid">
            <h3>Solid Colors</h3>

            @if(isset($colors['fig']['solid']))
            <button id="addCustomSolid" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-4 box-color">
                    <img class="PreviewColorModal" src="assets/images/src/custom.png"/>
                    <button id="custom-color-button" data-toggle="modal" data-target="#ColorModal">Custom Color</button>
                    <!-- Modal -->
                    <div class="modal fade" id="ColorModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pick Custom Color</h4>
                                </div>
                                <div class="modal-body">
                                    <?php // // include "solid-color-template.php";?>
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
                    <div class="col-xs-4 box-color-qty"><label>Adult Qty</label><input reftitle="" ref="" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Medium Qty</label><input reftitle="" ref="" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Youth Qty</label><input reftitle="" ref="" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0" /></div>
                    <div class="clearfix"></div>
                    <!-- Text color options -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color options -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content collapse">
                        <div class="col-xs-6 box-color-qty"><label>Extra Small Qty</label><input reftitle="" ref="" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-6 box-color-qty"><label>Extra Large Qty</label><input reftitle="" ref="" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>

                @foreach($colors['fig']['solid'] as $key => $value)
                <div class="col-xs-4 box-color">
                    <img class="wb-unveil" src="assets/images/placeholder.png" data-src="{{ $value['image'] }}" />
                        <div class="nocustom_pick">{{ $value['name'] }}</div>
                        <div class="col-xs-4 box-color-qty"><label>Adult Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0" /></div>
                        <div class="col-xs-4 box-color-qty"><label>Medium Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0" /></div>
                        <div class="col-xs-4 box-color-qty"><label>Youth Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0" /></div>
                        <div class="clearfix"></div>
                        <!-- Text color options -->
                        <div class="color-text" style="display:none">
                            <div class="col-sm-1">
                                <?php // // include "colorAdult-template.php";?>
                            </div>
                            <div class="col-sm-1">
                                <?php // // include "colorMedium-template.php";?>
                            </div>
                            <div class="col-sm-1">
                                <?php // // include "colorYouth-template.php";?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End text color options -->
                        <span class="view-more col-xs-12">View More Sizes</span>
                        <div class="show-content collapse">
                            <div class="col-xs-6 box-color-qty"><label>Extra Small Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                            <div class="col-xs-6 box-color-qty"><label>Extra Large Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                        </div>
                </div>
                @endforeach

                <div class="clearfix"></div>
            </div>
            @endif
        </div>
        <!-- End #solid tab -->

        <!-- #segmented tab -->
        <div id="tab_segmented_fig" class="tab-pane fade js-color" data-color-style="segmented">
            <h3>Segmented Colors</h3>

            @if(isset($colors['fig']['segmented']))
            <button id="addCustomSegmented" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-4 box-color">
                    <img class="segPreviewColorModal" src="assets/images/src/custom.png"/>
                    <button id="custom-color-button" data-toggle="modal" data-target="#ColorSegModal">Custom Color</button>
                    <!-- Modal -->
                    <div class="modal fade" id="ColorSegModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pick Custom Color</h4>
                                </div>
                                <div class="modal-body">
                                    <?php // // include "segmented-color-template.php";?>
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
                    <div class="col-xs-4 box-color-qty"><label>Adult Qty</label><input reftitle="" ref="" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Medium Qty</label><input reftitle="" ref="" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Youth Qty</label><input reftitle="" ref="" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0" /></div>
                    <div class="clearfix"></div>
                    <!-- Text color options -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color options -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content collapse">
                        <div class="col-xs-6 box-color-qty"><label>Extra Small Qty</label><input reftitle="" ref="" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-6 box-color-qty"><label>Extra Large Qty</label><input reftitle="" ref="" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>

                @foreach($colors['fig']['segmented'] as $key => $value)
                <div class="col-xs-4 box-color">
                    <img class="wb-unveil" src="assets/images/placeholder.png" data-src="{{ $value['image'] }}" />
                    <div class="nocustom_pick">{{ $value['name'] }}</div>
                    <div class="col-xs-4 box-color-qty"><label>Adult Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Medium Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Youth Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0" /></div>
                    <div class="clearfix"></div>
                    <!-- Text color options -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color options -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content collapse">
                        <div class="col-xs-6 box-color-qty"><label>Extra Small Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-6 box-color-qty"><label>Extra Large Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>
                @endforeach

                <div class="clearfix"></div>
            </div>
            @endif
        </div>
        <!-- End #segmented tab -->

        <!-- #swirl tab -->
        <div id="tab_swirl_fig" class="tab-pane fade js-color" data-color-style="swirl">
            <h3 style="width:auto;">Swirls Color</h3>

            @if(isset($colors['fig']['swirl']))
            <button id="addCustomSwirl" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-4 box-color">
                    <img class="swlPreviewColorModal" src="assets/images/src/custom.png"/>
                    <button id="custom-color-button" data-toggle="modal" data-target="#ColorSwirlModal">Custom Color</button>
                    <!-- Modal -->
                    <div class="modal fade" id="ColorSwirlModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pick Custom Color</h4>
                                </div>
                                <div class="modal-body">
                                    <?php // // include "swirl-color-template.php";?>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- End modal content -->
                        </div>
                    </div>
                    <!-- End Modal Div -->
                    <div class="clearfix"></div>
                    <div class="col-xs-4 box-color-qty"><label>Adult Qty</label><input reftitle="" ref="" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Medium Qty</label><input reftitle="" ref="" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Youth Qty</label><input reftitle="" ref="" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0" /></div>
                    <div class="clearfix"></div>
                    <!-- Text color options -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color options -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content collapse">
                        <div class="col-xs-6 box-color-qty"><label>Extra Small Qty</label><input reftitle="" ref="" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-6 box-color-qty"><label>Extra Large Qty</label><input reftitle="" ref="" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>

                @foreach($colors['fig']['swirl'] as $key => $value)
                <div class="col-xs-4 box-color">
                    <img class="wb-unveil" src="assets/images/placeholder.png" data-src="{{ $value['image'] }}" />
                    <div class="nocustom_pick">{{ $value['name'] }}</div>
                    <div class="col-xs-4 box-color-qty"><label>Adult Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Medium Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Youth Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0" /></div>
                    <div class="clearfix"></div>
                    <!-- Text color options -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color options -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content collapse">
                        <div class="col-xs-6 box-color-qty"><label>Extra Small Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-6 box-color-qty"><label>Extra Large Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>
                @endforeach

                <div class="clearfix"></div>
            </div>
            @endif
        </div>
        <!-- End #swirl tab -->

        <!-- #glow tab -->
        <div id="tab_glow_fig" class="tab-pane fade js-color" data-color-style="glow">
            <h3>Glow</h3>

            @if(isset($colors['fig']['glow']))
            <div id="main-color-content" class="main-color-content">

                @foreach($colors['fig']['glow'] as $key => $value)
                <div class="col-xs-4 box-color">
                    <img class="wb-unveil" src="assets/images/placeholder.png" data-src="{{ $value['image'] }}" />
                    <div class="nocustom_pick">{{ $value['name'] }}</div>
                    <div class="col-xs-4 box-color-qty"><label>Adult Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Medium Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0" /></div>
                    <div class="col-xs-4 box-color-qty"><label>Youth Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0" /></div>
                    <div class="clearfix"></div>
                    <!-- Text color options -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color options -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content collapse">
                        <div class="col-xs-6 box-color-qty"><label>Extra Small Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-6 box-color-qty"><label>Extra Large Qty</label><input reftitle="{{ $value['name'] }}" ref="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>
                @endforeach

            </div>
            @endif
        </div>
        <!-- End #glow tab -->
    </div>
    <!-- End: tab-content -->
    @endif
</div>
