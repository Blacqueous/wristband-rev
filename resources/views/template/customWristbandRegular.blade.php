<div class="col-xs-12 col-sm-6 col-md-3 box-color-container">
    <button class="btn-close-custom-color" data-style="{{ $type }}" data-index="{{ $id }}">&times;</button>
    <div class="col-xs-12 box-color @if($withFont) with-font @endif">
        <div class="col-xs-12 box-img-container">
            <img id="customRegular{{ ucwords($type) }}{{ $id }}" class="previewColorModal wb-unveil" src="assets/images/src/custom.png" data-src="assets/images/src/custom.png" />
        </div>
        <div class="col-xs-12 box-color-title">
            <button class="btn-order custom-color-button" data-img-target="#customRegular{{ ucwords($type) }}{{ $id }}" data-index="{{ $id }}" data-style="{{ $type }}" data-max="1">Custom Color</button>
        </div>
        <div class="col-xs-4 box-color-qty">
            <label>Youth</label>
            <input ref-size="yt" ref-style="{{ $type }}" ref-title="Custom ({{ ucwords($type) }})" ref-color="ffffff" ref-index="{{ $id }}" type="number" name="quantity[]" class="qtyin qtyin-yt-qty" placeholder="0" />
                <div class="fonttext @if(!$withFont) hidden @endif">
                    <span class="fonttext-color">Text Color</span>
                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-yt-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                </div>
        </div>
        <div class="col-xs-4 box-color-qty">
            <label>Medium</label>
            <input ref-size="md" ref-style="{{ $type }}" ref-title="Custom ({{ ucwords($type) }})" ref-color="ffffff" ref-index="{{ $id }}" type="number" name="quantity[]" class="qtyin qtyin-md-qty" placeholder="0" />
                <div class="fonttext @if(!$withFont) hidden @endif">
                    <span class="fonttext-color">Text Color</span>
                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-md-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                </div>
        </div>
        <div class="col-xs-4 box-color-qty">
            <label>Adult</label>
            <input ref-size="ad" ref-style="{{ $type }}" ref-title="Custom ({{ ucwords($type) }})" ref-color="ffffff" ref-index="{{ $id }}" type="number" name="quantity[]" class="qtyin qtyin-ad-qty" placeholder="0" />
                <div class="fonttext @if(!$withFont) hidden @endif">
                    <span class="fonttext-color">Text Color</span>
                    <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-ad-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                </div>
        </div>
        <span class="view-more col-xs-12" data-toggle="collapse" data-target="#view_more_{{ $type }}_{{ $id }}">View More Sizes</span>
        <div id="view_more_{{ $type }}_{{ $id }}" class="col-xs-12 show-content collapse">
            <div class="col-xs-6 box-color-qty">
                <label>Extra Small</label>
                <input ref-size="xs" ref-style="{{ $type }}" ref-title="Custom ({{ ucwords($type) }})" ref-color="ffffff" ref-index="{{ $id }}" type="number" name="quantity[]" class="qtyin qtyin-xs-qty" placeholder="0"/>
                    <div class="fonttext @if(!$withFont) hidden @endif">
                        <span class="fonttext-color">Text Color</span>
                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xs-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                    </div>
            </div>
            <div class="col-xs-6 box-color-qty">
                <label>Extra Large</label>
                <input ref-size="xl" ref-style="{{ $type }}" ref-title="Custom ({{ ucwords($type) }})" ref-color="ffffff" ref-index="{{ $id }}" type="number" name="quantity[]" class="qtyin qtyin-xl-qty" placeholder="0"/>
                    <div class="fonttext @if(!$withFont) hidden @endif">
                        <span class="fonttext-color">Text Color</span>
                        <div ref-font-name="black" ref-font-color="000000" class="fntin fntin-xl-clr" data-toggle="tooltip" data-placement="bottom" title="Select font color" style="background-color:#000000;"></div>
                    </div>
            </div>
        </div>
    </div>
</div>
