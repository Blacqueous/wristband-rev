
@extends('template.admin', ['type' => 1])

@section('title', 'Dashboard')

@section('css')
<style>
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
                    url: "/admin/prices/uploadWB",
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
                            toastr.success('Process successful.', 'Congrats!');
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
                            toastr.success('Process successful.', 'Congrats!');
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
    <h3><i class="fa fa-upload"></i> Update Wristband Prices</h3>
    <button type="button" class="btn btn-primary btn-file clipartup">Select & Process<input id="uploadPriceWB" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></button>
    <br/><br/>
    <h3><i class="fa fa-upload"></i> Update Add-on Prices</h3>
    <button type="button" class="btn btn-warning btn-file clipartup">Select & Process<input id="uploadPriceAO" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></button>
@endsection
