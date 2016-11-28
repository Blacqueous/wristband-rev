// Ajax
var xhr;
var items = {};
var viewport = "lg";
var fontElement;
var clipElement
var resetView = true;

$(window).ready(function() {

    // $("img.wb-unveil").unveil();
    // $("img.wb-unveil").trigger("unveil");
    $('img.wb-unveil').unveil(0, function(e) {
        $(this).fadeTo(0, 0, function() {
            $(this).attr('src', $(this).attr('data-src'));
        }).fadeTo(1000, 1);
    });

    // Load forms.
    // loadWristbands();
    loadSizes();
    loadColors();
    loadPrices();

    // $(window).scroll(function() {
    //     var v = $('#wb_message .main-content-preview').visible(true, false, 'both');
    //
    //     if(v) {
    //         if(resetView) {
    //             resetView = false;
    //             checkPreview();
    //         }
    //     } else {
    //         resetView = true;
    //     }
    //
    // });

});

$(document).ready(function() {

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '20%' // optional
    });

    // Change style actions.
    $('body').on('click', '.prod-style', function(e) {
        e.preventDefault();
        e.stopPropagation();

        // Check if already selected.
        if(!$(this).find('input[type=radio].wb-style').is(':checked')) {

            // Clear existing active classes.
            $('.prod-style').removeClass('active');
            // Add active class tio parent div.
            $(this).addClass('active');
            // Check thec checkbox.
            $(this).find('input[type=radio].wb-style').prop('checked', true);
            // Reset icheck display.
            $('#wb_style .iradio_square-green').removeClass('checked');
            $(this).find('input[type=radio].wb-style').closest('.iradio_square-green').addClass('checked');
            // Reset fields.
            $('input[name="quantity[]').val("");
            // Reset item Object.
            items = {};
            // Reset item previews.
            checkPreview();
            // Load wristband sizes.
            loadSizes();
            // Load wristband colors.
            loadColors();
            // Load wristband price list.
            loadPrices();
            // Load total amount.
            loadTotal();

        }

    });

    $('body').on('ifClicked', 'input[type=radio].wb-style', function(e) {
        // e.preventDefault();
        e.stopPropagation();

        // Check if already selected.
        if(!$(this).is(':checked')) {

            // Clear existing active classes.
            $('.prod-style').removeClass('active');
            // Add active class tio parent div.
            $(this).closest('.prod-style').addClass('active');
            // Check the checkbox.
            $(this).prop('checked', true);
            // Reset icheck display.
            $('#wb_style .iradio_square-green').removeClass('checked');
            $(this).closest('.iradio_square-green').addClass('checked');
            // Reset fields.
            $('input[name="quantity[]').val("");
            // Reset item Object.
            items = {};
            // Reset item previews.
            checkPreview();
            // Load wristband sizes.
            loadSizes();
            // Load wristband colors.
            loadColors();
            // Load wristband price list.
            loadPrices();
            // Load total amount.
            loadTotal();

        }

    });
    // END: Change style actions.

    // Change size actions.
    $('body').on('click', '.prod-size', function(e) {
        e.preventDefault();
        e.stopPropagation();

        // Check if already selected.
        if(!$(this).find('input[type=radio].wb-size').is(':checked')) {

            // Clear existing active classes.
            $('.prod-size').removeClass('active');
            // Add active class tio parent div.
            $(this).addClass('active');
            // Check thec checkbox.
            $(this).find('input[type=radio].wb-size').prop('checked', true);
            // Reset icheck display.
            $('#wb_size .iradio_square-green').removeClass('checked');
            $(this).find('input[type=radio].wb-size').closest('.iradio_square-green').addClass('checked');
            // Reset fields.
            $('input[name="quantity[]').val("");
            // Reset item Object.
            items = {};
            // Reset item previews.
            checkPreview();
            // Load wristband colors.
            loadColors();
            // Load wristband price list.
            loadPrices();
            // Load total amount.
            loadTotal();

        }

    });

    $('body').on('ifClicked', 'input[type=radio].wb-size', function(e) {
        e.stopPropagation();

        // Check if already selected.
        if(!$(this).is(':checked')) {

            // Clear existing active classes.
            $('.prod-size').removeClass('active');
            // Add active class tio parent div.
            $(this).closest('.prod-size').addClass('active');
            // Check the checkbox.
            $(this).prop('checked', true);
            // Reset icheck display.
            $('#wb_size .iradio_square-green').removeClass('checked');
            $(this).closest('.iradio_square-green').addClass('checked');
            // Reset fields.
            $('input[name="quantity[]').val("");
            // Reset item Object.
            items = {};
            // Reset item previews.
            checkPreview();
            // Load wristband colors.
            loadColors();
            // Load wristband price list.
            loadPrices();
            // Load total amount.
            loadTotal();

        }

    });
    // END: Change size actions.

    // Load color images.
    $('body').on('mouseenter, mousemove', '.wb-color-type', function(e) {
        $(this).find('img.wb-unveil:visible').trigger('unveil');
    });

    $('body').on('click', '.wb-color-type', function(e) {
        $('img.wb-unveil:visible').trigger('unveil');
    });

    $('body').on('click', '.wb-nav-pill', function(e) {
        $('img.wb-unveil:visible').trigger('unveil');
    });
    // END: Load color images.

    $('body').on('blur', '.box-color input[name="quantity[]"]', function(e) {

        // New behavior. Pretty much optimized.
        // Create variables to be used.
        var color = $(this).attr('ref-color');
            color = color.trim().toUpperCase().replace(/ /g, '');
        var font = $(this).closest('.box-color-qty').find('.fonttext .fntin').attr('ref-font-color');
        var font_name = $(this).closest('.box-color-qty').find('.fonttext .fntin').attr('ref-font-name');
        var size = $(this).attr('ref-size');
        var style = $(this).attr('ref-style');
        var title = $(this).attr('ref-title');
        var type = $('input[type=radio].wb-style:checked').attr('data-style');
        var value = $(this).val();
        var qty = (value) ? parseInt(value) : 0;
        // Determines if a preview is to be made
        var makePreview = true;

        switch(type) {
            case 'embossed':
            case 'debossed':
            case 'blank':
                font = '000000';
                break;
            case 'dual-layer':
            case 'dual':
                dual_color = color.split(',');
                font = dual_color[1];
                font_name = dual_color[1];
                break;
        }

        // Check if WB style exists.
        if (typeof items[style] == "undefined")
            items[style] = {}; // If not, then create object

        // Generate an index using title.
        var idx = style + '-' + color.replace(/,/g, '-');

        // Check if WB color exists.
        if (typeof items[style][idx] == "undefined") {
            // Create WB color.
            items[style][idx] = {
                'color': color,
                'style': style,
                'title': title,
                'type': type,
            };
            // Flag to reate preview for new items
            makePreview = true;
        }

        // Check WB color has existing values.
        if (typeof items[style][idx]['size'] == "undefined")
            items[style][idx]['size'] = {}; // Create WB color values Object.

        // Check if size is existing on current WB color.
        if (typeof items[style][idx]['size'][size] == "undefined") {
            // Create new size Object.
            items[style][idx]['size'][size] = {
                'qty': qty,
                'font': font,
                'font_name': font_name,
                'size': size
            }
        } else { // If existing...
            items[style][idx]['size'][size]['qty'] = qty; // Update item quantity.
            items[style][idx]['size'][size]['font'] = font; // Update item quantity.
            items[style][idx]['size'][size]['font_name'] = font_name; // Update item quantity.
        }

        // Check if quantity is less than 0.
        if (qty<=0) {

            // Delete the WB size value from specific item.
            delete items[style][idx]['size'][size];

            // Delete the WB color if has size values. If not, then delete it.
            if ($.isEmptyObject(items[style][idx]['size'])) {
                delete items[style][idx];
                // Flasg to remove preview image.
                makePreview = false;
            }

            // Delete the WB style if completely empty.
            // (Must delete, data will be useless.)
            if ($.isEmptyObject(items[style])) {
                delete items[style];
            }

            // If value is less than or is equal to 0, empty the field.
            $(this).val("");
        }

        // reset wristband previews.
        resetPreview();
        // Load free items.
        loadFree();
        // Load total amount.
        loadTotal();

    });

    $('body').on('ifClicked', '.wb-text-type', function(e) {
        var value = $(this).val();
        if(typeof value == "undefined") { value = "select-fb"; }

        $('.wb-text-outside').addClass('hidden');

        if(value == "select-c") {
            $('#wb_text_outside_c').removeClass('hidden');

            $('.fb-select').addClass('hidden');
            $('.c-select').removeClass('hidden');
        } else {
            $('#wb_text_outside_fb').removeClass('hidden');

            $('.fb-select').removeClass('hidden');
            $('.c-select').addClass('hidden');
        }
    });

    $('body').on('keyup', '.wb-band-text', function(e) {
        var preview = $(this).attr('data-preview').trim();
        var value = $(this).val().trim();

        if(value == "") { value = $(this).attr('placeholder'); }

        $(preview).html(value);
    });

    $('body').on('click', '.preview-pill', function(e) {
        $('.preview-pill').removeClass('active');
        $(this).addClass('active');

        var font = $(this).attr('data-font-color');
        var link = $(this).attr('data-image-link');

        $('#front-view, #back-view, #continue-view, #inside-view').css({"background-image": "url('" + link + "')", "color": "#" + font});
        $('.preview-text, .preview-clipart').css({"color": "#" + font});
    });

    $('body').on('click', '.fntin', function(e) {
        fontElement = $(this);
        var $container = $("#modalSelectColor .modal-body .font-color-list");
        var $scrollTo = $('.font-color-list-' + $(this).attr('ref-font-color'));

        $container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top, scrollLeft: 0},300);

        $('.font-selected').removeClass('active');
        $('.font-color-list-'+$(this).attr('ref-font-color')).addClass('active');
        $('#modalSelectColor').modal('show');
    });

    $('body').on('click', '.font-selected', function(e) {

        var inputElement = fontElement.closest('.box-color-qty').find('input[name="quantity[]"]');
        var font_color = $(this).attr('ref-color');
        var font_name = $(this).attr('ref-name');
        var value = inputElement.val();
        var qty = (value) ? parseInt(value) : 0;

        fontElement.attr('ref-font-name', font_name);
        fontElement.attr('ref-font-color', font_color);
        fontElement.css({"background-color": "#" + font_color});

        // Check if quantity is less than 0.
        if (qty>0) {

            // New behavior. Pretty much optimized.
            // Create variables to be used.
            var color = inputElement.attr('ref-color');
                color = color.trim().toUpperCase().replace(/ /g, '');
            var size = inputElement.attr('ref-size');
            var style = inputElement.attr('ref-style');
            var title = inputElement.attr('ref-title');
            var type = $('input[type=radio].wb-style:checked').attr('data-style');
            // Generate an index using title.
            var idx = style + '-' + color.replace(/,/g, '-');

            items[style][idx]['size'][size]['font'] = font_color; // Update font color.
            items[style][idx]['size'][size]['font_name'] = font_name.toLowerCase(); // Update font name.

            resetPreview();

        }

        $('#modalSelectColor').modal('hide');

    });

    $('body').on('click', '.clipartin', function(e) {
        clipElement = $(this);
        var $container = $("#modalSelectClipart .modal-body .font-color-list");
        var $scrollTo = $('.clipart-list-none');

        $container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top, scrollLeft: 0},300);

        $('.clipart-selected').removeClass('active');
        $('.clipart-list-'+$(this).attr('ref-code')).addClass('active');
        $('#modalSelectClipart').modal('show');
    });

    $('body').on('click', '.clipart-selected', function(e) {

        var code = $(this).attr('ref-code');
        var image = $(this).attr('ref-image');
        var name = $(this).attr('ref-name');

        clipElement.attr('ref-code', code);
        var targetID = clipElement.attr('ref-target');

        $(targetID).attr('ref-clipart-code', code);
        $(targetID).attr('ref-clipart-name', name);
        if(code!="none") {
            if(targetID == "#clipart-front-center") {
                $(targetID).html("<img height='50' src='" + image + "'>");
            } else {
                $(targetID).html("<img height='40' src='" + image + "'>");
            }
        } else {
            $(targetID).html("");
        }

        $('#modalSelectClipart').modal('hide');

    });

    $('body').on('click', '#btn_font_style', function(e) {

        $('.font-style-selected').removeClass('active');
        $('.font-style-list-'+$(this).attr('ref-font-style-code')).addClass('active');
        $('#modalSelectFont').modal('show');

    });

    $('body').on('click', '.font-style-selected', function(e) {

        var code = $(this).attr('ref-code');
        var name = $(this).attr('ref-name');
        var file = $(this).attr('ref-font');
        var image = $(this).attr('ref-image');

        $('.wb-text-preview').css("font-family", "'" + name + "'");

        $('#btn_font_style').attr('ref-font-style-code', code);
        $('#preview-textfont').html("<img src='" + image + "'>");
        $('#modalSelectFont').modal('hide');

    });

	// Free checkbox EVENTs
	$('body').on("ifChanged", ".free-checkbox", function(e) {

        var theContainer = $(this).closest('.message_wristband_100').find('.convert-container');

        if($(this).is(':checked')) {
            theContainer.removeClass('hidden');
        } else {
            theContainer.addClass('hidden');
        }

        // Load total amount.
        loadTotal();

    });

    // Free keychains input fields EVENTs
    $('body').on("blur", ".freekc", function(e) {

        var qty = ($(this).val().trim() == "") ? 0 : parseInt($(this).val().trim());
        var total = 0;

        // If value is less than or is equal to 0, empty the field.
        if(qty <= 0) { $(this).val(""); return; }

        // Compute total key in items.
        $.each($(".freekc"), function(key, element) {
            element = $(element);
            total += (element.val().trim() == "") ? 0 : parseInt(element.val().trim());
        });

        // Check if total is over the required free amount.
        if(total > 10) {
            $(this).val("");
            $('#modal-10-free-keychains').modal('show');
        }

        // Load total amount.
        loadTotal();

    });

    // Free wristbands input fields EVENTs
    $('body').on("blur", ".freewb", function(e) {

        var qty = ($(this).val().trim() == "") ? 0 : parseInt($(this).val().trim());
        var total = 0;

        // If value is less than or is equal to 0, empty the field.
        if(qty <= 0) { $(this).val(""); return; }

        // Compute total key in items.
        $.each($(".freewb"), function(key, element) {
            element = $(element);
            total += (element.val().trim() == "") ? 0 : parseInt(element.val().trim());
        });

        // Check if total is over the required free amount.
        if(total > 100) {
            $(this).val("");
            $('#modal-100-free-wristbands').modal('show');
        }

        // Load total amount.
        loadTotal();

    });

});

