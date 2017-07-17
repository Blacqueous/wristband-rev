
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
    <style>
        .btn {
            margin-bottom: 5px;
        }
        hr {
            margin-bottom: 0px;
            border-top: 1px dotted #ccc;
        }
    </style>
    <h1>Manage Prices</h1>

    <div class="col-md-2 col-md-offset-5 col-xs-4 col-xs-offset-4"><hr/></div>
    <div class="col-xs-12">
        <h3>Wristband Prices</h3>
        <label class="btn btn-teal btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceWB" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
        <label class="btn btn-teal btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceWB" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
        <button id="reprocessPriceWB" type="button" class="btn btn-teal"><i class="fa fa-retweet"></i> Reprocess</button>
        <a id="downloadPriceWB" href="{{ URL::to('admin/prices/downloadWB') }}" class="btn btn-default" data-toggle="confirmation" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
    </div>

    <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2"><hr/></div>
    <div class="col-xs-12">
        <h3 style="width:auto;">Add-on Prices</h3>
        <label class="btn btn-teal btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceAO" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
        <label class="btn btn-teal btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceAO" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
        <button id="reprocessPriceAO" type="button" class="btn btn-teal"><i class="fa fa-retweet"></i> Reprocess</button>
        <a id="downloadPriceAO" href="{{ URL::to('admin/prices/downloadAO') }}" class="btn btn-default" data-toggle="confirmation" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
    </div>

    <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2"><hr/></div>
    <div class="col-xs-12">
        <h3 style="width:auto;">Shipping Prices (Domestic)</h3>
        <label class="btn btn-teal btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceSPD" type="file" class="btn" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
        <label class="btn btn-teal btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceSPD" type="file" class="btn" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
        <button id="reprocessPriceSPD" type="button" class="btn btn-teal"><i class="fa fa-retweet"></i> Reprocess</button>
        <a id="downloadPriceSPD" href="{{ URL::to('admin/prices/downloadSPD') }}" class="btn btn-default" data-toggle="confirmation-min" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
    </div>

    <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2"><hr/></div>
    <div class="col-xs-12">
        <h3 style="width:auto;">Shipping Prices (International)</h3>
        <label class="btn btn-teal btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPriceSPI" type="file" class="btn" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
        <label class="btn btn-teal btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPriceSPI" type="file" class="btn" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
        <button id="reprocessPriceSPI" type="button" class="btn btn-teal"><i class="fa fa-retweet"></i> Reprocess</button>
        <a id="downloadPriceSPI" href="{{ URL::to('admin/prices/downloadSPI') }}" class="btn btn-default" data-toggle="confirmation-min" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
    </div>

    <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2"><hr/></div>
    <div class="col-xs-12">
        <h3 style="width:auto;">Production Prices</h3>
        <label class="btn btn-teal btn-file"><i class="fa fa-gears"></i> Upload & Process<input id="uploadPricePD" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
        <label class="btn btn-teal btn-file"><i class="fa fa-star"></i> Reupload<input id="reuploadPricePD" type="file" class="btn" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></label>
        <button id="reprocessPricePD" type="button" class="btn btn-teal"><i class="fa fa-retweet"></i> Reprocess</button>
        <a id="downloadPricePD" href="{{ URL::to('admin/prices/downloadPD') }}" class="btn btn-default" data-toggle="confirmation-min" data-placement="top" data-trigger="hover"><i class="fa fa-download"></i> Download Format</a>
    </div>

    <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2"><hr/></div>
    <div class="col-xs-12">
        <h3 style="width:auto;">Molding Fee Price</h3>
        <div class=" col-md-offset-3 col-md-6">
            <div class="col-md-7" style="padding-right: 7.5px; padding-left: 7.5px;">
                <input class="form-control text-center" type="text" id="priceMF" name="price-molding-fee" placeholder="Input molding fee" value="{{ $molding_fee }}" />&nbsp;&nbsp;&nbsp;
            </div>
            <div class="col-md-5" style="padding-right: 7.5px; padding-left: 7.5px;">
                <button id="updatePriceMF" type="button" class="col-xs-12 btn btn-warning"><i class="fa fa-edit"></i> Update</button>
            </div>
        </div>
    </div>

    <div class="col-xs-12" style="margin-bottom: 100px;"></div>
@endsection
