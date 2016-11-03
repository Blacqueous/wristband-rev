// Ajax
var xhr;
var items = {};

$(window).ready(function() {

    // $("img.wb-unveil").unveil();
    $('img.wb-unveil').unveil(0, function(e) {
        $(this).fadeTo(0, 0, function() {
            $(this).attr('src', $(this).attr('data-src'));
        }).fadeTo(1000, 1);
    });

    // $("img.wb-unveil").trigger("unveil");

    // Load forms.
    // loadWristbands();
    loadSizes();
    loadColors();

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
        $(this).find('img.wb-unveil:visible').trigger('unveil');
    });

    $('body').on('click', '.wb-nav-pill', function(e) {
        $(this).find('img.wb-unveil:visible').trigger('unveil');
    });
    // END: Load color images.

    $('body').on('blur', '.box-color input[name="quantity[]"]', function(e) {

        // New behavior. Pretty much optimized.
        // Create variables to be used.
        var color = $(this).attr('ref-color');
        var size = $(this).attr('ref-size');
        var style = $(this).attr('ref-style');
        var title = $(this).attr('ref-title');
        var value = $(this).val();
        var qty = (value) ? parseInt(value) : 0;

        // Check if WB style exists.
        if (typeof items[style] == "undefined")
        items[style] = {}; // If not, then create object

        // Generate an index using title.
        var idx = title.toLowerCase().replace(',', '').replace(' ', '-');

        // Check if WB color exists.
        if (typeof items[style][idx] == "undefined") {
            // Create WB color.
            items[style][idx] = {
                'color': color,
                'style': style,
                'title': title,
            };
        }

        // Check WB color has existing values.
        if (typeof items[style][idx]['value'] == "undefined")
        items[style][idx]['value'] = {}; // Create WB color values Object.

        // Check if size is existing on current WB color.
        if (typeof items[style][idx]['value'][size] == "undefined") {
            // Create new size Object.
            items[style][idx]['value'][size] = {
                'qty': qty,
                'size': size
            }
        } else { // If existing...
            items[style][idx]['value'][size]['qty'] = qty; // Update item quantity.
        }

        // Check if quantity is less than 0.
        if (!qty>0) {

            // Delete the WB size value from specific item.
            delete items[style][idx]['value'][size];

            // Delete the WB color if has size values. If not, then delete it.
            if ($.isEmptyObject(items[style][idx]['value']))
            delete items[style][idx];

            // Delete the WB style if completely empty.
            // (Must delete, data will be useless.)
            if ($.isEmptyObject(items[style]))
            delete items[style];

            // If value is less than or is equal to 0, empty the field.
            $(this).val("");
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
            break;

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

function loadPreview($style, $type, $color)
{
    // Stop/abort existing fetches.
    if (xhr && xhr.readyState != 4) {
        xhr.abort();
    }

    // Get proper total qty
    xhr = $.ajax({
    	type: 'GET',
    	url: '/wb/colors_ss',
    	data: {
            'color': $color,
            'size': $size,
            'style': $style
        },
    	beforeSend: function() {
            // Do something before submit.
    	},
    	success: function(data) {
            // Do something on success.
    	}
    }).done(function(e) {
        // Do something when everything is done.
    });
}