function changeWristbandColors()
{
    loadWristbands();
}

function checkPreview()
{
    // Check if item empty.
    if ($.isEmptyObject(items)) {
        // Reset item previews.
        $('#preview-pill').addClass('hidden');
        $('#preview-pill-selection').html('');
        // Reset text.
        $('#front-view, #back-view, #continue-view, #inside-view').removeAttr("style");
        $('.preview-text, .preview-clipart').removeAttr("style");
    } else {
        resetPreview();
        $('#preview-pill').removeClass('hidden');
    }
}

function checkViewport()
{
   var winWidth =  $(window).width();

   if(winWidth < 768 ) {
      return "xs";
   } else if( winWidth <= 991) {
      return "sm";
   } else if( winWidth <= 1199) {
      return "md";
   } else {
      return "lg";
   }
}

function getSizeTitle(abbr)
{

    switch (abbr.toLowerCase()) {
        case "ad":
            return "Adult";
            break;

        case "md":
            return "Medium";
            break;

        case "yt":
            return "Youth";
            break;

        case "xs":
            return "Extra Small";
            break;

        case "xl":
            return "Extra Large";
            break;

        default:
            return "None";
            break;
    }

}

function loadColors($style, $size)
{
    // Check if $style is undefined.
    if(typeof $style == 'undefined')
        $style = $('#wb_style input[type=radio].wb-style:checked').val();

    // Check if $size is undefined.
    if(typeof $size == 'undefined')
        $size = $('#wb_size input[type=radio].wb-size:checked').val();

    $('.wb-color-type').addClass('hidden');
    // Update
    $('.wb-band').addClass('band-reg').removeClass('band-fig');
    // Show fonts
    $('.fonttext').addClass('hidden');
    $('.box-color').removeClass('with-font');
    // Hide middle clipart preview & upload button
    $('#clipart_front_center_btn').addClass('hidden');
    $('#clipart-front-center').addClass('hidden');

    // Get sizes for selected style.
    switch ($style) {
        case 'dual-layer':
            if($size == '0-50inch') {
                $('#wb_color_type_dual').removeClass('hidden');
            } else { // 0-75inch
                $('#wb_color_type_dual_lg').removeClass('hidden');
            }
            break;

        case 'figured':
            if($size == '0-50inch') {
                $('#wb_color_type_figured').removeClass('hidden');
            } else { // 0-75inch, 1-00inch
                $('#wb_color_type_figured_lg').removeClass('hidden');
            }
            // Update
            $('.wb-band').addClass('band-fig').removeClass('band-reg');
            // Show middle clipart preview & upload button
            $('#clipart_front_center_btn').removeClass('hidden');
            $('#clipart-front-center').removeClass('hidden');
            // Show fonts
            $('.fonttext').removeClass('hidden');
            $('.box-color').addClass('with-font');
            break;

        case 'printed':
        case 'ink-injected':
        case 'embossed-printed':
            // Show fonts
            $('.fonttext').removeClass('hidden');
            $('.box-color').addClass('with-font');

        default:
            if($size == '0-25inch') {
                $('#wb_color_type_regular_tn').removeClass('hidden');
            } else if($size == '0-50inch') {
                $('#wb_color_type_regular').removeClass('hidden');
            } else { // 0-75inch, 1-00inch, 1-50inch, 2-00inch
                $('#wb_color_type_regular_lg').removeClass('hidden');
            }
            break;
    }
}

