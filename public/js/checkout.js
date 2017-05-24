
$(document).ready(function(e) {

    // Toastr popup behavior
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-bottom-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    // Submit to cart
    $('body').on('submit', '#checkoutSubmit', function(e) {
        e.preventDefault()

        var self = $(this);
        var showMessage = true;
        var data = self.serializeArray();
            data[data.length] = { name: "_token", value: $('meta[name="csrf-token"]').attr('content') };

        // Get proper total qty
        $.ajax({
            type: 'POST',
            url: '/checkout/submit',
            dataType: 'json',
            data: data,
            beforeSend: function() {
                $('#submitCheckout button[type="submit"]').prop('disabled', true);
                $('#submitCheckout button[type="submit"]').addClass('disabled');
            },
            success: function(data) {
                // Display success message.
                if(showMessage) {
                    toastr.success('', '<h5>Your order has been submitted successfully!</h5>');
                    showMessage = false;
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                // Display error message.
                if(showMessage) {
                    toastr.error('', '<h5>Ooops! Something went wrong.</h5>');
                    showMessage = false;
                }
                // Re-enable submit button
                $('#submitCheckout button[type="submit"]').prop('disabled', false);
                $('#submitCheckout button[type="submit"]').removeClass('disabled');
            }
        }).done(function(data) {
            if(data.status == true) {
                // Display success message.
                if(showMessage) {
                    toastr.success('', '<h5>Your order has been submitted successfully!</h5>');
                    showMessage = false;
                }
            } else {
                // Display error message.
                if(showMessage) {
                    toastr.error('', '<h5>Ooops! Something went wrong.</h5>');
                    showMessage = false;
                }
                // Re-enable submit button
                $('#submitCheckout button[type="submit"]').prop('disabled', false);
                $('#submitCheckout button[type="submit"]').removeClass('disabled');
            }
        }).fail(function(xhr, status, error) {
            // Display error message.
            if(showMessage) {
                toastr.error('', '<h5>Ooops! Something went wrong.</h5>');
                showMessage = false;
            }
            // Re-enable submit button
            $('#submitCheckout button[type="submit"]').prop('disabled', false);
            $('#submitCheckout button[type="submit"]').removeClass('disabled');
        });

    });

});
