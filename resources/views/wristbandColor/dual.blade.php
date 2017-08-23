
<div id="wrist_color_container_dual" class="wrist-color-container">

    <!-- content -->
    <div class="content">
        <div id="tab_dual_reg" class="tab-content tab-pane js-color" data-value="0.01" data-color="Dual">
            <h3>Dual Colors</h3>

            @if(isset($colors['dual']))
            <button class="add-custom btn-order" ref-style="dual" style="margin-left:10px;margin-bottom:20px;"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <?php $str = str_random(20); ?>
                <div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
                    <div class="col-xs-12 box-color">
                        <div class="col-xs-12 box-img-container">
                            <img id="customDual{{ $str }}" class="previewColorModal wb-unveil" src="{{ URL::asset('assets/images/placeholder.png') }}" data-src="{{ URL::asset('assets/images/src/custom.png') }}" />
                        </div>
                        <div class="col-xs-12 box-color-title">
                            <button class="btn-order custom-color-button" data-img-target="#customDual{{ $str }}" data-index="{{ $str }}" data-style="dual" data-max="1">Custom Color</button>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="dual" ref-title="Custom (Dual)"  ref-color="ffffff,ffffff" ref-index="{{ $str }}" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="dual" ref-title="Custom (Dual)"  ref-color="ffffff,ffffff" ref-index="{{ $str }}" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Adult</label>
                            <input ref-size="ad" ref-style="dual" ref-title="Custom (Dual)"  ref-color="ffffff,ffffff" ref-index="{{ $str }}" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_dual_{{ $str }}">View More Sizes</span>
                        <div id="view_more_dual_{{ $str }}" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="dual" ref-title="Custom (Dual)"  ref-color="ffffff,ffffff" ref-index="{{ $str }}" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="dual" ref-title="Custom (Dual)"  ref-color="ffffff,ffffff" ref-index="{{ $str }}" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($colors['dual'] as $key => $value)
                <?php $str = str_random(20); ?>
                <div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
                    <div class="col-xs-12 box-color">
                        <div class="col-xs-12 box-img-container">
                            <img class="wb-unveil" src="{{ URL::asset('assets/images/placeholder.png') }}" data-src="{{ URL::asset($value['image']) }}" />
                        </div>
                        <div class="col-xs-12 box-color-title">
                            <label>{{ $value['name'] }}</label>
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Youth</label>
                            <input ref-size="yt" ref-style="dual" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" ref-index="{{ $str }}" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Medium</label>
                            <input ref-size="md" ref-style="dual" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" ref-index="{{ $str }}" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                        </div>
                        <div class="col-xs-4 box-color-qty">
                            <label>Adult</label>
                            <input ref-size="ad" ref-style="dual" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" ref-index="{{ $str }}" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                        </div>
                        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_dual_{{ $str }}">View More Sizes</span>
                        <div id="view_more_dual_{{ $str }}" class="col-xs-12 show-content collapse">
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Small</label>
                                <input ref-size="xs" ref-style="dual" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" ref-index="{{ $str }}" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                            </div>
                            <div class="col-xs-6 box-color-qty">
                                <label>Extra Large</label>
                                <input ref-size="xl" ref-style="dual" ref-title="{{ $value['name'] }}" ref-color="@foreach($value['hex'] as $key => $val)@if($key!=0), @endif{{ $val }}@endforeach" ref-index="{{ $str }}" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
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