function loadFree()
{
    $('#dv-100-free-wristbands, #dv-10-free-keychains').addClass('hidden');

    var total = 0;
    var html_kc = "";
    var html_wb = "";

    // Loop through all items
    $.each(items, function( styleKey, styleVal ) {
        $.each(styleVal, function( itemKey, itemValue ) {
            $.each(itemValue['size'], function( sizeKey, sizeValue ) {
                // Create & append preview image
                total += sizeValue.qty;

                // For free wristbands
                html_wb += '<li class="fwb-list conversion-wrist-'+itemValue.style+' free-wrist-'+itemValue.style+'-'+sizeKey+'-'+itemValue.title+'" data-band-color="' + itemValue.color.split(",").join("-") + '">';
                html_wb += '<div class="fwb-text col-md-6 col-sm-12">';
                    html_wb += '<div class="col-xs-4 fwb-text-content">'+itemValue.style.toUpperCase()+'</div>';
                    html_wb += '<div class="col-xs-4 fwb-text-content">'+itemValue.title.toUpperCase()+'</div>';
                    html_wb += '<div class="col-xs-4 fwb-text-content">'+getSizeTitle(sizeKey).toUpperCase()+'</div>';
                html_wb += '</div>';
                html_wb += '<div class="align-right col-md-6 col-sm-12"><h4 class="fwb-text col-xs-12 hidden-md hidden-lg text-center fwb-text-hidden-header">INPUT QUANTITY</h4><input type="number" class="freewb col-xs-12" id="freewb-'+itemValue.style+'-'+sizeKey+'-'+itemValue.color.split(",").join("-")+'" name="'+itemValue.style+'-'+sizeKey+'-'+itemValue.color.split(",").join("-")+'-fwb" data-style="'+itemValue.style+'" data-color="'+itemValue.color+'" data-font-color="'+sizeValue.font+'" data-name="'+itemValue.title+'" data-size="'+sizeKey+'" placeholder="0" data-maxlength="3" /></div>';
                html_wb += '<div class="clearfix"></div>';
                html_wb += '</li>';
                // For free keychains
                html_kc += '<li class="fwb-list conversion-wrist-'+itemValue.style+' free-wrist-'+itemValue.style+'-'+sizeKey+'-'+itemValue.title+'" data-band-color="' + itemValue.color.split(",").join("-") + '">';
                html_kc += '<div class="fwb-text col-md-6 col-sm-12">';
                    html_kc += '<div class="col-xs-4 fwb-text-content">'+itemValue.style.toUpperCase()+'</div>';
                    html_kc += '<div class="col-xs-4 fwb-text-content">'+itemValue.title.toUpperCase()+'</div>';
                    html_kc += '<div class="col-xs-4 fwb-text-content">'+getSizeTitle(sizeKey).toUpperCase()+'</div>';
                html_kc += '</div>';
                html_kc += '<div class="align-right col-md-6 col-sm-12"><h4 class="fwb-text col-xs-12 hidden-md hidden-lg text-center fwb-text-hidden-header">INPUT QUANTITY</h4><input type="number" class="freekc col-xs-12" id="freekc-'+itemValue.style+'-'+sizeKey+'-'+itemValue.color.split(",").join("-")+'" name="'+itemValue.style+'-'+sizeKey+'-'+itemValue.color.split(",").join("-")+'-fwb" data-style="'+itemValue.style+'" data-color="'+itemValue.color+'" data-font-color="'+sizeValue.font+'" data-name="'+itemValue.title+'" data-size="'+sizeKey+'" placeholder="0" data-maxlength="3" /></div>';
                html_kc += '<div class="clearfix"></div>';
                html_kc += '</li>';
            });
        });
    });

	// Free wristbands
    $(".area-conversion-bands").html(html_wb);
	$(".area-conversion-chains").html(html_kc);

    // console.log(total);

    if(total >= 100) {
        $('#dv-100-free-wristbands, #dv-10-free-keychains').removeClass('hidden');
    } else {
        $('#free-keychains, #free-wristbands').iCheck('uncheck');
        $('.message_wristband_100 .convert-container').addClass('hidden');
        $('#dv-100-free-wristbands, #dv-10-free-keychains').addClass('hidden');
    }

}

