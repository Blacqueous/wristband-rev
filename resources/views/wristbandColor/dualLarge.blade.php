
<div id="wrist_color_container_dual_lg" class="wrist-color-container">

    <!-- content -->
    <div class="content">
        <div id="dual-fig-reg" class="tab-pane js-color" data-value="0.01" data-color="Dual">
            <h3>Dual Colors</h3>

            @if(isset($colors['dual_lg']))
            <button id="addCustomDualLg" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
                    <div class="col-xs-12 box-color">
                        <div class="col-xs-12 box-img-container">
                            <img class="previewColorModal wb-unveil" src="assets/images/placeholder.png" data-src="assets/images/src/custom.png" />
                        </div>
                        <div class="col-xs-12 box-color-title">
                            <button id="custom-color-button" class="btn-order" data-toggle="modal" data-target="#modalColorDualLg">Custom Color</button>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Adult</label>
                            <input ref-size="ad" ref-style="dual" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="dual" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="dual" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_dual_lg-CUSTOM0">View More Sizes</span>
                        <div id="view_more_dual_lg-CUSTOM0" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="dual" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="dual" ref-title="" ref-color="" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($colors['dual_lg'] as $key => $value)
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
                            <input ref-size="ad" ref-style="dual" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="dual" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="dual" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_dual_lg-@foreach($value['hex'] as $key => $val)@if($key!=0)-@endif{{ $val }}@endforeach">View More Sizes</span>
                        <div id="view_more_dual_lg-@foreach($value['hex'] as $key => $val)@if($key!=0)-@endif{{ $val }}@endforeach" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="dual" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="dual" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                            </div>
                        </div>
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
