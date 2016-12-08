
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

    // If has an error message.
    if($('#cartMessage').val() != "") { toastr.error($('#cartMessage').val()); }

    // Update cart event.
    $('body').on('click', '.cartUpdate', function(e) {
        window.location.replace("/cart/update/"+$(this).attr('data-cart-token'));
    });

    // Delete cart event.
    $('body').on('click', '.cartDelete', function(e) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/cart/delete',
            data: {
                cart_index: $(this).attr('data-cart-token'),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() { },
            success: function(link) { }
        }).done(function(data) {
            // Do something when everything is done.
            if(data) {
                toastr.success('Order removed from cart.');
            } else {
                toastr.error('Something went wrong. Please try again.');
            }
            // // Reload this page.
            setTimeout(function(){ // wait for 2 secs.
                location.reload(); // then reload the page.
            }, 2000);
        });
    });

    // Submit to cart
    $('body').on('click', '#submitOrder', function(e) {

        showMessage = true;

        // Get proper total qty
        $.ajax({
            type: 'POST',
            url: '/cart/submit',
            dataType: 'json',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('#submitOrder').prop('disabled', true);
                $('#submitOrder').addClass('disabled');
            },
            success: function(data) {
                // Display success message.
                if(showMessage) {
                    toastr.success('', '<h5>Your order has been submitted successfully!</h5>');
                    showMessage = false;
                }
                // Goto success page.
                setTimeout(function(){ // wait for 2 secs.
                    window.location.replace("/submit/success");
                }, 2000);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                // Display error message.
                if(showMessage) {
                    toastr.error('', '<h5>Ooops! Something went wrong.</h5>');
                    showMessage = false;
                }
                // Re-enable submit button
                $('#submitOrder').prop('disabled', false);
                $('#submitOrder').removeClass('disabled');
            }
        }).done(function(data) {
            if(data.status == true) {
                // Display success message.
                if(showMessage) {
                    toastr.success('', '<h5>Your order has been submitted successfully!</h5>');
                    showMessage = false;
                }
                // Goto success page.
                setTimeout(function(){ // wait for 2 secs.
                    window.location.replace("/submit/success");
                }, 2000);
            } else {
                // Display error message.
                if(showMessage) {
                    toastr.error('', '<h5>Ooops! Something went wrong.</h5>');
                    showMessage = false;
                }
                // Re-enable submit button
                $('#submitOrder').prop('disabled', false);
                $('#submitOrder').removeClass('disabled');
            }
        }).fail(function(xhr, status, error) {
            // Display error message.
            if(showMessage) {
                toastr.error('', '<h5>Ooops! Something went wrong.</h5>');
                showMessage = false;
            }
            // Re-enable submit button
            $('#submitOrder').prop('disabled', false);
            $('#submitOrder').removeClass('disabled');
        });

    });

});
