<div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
    <div class="col-xs-3 col-sm-2 offerpv float-left">Step <span class="sRename">3</span></div>
    <div class="col-xs-9 col-sm-10 offer-details float-left">Select Wristband Color and  Quantity <i>(*Minimum of 20)</i> </div>
    <div class="clearfix"></div>
</div>

<div id="wrist_color_container" class="wrist_color_container">

    <ul class="nav nav-pills js-color">
        <li class="active" data-color-style="solid">
            <a data-toggle="pill" href="#solid_tab" data-value="0">Solid</a>
        </li>
        <li data-color-style="segmented">
            <a data-toggle="pill" href="#segmented_tab" data-value="0.01">Segmented</a>
        </li>
        <li data-color-style="swirls">
            <a data-toggle="pill" href="#swirl_tab" data-value="0.01">Swirls</a>
        </li>
        <li data-color-style="glow">
            <a data-toggle="pill" href="#glow_tab" data-value="0.03">Glow</a>
        </li>
    </ul>

    <!-- tab-content -->
    <div class="tab-content">
        <!-- #solid tab -->
        <div id="solid_tab" class="tab-pane fade in active js-color" data-value="0" data-color="Solid">
            <h3>Solid Colors</h3>
            <button id="addCustomSolid" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-4 box-color">
                    <img class="PreviewColorModal" src="assets/images/src/custom.png"/>
                    <button id="custom-color-button" data-toggle="modal" data-target="#ColorModal">Custom Color</button>
                    <!-- Modal -->
                    <div class="modal fade" id="ColorModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pick Custom Color</h4>
                                </div>
                                <div class="modal-body">
                                    <?php include "solid-color-template.php";?>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- End modal content -->
                        </div>
                    </div>
                    <!-- End modal div -->
                    <div class="clearfix"></div>
                    <div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input  type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
                    <div class="clearfix"></div>
                    <!-- Text color options -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color options -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content">
                        <div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>

                <div class="col-xs-4 box-color">
                    <img src="assets/images/src/solid/Black.png"/>
                        <div class="nocustom_pick">Black</div>
                        <div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Black" ref="000000" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
                        <div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Black"  ref="000000" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
                        <div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Black" ref="000000" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
                        <div class="clearfix"></div>
                        <!-- Text color options -->
                        <div class="color-text" style="display:none">
                            <div class="col-sm-1">
                                <?php // include "colorAdult-template.php";?>
                            </div>
                            <div class="col-sm-1">
                                <?php // include "colorMedium-template.php";?>
                            </div>
                            <div class="col-sm-1">
                                <?php // include "colorYouth-template.php";?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End text color options -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content">
                        <div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Black" ref="000000" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Black" ref="000000" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- End #solid tab -->

        <!-- #segmented tab -->
        <div id="segmented_tab" class="tab-pane fade js-color" data-value="0.01" data-color="Segmented">
            <h3>Segmented Colors</h3>
            <button id="addCustomSegmented" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-4 box-color">
                    <img class="segPreviewColorModal" src="assets/images/src/custom.png"/>
                    <button id="custom-color-button" data-toggle="modal" data-target="#ColorSegModal">Custom Color</button>
                    <!-- Modal -->
                    <div class="modal fade" id="ColorSegModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pick Custom Color</h4>
                                </div>
                                <div class="modal-body">
                                    <?php // include "segmented-color-template.php";?>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- End modal content -->
                        </div>
                    </div>
                    <!-- End modal div -->
                    <div class="clearfix"></div>
                    <div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
                    <div class="clearfix"></div>
                    <!-- Text color option -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content">
                        <div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>

                <div class="col-xs-4 box-color">
                    <img src="assets/images/src/segmented/BlackGreen.png"/>
                    <div class="nocustom_pick">Black Green</div>
                    <div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Black Green" ref="000000,0E9543" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Black Green" ref="000000,0E9543" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Black Green" ref="000000,0E9543"type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
                    <div class="clearfix"></div>
                    <!-- Text color options -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color options -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content">
                    <div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Black Green" ref="000000,0E9543" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Black Green" ref="000000,0E9543" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- End #segmented tab -->

        <!-- #swirl tab -->
        <div id="swirl_tab" class="tab-pane fade js-color" data-value="0.01" data-color="Swirls">
            <h3 style="width:auto;">Swirls Color</h3>
            <button id="addCustomSwirl" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-4 box-color">
                    <img class="swlPreviewColorModal" src="assets/images/src/custom.png"/>
                    <button id="custom-color-button" data-toggle="modal" data-target="#ColorSwirlModal">Custom Color</button>
                    <!-- Modal -->
                    <div class="modal fade" id="ColorSwirlModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pick Custom Color</h4>
                                </div>
                                <div class="modal-body">
                                    <?php // include "swirl-color-template.php";?>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- End modal content -->
                        </div>
                    </div>
                    <!-- End Modal Div -->
                    <div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
                    <div class="clearfix"></div>
                    <!-- Text color option -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php // include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php // include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content" style="display:none">
                        <div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>

                <div class="col-xs-4 box-color">
                    <img src="assets/images/src/swirl/BlackGreen.png"/>
                    <div class="nocustom_pick">Black Green</div>
                    <div class="col-xs-4 col-sm-4"><label>Adult Qty</label><input reftitle="Black Green" ref="021509,0C9040"  type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Black Green" ref="021509,0C9040" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Youth Qty</label><input reftitle="Black Green" ref="021509,0C9040" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
                    <div class="clearfix"></div>
                    <!-- Text color option -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color -->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content" style="display:none">
                        <div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Black Green" ref="021509,0C9040" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-4 col-sm-6"><label>Extra Large Qty</label><input reftitle="Black Green" ref="021509,0C9040" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- End #swirl tab -->

        <!-- #glow tab -->
        <div id="glow_tab" class="tab-pane fade js-color" data-value="0.03" data-color="Glow">
            <h3>Glow</h3>
            <div id="main-color-content" class="main-color-content">

                <div class="col-xs-4 box-color">
                    <img src="assets/images/src/glow/GlowDarkBLUE.png"/>
                    <div class="nocustom_pick">Blue</div>
                    <div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Glow Dark Blue"  ref="3886C4" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Glow Dark Blue"  ref="3886C4" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Glow Dark Blue"  ref="3886C4" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
                    <div class="clearfix"></div>
                    <!-- Start text color options -->
                    <div class="color-text" style="display:none">
                        <div class="col-sm-1">
                            <?php include "colorAdult-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php include "colorMedium-template.php";?>
                        </div>
                        <div class="col-sm-1">
                            <?php include "colorYouth-template.php";?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End text color options-->
                    <span class="view-more col-xs-12">View More Sizes</span>
                    <div class="show-content" style="display:none">
                        <div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Glow Dark Blue"  ref="3886C4" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
                        <div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Glow Dark Blue"  ref="3886C4" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End #glow tab -->
    </div>
    <!-- End tab-content -->
</div>
