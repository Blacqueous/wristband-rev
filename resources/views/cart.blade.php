
@extends('template.layout')

@section('title', ' - Cart')

@section('css')
<!-- Toastr Notification plugin -->
    <link href="global/toastr/build/toastr.css" rel="stylesheet" type="text/css">
@endsection

@section('js')
<!-- Toastr Notification plugin -->
    <script src="global/toastr/build/toastr.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e) {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
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

        });
    </script>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <?php if(count($items) > 0): ?>

                <h1 class="cart-title text-center">ORDER SUMMARY</h1>

                <div class="cart-header col-xs-12">
                    <div class="col-sm-2 text-center hidden-sm hidden-xs">
                        OPTIONS
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        DESCRIPTION
                    </div>
                    <div class="col-sm-2 text-center hidden-sm hidden-xs">
                        SUBTOTAL
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="cart-summary col-xs-12">
                    <?php
                        $i = 1;
                        $len = count($items);
                        $total = 0;
                    ?>
                    @foreach($items as $key => $value)
                        <?php
                            $addClass = "";
                            if ($i == 1) {
                                $addClass = "list-first";
                            } else if ($i == $len) {
                                $addClass = "list-last";
                            }
                            $total += $value['total'];
                        ?>
                        <div class="summary-table {{ $addClass }}" style="position:relative;">
                            <span class="items cart-label-number label label-default">{{ $i }}</span>
                            <?php  $i++; ?>
                            <div class="col-sm-2 hidden-sm hidden-xs">
                                <div class="row" style="padding:25px 10px 0px 10px;">
                                    <button type="button" class="cartUpdate col-xs-12 btn btn-summary btn-warning" name="button" data-cart-token="{{ $key }}"><i class="fa fa-pencil"></i> Update</button>
                                    <button type="button" class="cartDelete col-xs-12 btn btn-summary btn-danger" name="button" data-cart-token="{{ $key }}"><i class="fa fa-trash"></i> Remove</button>
                                </div>
                            </div>
                            <div class="col-md-8 no-padding-left">
                                <div class="row" style="padding-top:25px;">
                                    <div class="summary-table-group">
                                        <div class="col-xs-9">
                                            <i class="fa fa-eye"></i>Style (<span class="value">{{ ucwords($value['style']) }}</span>)
                                        </div>
                                        <div class="col-xs-3 text-right">-</div>
                                    </div>
                                    <div id="summary-table-size" class="summary-table-group">
                                        <div class="col-xs-9">
                                            <?php
                                                switch($value['size']) {
                                                    case '0-25inch':
                                                        $value['size'] = "1/4 Inch";
                                                        break;
                                                    case '0-50inch':
                                                        $value['size'] = "1/2 Inch";
                                                        break;
                                                    case '0-75inch':
                                                        $value['size'] = "3/4 Inch";
                                                        break;
                                                    case '1-00inch':
                                                        $value['size'] = "1 Inch";
                                                        break;
                                                    case '1-50inch':
                                                        $value['size'] = "1 1/2 Inch";
                                                        break;
                                                    case '2-00inch':
                                                        $value['size'] = "2 Inch";
                                                        break;
                                                    default:
                                                        $value['size'] = "1/2 Inch";
                                                        break;
                                                }
                                            ?>
                                            <i class="fa fa-arrows-alt"></i>Size ({{ $value['size'] }})
                                        </div>
                                        <div class="col-xs-3 text-right">-</div>
                                    </div>
                                    @if(isset($value['items']))
                                        <div id="summary-table-wristbands" class="summary-table-group">
                                            <div class="col-xs-9">
                                                <i class="fa fa-circle-o-notch"></i>Wristbands ({{ $value['quantity'] }} x ${{ number_format($value['price'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($value['quantity'] * $value['price'], 2) }}
                                            </div>
                                        </div>
                                        @if(isset($value['items']['segmented']))
                                        <div id="summary-table-segmented" class="summary-table-group">
                                            <div class="col-xs-9">
                                                <i class="fa fa-life-ring"></i>Segmented Wristbands ({{ $value['items']['segmented']['quantity'] }} x ${{ number_format($value['items']['segmented']['price_addon'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($value['items']['segmented']['price_total'], 2) }}
                                            </div>
                                        </div>
                                        @endif
                                        @if(isset($value['items']['swirl']))
                                        <div id="summary-table-swirl" class="summary-table-group">
                                            <div class="col-xs-9">
                                                <i class="fa fa-life-ring"></i>Swirl Wristbands ({{ $value['items']['swirl']['quantity'] }} x ${{ number_format($value['items']['swirl']['price_addon'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($value['items']['swirl']['price_total'], 2) }}
                                            </div>
                                        </div>
                                        @endif
                                        @if(isset($value['items']['glow']))
                                        <div id="summary-table-glow" class="summary-table-group">
                                            <div class="col-xs-9">
                                                <i class="fa fa-life-ring"></i>Glow Wristbands ({{ $value['items']['glow']['quantity'] }} x ${{ number_format($value['items']['glow']['price_addon'], 2) }} each)
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                ${{ number_format($value['items']['glow']['price_total'], 2) }}
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    @if(isset($value['time_production']))
                                    <div id="summary-table-production" class="summary-table-group">
                                        <div class="col-xs-9">
                                            <i class="fa fa-dropbox"></i>Production ({{ $value['time_production']['days'] }} Days)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['time_production']['price'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($value['time_shipping']))
                                    <div id="summary-table-shipping" class="summary-table-group">
                                        <div class="col-xs-9">
                                            <i class="fa fa-truck"></i>Shipping ({{ $value['time_shipping']['days'] }} Days)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['time_shipping']['price'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @if(isset($value['texts']))
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-xs-12" style="padding-bottom:5px;">
                                        <i class="fa fa-file-text"></i>Text :
                                    </div>
                                    <!-- list -->
                                    @if(isset($value['texts']['front']))
                                    <div id="text-front" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Front ({{ $value['texts']['front']['quantity'] }} x ${{ number_format($value['texts']['front']['price'], 2) }} each)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['texts']['front']['total'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($value['texts']['back']))
                                    <div id="text-back" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Back ({{ $value['texts']['back']['quantity'] }} x ${{ number_format($value['texts']['back']['price'], 2) }} each)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['texts']['back']['total'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($value['texts']['continue']))
                                    <div id="text-continuous" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Continuous ({{ $value['texts']['continue']['quantity'] }} x ${{ number_format($value['texts']['continue']['price'], 2) }} each)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['texts']['continue']['total'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($value['texts']['inside']))
                                    <div id="text-inside" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Inside ({{ $value['texts']['inside']['quantity'] }} x ${{ number_format($value['texts']['inside']['price'], 2) }} each)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['texts']['inside']['total'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif
                                @if(isset($value['clips']))
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-xs-12" style="padding-bottom:5px;">
                                        <i class="fa fa-image"></i>Cliparts :
                                    </div>
                                    <!-- list -->
                                    @if(isset($value['clips']))
                                        @if(isset($value['clips']['logo']))
                                            @if(isset($value['clips']['logo']['front-start']))
                                            <div id="clipart-front-start" class="summary-table-group">
                                                <div class="col-xs-9 padding-left-25">
                                                    <i class="fa fa-angle-right"></i>Front (Start) ({{ $value['clips']['logo']['front-start']['quantity'] }} x ${{ number_format($value['clips']['logo']['front-start']['price'], 2) }} each)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($value['clips']['logo']['front-start']['total'], 2) }}
                                                </div>
                                            </div>
                                            @endif
                                            @if(isset($value['clips']['logo']['front-end']))
                                            <div id="clipart-front-end" class="summary-table-group">
                                                <div class="col-xs-9 padding-left-25">
                                                    <i class="fa fa-angle-right"></i>Front (End) ({{ $value['clips']['logo']['front-end']['quantity'] }} x ${{ number_format($value['clips']['logo']['front-end']['price'], 2) }} each)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($value['clips']['logo']['front-end']['total'], 2) }}
                                                </div>
                                            </div>
                                            @endif
                                            @if(isset($value['clips']['logo']['back-start']))
                                            <div id="clipart-back-start" class="summary-table-group">
                                                <div class="col-xs-9 padding-left-25">
                                                    <i class="fa fa-angle-right"></i>Back (Start) ({{ $value['clips']['logo']['back-start']['quantity'] }} x ${{ number_format($value['clips']['logo']['back-start']['price'], 2) }} each)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($value['clips']['logo']['back-start']['total'], 2) }}
                                                </div>
                                            </div>
                                            @endif
                                            @if(isset($value['clips']['logo']['back-end']))
                                            <div id="clipart-back-end" class="summary-table-group">
                                                <div class="col-xs-9 padding-left-25">
                                                    <i class="fa fa-angle-right"></i>Back (End) ({{ $value['clips']['logo']['back-end']['quantity'] }} x ${{ number_format($value['clips']['logo']['back-end']['price'], 2) }} each)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($value['clips']['logo']['back-end']['total'], 2) }}
                                                </div>
                                            </div>
                                            @endif
                                            @if(isset($value['clips']['logo']['cont-start']))
                                            <div id="clipart-cont-start" class="summary-table-group">
                                                <div class="col-xs-9 padding-left-25">
                                                    <i class="fa fa-angle-right"></i>Continuous (Start) ({{ $value['clips']['logo']['cont-start']['quantity'] }} x ${{ number_format($value['clips']['logo']['cont-start']['price'], 2) }} each)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($value['clips']['logo']['cont-start']['total'], 2) }}
                                                </div>
                                            </div>
                                            @endif
                                            @if(isset($value['clips']['logo']['cont-end']))
                                            <div id="clipart-cont-end" class="summary-table-group">
                                                <div class="col-xs-9 padding-left-25">
                                                    <i class="fa fa-angle-right"></i>Continuous (End) ({{ $value['clips']['logo']['cont-end']['quantity'] }} x ${{ number_format($value['clips']['logo']['cont-end']['price'], 2) }} each)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($value['clips']['logo']['cont-end']['total'], 2) }}
                                                </div>
                                            </div>
                                            @endif
                                            @if(isset($value['clips']['logo']['front-center']))
                                            <div id="clipart-front-center" class="summary-table-group">
                                                <div class="col-xs-9 padding-left-25">
                                                    <i class="fa fa-angle-right"></i>Center ({{ $value['clips']['logo']['front-center']['quantity'] }} x ${{ number_format($value['clips']['logo']['front-center']['price'], 2) }} each)
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    ${{ number_format($value['clips']['logo']['front-center']['total'], 2) }}
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                                @endif
                                @if(isset($value['addon']))
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-xs-12" style="padding-bottom:5px;">
                                        <i class="fa fa-plus-circle"></i>Add Ons :
                                    </div>
                                    <!-- list -->
                                    @if(isset($value['addon']['3mm-thick']))
                                    <div id="addon-3mm-thick" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>3mm Thick ({{ $value['addon']['3mm-thick']['quantity'] }} x ${{ number_format($value['addon']['3mm-thick']['price'], 2) }} each)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['addon']['3mm-thick']['total'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($value['addon']['digital-proof']))
                                    <div id="addon-digital-proof" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Digital Proof ({{ $value['addon']['digital-proof']['quantity'] }} x ${{ number_format($value['addon']['digital-proof']['price'], 2) }} each)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['addon']['digital-proof']['total'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($value['addon']['eco-friendly']))
                                    <div id="addon-eco-friendly" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Eco Friendly ({{ $value['addon']['eco-friendly']['quantity'] }} x ${{ number_format($value['addon']['eco-friendly']['price'], 2) }} each)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['addon']['eco-friendly']['total'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($value['addon']['glitters']))
                                    <div id="addon-glitters" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Glitter ({{ $value['addon']['glitters']['quantity'] }} x ${{ number_format($value['addon']['glitters']['price'], 2) }} each)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['addon']['glitters']['total'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($value['addon']['individual']))
                                    <div id="addon-individual" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Individual ({{ $value['addon']['individual']['quantity'] }} x ${{ number_format($value['addon']['individual']['price'], 2) }} each)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['addon']['individual']['total'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($value['addon']['key-chain']))
                                    <div id="addon-key-chain" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Keychain ({{ $value['addon']['key-chain']['quantity'] }} x ${{ number_format($value['addon']['key-chain']['price'], 2) }} each)
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            ${{ number_format($value['addon']['key-chain']['total'], 2) }}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif
                                @if($value['free']['key-chain']['quantity'] > 0 || $value['free']['wristbands']['quantity'] > 0)
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-xs-12" style="padding-bottom:5px;">
                                        <i class="fa fa-gift"></i>Free :
                                    </div>
                                    <!-- list -->
                                    @if( $value['free']['key-chain']['quantity'] > 0)
                                    <div id="free-key-chain" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Keychain (+{{ $value['free']['key-chain']['quantity'] }})
                                        </div>
                                        <div class="col-xs-3 text-right">-</div>
                                    </div>
                                    @endif
                                    @if( $value['free']['wristbands']['quantity'] > 0)
                                    <div id="free-wristband" class="summary-table-group">
                                        <div class="col-xs-9 padding-left-25">
                                            <i class="fa fa-angle-right"></i>Wristband (+{{ $value['free']['wristbands']['quantity'] }})
                                        </div>
                                        <div class="col-xs-3 text-right">-</div>
                                    </div>
                                    @endif
                                </div>
                                @endif
                                <div class="row" style="padding:10px 0px 20px 0px;"></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-2 text-right no-padding">
                                <div class="col-md-12 hidden-md hidden-lg" style="padding-bottom: 15px;">
                                    <button type="button" class="cartUpdate col-xs-12 btn btn-summary btn-warning" name="button" data-cart-token="{{ $key }}"><i class="fa fa-pencil"></i> Update</button>
                                    <button type="button" class="cartDelete col-xs-12 btn btn-summary btn-danger" name="button" data-cart-token="{{ $key }}"><i class="fa fa-trash"></i> Remove</button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-12 hidden-md hidden-lg" style="background-color: #325277; border-bottom: 1px solid #9E9E9E; color: #fff; padding: 0px 0px 5px 0px;">
                                    <div class="clearfix"></div>
                                    <div class="col-sm-6 no-padding-right">
                                        <h1 class="text-center">TOTAL : </h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <h1 class="text-center">${{ number_format($value['total'], 2) }}</h1>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-sm-12 text-center hidden-sm hidden-xs">
                                    <h3 style="margin-top:25px;">${{ number_format($value['total'], 2) }}</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                </div>
                <div class="cart-total col-xs-12">

                    <div class="col-md-12 hidden-md hidden-lg">
                        <div class="clearfix"></div>
                        <div class="col-sm-6">
                            <h1 class="text-center">GRAND TOTAL : </h1>
                        </div>
                        <div class="col-sm-6">
                            <h1 class="text-center">${{ number_format($total, 2) }}</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-sm-12 hidden-sm hidden-xs">
                        <div class="col-xs-6">
                            <h1 style="margin-top: 10px;">GRAND TOTAL : </h1>
                        </div>
                        <div class="col-xs-6 text-right">
                            <h1 style="margin-top: 10px;">${{ number_format($total, 2) }}</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="cart-submit-options col-xs-12">
                    <button class="btn btn-submit btn-submit-lg pull-right">SUBMIT ORDER</button>
                </div>
            <?php else : ?>
                <div class="container">
                    <div class="row text-center">
                        <br/>
                        <h1>CART IS EMPTY</h1>
                        <br/>
                        <a href="/order" class="btn btn-xs btn-secondary btn-cart" style="font-size:18px;margin-bottom:10px;padding:0px;">Click here to start your Order!</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <br/>
        <div class="clearfix"></div>
    </div>
    <!-- end container -->

@endsection
