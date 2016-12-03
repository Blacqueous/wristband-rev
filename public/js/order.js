// Ajax
var xhr;
var free = {};
var addon = {};
var items = {};
var clips = {};
var texts = {};
var viewport = "lg";
var fontElement;
var clipElement
var resetView = true;
var maxKeychain = 0;
var inputQuantity;

var inputQuantityFreeKC;
var inputQuantityFreeWB;
var inputQuantityAddonKC;

$(window).ready(function() {

    $('img.wb-unveil').unveil(0, function(e) {
        $(this).fadeTo(0, 0, function() {
            $(this).attr('src', $(this).attr('data-src'));
        }).fadeTo(1000, 1);
    });
    // Load wristband sizes.
    loadSizes();
    // Load wristband colors.
    loadColors();
    // Load wristband price list.
    loadPrices();

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

    // On focus of quantity field.
    $('body').on('focus', '.box-color input[name="quantity[]"]', function(e) {
        inputQuantity = $(this).val();
    });

    // On inserting wristband quantities.
    $('body').on('blur', '.box-color input[name="quantity[]"]', function(e) {

        if(inputQuantity != $(this).val() && $(this).attr('ref-color')) {

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
            // var idx = style + '-' + color.replace(/,/g, '-');
            var idx = $(this).attr('ref-index');

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
            } else {
                items[style][idx]['color'] = color;
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

        } else {
            // $(this).val("");
        }

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

        $('.preview-clipart').attr('ref-clipart-code', 'none');
        $('.preview-clipart').attr('ref-clipart-name', 'None');
        $('.preview-clipart').html("");
        $('.clipart-fileupload').val('');
        $('.wb-band-text').val('');

        delete clips['logo'];
        texts = {};

        // Load total amount.
        loadTotal(false);

    });

    $('body').on('keyup', '.wb-band-text', function(e) {
        var preview = $(this).attr('data-preview').trim();
        var value = $(this).val().trim();
        var type = $(this).attr('ref-text').trim();

        if(value == "") { value = $(this).attr('placeholder'); }

        $(preview).html(value);
    });

    $('body').on('blur', '.wb-band-text', function(e) {
        var preview = $(this).attr('data-preview').trim();
        var value = $(this).val().trim();
        var type = $(this).attr('ref-text').trim();

        if(value != "") {
            if(typeof texts[type] == "undefined") {
                texts[type] = {'text': value, 'price': 0, 'quantity': 0, 'total': 0};
            } else {
                texts[type]['text'] = value;
            }
        } else {
            delete texts[type];
        }

        // Load total amount.
        loadTotal(false);
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

        if(typeof clips['logo'] == "undefined") {
            clips['logo'] = { };
        }

        switch (targetID) {
            case "#clipart-front-center":
                clips['logo']['front-center'] = {'image': image, 'price': 0, 'total': 0};
                break;
            case "#clipart-front-end":
                clips['logo']['front-end'] = {'image': image, 'price': 0, 'total': 0};
                break;
            case "#clipart-front-start":
                clips['logo']['front-start'] = {'image': image, 'price': 0, 'total': 0};
                break;
            case "#clipart-back-end":
                clips['logo']['back-end'] = {'image': image, 'price': 0, 'total': 0};
                break;
            case "#clipart-back-start":
                clips['logo']['back-start'] = {'image': image, 'price': 0, 'total': 0};
                break;
            case "#clipart-cont-end":
                clips['logo']['cont-end'] = {'image': image, 'price': 0, 'total': 0};
                break;
            case "#clipart-cont-start":
                clips['logo']['cont-start'] = {'image': image, 'price': 0, 'total': 0};
                break;
        }

        $('#modalSelectClipart').modal('hide');

        // Load total amount.
        loadTotal(false);

    });

    $('body').on('change', '.clipart-fileupload', function(e) {
        var targetID = $(this).attr('ref-target');
        var image = "assets/images/src/upload-icon.png";

        if(targetID == "#clipart-front-center") {
            $(targetID).html("<img height='50' src='" + image + "'>");
        } else {
            $(targetID).html("<img height='40' src='" + image + "'>");
        }

        $(targetID).attr('ref-clipart-code', 'upload');
        $(targetID).attr('ref-clipart-name', 'Upload');

        if(typeof clips['logo'] == "undefined") {
            clips['logo'] = { };
        }

        switch (targetID) {
            case "#clipart-front-center":
                clips['logo']['front-center'] = {'image': 'upload', 'price': 0, 'total': 0};
                break;
            case "#clipart-front-end":
                clips['logo']['front-end'] = {'image': 'upload', 'price': 0, 'total': 0};
                break;
            case "#clipart-front-start":
                clips['logo']['front-start'] = {'image': 'upload', 'price': 0, 'total': 0};
                break;
            case "#clipart-back-end":
                clips['logo']['back-end'] = {'image': 'upload', 'price': 0, 'total': 0};
                break;
            case "#clipart-back-start":
                clips['logo']['back-start'] =  {'image': 'upload', 'price': 0, 'total': 0};
                break;
            case "#clipart-cont-end":
                clips['logo']['cont-end'] =  {'image': 'upload', 'price': 0, 'total': 0};
                break;
            case "#clipart-cont-start":
                clips['logo']['cont-start'] = {'image': 'upload', 'price': 0, 'total': 0};
                break;
        }

        // Load total amount.
        loadTotal(false);

    });

    $('body').on('click', '.clipart-remove', function(e) {
        var targetID = $(this).attr('ref-target');
        $(targetID).attr('ref-clipart-code', 'none');
        $(targetID).attr('ref-clipart-name', 'None');
        $(targetID).html("");
        $(this).closest('.clip-sec').find('.clipart-fileupload').val('');

        switch (targetID) {
            case "#clipart-front-center":
                delete clips['logo']['front-center'];
                break;
            case "#clipart-front-end":
                delete clips['logo']['front-end'];
                break;
            case "#clipart-front-start":
                delete clips['logo']['front-start'];
                break;
            case "#clipart-back-end":
                delete clips['logo']['back-end'];
                break;
            case "#clipart-back-start":
                delete clips['logo']['back-start'];
                break;
            case "#clipart-cont-end":
                delete clips['logo']['cont-end'];
                break;
            case "#clipart-cont-start":
                delete clips['logo']['cont-start'];
                break;
        }

        // (Must delete, data will be useless.)
        if ($.isEmptyObject(clips['logo']))
            delete clips['logo'];

        // Load total amount.
        loadTotal(false);

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
        e.preventDefault();
        e.stopPropagation();

        var theContainer = $(this).closest('.message_wristband_100').find('.convert-container');

        if($(this).is(':checked')) {
            // Check and create the object.
            switch ($(this).attr('data-code')) {
                case "free-keychains":
                    free['key-chain'] = 0;
                    $('.freekc').val(''); // Clear free fields.
                    break;
                case "free-wristbands":
                    free['wristbands'] = 0;
                    $('.freewb').val(''); // Clear free fields.
                    break;
            }
            theContainer.removeClass('hidden');
        } else {
            // Delete the object.
            switch ($(this).attr('data-code')) {
                case "free-keychains":
                    delete free['key-chain'];
                    $('.freekc').val(''); // Clear free fields.
                    break;
                case "free-wristbands":
                    delete free['wristbands'];
                    $('.freewb').val(''); // Clear free fields.
                    break;
            }
            theContainer.addClass('hidden');
        }

        // Load total amount.
        loadTotal(false);

    });

    // Free keychains input fields EVENTs
    $('body').on("focus", ".freekc", function(e) {
        inputQuantityFreeKC = $(this).val();
    });

    $('body').on("blur", ".freekc", function(e) {

        if(inputQuantityFreeKC != $(this).val()) {

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
                    total = 0;
                    // Compute total key in items.
                    $.each($(".freekc"), function(key, element) {
                        element = $(element);
                        total += (element.val().trim() == "") ? 0 : parseInt(element.val().trim());
                    });
                    free['key-chain'] = total;
                $('#modal-10-free-keychains').modal('show');
            } else {
                // Set value for free
                free['key-chain'] = total;
            }
            // Load total amount.
            loadTotal(false);

        }

    });

    // Free wristbands input fields EVENTs
    $('body').on("focus", ".freewb", function(e) {
        inputQuantityFreeWB = $(this).val();
    });

    $('body').on("blur", ".freewb", function(e) {

        if(inputQuantityFreeWB != $(this).val()) {

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
                    total = 0;
                    // Compute total key in items.
                    $.each($(".freewb"), function(key, element) {
                        element = $(element);
                        total += (element.val().trim() == "") ? 0 : parseInt(element.val().trim());
                    });
                    free['wristbands'] = total;
                $('#modal-100-free-wristbands').modal('show');
            } else {
                // Set value for free
                free['wristbands'] = total;
            }
            // Load total amount.
            loadTotal(false);

        }

    });

    // Initializes add-on array in every check/uncheck.
    $('body').on("ifChanged", ".add-ons", function(e) {
        e.preventDefault();
        e.stopPropagation();

        if($(this).is(':checked')) {
            switch ($(this).attr('data-code')) {
                case '3mm-thick':
                    addon['3mm-thick'] = { 'price': 0, 'quantity': 0, 'total': 0 };
                    break;
                case 'digital-proof':
                    addon['digital-proof'] = { 'price': 0, 'quantity': 0, 'total': 0 };
                    break;
                case 'eco-friendly':
                    addon['eco-friendly'] = { 'price': 0, 'quantity': 0, 'total': 0 };
                    break;
                case 'glitters':
                    addon['glitters'] = { 'price': 0, 'quantity': 0, 'total': 0 };
                    break;
                case 'individual':
                    addon['individual'] = { 'price': 0, 'quantity': 0, 'total': 0 };
                    break;
                case 'key-chain':
                    addon['key-chain'] = { 'price': 0, 'quantity': 0, 'total': 0, 'all': true };
                    $('#convert-keychain-area-all').removeClass('hidden');
                    $('#convert-keychain-area-some').addClass('hidden');
                    $('#convert-keychain-input-all').iCheck('check');
                    // $('#convert-keychain-input-some').iCheck('uncheck');
                    $('#convert-keychain').removeClass('hidden');
                    break;
            }
        } else {
            switch ($(this).attr('data-code')) {
                case '3mm-thick':
                    delete addon['3mm-thick'];
                    break;
                case 'digital-proof':
                    delete addon['digital-proof'];
                    break;
                case 'eco-friendly':
                    delete addon['eco-friendly'];
                    break;
                case 'glitters':
                    delete addon['glitters'];
                    break;
                case 'individual':
                    delete addon['individual'];
                    break;
                case 'key-chain':
                    delete addon['key-chain'];
                    $('#convert-keychain').addClass('hidden');
                    break;
            }
        }

        // Load total amount.
        loadTotal(false);
    });

    // Specific event for keychain add-on.
    $('body').on("ifChanged", ".convert-keychain-input", function(e) {
        e.preventDefault();
        e.stopPropagation();

        if($(this).is(':checked')) {

            if($(this).val() == 'all') {
                $('#convert-keychain-area-all').removeClass('hidden');
                $('#convert-keychain-area-some').addClass('hidden');
                addon['key-chain']['all'] = true;
            } else {
                $('#convert-keychain-area-all').addClass('hidden');
                $('#convert-keychain-area-some').removeClass('hidden');
                addon['key-chain']['all'] = false;
            }

            // Load total amount.
            loadTotal(false);
        }
    });

    // On focus of add-on keychain fields.
    $('body').on("focus", ".addonkc", function(e) {
        inputQuantityAddonKC = $(this).val();
    });

    // On blur/remove of add-on keychain fields.
    $('body').on("blur", ".addonkc", function(e) {

        if(inputQuantityAddonKC != $(this).val()) {

            var qty = ($(this).val().trim() == "") ? 0 : parseInt($(this).val().trim());
            var total = 0;

            // If value is less than or is equal to 0, empty the field.
            if(qty <= 0) { $(this).val(""); return; }

            // Compute total key in items.
            $.each($(".addonkc"), function(key, element) {
                element = $(element);
                total += (element.val().trim() == "") ? 0 : parseInt(element.val().trim());
            });

            // Check if total is over the required free amount.
            if(total > maxKeychain) {
                $(this).val("");
                $('#modal-some-keychains .qty').html(maxKeychain);
                $('#modal-some-keychains').modal('show');
            } else { }
            // Load total amount.
            loadTotal(false);

        }

    });

    // On change of production & shipping time.
    $('body').on("change", ".js-time-options", function(e) {
        // Load total amount.
        loadTotal(false);
    });

    // For custom colored wristbands.
    // Init variables to be used.
    var customImgTarget = "#";
    var customMax = "0";
    var customStyle = "solid";
    var customType = "regular";
    var customIndex = "";

    // Create custom wristband button event.
    $('body').on("click", ".custom-color-button", function(e) {

        customImgTarget = $(this).attr("data-img-target");
        customIndex = $(this).attr("data-index");
        customMax = $(this).attr("data-max");
        customStyle = $(this).attr("data-style");
        customType = $('#wb_style input[type=radio].wb-style:checked').val();

        $('.custom-color-selected.active').removeClass('active'); // Clear selected boxes.
        $('.field-'+customStyle+' input').attr('ref-value', '').val(''); // Clear selected input fields.
        $('.field-container').addClass('hidden'); // Hide fields.
        $('.field-'+customStyle).removeClass('hidden'); // Show proper fields.

        $('#modalWristbandColor').attr('data-max', customMax);
        $('#modalWristbandColor').attr('data-style', customStyle);
        $('#modalWristbandColor').attr('data-type', customType);
        $('#modalWristbandColor').modal('show');

    });

    // Custom wristband color select event.
    $('body').on('click', '.custom-color-selected', function(e) {

        var customField;

        if(!$(this).hasClass('active')) {

            $('.field-'+customStyle+' input').each(function() {
                if( !$(this).val().trim() && $(this).val().length <= 0  ) {
                    customField = $(this);
                    return false;
                }
            });

            if(customField) {
                $(this).addClass('active');
                customField.attr('ref-value', $(this).attr('ref-color')).val($(this).attr('ref-name'));
            }

        } else {

            $('.field-'+customStyle+' input[ref-value="'+$(this).attr('ref-color')+'"]').attr('ref-value', '').val('');
            $(this).removeClass('active');

        }

    });

    // Clear all custom colors event.
    $('body').on('click', '#btnCustomClear', function(e) {
        // Clear selected values.
        $('.field-'+customStyle+' input').attr('ref-value', '').val('');
        $('.custom-color-selected.active').removeClass('active');
    });

    // Submit custom wristband event.
    $('body').on('click', '#btnCustomSubmit', function(e) {

        var customColors = [];

        $('.field-'+customStyle+' input').each(function() {
            if( $(this).val().trim() && $(this).val().length > 0  ) {
                customColors.push($(this).attr('ref-value').trim());
            }
        });

        if(customColors.length > 0) {
            loadCustomWristband(customStyle, customType, customColors.join(","), customImgTarget);

            if(typeof items[customStyle] != "undefined") {
                if(typeof items[customStyle][customIndex] != "undefined") {
                    items[customStyle][customIndex]['color'] = customColors.join(",");
                }
            }

            // reset wristband previews.
            resetPreview();
            // Load total amount.
            loadTotal();
        }

        // Do all item updates before closing modal.
        $('#modalWristbandColor').modal('hide');
    });

    // Add new custom wirstband box.
    $('body').on('click', '.add-custom', function(e) {
        $type = $(this).attr('ref-style');
        $parent = $(this).closest('.tab-pane').find('.main-color-content');
        $style = $('#wb_style input[type=radio].wb-style:checked').val();

        // Get proper total qty
        $.ajax({
        	type: 'GET',
        	url: '/getTemplateCustomWristband?type='+$type+'&style='+$style,
        	data: { },
        	beforeSend: function() { },
        	success: function() { }
        }).done(function(data) {
            // Do something when everything is done.
            $parent.prepend(data);
        });
    });

    // Remove created custom wristband.
    $('body').on('click', '.btn-close-custom-color', function(e) {
        $(this).closest('.box-color-container').remove();
        var delStyle = $(this).attr('data-style');
        var delIndex = $(this).attr('data-index');

        delete items[delStyle][delIndex];

        // Delete the WB style if completely empty.
        // (Must delete, data will be useless.)
        if ($.isEmptyObject(items[delStyle])) {
            delete items[delStyle];
        }

        // reset wristband previews.
        resetPreview();
        // Load total amount.
        loadTotal();
    });

});