function loadPrices($style, $size)
{
    // check if $style is undefined.
    if(typeof $style == 'undefined')
        $style = $('#wb_style input[type=radio].wb-style:checked').val();

    // check if $size is undefined.
    if(typeof $size == 'undefined') {
        $size = $('#wb_size input[type=radio].wb-size:checked').val();
    }
    $size_name = $('#wb_size input[type=radio].wb-size:checked').attr('data-name');

    var tblhead = '<th title="Quantity">Qty</th>';
    var tblbody = '<td>Price</td>';

    $.each(price_json[$style][$size], function(key, value) {
        tblhead += '<th title="' + key + ' Pieces">' + key + '</th>';
        tblbody += '<td>$' + value + '</th>';
    });

    $('#price_table .style').html($style.toUpperCase());
    $('#price_table .size').html($size_name.toUpperCase());
    $('#price_header').html(tblhead);
    $('#price_body').html(tblbody);

}

function loadSizes($style)
{
    // Check if $size is undefined.
    if(typeof $style == 'undefined')
        $style = $('#wb_style input[type=radio].wb-style:checked').val();

    $('.prod-size').addClass('hidden');
    // Update
    $('.wb-band').addClass('band-reg').removeClass('band-fig');

    // Get sizes for selected style.
    switch ($style) {
        case 'dual-layer':
            $('#wb_size_0-50inch, #wb_size_0-75inch').removeClass('hidden');
            break;

        case 'figured':
            $('#wb_size_0-50inch, #wb_size_0-75inch, #wb_size_1-00inch').removeClass('hidden');
            // Update
            $('.wb-band').addClass('band-fig').removeClass('band-reg');
            break;

        default:
            $('#wb_size_0-25inch, #wb_size_0-50inch, #wb_size_0-75inch, #wb_size_1-00inch, #wb_size_1-50inch, #wb_size_2-00inch').removeClass('hidden');
            break;
    }

    // Get the visible selected size.
    $size = $('#wb_size .prod-size:visible input[type=radio].wb-size:checked').val();

    // If none on all visible sizes is selected.
    if(typeof $size == 'undefined') {
        // Reset selection to 0-50inch.
        $('#wb_size .iradio_square-green').removeClass('checked');
        $('#wb_size #wb_size_0-50inch input[type=radio].wb-size').prop('checked', true).closest('.iradio_square-green').addClass('checked');
    }

}

