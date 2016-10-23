<div class="row offer-bar margin-bootom-20 __web-inspector-hide-shortcut__">
    <div class="col-xs-3 col-sm-2 offerpv float-left">Step <span class="sRename">3</span></div>
    <div class="col-xs-9 col-sm-10 offer-details float-left">Select Wristband Color and  Quantity <i>(*Minimum of 20)</i> </div>
    <div class="clearfix"></div>
</div>

<div id="wrist_color_container" class="wrist_color_container">

    <div class="content">
        <div id="dual-fig-reg" class="tab-pane js-color" data-value="0.01" data-color="Dual">
            <h3>Dual Colors</h3>
            <button id="addCustomDual" class="btn-add-custom-color"><i class="fa fa-plus"></i> Add Custom Color</button>
            <div id="main-color-content" class="main-color-content">
                <div class="col-xs-4 box-color">
                    <img class="dualPreviewColorModal" src="assets/images/src/custom.png"/>
                    <button id="custom-color-button" data-toggle="modal" data-target="#ColorDualModal">Custom Color</button>
                    <!-- Modal -->
                    <div class="modal fade" id="ColorDualModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pick Custom Color</h4>
                                </div>
                                <div class="modal-body">
                                    <?php // include "dual-color-template.php";?>
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
                    <div class="col-xs-4 col-sm-4"><label>Adult Qty</label><input type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
                    <div class="col-xs-4 col-sm-4"><label>Youth Qty</label><input type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
                    <div class="clearfix"></div>
                    <!-- Start text color options -->
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
                        <div class="col-xs-4 col-sm-6"><label>Extra Large Qty</label><input type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
                    </div>
                </div>

					<div class="col-xs-4 box-color">
						<img src="assets/images/dual/Regular/BlackGreen.png"/>
						<div class="nocustom_pick">Black Green</div>
						<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Black Green" ref="000000,0E9543" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
						<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Black Green" ref="000000,0E9543" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
						<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Black Green" ref="000000,0E9543"type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
						<div class="clearfix"></div>
						<!---------Start text color option------------>
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
						<!-------End text color-------------->
						<span class="view-more col-xs-12">View More Sizes</span>
						<div class="show-content">
							<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Black Green" ref="000000,0E9543" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Black Green" ref="000000,0E9543" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
						</div>
					</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/GoldBlack.png"/>
							<div class="nocustom_pick">Gold Black</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Gold Black" ref="836F3D,000000" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Gold Black" ref="836F3D,000000" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Gold Black" ref="836F3D,000000" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Gold Black" ref="836F3D,000000" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Gold Black" ref="836F3D,000000" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/GreyBlack.png"/>
							<div class="nocustom_pick">Grey Black</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Grey Black"  ref="8D8F8C,000000" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Grey Black"  ref="8D8F8C,000000" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Grey Black"  ref="8D8F8C,000000" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Grey Black"  ref="8D8F8C,000000" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Grey Black"  ref="8D8F8C,000000" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/OrangeBlack.png"/>
							<div class="nocustom_pick">Orange Black</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Orange Black"  ref="EF6B01,000000" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Orange Black" ref="EF6B01,000000" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Orange Black" ref="EF6B01,000000" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Orange Black" ref="EF6B01,000000" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Orange Black" ref="EF6B01,000000" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/BlackYellow.png"/>
							<div class="nocustom_pick">Black Yellow</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Black Yellow" ref="000000,F2E80F" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Black Yellow" ref="000000,F2E80F" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input  reftitle="Black Yellow" ref="000000,F2E80F" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Black Yellow" ref="000000,F2E80F" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Black Yellow" ref="000000,F2E80F" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/BlueGrey.png"/>
							<div class="nocustom_pick">Blue Grey</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Blue Grey" ref="0B45BB,A0A29F" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Blue Grey" ref="0B45BB,A0A29F" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Blue Grey" ref="0B45BB,A0A29F" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Blue Grey" ref="0B45BB,A0A29F" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Blue Grey" ref="0B45BB,A0A29F" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/RedGreen.png"/>
							<div class="nocustom_pick">Red Green</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Red Green" ref="EA0D2C,0E9543" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Red Green" ref="EA0D2C,0E9543" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Red Green" ref="EA0D2C,0E9543" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Red Green" ref="EA0D2C,0E9543" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Red Green" ref="EA0D2C,0E9543" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/GreyRed.png"/>
							<div class="nocustom_pick">Grey Red</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Grey Red" ref="A0A29F,EA0D2C" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Grey Red" ref="A0A29F,EA0D2C" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Grey Red" ref="A0A29F,EA0D2C" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Grey Red" ref="A0A29F,EA0D2C" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Grey Red" ref="A0A29F,EA0D2C" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/RedYellow.png"/>
							<div class="nocustom_pick">Red Yellow</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Red Yellow" ref="EA0D2C,F2E80F" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Red Yellow" ref="EA0D2C,F2E80F" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Red Yellow" ref="EA0D2C,F2E80F" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Red Yellow" ref="EA0D2C,F2E80F" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Red Yellow" ref="EA0D2C,F2E80F" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/WhiteBlue.png"/>
							<div class="nocustom_pick">White Blue</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="White Blue" ref="EFEFE,0B45BB" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="White Blue" ref="EFEFE,0B45BB" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="White Blue" ref="EFEFE,0B45BB" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="White Blue" ref="EFEFE,0B45BB" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="White Blue"  ref="EFEFE,0B45BB" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/WhiteGreen.png"/>
							<div class="nocustom_pick">White Green</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="White Green" ref="FEFEFE,0E9543" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="White Green" ref="FEFEFE,0E9543" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="White Green" ref="FEFEFE,0E9543" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="White Green" ref="FEFEFE,0E9543" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="White Green" ref="FEFEFE,0E9543" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/LightBlueWhite.png"/>
							<div class="nocustom_pick">Light Blue White</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Light Blue White" ref="9ABFE5,FEFEFE" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Light Blue White" ref="9ABFE5,FEFEFE" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Light Blue White" ref="9ABFE5,FEFEFE" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Light Blue White" ref="9ABFE5,FEFEFE" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Light Blue White" ref="9ABFE5,FEFEFE" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/WhiteOrange.png"/>
							<div class="nocustom_pick">White Orange</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="White Orange" ref="FEFEFE,EF6B01" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="White Orange" ref="FEFEFE,EF6B01" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="White Orange" ref="FEFEFE,EF6B01" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="White Orange" ref="FEFEFE,EF6B01" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="White Orange" ref="FEFEFE,EF6B01" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/WhitePink.png"/>
							<div class="nocustom_pick">White Pink</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="White Pink" ref="FEFEFE,FB78B2" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="White Pink" ref="FEFEFE,FB78B2" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="White Pink" ref="FEFEFE,FB78B2" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="White Pink" ref="FEFEFE,FB78B2" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="White Pink"ref="FEFEFE,FB78B2" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/WhiteRed.png"/>
							<div class="nocustom_pick">White Red</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="White Red" ref="FEFEFE,EA0D2C" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="White Red" ref="FEFEFE,EA0D2C" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="White Red" ref="FEFEFE,EA0D2C" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="White Red" ref="FEFEFE,EA0D2C" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="White Red" ref="FEFEFE,EA0D2C" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
						<div class="col-xs-4 box-color">
							<img src="assets/images/dual/Regular/YellowBlue.png"/>
							<div class="nocustom_pick">Yellow Blue</div>
							<div class="col-xs-4 col-sm-4"><label>Adult Qty </label><input reftitle="Yellow Blue" ref="F2E80F,0B45BB" type="number" name="adult-qty" class="qtyin-adult-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Medium Qty</label><input reftitle="Yellow Blue" ref="F2E80F,0B45BB" type="number" name="medium-qty" class="qtyin-medium-qty" placeholder="0"/></div>
							<div class="col-xs-4 col-sm-4"><label>Youth Qty </label><input reftitle="Yellow Blue" ref="F2E80F,0B45BB" type="number" name="youth-qty" class="qtyin-youth-qty" placeholder="0"/></div>
							<div class="clearfix"></div>
							<!---------Start text color option------------>
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
							<!-------End text color-------------->
							<span class="view-more col-xs-12">View More Sizes</span>
							<div class="show-content">
								<div class="col-xs-4 col-sm-6"><label>Extra Small Qty</label><input reftitle="Yellow Blue" ref="F2E80F,0B45BB" type="number" name="xt-small-qty" class="xt-small-qty" placeholder="0"/></div>
								<div class="col-xs-4 col-sm-6"><label>Extra Large Qty </label><input reftitle="Yellow Blue" ref="F2E80F,0B45BB" type="number" name="xt-large-qty" class="xt-large-qty" placeholder="0"/></div>
							</div>
						</div>
							<div class="clearfix"></div>
					 </div>
					</div>
					<!-- End Segmented -->
					</div>
				  <!--	End Tab Content -->
				</div>
