
@extends('template.admin', ['type' => 1, 'menu' => 1])

@section('title', 'Dashboard')

@section('css')
<style>
            h1 {
                text-shadow: 1px 1px 0 #ffffff, 3px 3px 0 rgba(0,0,0,0.1);
            }
            .btn-info {
                text-shadow: 0.5px 0.5px 0 #5bc0de, 1.5px 1.5px 0 rgba(0,0,0,0.15);
            }
            .btn-info:hover {
                text-shadow: 0.5px 0.5px 0 #31b0d5, 1.5px 1.5px 0 rgba(0,0,0,0.15);
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
                        toastr.info('Wait a while, we\'re simultaneously uploading & processing.', 'Processing...');
                    },
                    done: function (e, data) {
                        if(data.result.status) {
                            toastr.success('Upload & process successful.', 'Congrats!');
                        } else {
                            toastr.error('Upload & process failed. Try again.', 'Ooops!');
                        }
                        $('.btn').prop('disabled', false);
                    },
                    fail: function (e, data) {
                        toastr.error('Upload & process failed. Try again.', 'Ooops!');
                        $('.btn').prop('disabled', false);
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
                        toastr.info('Wait a while, we\'re reuploading.', 'Processing...');
                    },
                    done: function (e, data) {
                        if(data.result.status) {
                            toastr.success('Reupload successful.', 'Congrats!');
                        } else {
                            toastr.error('Reupload failed. Try again.', 'Ooops!');
                        }
                        $('.btn').prop('disabled', false);
                    },
                    fail: function (e, data) {
                        toastr.error('Reupload failed. Try again.', 'Ooops!');
                        $('.btn').prop('disabled', false);
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
                            toastr.info('Wait a while, we\'re reprocessing.', 'Processing...');
                        },
                        success: function() { },
                        error: function() {
                            toastr.error('Reprocess failed. Try again.', 'Ooops!');
                            $('.btn').prop('disabled', false);
                        },
                    }).done(function(data) {
                        if(data.result.status) {
                            toastr.success('Reprocess successful.', 'Congrats!');
                        } else {
                            toastr.error('Reprocess failed. Try again.', 'Ooops!');
                        }
                        $('.btn').prop('disabled', false);
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
            });
        </script>
@endsection

@section('content')
    <h1>Manage Prices</h1>
    <br/>
    <h3>Wristband Prices</h3>
    <button type="button" class="btn btn-info btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceWB" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></button>
    <button type="button" class="btn btn-info btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceWB" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></button>
    <?php $filesWB = Storage::disk('upload-csv-price-wristband')->allFiles('/'); ?>
    <button id="reprocessPriceWB" type="button" class="btn btn-info" @if(count($filesWB) != 1) disabled="disabled" @endif><i class="fa fa-retweet"></i> Reprocess</button>
    <br/><br/>
    <h3>Add-on Prices</h3>
    <button type="button" class="btn btn-info btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceAO" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></button>
    <button type="button" class="btn btn-info btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceAO" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></button>
    <?php $filesAO = Storage::disk('upload-csv-price-addon')->allFiles('/'); ?>
    <button type="button" class="btn btn-info" @if(count($filesAO) != 1) disabled="disabled" @endif><i class="fa fa-retweet"></i> Reprocess</button>
@endsection