function loadTotal()
{
    var $style = $('#wb_style input[type=radio].wb-style:checked').val();
    var $size = $('#wb_size input[type=radio].wb-size:checked').val();
    var $arr_price = price_json[$style][$size];
    var $arr_addon = addon_json;
    var $arr_style = {};
    var $collection = {
        'style': $style,
        'size': $size,
        'items': items,
        'price': 0,
        'quantity': 0,
        'total': 0
    };

    // Loop through all items
    $.each(items, function( styleKey, styleVal ) {

        // Add new fields.
        $collection['items'][styleKey]['quantity'] = 0;
        $collection['items'][styleKey]['price_addon'] = 0;
        $collection['items'][styleKey]['price_total'] = 0;

        $.each(styleVal, function( itemKey, itemValue ) {
            $.each(itemValue['size'], function( sizeKey, sizeValue ) {
                // Create & append preview image.
                $collection.quantity += sizeValue.qty;
                $collection['items'][styleKey]['quantity'] += sizeValue.qty;
            });
        });

        // Get add on price.
        var hasQty = false;
        $.each($arr_addon[styleKey], function(addon_qty, addon_prc) {
            // Check if already found the price.
            if(hasQty == false) {
                // If less than or equal.
                if(parseInt(addon_qty) <= $collection['items'][styleKey]['quantity']) { // Get price.
                    $collection['items'][styleKey]['price_addon'] = parseFloat(addon_prc);
                } else if($collection['items'][styleKey]['quantity'] < 20) { // Get price.
                    $collection['items'][styleKey]['price_addon'] = parseFloat(addon_prc);
                    hasQty = true; // Flag! price found.
                } else { // Flag if additional item price found.
                    hasQty = true;
                }
            }
        });

        $collection['items'][styleKey]['price_total'] = ($collection['items'][styleKey]['price_addon'] * $collection['items'][styleKey]['quantity']);

    });

    if($collection.quantity >= 20) {

        // Set item price.
        var hasQty = false;
        $.each($arr_price, function(price_qty, price_prc) {
            if(hasQty == false) {
                // If less than or equal.
                if($collection.quantity < 20) { // Get price.
                    $collection.price = parseFloat($data[$style][$size]['20']);
                } else if(parseInt(price_qty) <= $collection.qty) { // Get price.
                    $collection.price = parseFloat(price_prc);
                } else { // Flag if item price found.
                    hasQty = true;
                }
            }
        });

		// Get proper total qty
		$.ajax({
			type: 'POST',
			url: '/getPriceShipAndProd',
			data: {
                'style': $collection.style,
                'size': $collection.size,
                'quantity': $collection.quantity,
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
			beforeSend: function() {
                $('#total-area .has-total').addClass('hidden');
                $('#total-area .no-total').removeClass('hidden');
			},
			success: function(data) {
                console.log(data);
				// data = $.parseJSON(data);
				// var htmlProd, htmlShip = '';
                //
				// // List all production price/day data
				// $.each(data.production, function(key, value) {
				// 	htmlProd += "<option value='" + value.days + "' data-price='" + value.price + "'>Standard Production - " + value.days + " Days (+$" + value.price + ")</option>";
				// });
				// $("#ProductionTime").html(htmlProd);
                //
				// // List all shipping price/day data
				// $.each(data.shipping, function(key, value) {
				// 	htmlShip += "<option value='" + value.days + "' data-price='" + value.price + "'>Standard Shipping - " + value.days + " Days (+$" + value.price + ")</option>";
				// });
				// $("#ShippingTime").html(htmlShip);
                //
				// // Get selected production settings
				// var $p_days = $("#ProductionTime option:selected").val();
				// 	$p_days = ($p_days != "" && !isNaN(parseInt($p_days))) ? parseInt($p_days) : 0;
				// var $p_price = $("#ProductionTime option:selected").attr("data-price");
				// 	$p_price = ($p_price != "" && !isNaN(parseFloat($p_price))) ? parseFloat($p_price) : 0;
                //
				// // Set values
				// collectionData.production_days = $p_days;
				// collectionData.production_price = $p_price;
                //
				// // Get selected shipping settings
				// var $s_days = $("#ShippingTime option:selected").val();
				// 	$s_days = ($s_days != "" && !isNaN(parseInt($s_days))) ? parseInt($s_days) : 0;
				// var $s_price = $("#ShippingTime option:selected").attr("data-price");
				// 	$s_price = ($s_price != "" && !isNaN(parseFloat($s_price))) ? parseFloat($s_price) : 0;

			}
		});


        $('#total-area .has-total').removeClass('hidden');
        $('#total-area .no-total').addClass('hidden');


    } else {
        $('#total-area .has-total').addClass('hidden');
        $('#total-area .no-total').removeClass('hidden');
    }

    console.log($collection);

}

function loadWristbands($style, $size)
{
    // check if $style is undefined.
    if(typeof $style == 'undefined')
        $style = $('#wb_style input[type=radio].wb-style:checked').val();

    // check if $size is undefined.
    if(typeof $size == 'undefined')
        $size = $('#wb_size input[type=radio].wb-size:checked').val();

}

function loadPreview($style, $type, $color, $font, $isFirst)
{
    if(typeof $isFirst == "undefined")
        $isFirst = false;

    var addBlink = false;
    var previewClass = 'preview-' + $style + '-' + $type + '-' + $font + '-' + $color.trim().toUpperCase().replace(/ /g, '').replace(/,/g, '-');

    if($('.' + previewClass).length <= 0) {

        // Add new item for preview display
        $("#preview-pill-selection").append('<div class="preview-pill ' + previewClass + '" data-font-color="" data-image-link="">Y</div>');

        // Get proper total qty
        xhr = $.ajax({
        	type: 'GET',
        	url: '/gd/belt.php?style='+$style+'&type='+$type+'&color='+$color.replace(/ /g, ''),
        	data: { },
        	beforeSend: function() {
                // $('#preview-pill').addClass('hidden');
        	},
        	success: function(data) { }
        }).done(function(link) {
            // Do something when everything is done.
            // $('#preview-pill').removeClass('hidden');
            $('.' + previewClass).attr('data-font-color', $font);
            $('.' + previewClass).attr('data-image-link', link);
            $('.' + previewClass).css({"background-image": "url('" + link + "')", "color": "#" + $font});

            // If first item, set as default.
            if($('#preview-pill-selection div').length == 1 || $isFirst) {

                $('.preview-pill').removeClass('active');
                $('.' + previewClass).addClass('active');

                $('#front-view, #back-view, #continue-view, #inside-view').css({"background-image": "url('" + link + "')", "color": "#" + $font});
                $('.preview-text, .preview-clipart').css({"color": "#" + $font});
            }
        });
    }
}

function resetPreview()
{
    // Determines if a preview is to be made
    var isFirst = true;

    // Reset item previews.
    $('#preview-pill').addClass('hidden');
    $('#preview-pill-selection').html('');

    // Reset text.
    $('#front-view, #back-view, #continue-view, #inside-view').removeAttr("style");
    $('.preview-text, .preview-clipart').removeAttr("style");

    // Loop through all items
    $.each(items, function( styleKey, styleVal ) {
        $.each(styleVal, function( itemKey, itemValue ) {
            $.each(itemValue['size'], function( sizeKey, sizeValue ) {
                // Create & append preview image
                loadPreview(styleKey, itemValue['type'], itemValue['color'], sizeValue['font'], isFirst);
                if(isFirst) { isFirst = false; }
            });
        });
    });

    // Show again.
    $('#preview-pill').removeClass('hidden');
}

String.prototype.capitalizeFirstLetter = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