function loadCustomWristband($style, $type, $colors, $target)
{

    // Get proper total qty
    $.ajax({
    	type: 'GET',
    	url: '/gd/band.php?style='+$style+'&type='+$type+'&color='+$colors,
    	data: { },
    	beforeSend: function() { $($target).css({'opacity':'0'}); },
    	success: function(link) { }
    }).done(function(link) {
        // Do something when everything is done.
        $($target).attr('src', link).animate({'opacity':'1'}, 1000);
        $($target).closest('.box-color').find('input').attr('ref-color', $colors);
    });

}

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

function displayTotal($collection)
{

    console.log($collection);

    $('.summary-table-state').addClass('hidden')

    if(typeof $collection.style != "undefined") {
        $('#summary-table-style').removeClass('hidden');
        $('#summary-table-style .value').html( $collection.style.capitalizeFirstLetter() );
    }

    if(typeof $collection.size != "undefined") {
        $('#summary-table-size').removeClass('hidden');
        $('#summary-table-size .value').html( getWBSizeTitle($collection.size) );
    }

    $('#summary-table-wristbands').removeClass('hidden');
    $('#summary-table-wristbands .qty').html( $collection.quantity );
    $('#summary-table-wristbands .price').html( ($collection.price).formatMoney() );
    $('#summary-table-wristbands .total').html( ($collection.quantity * $collection.price).formatMoney() );

    if(typeof $collection.items['segmented'] != "undefined") {
        $('#summary-table-segmented').removeClass('hidden');
        $('#summary-table-segmented .qty').html( $collection.items['segmented'].quantity );
        $('#summary-table-segmented .price').html( ($collection.items['segmented'].price_addon).formatMoney() );
        $('#summary-table-segmented .total').html( ($collection.items['segmented'].price_total).formatMoney() );
    }

    if(typeof $collection.items['swirl'] != "undefined") {
        $('#summary-table-swirl').removeClass('hidden');
        $('#summary-table-swirl .qty').html( $collection.items['swirl'].quantity );
        $('#summary-table-swirl .price').html( ($collection.items['swirl'].price_addon).formatMoney() );
        $('#summary-table-swirl .total').html( ($collection.items['swirl'].price_total).formatMoney() );
    }

    if(typeof $collection.items['glow'] != "undefined") {
        $('#summary-table-glow').removeClass('hidden');
        $('#summary-table-glow .qty').html( $collection.items['glow'].quantity );
        $('#summary-table-glow .price').html( ($collection.items['glow'].price_addon).formatMoney() );
        $('#summary-table-glow .total').html( ($collection.items['glow'].price_total).formatMoney() );
    }

    if(typeof $collection.time_production != "undefined") {
        $('#summary-table-production').removeClass('hidden');
        $('#summary-table-production .days').html( $collection.time_production.days );
        $('#summary-table-production .total').html( ($collection.time_production.price).formatMoney() );
    }

    if(typeof $collection.time_shipping != "undefined") {
        $('#summary-table-shipping').removeClass('hidden');
        $('#summary-table-shipping .days').html( $collection.time_shipping.days );
        $('#summary-table-shipping .total').html( ($collection.time_shipping.price).formatMoney() );
    }

    if (!$.isEmptyObject($collection.texts)) {
        $('#summary-table-text').removeClass('hidden');

        if(typeof $collection.texts['front'] != "undefined") {
            $('#summary-table-text #text-front').removeClass('hidden');
            $('#summary-table-text #text-front .qty').html( $collection.quantity );
            $('#summary-table-text #text-front .price').html( ($collection.texts['front'].price).formatMoney() );
            $('#summary-table-text #text-front .total').html( ($collection.texts['front'].total).formatMoney() );
        }

        if(typeof $collection.texts['back'] != "undefined") {
            $('#summary-table-text #text-back').removeClass('hidden');
            $('#summary-table-text #text-back .qty').html( $collection.texts['back'].quantity );
            $('#summary-table-text #text-back .price').html( ($collection.texts['back'].price).formatMoney() );
            $('#summary-table-text #text-back .total').html( ($collection.texts['back'].total).formatMoney() );
        }

        if(typeof $collection.texts['continue'] != "undefined") {
            $('#summary-table-text #text-continuous').removeClass('hidden');
            $('#summary-table-text #text-continuous .qty').html( $collection.quantity );
            $('#summary-table-text #text-continuous .price').html( ($collection.texts['continue'].price).formatMoney() );
            $('#summary-table-text #text-continuous .total').html( ($collection.texts['continue'].total).formatMoney() );
        }

        if(typeof $collection.texts['inside'] != "undefined") {
            $('#summary-table-text #text-inside').removeClass('hidden');
            $('#summary-table-text #text-inside .qty').html( $collection.texts['inside'].quantity );
            $('#summary-table-text #text-inside .price').html( ($collection.texts['inside'].price).formatMoney() );
            $('#summary-table-text #text-inside .total').html( ($collection.texts['inside'].total).formatMoney() );
        }
    }

    if (!$.isEmptyObject($collection.clips.logo)) {
        $('#summary-table-clipart').removeClass('hidden');

        if(typeof $collection.clips.logo['front-start'] != "undefined") {
            $('#summary-table-clipart #clipart-front-start').removeClass('hidden');
            $('#summary-table-clipart #clipart-front-start .qty').html( $collection.clips.logo['front-start'].quantity );
            $('#summary-table-clipart #clipart-front-start .price').html( ($collection.clips.logo['front-start'].price).formatMoney() );
            $('#summary-table-clipart #clipart-front-start .total').html( ($collection.clips.logo['front-start'].total).formatMoney() );
        }

        if(typeof $collection.clips.logo['front-end'] != "undefined") {
            $('#summary-table-clipart #clipart-front-end').removeClass('hidden');
            $('#summary-table-clipart #clipart-front-end .qty').html( $collection.clips.logo['front-end'].quantity );
            $('#summary-table-clipart #clipart-front-end .price').html( ($collection.clips.logo['front-end'].price).formatMoney() );
            $('#summary-table-clipart #clipart-front-end .total').html( ($collection.clips.logo['front-end'].total).formatMoney() );
        }

        if(typeof $collection.clips.logo['back-start'] != "undefined") {
            $('#summary-table-clipart #clipart-back-start').removeClass('hidden');
            $('#summary-table-clipart #clipart-back-start .qty').html( $collection.clips.logo['back-start'].quantity );
            $('#summary-table-clipart #clipart-back-start .price').html( ($collection.clips.logo['back-start'].price).formatMoney() );
            $('#summary-table-clipart #clipart-back-start .total').html( ($collection.clips.logo['back-start'].total).formatMoney() );
        }

        if(typeof $collection.clips.logo['back-end'] != "undefined") {
            $('#summary-table-clipart #clipart-back-end').removeClass('hidden');
            $('#summary-table-clipart #clipart-back-end .qty').html( $collection.clips.logo['back-end'].quantity );
            $('#summary-table-clipart #clipart-back-end .price').html( ($collection.clips.logo['back-end'].price).formatMoney() );
            $('#summary-table-clipart #clipart-back-end .total').html( ($collection.clips.logo['back-end'].total).formatMoney() );
        }

        if(typeof $collection.clips.logo['cont-start'] != "undefined") {
            $('#summary-table-clipart #clipart-cont-start').removeClass('hidden');
            $('#summary-table-clipart #clipart-cont-start .qty').html( $collection.clips.logo['cont-start'].quantity );
            $('#summary-table-clipart #clipart-cont-start .price').html( ($collection.clips.logo['cont-start'].price).formatMoney() );
            $('#summary-table-clipart #clipart-cont-start .total').html( ($collection.clips.logo['cont-start'].total).formatMoney() );
        }

        if(typeof $collection.clips.logo['cont-end'] != "undefined") {
            $('#summary-table-clipart #clipart-cont-end').removeClass('hidden');
            $('#summary-table-clipart #clipart-cont-end .qty').html( $collection.clips.logo['cont-end'].quantity );
            $('#summary-table-clipart #clipart-cont-end .price').html( ($collection.clips.logo['cont-end'].price).formatMoney() );
            $('#summary-table-clipart #clipart-cont-end .total').html( ($collection.clips.logo['cont-end'].total).formatMoney() );
        }

        if(typeof $collection.clips.logo['front-center'] != "undefined") {
            $('#summary-table-clipart #clipart-front-center').removeClass('hidden');
            $('#summary-table-clipart #clipart-front-center .qty').html( $collection.clips.logo['front-center'].quantity );
            $('#summary-table-clipart #clipart-front-center .price').html( ($collection.clips.logo['front-center'].price).formatMoney() );
            $('#summary-table-clipart #clipart-front-center .total').html( ($collection.clips.logo['front-center'].total).formatMoney() );
        }

    }

    if (!$.isEmptyObject($collection.addon)) {
        $('#summary-table-addon').removeClass('hidden');

        if(typeof $collection.addon['3mm-thick'] != "undefined") {
            $('#summary-table-addon #addon-3mm-thick').removeClass('hidden');
            $('#summary-table-addon #addon-3mm-thick .qty').html( $collection.addon['3mm-thick'].quantity );
            $('#summary-table-addon #addon-3mm-thick .price').html( ($collection.addon['3mm-thick'].price).formatMoney() );
            $('#summary-table-addon #addon-3mm-thick .total').html( ($collection.addon['3mm-thick'].total).formatMoney() );
        }

        if(typeof $collection.addon['digital-proof'] != "undefined") {
            $('#summary-table-addon #addon-digital-proof').removeClass('hidden');
            $('#summary-table-addon #addon-digital-proof .qty').html( $collection.addon['digital-proof'].quantity );
            $('#summary-table-addon #addon-digital-proof .price').html( ($collection.addon['digital-proof'].price).formatMoney() );
            $('#summary-table-addon #addon-digital-proof .total').html( ($collection.addon['digital-proof'].total).formatMoney() );
        }

        if(typeof $collection.addon['eco-friendly'] != "undefined") {
            $('#summary-table-addon #addon-eco-friendly').removeClass('hidden');
            $('#summary-table-addon #addon-eco-friendly .qty').html( $collection.addon['eco-friendly'].quantity );
            $('#summary-table-addon #addon-eco-friendly .price').html( ($collection.addon['eco-friendly'].price).formatMoney() );
            $('#summary-table-addon #addon-eco-friendly .total').html( ($collection.addon['eco-friendly'].total).formatMoney() );
        }

        if(typeof $collection.addon['glitters'] != "undefined") {
            $('#summary-table-addon #addon-glitters').removeClass('hidden');
            $('#summary-table-addon #addon-glitters .qty').html( $collection.addon['glitters'].quantity );
            $('#summary-table-addon #addon-glitters .price').html( ($collection.addon['glitters'].price).formatMoney() );
            $('#summary-table-addon #addon-glitters .total').html( ($collection.addon['glitters'].total).formatMoney() );
        }

        if(typeof $collection.addon['individual'] != "undefined") {
            $('#summary-table-addon #addon-individual').removeClass('hidden');
            $('#summary-table-addon #addon-individual .qty').html( $collection.addon['individual'].quantity );
            $('#summary-table-addon #addon-individual .price').html( ($collection.addon['individual'].price).formatMoney() );
            $('#summary-table-addon #addon-individual .total').html( ($collection.addon['individual'].total).formatMoney() );
        }

        if(typeof $collection.addon['key-chain'] != "undefined") {
            $('#summary-table-addon #addon-key-chain').removeClass('hidden');
            $('#summary-table-addon #addon-key-chain .qty').html( $collection.addon['key-chain'].quantity );
            $('#summary-table-addon #addon-key-chain .price').html( ($collection.addon['key-chain'].price).formatMoney() );
            $('#summary-table-addon #addon-key-chain .total').html( ($collection.addon['key-chain'].total).formatMoney() );
        }
    }

    if (!$.isEmptyObject($collection.free)) {
        $('#summary-table-free').removeClass('hidden');

        if(typeof $collection.free['key-chain'] != "undefined") {
            $('#summary-table-free #free-key-chain').removeClass('hidden');
            $('#summary-table-free #free-key-chain .qty').html( $collection.free['key-chain'] );
        }

        if(typeof $collection.free['wristbands'] != "undefined") {
            $('#summary-table-free #free-wristband').removeClass('hidden');
            $('#summary-table-free #free-wristband .qty').html( $collection.free['wristbands'] );
        }
    }

    $('#total-price').html( ($collection.total).formatMoney() );
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

function getWBSizeTitle(abbr)
{

    switch (abbr.toLowerCase()) {
        case "0-25inch":
            return "1/4 Inch";
            break;

        case "0-50inch":
            return "1/2 Inch";
            break;

        case "0-75inch":
            return "3/4 Inch";
            break;

        case "1-00inch":
            return "1 Inch";
            break;

        case "1-50inch":
            return "1 1/2 Inch";
            break;

        case "2-00inch":
            return "2 Inch";
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
    var html = "";
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
                // For free wristbands
                html += '<li class="fwb-list conversion-wrist-'+itemValue.style+' free-wrist-'+itemValue.style+'-'+sizeKey+'-'+itemValue.title+'" data-band-color="' + itemValue.color.split(",").join("-") + '">';
                html += '<div class="fwb-text col-md-6 col-sm-12">';
                    html += '<div class="col-xs-4 fwb-text-content">'+itemValue.style.toUpperCase()+'</div>';
                    html += '<div class="col-xs-4 fwb-text-content">'+itemValue.title.toUpperCase()+'</div>';
                    html += '<div class="col-xs-4 fwb-text-content">'+getSizeTitle(sizeKey).toUpperCase()+'</div>';
                html += '</div>';
                html += '<div class="align-right col-md-6 col-sm-12"><h4 class="fwb-text col-xs-12 hidden-md hidden-lg text-center fwb-text-hidden-header">INPUT QUANTITY</h4><input type="number" class="addonkc col-xs-12" id="freewb-'+itemValue.style+'-'+sizeKey+'-'+itemValue.color.split(",").join("-")+'" name="'+itemValue.style+'-'+sizeKey+'-'+itemValue.color.split(",").join("-")+'-fwb" data-style="'+itemValue.style+'" data-color="'+itemValue.color+'" data-font-color="'+sizeValue.font+'" data-name="'+itemValue.title+'" data-size="'+sizeKey+'" placeholder="0" data-maxlength="3" /></div>';
                html += '<div class="clearfix"></div>';
                html += '</li>';
            });
        });
    });

    if(html == "") {
        html += '<li class="fwb-list">';
            html += '<div class="col-xs-12 fwb-text-content">No Wristbands.</div>';
        html += '<div class="clearfix"></div>';
        html += '</li>';
    }

	// Free wristbands
    $(".area-conversion-bands").html(html_wb);
	$(".area-conversion-chains").html(html_kc);
    $(".convert-keychain-some-list").html(html);
    $("#convert-keychain-area-all-qty").html(total);

    if(total >= 100) {
        $('#dv-100-free-wristbands, #dv-10-free-keychains').removeClass('hidden');
    } else {
        $('#free-keychains, #free-wristbands').iCheck('uncheck');
        $('.message_wristband_100 .convert-container').addClass('hidden');
        $('#dv-100-free-wristbands, #dv-10-free-keychains').addClass('hidden');
    }

    // Get maximum quantity for keychains
    maxKeychain = total;

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

