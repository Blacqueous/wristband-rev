
@extends('template.admin', ['type' => 1, 'menu' => 1])

@section('title', 'Dashboard')

@section('css')
<style>
            h1 {
                text-shadow: 1px 1px 0 #ffffff, 3px 3px 0 rgba(0,0,0,0.1);
            }
            .btn-danger {
                text-shadow: 0.5px 0.5px 0 #d9534f, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-danger:hover {
                text-shadow: 0.5px 0.5px 0 #c9302c, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-default {
                text-shadow: 0.5px 0.5px 0 #ffffff, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-default:hover {
                text-shadow: 0.5px 0.5px 0 #e6e6e6, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-info {
                text-shadow: 0.5px 0.5px 0 #5bc0de, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-info:hover {
                text-shadow: 0.5px 0.5px 0 #31b0d5, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-primary {
                text-shadow: 0.5px 0.5px 0 #337ab7, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-primary:hover {
                text-shadow: 0.5px 0.5px 0 #286090, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-warning {
                background-color: #FFC107;
                border-color: #e6ae04;
                text-shadow: 0.5px 0.5px 0 #f0ad4e, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-warning:hover {
                background-color: #e6ad03;
                border-color: #ce9e0d;
                text-shadow: 0.5px 0.5px 0 #ec971f, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-blue {
                color: #fff;
                background-color: #2196f3;
                border-color: #1689e4;
                text-shadow: 0.5px 0.5px 0 #2196F3, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-blue:hover {
                color: #fff;
                background-color: #1080d8;
                border-color: #0d73c3;
                text-shadow: 0.5px 0.5px 0 #1080d8, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-teal {
                color: #fff;
                background-color: #00bcd4;
                border-color: #03a6bb;
                text-shadow: 0.5px 0.5px 0 #00bcd4, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-teal:hover {
                color: #fff;
                background-color: #01a2b7;
                border-color: #0A8898;
                text-shadow: 0.5px 0.5px 0 #01a2b7, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-file {
                position: relative;
                overflow: hidden;
            }
            .btn-file input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                min-width: 100%;
                min-height: 100%;
                filter: alpha(opacity=0);
                opacity: 0;
                outline: none;
                background: white;
                cursor: inherit;
                display: block;
            }
        </style>
@endsection

@section('js')
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
        <script src="{{ URL::asset('global/jquery-file-upload/js/vendor/jquery.ui.widget.js') }}"></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="{{ URL::asset('global/jquery-file-upload/js/jquery.iframe-transport.js') }}"></script>
        <!-- The basic File Upload plugin -->
        <script src="{{ URL::asset('global/jquery-file-upload/js/jquery.fileupload.js') }}"></script>

        <script type="text/javascript">
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
                    url: "/admin/prices/uploadAO",
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
        </script>
@endsection

@section('content')
    <h1>Manage Prices</h1>
    <br/>
    <h3>Wristband Prices</h3>
    <button type="button" class="btn btn-blue btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceWB" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></button>
    <button type="button" class="btn btn-blue btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceWB" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></button>
    <button id="reprocessPriceWB" type="button" class="btn btn-blue"><i class="fa fa-retweet"></i> Reprocess</button>
    <a id="downloadPriceWB" href="{{ URL::to('admin/prices/downloadWB') }}" class="btn btn-warning" data-toggle="confirmation" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
    <br/><br/>
    <h3 style="width:auto;">Add-on Prices</h3>
    <button type="button" class="btn btn-teal btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceAO" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></button>
    <button type="button" class="btn btn-teal btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceAO" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></button>
    <button id="reprocessPriceAO" type="button" class="btn btn-teal"><i class="fa fa-retweet"></i> Reprocess</button>
    <a id="downloadPriceAO" href="{{ URL::to('admin/prices/downloadAO') }}" class="btn btn-warning" data-toggle="confirmation" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
@endsection
