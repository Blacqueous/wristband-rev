
@extends('template.admin')

@section('title', 'Dashboard')

@section('css')
<style>
            .admin-navbar {
                /*position: absolute;
                top: 0px;
                right: 25px;
                padding: 0 25px;*/
            }
            .admin-navbar h2 {
                margin-top: 25px;
                color: #ddd;
            }
            .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
                border-radius: 5px 5px 0 0;
            }
            .tabs-danger {
                background-color: #d9534f !important;
                border: 1px solid #ddd !important;
                border-radius: 5px 5px 0 0 !important;
                color: #fff !important;
            }
            .tabs-danger:hover {
                background-color: #c9302c !important;
            }
            .tabs-right {
                position: absolute !important;
                right: 0px;
            }
            .tabs-right a {
                margin-left: 2px !important;
                margin-right: 0px !important;
            }
            .nav-tabs {
                position: relative;
            }
            .nav-tabs li.active:hover a {
                background-color: #286090;
            }
            .nav-pills>li+li {
                margin-left: 0px !important;
            }
        </style>
@endsection

@section('js')
<script type="text/javascript">
            var url_hash = document.location.hash;
            $(document).ready(function(e) {
                console.log(url_hash);
                // Javascript to enable link to tab
                if (url_hash.match('#')) {
                    $('.nav-tabs a[href="' + url_hash + '"]').tab('show');
                }

                // // Change hash for page-reload
                // $('.nav-tabs a').on('shown.bs.tab', function (e) {
                //     window.location.hash = e.target.hash;
                // });
            });
        </script>
@endsection

@section('content')
    <?php $user = Auth::guard('admin')->user(); ?>
    <div class="container">
        <div class="row">
            <div class="pull-right text-right admin-navbar hidden-xs">
                <h2><i class="fa fa-user-circle"></i> {{ $user->name }}</h2>
            </div>
            <h1>Admin Controls</h1>
            <ul class="nav nav-pills nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#tabprice">Price Upload</a></li>
                <li><a data-toggle="tab" href="#clearimages">Clear Temp Images</a></li>
                <li><a data-toggle="tab" href="#reset">Reset</a></li>
                <li><a class="tabs-danger" href="{{ URL::to('admin/logout') }}">Logout</a></li>
            </ul>
            <div class="col-xs-12">
                <div class="tab-content">
                    <div id="tabprice" class="tab-pane fade in active">
                        <h3>Price Upload</h3>
                        <p>Some content.</p>
                    </div>
                    <div id="clearimages" class="tab-pane fade">
                        <h3>Clear Temporary Images</h3>
                        <p>Some content in menu 1.</p>
                    </div>
                    <div id="reset" class="tab-pane fade">
                        <h3>Reset JSON</h3>
                        <p>Some content in menu 1.</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end container -->

@endsection
