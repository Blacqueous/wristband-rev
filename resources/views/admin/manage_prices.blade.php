
@extends('template.admin', ['type' => 1, 'menu' => 1])

@section('title', 'Dashboard')

@section('css')
<!--  -->
        <link href="{{ URL::asset('css/admin.pages.css') }}" rel="stylesheet">
@endsection

@section('js')
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
        <script src="{{ URL::asset('global/jquery-file-upload/js/vendor/jquery.ui.widget.js') }}"></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="{{ URL::asset('global/jquery-file-upload/js/jquery.iframe-transport.js') }}"></script>
        <!-- The basic File Upload plugin -->
        <script src="{{ URL::asset('global/jquery-file-upload/js/jquery.fileupload.js') }}"></script>
        <!--  -->
        <script src="{{ URL::asset('js/admin.prices.js') }}"></script>
@endsection

@section('content')
    <h1>Manage Prices</h1>
    <br/>
    <h3>Wristband Prices</h3>
    <label class="btn btn-teal btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceWB" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
    <label class="btn btn-teal btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceWB" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
    <button id="reprocessPriceWB" type="button" class="btn btn-teal"><i class="fa fa-retweet"></i> Reprocess</button>
    <a id="downloadPriceWB" href="{{ URL::to('admin/prices/downloadWB') }}" class="btn btn-default" data-toggle="confirmation" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
    <br/><br/>
    <h3 style="width:auto;">Add-on Prices</h3>
    <label class="btn btn-teal btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceAO" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
    <label class="btn btn-teal btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceAO" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
    <button id="reprocessPriceAO" type="button" class="btn btn-teal"><i class="fa fa-retweet"></i> Reprocess</button>
    <a id="downloadPriceAO" href="{{ URL::to('admin/prices/downloadAO') }}" class="btn btn-default" data-toggle="confirmation" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
    <br/><br/>
    <h3 style="width:auto;">Shipping Prices</h3>
    <label class="btn btn-teal btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceSP" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
    <label class="btn btn-teal btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceSP" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
    <button id="reprocessPriceSP" type="button" class="btn btn-teal"><i class="fa fa-retweet"></i> Reprocess</button>
    <a id="downloadPriceSP" href="{{ URL::to('admin/prices/downloadSP') }}" class="btn btn-default" data-toggle="confirmation" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
    <br/><br/>
    <h3 style="width:auto;">Production Prices</h3>
    <label class="btn btn-teal btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPricePD" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
    <label class="btn btn-teal btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPricePD" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
    <button id="reprocessPricePD" type="button" class="btn btn-teal"><i class="fa fa-retweet"></i> Reprocess</button>
    <a id="downloadPricePD" href="{{ URL::to('admin/prices/downloadPD') }}" class="btn btn-default" data-toggle="confirmation" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
@endsection
