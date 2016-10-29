// Ajax
var xhr;

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

        // check if already selected.
        if(!$(this).find('input[type=radio].wb-style').is(':checked')) {

            // clear existing active classes.
            $('.prod-style').removeClass('active');
            // add active class tio parent div.
            $(this).addClass('active');
            // check thec checkbox.
            $(this).find('input[type=radio].wb-style').prop('checked', true);
            // reset icheck display.
            $('#wb_style .iradio_square-green').removeClass('checked');
            $(this).find('input[type=radio].wb-style').closest('.iradio_square-green').addClass('checked');

            // main style click action.
            loadSizes();
            loadColors();
            // changeWristbandColors();
        }
    });

    $('body').on('ifClicked', 'input[type=radio].wb-style', function(e) {
        e.preventDefault();
        e.stopPropagation();

        // check if already selected.
        if(!$(this).is(':checked')) {

            // clear existing active classes.
            $('.prod-style').removeClass('active');
            // add active class tio parent div.
            $(this).closest('.prod-style').addClass('active');
            // check the checkbox.
            $(this).prop('checked', true);
            // reset icheck display.
            $('#wb_style .iradio_square-green').removeClass('checked');
            $(this).closest('.iradio_square-green').addClass('checked');

            // main style click action.
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

        // check if already selected.
        if(!$(this).find('input[type=radio].wb-size').is(':checked')) {

            // clear existing active classes.
            $('.prod-size').removeClass('active');
            // add active class tio parent div.
            $(this).addClass('active');
            // check thec checkbox.
            $(this).find('input[type=radio].wb-size').prop('checked', true);
            // reset icheck display.
            $('#wb_size .iradio_square-green').removeClass('checked');
            $(this).find('input[type=radio].wb-size').closest('.iradio_square-green').addClass('checked');

            // main size click action.
            loadColors();
            // changeWristbandColors();
        }
    });

    $('body').on('ifClicked', 'input[type=radio].wb-size', function(e) {
        e.preventDefault();
        e.stopPropagation();

        // check if already selected.
        if(!$(this).is(':checked')) {

            // clear existing active classes.
            $('.prod-size').removeClass('active');
            // add active class tio parent div.
            $(this).closest('.prod-size').addClass('active');
            // check the checkbox.
            $(this).prop('checked', true);
            // reset icheck display.
            $('#wb_size .iradio_square-green').removeClass('checked');
            $(this).closest('.iradio_square-green').addClass('checked');

            // main size click action.
            loadColors();
            // changeWristbandColors();
        }
    });
    // END: Change size actions.

    // Load color images.
    $('body').on('mouseenter, mousemove', '.wb-color-type', function(e) {
        // console.log('mouseenter');
        $(this).find('img.wb-unveil:visible').trigger('unveil');
    });
    // END: Load color images.

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

    // Get sizes for selected style.
    switch ($style) {
        case 'dual-layer':
            $('#wb_size_0-50inch, #wb_size_0-75inch').removeClass('hidden');
            break;

        case 'figured':
            $('#wb_size_0-50inch, #wb_size_0-75inch, #wb_size_1-00inch').removeClass('hidden');
            break;

        default:
            $('#wb_size_0-25inch, #wb_size_0-50inch, #wb_size_v0-75inch, #wb_size_1-00inch, #wb_size_1-50inch, #wb_size_2-00inch').removeClass('hidden');
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
