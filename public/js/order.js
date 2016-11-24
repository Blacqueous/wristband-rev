// Ajax
var xhr;
var items = {};
var viewport = "lg";
var $fontElement;
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

            // Main style click action.
            loadSizes();
            loadColors();
            // changeWristbandColors();
        }
    });

    // $('body').on('click', 'input[type=radio].wb-style', function(e) {
    //     // e.preventDefault();
    //     e.stopPropagation();
    //
    //     // check if already selected.
    //     // if(!$(this).is(':checked')) {
    //
    //         // clear existing active classes.
    //         $('.prod-style').removeClass('active');
    //         // add active class tio parent div.
    //         $(this).closest('.prod-style').addClass('active');
    //         // check the checkbox.
    //         $(this).prop('checked', true);
    //         // reset icheck display.
    //         $('#wb_style .iradio_square-green').removeClass('checked');
    //         $(this).closest('.iradio_square-green').addClass('checked');
    //
    //         // main style click action.
    //         loadSizes();
    //         loadColors();
    //         // changeWristbandColors();
    //     // }
    // });

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

            // Main style click action.
            loadSizes();
            loadColors();
            // changeWristbandColors();
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

            // Main size click action.
            loadColors();
            // changeWristbandColors();
        }
    });

    // $('body').on('click', 'input[type=radio].wb-size', function(e) {
    //     // e.preventDefault();
    //     e.stopPropagation();
    //
    //     // check if already selected.
    //     // if(!$(this).is(':checked')) {
    //
    //         // clear existing active classes.
    //         $('.prod-size').removeClass('active');
    //         // add active class tio parent div.
    //         $(this).closest('.prod-size').addClass('active');
    //         // check the checkbox.
    //         $(this).prop('checked', true);
    //         // reset icheck display.
    //         $('#wb_size .iradio_square-green').removeClass('checked');
    //         $(this).closest('.iradio_square-green').addClass('checked');
    //
    //         // main size click action.
    //         loadColors();
    //         // changeWristbandColors();
    //     // }
    // });

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

            // Main size click action.
            loadColors();
            // changeWristbandColors();
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
        } else {
            resetPreview();
        }


        console.log(items);

    });

    // $('body').on('click', '.wb-text-type', function(e) {
    //     var value = $(this).val();
    //     if(typeof value == "undefined") { value = "select-fb"; }
    //
    //     $('.wb-text-outside').addClass('hidden');
    //
    //     if(value == "select-c") {
    //         $('#wb_text_outside_c').removeClass('hidden');
    //     } else {
    //         $('#wb_text_outside_fb').removeClass('hidden');
    //     }
    // });

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
        $('.preview-text').css({"color": "#" + font});
    });

    $('body').on('click', '.fntin', function(e) {
        fontElement = $(this);
        var $container = $("#modalColorSelect .modal-body .font-color-list");
        var $scrollTo = $('.font-color-list-' + $(this).attr('ref-font-color'));

        $container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top, scrollLeft: 0},300);
        $('#modalColorSelect').modal('show');
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

        $('#modalColorSelect').modal('hide');

        console.log(items);

    });

});

function changeWristbandColors()
{
    loadWristbands();
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

function loadWristbands($style, $size)
{
    // check if $style is undefined.
    if(typeof $style == 'undefined')
        $style = $('#wb_style input[type=radio].wb-style:checked').val();

    // check if $size is undefined.
    if(typeof $size == 'undefined')
        $size = $('#wb_size input[type=radio].wb-size:checked').val();

    // // stop/abort existing fetches.
    // if(xhr && xhr.readyState != 4){
    //     xhr.abort();
    // }
    //
    // // get proper total qty
    // xhr = $.ajax({
    // 	type: 'GET',
    // 	url: '/wb/colors_ss',
    // 	data: {
    //         'style': $style,
    //         'size': $size
    //     },
    // 	beforeSend: function() {
    //         // $('#wb_color_qty .content').html('loading...');
    // 	},
    // 	success: function(data) {
    // 	}
    // }).done(function(e) {
    //     // $('#wb_color_qty .content').html('done!');
    // });
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
                $('.preview-text').css({"color": "#" + $font});
            }
        });
    }
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
        $('.preview-text').removeAttr("style");
    } else {
        resetPreview();
        $('#preview-pill').removeClass('hidden');
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
    $('.preview-text').removeAttr("style");

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