function loadTotal(loadProdShip)
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
        'clips': clips,
        'free': free,
        'texts': texts,
        'addon': addon,
        'price': 0,
        'quantity': 0,
        'time_production': { 'days': 0, 'price': 0 },
        'time_shipping': { 'days': 0, 'price': 0 },
        'total': 0
    };

    if(typeof loadProdShip == "undefined")
        loadProdShip = true;

    // Loop through all items
    $.each($collection['items'], function(styleKey, styleVal) {

        // Add new fields.
        $collection['items'][styleKey]['quantity'] = 0;
        $collection['items'][styleKey]['price_addon'] = 0;
        $collection['items'][styleKey]['price_total'] = 0;

        $.each(styleVal, function(itemKey, itemValue) {
            $.each(itemValue['size'], function(sizeKey, sizeValue) {
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
                if($collection['items'][styleKey]['quantity'] <= 20) { // Get price.
                    $collection['items'][styleKey]['price_addon'] = parseFloat(addon_prc);
                    hasQty = true; // Flag! price found.
                } else if(parseInt(addon_qty) <= $collection['items'][styleKey]['quantity']) { // Get price.
                    $collection['items'][styleKey]['price_addon'] = parseFloat(addon_prc);
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
            // Check if already found the price.
            if(hasQty == false) {
                // If less than or equal.
                if($collection.quantity <= 20) { // Get price.
                    $collection.price = parseFloat($arr_price['20']);
                    hasQty = true;
                } else if(parseInt(price_qty) <= $collection.quantity) { // Get price.
                    $collection.price = parseFloat(price_prc);
                } else { // Flag if item price found.
                    hasQty = true;
                }
            }
        });

        // Loop through all add ons
        $.each($collection['addon'], function(styleKey, styleVal) {
            if(styleKey == 'key-chain') {
                if($collection['addon'][styleKey]['all']) {
                    $collection['addon'][styleKey]['quantity'] = $collection.quantity;
                } else {
                    total = 0;
                    // Compute total key in items.
                    $.each($(".addonkc"), function(key, element) {
                        element = $(element);
                        total += (element.val().trim() == "") ? 0 : parseInt(element.val().trim());
                    });
                    $collection['addon'][styleKey]['quantity'] = total;
                }
            } else {
                $collection['addon'][styleKey]['quantity'] = $collection.quantity;
            }
            // Get add ons price.
            var hasQty = false;
            $.each($arr_addon[styleKey], function(addon_qty, addon_prc) {
                // Check if already found the price.
                if(hasQty == false) {
                    // If less than or equal.
                    if(parseInt(addon_qty) <= $collection.quantity) { // Get price.
                        $collection['addon'][styleKey]['price'] = parseFloat(addon_prc);
                    } else if($collection.quantity <= 20) { // Get price.
                        $collection['addon'][styleKey]['price'] = parseFloat(addon_prc);
                        hasQty = true; // Flag! price found.
                    } else { // Flag if additional item price found.
                        hasQty = true;
                    }
                }
            });
            $collection['addon'][styleKey]['total'] = ( $collection['addon'][styleKey]['price'] * $collection['addon'][styleKey]['quantity'] );
        });

        // Loop through all cliparts
        $.each($collection['clips'], function(styleKey, styleVal) {
            // $collection['clips'][styleKey]['total'] = 0;
            $.each(styleVal, function(itemKey, itemValue) {
                if(itemKey != 'total') {
                    $collection['clips'][styleKey][itemKey]['quantity'] = $collection.quantity;
                    // Get cliparts price.
                    var hasQty = false;
                    $.each($arr_addon[styleKey], function(addon_qty, addon_prc) {
                        // Check if already found the price.
                        if(hasQty == false) {
                            // If less than or equal.
                            if(parseInt(addon_qty) <= $collection.quantity) { // Get price.
                                $collection['clips'][styleKey][itemKey]['price'] = parseFloat(addon_prc);
                            } else if($collection.quantity <= 20) { // Get price.
                                $collection['clips'][styleKey][itemKey]['price'] = parseFloat(addon_prc);
                                hasQty = true; // Flag! price found.
                            } else { // Flag if additional item price found.
                                hasQty = true;
                            }
                        }
                    });
                    $collection['clips'][styleKey][itemKey]['total'] = ( $collection['clips'][styleKey][itemKey]['price'] * $collection['clips'][styleKey][itemKey]['quantity'] );
                    // $collection['clips'][styleKey]['total'] += $collection['clips'][styleKey][itemKey]['total'];
                }
            });
        });

        // Loop through all texts
        $.each($collection['texts'], function(styleKey, styleVal) {
            // Get add ons price.
            var hasQty = false;
            $.each($arr_addon[styleKey], function(addon_qty, addon_prc) {
                $collection['texts'][styleKey]['quantity'] = $collection.quantity;
                // Check if already found the price.
                if(hasQty == false) {
                    // If less than or equal.
                    if(parseInt(addon_qty) <= $collection.quantity) { // Get price.
                        $collection['texts'][styleKey]['price'] = parseFloat(addon_prc);
                    } else if($collection.quantity <= 20) { // Get price.
                        $collection['texts'][styleKey]['price'] = parseFloat(addon_prc);
                        hasQty = true; // Flag! price found.
                    } else { // Flag if additional item price found.
                        hasQty = true;
                    }
                }
            });
            $collection['texts'][styleKey]['total'] = ( $collection['texts'][styleKey]['price'] * $collection.quantity );
        });

        if(loadProdShip) {

            // Get proper total qty.
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
            	success: function(data) {}
            }).done(function(data) {
                //
                var htmlProd, htmlShip = '';

                // List all production price/day data
                if(typeof data.production != "undefined") {
                    $.each(data.production, function(key, value) {
                        htmlProd += "<option value='" + value.days + "' data-price='" + value.price + "'>Standard Production - " + value.days + " Days (+ $" + (value.price).formatMoney() + ")</option>";
                    });
                }
                $("#ProductionTime").html(htmlProd);

                // List all shipping price/day data
                if(typeof data.shipping != "undefined") {
                    $.each(data.shipping, function(key, value) {
                        htmlShip += "<option value='" + value.days + "' data-price='" + value.price + "'>Standard Shipping - " + value.days + " Days (+ $" + (value.price).formatMoney() + ")</option>";
                    });
                }
                $("#ShippingTime").html(htmlShip);

                // Get selected production settings
                $collection.time_production.days = data.production[0].days;
                $collection.time_production.price = data.production[0].price;
                $collection.time_shipping.days = data.shipping[0].days;
                $collection.time_shipping.price = data.shipping[0].price;

                        // COMPUTE THE TOTAL PRICE
                        $collection.total += $collection.quantity * $collection.price;

                        if(typeof $collection.items['segmented'] != "undefined") {
                            $collection.total += $collection.items['segmented'].price_total;
                        }

                        if(typeof $collection.items['swirl'] != "undefined") {
                            $collection.total += $collection.items['swirl'].price_total;
                        }

                        if(typeof $collection.items['glow'] != "undefined") {
                            $collection.total += $collection.items['glow'].price_total;
                        }

                        if(typeof $collection.time_production != "undefined") {
                            $collection.total += $collection.time_production.price;
                        }

                        if(typeof $collection.time_shipping != "undefined") {
                            $collection.total += $collection.time_shipping.price;
                        }

                        if (!$.isEmptyObject($collection.texts)) {

                            if(typeof $collection.texts['front'] != "undefined") {
                                $collection.total += $collection.texts['front'].total;
                            }

                            if(typeof $collection.texts['back'] != "undefined") {
                                $collection.total += $collection.texts['back'].total;
                            }

                            if(typeof $collection.texts['continue'] != "undefined") {
                                $collection.total += $collection.texts['continue'].total;
                            }

                            if(typeof $collection.texts['inside'] != "undefined") {
                                $collection.total += $collection.texts['inside'].total;
                            }
                        }

                        if (!$.isEmptyObject($collection.clips.logo)) {

                            if(typeof $collection.clips.logo['front-start'] != "undefined") {
                                $collection.total += $collection.clips.logo['front-start'].total;
                            }

                            if(typeof $collection.clips.logo['front-end'] != "undefined") {
                                $collection.total += $collection.clips.logo['front-end'].total;
                            }

                            if(typeof $collection.clips.logo['back-start'] != "undefined") {
                                $collection.total += $collection.clips.logo['back-start'].total;
                            }

                            if(typeof $collection.clips.logo['back-end'] != "undefined") {
                                $collection.total += $collection.clips.logo['back-end'].total;
                            }

                            if(typeof $collection.clips.logo['cont-start'] != "undefined") {
                                $collection.total += $collection.clips.logo['cont-start'].total;
                            }

                            if(typeof $collection.clips.logo['cont-end'] != "undefined") {
                                $collection.total += $collection.clips.logo['cont-end'].total;
                            }

                            if(typeof $collection.clips.logo['front-center'] != "undefined") {
                                $collection.total += $collection.clips.logo['front-center'].total;
                            }
                        }

                        if (!$.isEmptyObject($collection.addon)) {

                            if(typeof $collection.addon['3mm-thick'] != "undefined") {
                                $collection.total += $collection.addon['3mm-thick'].total;
                            }

                            if(typeof $collection.addon['digital-proof'] != "undefined") {
                                $collection.total += $collection.addon['digital-proof'].total;
                            }

                            if(typeof $collection.addon['eco-friendly'] != "undefined") {
                                $collection.total += $collection.addon['eco-friendly'].total;
                            }

                            if(typeof $collection.addon['glitters'] != "undefined") {
                                $collection.total += $collection.addon['glitters'].total;
                            }

                            if(typeof $collection.addon['individual'] != "undefined") {
                                $collection.total += $collection.addon['individual'].total;
                            }

                            if(typeof $collection.addon['key-chain'] != "undefined") {
                                $collection.total += $collection.addon['key-chain'].total;
                            }
                        }

                        if (!$.isEmptyObject($collection.free)) {

                            if(typeof $collection.free['key-chain'] != "undefined") {
                                $collection.total += $collection.free['key-chain'];
                            }

                            if(typeof $collection.free['wristbands'] != "undefined") {
                                $collection.total += $collection.free['wristbands'];
                            }
                        }

                // Collection
                displayTotal($collection);

                $('#total-area .has-total').removeClass('hidden');
                $('#total-area .no-total').addClass('hidden');
    		});

        } else {

    		// Get selected production settings
            var elementProd = $("#ProductionTime option:selected");
            $collection.time_production.days = ( elementProd.val() != "" && !isNaN( parseInt(elementProd.val()) ) ) ? parseInt(elementProd.val()) : 0;
            $collection.time_production.price = ( elementProd.attr("data-price") != "" && !isNaN( parseFloat(elementProd.attr("data-price")) ) ) ? parseFloat(elementProd.attr("data-price")) : 0;
            var elementShip = $("#ShippingTime option:selected");
            $collection.time_shipping.days = ( elementShip.val() != "" && !isNaN( parseInt(elementShip.val()) ) ) ? parseInt(elementShip.val()) : 0;
            $collection.time_shipping.price = ( elementShip.attr("data-price") != "" && !isNaN( parseFloat(elementShip.attr("data-price")) ) ) ? parseFloat(elementShip.attr("data-price")) : 0;

                    // COMPUTE THE TOTAL PRICE
                    $collection.total += $collection.quantity * $collection.price;

                    if(typeof $collection.items['segmented'] != "undefined") {
                        $collection.total += $collection.items['segmented'].price_total;
                    }

                    if(typeof $collection.items['swirl'] != "undefined") {
                        $collection.total += $collection.items['swirl'].price_total;
                    }

                    if(typeof $collection.items['glow'] != "undefined") {
                        $collection.total += $collection.items['glow'].price_total;
                    }

                    if(typeof $collection.time_production != "undefined") {
                        $collection.total += $collection.time_production.price;
                    }

                    if(typeof $collection.time_shipping != "undefined") {
                        $collection.total += $collection.time_shipping.price;
                    }

                    if (!$.isEmptyObject($collection.texts)) {

                        if(typeof $collection.texts['front'] != "undefined") {
                            $collection.total += $collection.texts['front'].total;
                        }

                        if(typeof $collection.texts['back'] != "undefined") {
                            $collection.total += $collection.texts['back'].total;
                        }

                        if(typeof $collection.texts['continue'] != "undefined") {
                            $collection.total += $collection.texts['continue'].total;
                        }

                        if(typeof $collection.texts['inside'] != "undefined") {
                            $collection.total += $collection.texts['inside'].total;
                        }
                    }

                    if (!$.isEmptyObject($collection.clips.logo)) {

                        if(typeof $collection.clips.logo['front-start'] != "undefined") {
                            $collection.total += $collection.clips.logo['front-start'].total;
                        }

                        if(typeof $collection.clips.logo['front-end'] != "undefined") {
                            $collection.total += $collection.clips.logo['front-end'].total;
                        }

                        if(typeof $collection.clips.logo['back-start'] != "undefined") {
                            $collection.total += $collection.clips.logo['back-start'].total;
                        }

                        if(typeof $collection.clips.logo['back-end'] != "undefined") {
                            $collection.total += $collection.clips.logo['back-end'].total;
                        }

                        if(typeof $collection.clips.logo['cont-start'] != "undefined") {
                            $collection.total += $collection.clips.logo['cont-start'].total;
                        }

                        if(typeof $collection.clips.logo['cont-end'] != "undefined") {
                            $collection.total += $collection.clips.logo['cont-end'].total;
                        }

                        if(typeof $collection.clips.logo['front-center'] != "undefined") {
                            $collection.total += $collection.clips.logo['front-center'].total;
                        }

                    }

                    if (!$.isEmptyObject($collection.addon)) {

                        if(typeof $collection.addon['3mm-thick'] != "undefined") {
                            $collection.total += $collection.addon['3mm-thick'].total;
                        }

                        if(typeof $collection.addon['digital-proof'] != "undefined") {
                            $collection.total += $collection.addon['digital-proof'].total;
                        }

                        if(typeof $collection.addon['eco-friendly'] != "undefined") {
                            $collection.total += $collection.addon['eco-friendly'].total;
                        }

                        if(typeof $collection.addon['glitters'] != "undefined") {
                            $collection.total += $collection.addon['glitters'].total;
                        }

                        if(typeof $collection.addon['individual'] != "undefined") {
                            $collection.total += $collection.addon['individual'].total;
                        }

                        if(typeof $collection.addon['key-chain'] != "undefined") {
                            $collection.total += $collection.addon['key-chain'].total;
                        }
                    }

                    if (!$.isEmptyObject($collection.free)) {

                        if(typeof $collection.free['key-chain'] != "undefined") {
                            $collection.total += $collection.free['key-chain'];
                        }

                        if(typeof $collection.free['wristbands'] != "undefined") {
                            $collection.total += $collection.free['wristbands'];
                        }
                    }

            // Collection
            displayTotal($collection);

            $('#total-area .has-total').removeClass('hidden');
            $('#total-area .no-total').addClass('hidden');
        }

    } else {

        $('#total-area .has-total').addClass('hidden');
        $('#total-area .no-total').removeClass('hidden');

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

}

function loadPreview($style, $type, $colors, $font, $isFirst)
{
    if(typeof $isFirst == "undefined")
        $isFirst = false;

    var addBlink = false;
    var previewClass = 'preview-' + $style + '-' + $type + '-' + $font + '-' + $colors.trim().toUpperCase().replace(/ /g, '').replace(/,/g, '-');

    if($('.' + previewClass).length <= 0) {

        // Add new item for preview display
        $("#preview-pill-selection").append('<div class="preview-pill ' + previewClass + '" data-font-color="" data-image-link="">Y</div>');

        // Get proper total qty
        $.ajax({
        	type: 'GET',
        	url: '/gd/belt.php?style='+$style+'&type='+$type+'&color='+$colors.replace(/ /g, ''),
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

Number.prototype.formatMoney = function(c, d, t) {
    var n = this,
    c = isNaN(c = Math.abs(c)) ? 2 : c,
    d = d == undefined ? "." : d,
    t = t == undefined ? "," : t,
    s = n < 0 ? "-" : "",
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
    j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};
