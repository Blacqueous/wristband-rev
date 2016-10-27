// ajax
var xhr;

$(document).ready(function() {

    // load wristband colors.
    loadWristbands();

    // CHANGE STYLE ACTIONS
    $('body').on('click', '.prod-style', function(e) {
        e.stopPropagation();

        // clear existing active classes.
        $('.prod-style').removeClass('active');
        // add active class tio parent div.
        $(this).addClass('active');
        // check thec checkbox.
        $(this).find('input.wb-style').prop('checked', true);

        // main style click action.
        changeWristbandColors();
    });

    $('body').on('click', '.wb-style', function(e) {
        e.stopPropagation();

        // clear existing active classes.
        $('.prod-style').removeClass('active');
        // add active class tio parent div.
        $(this).closest('.prod-style').addClass('active');
        // check thec checkbox.
        $(this).prop('checked', true);

        // main style click action.
        changeWristbandColors();
    });
    // END: CHANGE STYLE ACTIONS

    // CHANGE SIZE ACTIONS
    $('body').on('click', '.prod-size', function(e) {
        e.stopPropagation();

        // clear existing active classes.
        $('.prod-size').removeClass('active');
        // add active class tio parent div.
        $(this).addClass('active');
        // check thec checkbox.
        $(this).find('input.wb-size').prop('checked', true);

        // main size click action.
        changeWristbandColors();
    });

    $('body').on('click', '.wb-size', function(e) {
        e.stopPropagation();

        // clear existing active classes.
        $('.prod-size').removeClass('active');
        // add active class tio parent div.
        $(this).closest('.prod-size').addClass('active');
        // check thec checkbox.
        $(this).prop('checked', true);

        // main size click action.
        changeWristbandColors();
    });
    // END: CHANGE SIZE ACTIONS

});

function changeWristbandColors()
{
    loadWristbands()
}

function loadWristbands()
{
    var $style = $('#wrist_style input[type=radio]:checked').val();
    var $size = $('#wrist_size input[type=radio]:checked').val();

    // stop/abort existing fetches.
    if(xhr && xhr.readyState != 4){
        xhr.abort();
    }

    // get proper total qty
    xhr = $.ajax({
    	type: 'GET',
    	url: '/wristband/colors',
    	data: {
            'style': $style,
            'size': $size
        },
    	beforeSend: function() {
            $('#wrist_color_qty .content').html('loading...');
    	},
    	success: function(data) {
    	}
    }).done(function(e) {
        $('#wrist_color_qty .content').html('done!');
    });
}
