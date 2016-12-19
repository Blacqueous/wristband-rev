$(document).ready(function(e) {
    // Event : upload wristbands prices
    $('#uploadPriceWB').fileupload({
        url: "/admin/prices/updateWB",
        dataType : 'json',
        maxNumberOfFiles : 1,
        formData: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        add : function(e, data) {
            var hasError = false;
            var acceptFileTypes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'];
            if(data.originalFiles[0]['type'].length && $.inArray((data.originalFiles[0]['type']).trim(), acceptFileTypes)<0) {
                hasError = true;
                toastr.error('Invalid format.', 'Ooops!');
            }
            if(hasError) {
                return false;
            } else {
                data.submit();
            }
        },
        start: function (e) {
            $('.btn').prop('disabled', true);
            $('.btn').addClass('disabled');
            toastr.info('Wait a while, we\'re simultaneously uploading & processing.', 'Processing...');
        },
        done: function (e, data) {
            if(data.result.status) {
                toastr.success('Upload & process successful.', 'Congrats!');
            } else {
                toastr.error('Upload & process failed. Try again.', 'Ooops!');
            }
            $('.btn').prop('disabled', false);
            $('.btn').removeClass('disabled');
        },
        fail: function (e, data) {
            toastr.error('Upload & process failed. Try again.', 'Ooops!');
            $('.btn').prop('disabled', false);
            $('.btn').removeClass('disabled');
        }
    });

    $('#reuploadPriceWB').fileupload({
        url: "/admin/prices/reuploadWB",
        dataType : 'json',
        maxNumberOfFiles : 1,
        formData: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        add : function(e, data) {
            var hasError = false;
            var acceptFileTypes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'];
            if(data.originalFiles[0]['type'].length && $.inArray((data.originalFiles[0]['type']).trim(), acceptFileTypes)<0) {
                hasError = true;
                toastr.error('Invalid format.', 'Ooops!');
            }
            if(hasError) {
                return false;
            } else {
                data.submit();
            }
        },
        start: function (e) {
            $('.btn').prop('disabled', true);
            $('.btn').addClass('disabled');
            toastr.info('Wait a while, we\'re reuploading.', 'Processing...');
        },
        done: function (e, data) {
            if(data.result.status) {
                toastr.success('Reupload successful.', 'Congrats!');
            } else {
                toastr.error('Reupload failed. Try again.', 'Ooops!');
            }
            $('.btn').prop('disabled', false);
            $('.btn').removeClass('disabled');
        },
        fail: function (e, data) {
            toastr.error('Reupload failed. Try again.', 'Ooops!');
            $('.btn').prop('disabled', false);
            $('.btn').removeClass('disabled');
        }
    });

    $('body').on('click', '#reprocessPriceWB', function(e) {
        $.ajax({
            type: 'POST',
            url: '/admin/prices/reprocessWB',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('.btn').prop('disabled', true);
                $('.btn').addClass('disabled');
                toastr.info('Wait a while, we\'re reprocessing.', 'Processing...');
            },
            success: function() { },
            error: function() {
                toastr.error('Reprocess failed. Try again.', 'Ooops!');
                $('.btn').prop('disabled', false);
                $('.btn').removeClass('disabled');
            },
        }).done(function(data) {
            data = $.parseJSON(data);
            if(data.status) {
                toastr.success('Reprocess successful.', 'Congrats!');
            } else {
                toastr.error('Reprocess failed. Try again.', 'Ooops!');
            }
            $('.btn').prop('disabled', false);
            $('.btn').removeClass('disabled');
        });
    });

    // -------------------------------------------------------------

    // Event : upload wristbands add-on
    $('#uploadPriceAO').fileupload({
        url: "/admin/prices/updateAO",
        dataType : 'json',
        maxNumberOfFiles : 1,
        formData: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        add : function(e, data) {
            var hasError = false;
            var acceptFileTypes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'];
            if(data.originalFiles[0]['type'].length && $.inArray((data.originalFiles[0]['type']).trim(), acceptFileTypes)<0) {
                hasError = true;
                toastr.error('Invalid format.', 'Ooops!');
            }
            if(hasError) {
                return false;
            } else {
                data.submit();
            }
        },
        start: function (e) {
            $('.btn').prop('disabled', true);
            toastr.info('Wait a while, we\'re updating.', 'Processing...');
        },
        done: function (e, data) {
            if(data.result.status) {
                toastr.success('Upload & process successful.', 'Congrats!');
            } else {
                toastr.error('Upload failed. Try again.', 'Ooops!');
            }
            $('.btn').prop('disabled', false);
        },
        fail: function (e, data) {
            toastr.error('Upload failed. Try again.', 'Ooops!');
            $('.btn').prop('disabled', false);
        }
    });

    $('#reuploadPriceAO').fileupload({
        url: "/admin/prices/reuploadAO",
        dataType : 'json',
        maxNumberOfFiles : 1,
        formData: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        add : function(e, data) {
            var hasError = false;
            var acceptFileTypes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'];
            if(data.originalFiles[0]['type'].length && $.inArray((data.originalFiles[0]['type']).trim(), acceptFileTypes)<0) {
                hasError = true;
                toastr.error('Invalid format.', 'Ooops!');
            }
            if(hasError) {
                return false;
            } else {
                data.submit();
            }
        },
        start: function (e) {
            $('.btn').prop('disabled', true);
            $('.btn').addClass('disabled');
            toastr.info('Wait a while, we\'re reuploading.', 'Processing...');
        },
        done: function (e, data) {
            if(data.result.status) {
                toastr.success('Reupload successful.', 'Congrats!');
            } else {
                toastr.error('Reupload failed. Try again.', 'Ooops!');
            }
            $('.btn').prop('disabled', false);
            $('.btn').removeClass('disabled');
        },
        fail: function (e, data) {
            toastr.error('Reupload failed. Try again.', 'Ooops!');
            $('.btn').prop('disabled', false);
            $('.btn').removeClass('disabled');
        }
    });

    $('body').on('click', '#reprocessPriceAO', function(e) {
        $.ajax({
            type: 'POST',
            url: '/admin/prices/reprocessAO',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('.btn').prop('disabled', true);
                $('.btn').addClass('disabled');
                toastr.info('Wait a while, we\'re reprocessing.', 'Processing...');
            },
            success: function() { },
            error: function() {
                toastr.error('Reprocess failed. Try again.', 'Ooops!');
                $('.btn').prop('disabled', false);
                $('.btn').removeClass('disabled');
            },
        }).done(function(data) {
            data = $.parseJSON(data);
            if(data.status) {
                toastr.success('Reprocess successful.', 'Congrats!');
            } else {
                toastr.error('Reprocess failed. Try again.', 'Ooops!');
            }
            $('.btn').prop('disabled', false);
            $('.btn').removeClass('disabled');
        });
    });

    // -------------------------------------------------------------

    $('[data-toggle=confirmation]').confirmation({
        title: 'Download Format',
        content: 'Choose a file extension:',
        onConfirm: function() {
            // alert('You choosed ' + extension);
            window.location.href = $(this).attr('href') + '?ext=' + extension;
        },
        onCancel: function() { },
        buttons: [
            {
                class: 'btn btn-default',
                label: '.csv',
                onClick: function() {
                    extension = 'csv';
                }
            },
            {
                class: 'btn btn-default',
                label: '.xls',
                onClick: function() {
                    extension = 'xls';
                }
            },
            {
                class: 'btn btn-default',
                label: '.xlsx',
                onClick: function() {
                    extension = 'xlsxx';
                }
            },
            {
                class: 'btn btn-danger',
                icon: 'glyphicon glyphicon-remove',
                cancel: true
            }
        ],
        popout: true,
        singleton: true,
        rootSelector: '[data-toggle=confirmation]',
    });

});
