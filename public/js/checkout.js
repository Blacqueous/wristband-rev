
$(document).ready(function(e) {

    // init iCheck
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-green control-checkbox',
        radioClass: 'iradio_square-green control-radio',
        increaseArea: '20%' // optional
    });

    // init PayForm
    $('input[name="CardNum"]').payform('formatCardNumber');
    $('input[name="CardCVV"]').payform('formatCardCVC');

    $('select').attr('required','required');

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
    
    $(document).on('keyup', 'input[name="DiscountCode"]', function(e) {
        $('.form-sub-total .form-total-value span').html(parseFloat(total).formatMoney(2, '.', ','));
        if ($(this).val().length <= 0) { return false; }
        var discount = ($(this).val().toUpperCase() == "SAVE10") ? total * 0.10 : 0;
            // discount = discount.toFixed(2);
        $('.form-discount-total .form-total-value span').html(parseFloat(discount).formatMoney(2, '.', ','));
        var grand_total = total - discount;
            // grand_total = grand_total.toFixed(2);
        $('.form-grand-total .form-total-value span').html(parseFloat(grand_total).formatMoney(2, '.', ','));
    });
    
    $(document).on('blur', 'input[name="DiscountCode"]', function(e) {
        $('.form-sub-total .form-total-value span').html(parseFloat(total).formatMoney(2, '.', ','));
        if ($(this).val().length <= 0) { return false; }
        var discount = ($(this).val().toUpperCase() == "SAVE10") ? total * 0.10 : 0;
            // discount = discount.toFixed(2);
        $('.form-discount-total .form-total-value span').html(parseFloat(discount).formatMoney(2, '.', ','));
        var grand_total = total - discount;
            // grand_total = grand_total.toFixed(2);
        $('.form-grand-total .form-total-value span').html(parseFloat(grand_total).formatMoney(2, '.', ','));
    });
    
    $(document).on('ifChecked', 'input[name="PaymentType"]', function(e) {
        var self = $(this),
            val = self.val().toUpperCase();
        
        if (val==="PP") {
            $('.payment-type-pp, .payment-type-icon-pp').removeClass('hide');
            $('.payment-type-cc, .payment-type-icon-cc').addClass('hide');
        } else {
            $('.payment-type-cc, .payment-type-icon-cc').removeClass('hide');
            $('.payment-type-pp, .payment-type-icon-pp').addClass('hide');
        }
    });
    
    $(document).on('ifChanged', 'input[name="sameInfo"]', function(e) {
        var self = $(this),
            isChecked = self.is(':checked');

        if (isChecked === true) {
            $('input[name="sInfoFirstName"]').val($('input[name="bInfoFirstName"]').val());
            $('input[name="sInfoLastName"]').val($('input[name="bInfoLastName"]').val());
            $('input[name="sInfoStreetAddress1"]').val($('input[name="bInfoStreetAddress1"]').val());
            $('input[name="sInfoStreetAddress2"]').val($('input[name="bInfoStreetAddress2"]').val());
            $('input[name="sInfoCity"]').val($('input[name="bInfoCity"]').val());
            $('input[name="sInfoZipCode"]').val($('input[name="bInfoZipCode"]').val());
            $('select[name="sInfoCountry"]').val($('select[name="bInfoCountry"]').val()).trigger('change');
            $('select[name="sInfoState"]').val($('select[name="bInfoState"]').val());
        } else {
            $('input[name="sInfoFirstName"]').val('');
            $('input[name="sInfoLastName"]').val('');
            $('input[name="sInfoStreetAddress1"]').val('');
            $('input[name="sInfoStreetAddress2"]').val('');
            $('input[name="sInfoCity"]').val('');
            $('input[name="sInfoZipCode"]').val('');
            $('select[name="sInfoCountry"]').val('US').trigger('change');
            $('select[name="sInfoState"]').val('');
        }
        if ($('input[name="sInfoFirstName"]').val().length > 0) {
            $('input[name="sInfoFirstName"]').closest('.form-group').removeClass('has-error has-danger');
        }
        if ($('input[name="sInfoLastName"]').val().length > 0) {
            $('input[name="sInfoLastName"]').closest('.form-group').removeClass('has-error has-danger');
        }
        if ($('input[name="sInfoStreetAddress1"]').val().length > 0) {
            $('input[name="sInfoStreetAddress1"]').closest('.form-group').removeClass('has-error has-danger');
        }
        if ($('input[name="sInfoStreetAddress2"]').val().length > 0) {
            $('input[name="sInfoStreetAddress2"]').closest('.form-group').removeClass('has-error has-danger');
        }
        if ($('input[name="sInfoCity"]').val().length > 0) {
            $('input[name="sInfoCity"]').closest('.form-group').removeClass('has-error has-danger');
        }
        if ($('input[name="sInfoZipCode"]').val().length > 0) {
            $('input[name="sInfoZipCode"]').closest('.form-group').removeClass('has-error has-danger');
        }
        if ($('select[name="sInfoCountry"]').val().length > 0) {
            $('select[name="sInfoCountry"]').closest('.form-group').removeClass('has-error has-danger');
        }
        if ($('select[name="sInfoState"]').val().length > 0) {
            $('select[name="sInfoState"]').closest('.form-group').removeClass('has-error has-danger');
        }
    });
    
    $(document).on('ifChanged', 'input[name="samePaypalEmail"]', function(e) {
        var self = $(this),
            isChecked = self.is(':checked');

        if (isChecked === true) {
            $('input[name="PaypalEmail"]').val($('input[name="bInfoEmail"]').val());
        } else {
            $('input[name="PaypalEmail"]').val('');
        }
    });
    
    $.validator.addMethod('payformCardNumber', function (value, element, param) {
        var isValid = $.payform.validateCardNumber(value);
        if (isValid) {
            return true;
        } else {
            return false;
        }
    }, 'Credit card number is invalid.');

    $.validator.addMethod('payformCardCVV', function (value, element, param) {
        var isValid = $.payform.validateCardCVC(value);
        if (isValid) {
            return true;
        } else {
            return false;
        }
    }, 'Creadit card CVV is invalid.');

    $('#form_checkout').validate({
        focusInvalid: false,
        focusCleanup: true,
        errorClass: "has-error",
        errorElement: "div.control-input",
        rules: {
            bInfoFirstName: {
                required: true
            },
            bInfoLastName: {
                required: true
            },
            bInfoEmail: {
                required: true,
                email: true
            },
            bInfoContactNo: {
                required: true
            },
            bInfoStreetAddress1: {
                required: true
            },
            bInfoCity: {
                required: true
            },
            bInfoState: {
                required: true
            },
            bInfoZipCode: {
                required: true,
                digits: true
            },
            bInfoCountry: {
                required: true
            },
            sInfoFirstName: {
                required: true
            },
            sInfoLastName: {
                required: true
            },
            sInfoStreetAddress1: {
                required: true
            },
            sInfoCity: {
                required: true
            },
            sInfoState: {
                required: true
            },
            sInfoZipCode: {
                required: true,
                digits: true
            },
            sInfoCountry: {
                required: true
            },
            PaymentType: {
                required: true
            },
            CardName: {
                required: true
            },
            CardNum: {
                required: true,
                payformCardNumber: true
            },
            CardExpDateMonth: {
                required: true
            },
            CardExpDateYear: {
                required: true
            },
            CardCVV: {
                required: true,
                payformCardCVV: true
            },
            PaypalEmail: {
                required: true,
                email: true
            }
        },
        messages: {
            bInfoFirstName: {
                required: ''
            },
            bInfoLastName: {
                required: ''
            },
            bInfoEmail: {
                required: '',
                email: ''
            },
            bInfoContactNo: {
                required: ''
            },
            bInfoStreetAddress1: {
                required: ''
            },
            bInfoCity: {
                required: ''
            },
            bInfoState: {
                required: ''
            },
            bInfoZipCode: {
                required: '',
                digits: ''
            },
            bInfoCountry: {
                required: ''
            },
            sInfoFirstName: {
                required: ''
            },
            sInfoLastName: {
                required: ''
            },
            sInfoStreetAddress1: {
                required: ''
            },
            sInfoCity: {
                required: ''
            },
            sInfoState: {
                required: ''
            },
            sInfoZipCode: {
                required: '',
                digits: ''
            },
            sInfoCountry: {
                required: ''
            },
            PaymentType: {
                required: ''
            },
            CardName: {
                required: ''
            },
            CardNum: {
                required: '',
                payformCardNumber: ''
            },
            CardExpDateMonth: {
                required: ''
            },
            CardExpDateYear: {
                required: ''
            },
            CardCVV: {
                required: '',
                payformCardCVV: ''
            },
            PaypalEmail: {
                required: '',
                email: ''
            }
        },
        success: function(label) {
            // do something
        },
        submitHandler: function(form) {
            form.submit();
        },
        invalidHandler: function(form, validator) {
            validator.errorList[0].element.focus();
        },
    });

});

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
