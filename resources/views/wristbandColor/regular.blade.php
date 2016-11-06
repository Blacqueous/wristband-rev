
<div id="wrist_color_container_regular" class="wrist-color-container">

    @if(isset($colors['reg']))
    <!-- nav -->
    <ul class="nav nav-pills js-color">
        <li class="active">
            <a class="wb-nav-pill" data-toggle="pill" href="#tab_solid_reg">Solid</a>
        </li>
        <li>
            <a class="wb-nav-pill" data-toggle="pill" href="#tab_segmented_reg">Segmented</a>
        </li>
        <li>
            <a class="wb-nav-pill" data-toggle="pill" href="#tab_swirl_reg">Swirls</a>
        </li>
        <li>
            <a class="wb-nav-pill" data-toggle="pill" href="#tab_glow_reg">Glow</a>
        </li>
    </ul>
    <!-- End: nav -->

    <!-- tab-content -->
    <div class="tab-content">
        <!-- #solid tab -->
        <div id="tab_solid_reg" class="tab-pane fade in active js-color" data-color-style="solid">
            <h3>Solid Colors</h3>

            @if(isset($colors['reg']['solid']))
            <button id="addCustomSolid" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
                    <div class="col-xs-12 box-color">
                        <div class="col-xs-12 box-img-container">
                            <img class="previewColorModal wb-unveil" src="assets/images/placeholder.png" data-src="assets/images/src/custom.png" />
                        </div>
                        <div class="col-xs-12 box-color-title">
                            <button id="custom-color-button" class="btn-order" data-toggle="modal" data-target="#modalColorSolid">Custom Color</button>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Adult</label>
                            <input ref-size="ad" ref-style="solid" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-ad-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="solid" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-md-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="solid" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-yt-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_solid_reg-CUSTOM0">View More Sizes</span>
                        <div id="view_more_solid_reg-CUSTOM0" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="solid" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xs-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="solid" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xl-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($colors['reg']['solid'] as $key => $value)
                <div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
                    <div class="col-xs-12 box-color">
                        <div class="col-xs-12 box-img-container">
                            <img class="wb-unveil" src="assets/images/placeholder.png" data-src="{{ $value['image'] }}" />
                        </div>
                        <div class="col-xs-12 box-color-title">
                            <label>{{ $value['name'] }}</label>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Adult</label>
                            <input ref-size="ad" ref-style="solid" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-ad-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="solid" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-md-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="solid" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-yt-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_solid_reg-@foreach($value['hex'] as $key => $val)@if($key!=0)-@endif{{ $val }}@endforeach">View More Sizes</span>
                        <div id="view_more_solid_reg-@foreach($value['hex'] as $key => $val)@if($key!=0)-@endif{{ $val }}@endforeach" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="solid" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xs-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="solid" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xl-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="clearfix"></div>
            </div>
            @endif
        </div>
        <!-- End #solid tab -->

        <!-- #segmented tab -->
        <div id="tab_segmented_reg" class="tab-pane fade js-color" data-color-style="segmented">
            <h3>Segmented Colors</h3>

            @if(isset($colors['reg']['segmented']))
            <button id="addCustomSegmented" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
                    <div class="col-xs-12 box-color">
                        <div class="col-xs-12 box-img-container">
                            <img class="previewColorModal wb-unveil" src="assets/images/placeholder.png" data-src="assets/images/src/custom.png" />
                        </div>
                        <div class="col-xs-12 box-color-title">
                            <button id="custom-color-button" class="btn-order" data-toggle="modal" data-target="#modalColorSegmented">Custom Color</button>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Adult</label>
                            <input ref-size="ad" ref-style="segmented" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-ad-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="segmented" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-md-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="segmented" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-yt-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_segmented_reg-CUSTOM0">View More Sizes</span>
                        <div id="view_more_segmented_reg-CUSTOM0" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="segmented" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xs-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="segmented" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xl-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($colors['reg']['segmented'] as $key => $value)
                <div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
                    <div class="col-xs-12 box-color">
                        <div class="col-xs-12 box-img-container">
                            <img class="wb-unveil" src="assets/images/placeholder.png" data-src="{{ $value['image'] }}" />
                        </div>
                        <div class="col-xs-12 box-color-title">
                            <label>{{ $value['name'] }}</label>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Adult</label>
                            <input ref-size="ad" ref-style="segmented" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-ad-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="segmented" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-md-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="segmented" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-yt-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_segmented_reg-@foreach($value['hex'] as $key => $val)@if($key!=0)-@endif{{ $val }}@endforeach">View More Sizes</span>
                        <div id="view_more_segmented_reg-@foreach($value['hex'] as $key => $val)@if($key!=0)-@endif{{ $val }}@endforeach" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="segmented" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xs-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="segmented" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xl-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="clearfix"></div>
            </div>
            @endif
        </div>
        <!-- End #segmented tab -->

        <!-- #swirl tab -->
        <div id="tab_swirl_reg" class="tab-pane fade js-color" data-color-style="swirl">
            <h3>Swirl Colors</h3>

            @if(isset($colors['reg']['swirl']))
            <button id="addCustomSwirl" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
                    <div class="col-xs-12 box-color">
                        <div class="col-xs-12 box-img-container">
                            <img class="previewColorModal wb-unveil" src="assets/images/placeholder.png" data-src="assets/images/src/custom.png" />
                        </div>
                        <div class="col-xs-12 box-color-title">
                            <button id="custom-color-button" class="btn-order" data-toggle="modal" data-target="#modalColorSwirl">Custom Color</button>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Adult</label>
                            <input ref-size="ad" ref-style="swirl" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-ad-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="swirl" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-md-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="swirl" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-yt-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_swirl_reg-CUSTOM0">View More Sizes</span>
                        <div id="view_more_swirl_reg-CUSTOM0" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="swirl" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xs-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="swirl" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xl-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($colors['reg']['swirl'] as $key => $value)
                <div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
                    <div class="col-xs-12 box-color">
                        <div class="col-xs-12 box-img-container">
                            <img class="wb-unveil" src="assets/images/placeholder.png" data-src="{{ $value['image'] }}" />
                        </div>
                        <div class="col-xs-12 box-color-title">
                            <label>{{ $value['name'] }}</label>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Adult</label>
                            <input ref-size="ad" ref-style="swirl" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-ad-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="swirl" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-md-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="swirl" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-yt-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_swirl_reg-@foreach($value['hex'] as $key => $val)@if($key!=0)-@endif{{ $val }}@endforeach">View More Sizes</span>
                        <div id="view_more_swirl_reg-@foreach($value['hex'] as $key => $val)@if($key!=0)-@endif{{ $val }}@endforeach" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="swirl" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xs-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="swirl" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xl-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="clearfix"></div>
            </div>
            @endif
        </div>
        <!-- End #swirl tab -->

        <!-- #glow tab -->
        <div id="tab_glow_reg" class="tab-pane fade js-color" data-color-style="glow">
            <h3>Glow</h3>

            @if(isset($colors['reg']['glow']))
            <div id="main-color-content" class="main-color-content">

                @foreach($colors['reg']['glow'] as $key => $value)
                <div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
                    <div class="col-xs-12 box-color">
                        <div class="col-xs-12 box-img-container">
                            <img class="wb-unveil" src="assets/images/placeholder.png" data-src="{{ $value['image'] }}" />
                        </div>
                        <div class="col-xs-12 box-color-title">
                            <label>{{ $value['name'] }}</label>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Adult</label>
                            <input ref-size="ad" ref-style="glow" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-ad-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="glow" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-md-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="glow" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                                <div class="fonttext">
                                    <span class="fonttext-color">Text Color</span>
                                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-yt-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                </div>
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_glow_reg-@foreach($value['hex'] as $key => $val)@if($key!=0)-@endif{{ $val }}@endforeach">View More Sizes</span>
                        <div id="view_more_glow_reg-@foreach($value['hex'] as $key => $val)@if($key!=0)-@endif{{ $val }}@endforeach" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="glow" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xs-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="glow" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                                    <div class="fonttext">
                                        <span class="fonttext-color">Text Color</span>
                                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xl-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                                    </div>
                            </div>
                        </div>
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
