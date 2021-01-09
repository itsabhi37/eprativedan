<?php include_once('include/header.php') ?>

<body>
    <?php include_once('include/leftmenu.php') ?>
    <?php include_once('include/headmenu.php') ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url('home') ?>">Dashboard</a>
                <a class="breadcrumb-item" href="#">SDO Reports</a>
                <span class="breadcrumb-item active">ES Parameters Reports</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Essential Supply Parameters Reports</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Essential Supply Parameters Report Section</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                echo form_open_multipart('superadmin/dashboard/show_sdo_report', 'data-parsley-validate');
                ?>
                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="row mg-t-25">
                <div class="col-xl-1"></div>
                    <div class="col-xl-6">
                        <div class="form-layout form-layout-4">
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Date: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="date" name="txtDate" class="form-control" placeholder="Date" required>
                                </div>
                            </div><!-- row -->
                            <div class="form-layout-footer mg-t-30">
                                <button class="btn btn-teal text-capitalize"> Show Data</button>
                                <a class="btn btn-secondary text-capitalize" href="<?= base_url('superadmin/dashboard/sdo_report') ?>">Cancel</a>
                            </div><!-- form-layout-footer -->
                        </div><!-- form-layout -->
                        <p class="mg-t-15 text-danger tx-italic tx-12 tx-bold">1. * are Required fields.</p>
                    </div><!-- col-6 -->
                    <div class="col-xl-4 mg-t-20 mg-md-t-0 text-center">
                        <div class="card bd-1" style="border-color:#00B297;">
                            <div class="card-body bg-teal tx-white">
                                <h6 class="tx-18 mg-b-3 tx-white">Report Date</h6>
                                <span class="tx-15 tx-white-8 tx-bold"><?php echo $showdateonCard; ?></span>
                            </div><!-- card-body -->
                            <i class="fa fa-calendar tx-74 tx-teal mt-2 mb-2"></i>
                        </div><!-- card -->
                    </div><!-- col -->
                </div><!-- row -->
                <!-- If Error Occurs Message Show in this Section-->
                <?php if ($error = $this->session->flashdata('error')) : ?>
                    <div id="errordismiss" class="mt-2 alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-close alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                            <span><strong>Error!</strong> <?php echo $error; ?></span>
                        </div><!-- d-flex -->
                    </div>
                <?php endif; ?>

                <!-- If Success then Message Show in this Section-->
                <?php if ($success = $this->session->flashdata('success')) : ?>
                    <div id="successdismiss" class="mt-2 alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                            <span><strong>Success!</strong> <?php echo $success; ?></span>
                        </div><!-- d-flex -->
                    </div>
                <?php endif; ?>
                </form>

                <div class="bd bd-r-1-force rounded table-responsive mt-4" style="overflow-x: scroll;">
                    <table class="table table-bordered mg-b-0" id="truenat">
                        <thead class="thead-colored thead-teal">
                            <tr>
                                <th class="text-capitalize text-center">Sl. No.</th>
                                <th class="text-capitalize text-center">Number of Passes issued to Grocery Shop</th>
                                <th class="text-capitalize text-center">Number of Passes issued to Fruits & Vegetable vendors</th>
                                <th class="text-capitalize text-center">Number of Passes issued to Media</th>
                                <th class="text-capitalize text-center">Number of Passes issued to Medicine Shops</th>
                                <th class="text-capitalize text-center">Number of Passes issued to wholesale stockists/ C&F for 1, 2 & 4 no. fields</th>
                                <th class="text-capitalize text-center">Number of Passes issued to those in supply chain of print media</th>
                                <th class="text-capitalize text-center">Number of Passes issued for transportation of goods</th>
                                <th class="text-capitalize text-center">Number of Passes issued to fair price shops</th>
                                <th class="text-capitalize text-center">Number of Passes issued to milk shops</th>
                                <th class="text-capitalize text-center">Number of Passes issued to shops selling other notified essentials</th>
                                <th class="text-capitalize text-center">Number of Passes issued for services like electricity, water supply, telecommunications, municipality and administration</th>
                                <th class="text-capitalize text-center">Number of officials monitoring all the above</th>
                                <th class="text-capitalize text-center">Number of days of inventory of Flour</th>
                                <th class="text-capitalize text-center">Number of days of inventory of Pulses</th>
                                <th class="text-capitalize text-center">Number of days of inventory of Salt</th>
                                <th class="text-capitalize text-center">Number of days of inventory of Sugar</th>
                                <th class="text-capitalize text-center">Number of days of inventory of Edible Oil</th>
                                <th class="text-capitalize text-center">Number of persons issued passes for Home delivery</th>
                            </tr>
                            
                        </thead>
                       <tbody>
                            <?php if (count($todayEntries)) { ?>
                                <?php $sln = 0;
                                foreach ($todayEntries as $tod) {
                                    $sln = $sln + 1; ?>
                                    <tr class="text-inverse">
                                        <td class="text-center"><?php echo $sln; ?></td>
                                        <td class="text-center"><?php echo $tod->piGroceryShop; ?></td>
                                        <td class="text-center"><?php echo $tod->piFruitVegVendor; ?></td>
                                        <td class="text-center"><?php echo $tod->piMedia; ?></td>
                                        <td class="text-center"><?php echo $tod->piMedicalShop; ?></td>
                                        <td class="text-center"><?php echo $tod->piWStockist; ?></td>
                                        <td class="text-center"><?php echo $tod->piPrintMedia; ?></td>
                                        <td class="text-center"><?php echo $tod->piTranspGoods; ?></td>
                                        <td class="text-center"><?php echo $tod->piFPS; ?></td>
                                        <td class="text-center"><?php echo $tod->piMilkShop; ?></td>
                                        <td class="text-center"><?php echo $tod->piShopONE; ?></td>
                                        <td class="text-center"><?php echo $tod->piEssentialServices; ?></td>
                                        <td class="text-center"><?php echo $tod->noMonOfficial; ?></td>
                                        <td class="text-center"><?php echo $tod->ndiFlour; ?></td>
                                        <td class="text-center"><?php echo $tod->ndiPulse; ?></td>
                                        <td class="text-center"><?php echo $tod->ndiSalt; ?></td>
                                        <td class="text-center"><?php echo $tod->ndiSugar; ?></td>
                                        <td class="text-center"><?php echo $tod->ndiEdOil; ?></td>
                                        <td class="text-center"><?php echo $tod->noPersonIpHomeDelivery; ?></td>
                                        
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="19" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                        </tbody>
                        <!--Table Footer-->
                        <thead class="thead-colored thead-teal">
                                <?php 
                                if(count($todayEntries)){
                                    //variable declaration
                                $piGroceryShop=0;
                                $piFruitVegVendor=0;
                                $piMedia=0;
                                $piMedicalShop=0;
                                $piWStockist=0;
                                $piPrintMedia=0;
                                $piTranspGoods=0;
                                $piFPS=0;
                                $piMilkShop=0;
                                $piShopONE=0;
                                $piEssentialServices=0;
                                $noMonOfficial=0;
                                $ndiFlour=0;
                                $ndiPulse=0;
                                $ndiSalt=0;
                                $ndiSugar=0;
                                $ndiEdOil=0;
                                $noPersonIpHomeDelivery=0;
                                
                                   
                               
                                    //total count
                                foreach ($todayEntries as $tod) {
                                   $piGroceryShop+=$tod->piGroceryShop;
                                   $piFruitVegVendor+=$tod->piFruitVegVendor;
                                   $piMedia+=$tod->piMedia;
                                   $piMedicalShop+=$tod->piMedicalShop;
                                   $piWStockist+=$tod->piWStockist;
                                   $piPrintMedia+=$tod->piPrintMedia;
                                   $piTranspGoods+=$tod->piTranspGoods;
                                   $piFPS+=$tod->piFPS;
                                   $piMilkShop+=$tod->piMilkShop;
                                   $piShopONE+=$tod->piShopONE;
                                   $piEssentialServices+=$tod->piEssentialServices;
                                   $noMonOfficial+=$tod->noMonOfficial;
                                   $ndiFlour+=$tod->ndiFlour;
                                   $ndiPulse+=$tod->ndiPulse;
                                   $ndiSalt+=$tod->ndiSalt;
                                   $ndiSugar+=$tod->ndiSugar;
                                   $ndiEdOil+=$tod->ndiEdOil;
                                   $noPersonIpHomeDelivery+=$tod->noPersonIpHomeDelivery;
                                   
                                }
                            
                                     ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th class="text-capitalize text-center"><?php echo $piGroceryShop ?></th>
                                    <th class="text-capitalize text-center"><?php echo $piFruitVegVendor ?></th>
                                    <th class="text-capitalize text-center"><?php echo $piMedia ?></th>
                                    <th class="text-capitalize text-center"><?php echo $piMedicalShop ?></th>
                                    <th class="text-capitalize text-center"><?php echo $piWStockist ?></th>
                                    <th class="text-capitalize text-center"><?php echo $piPrintMedia ?></th>
                                    <th class="text-capitalize text-center"><?php echo $piTranspGoods ?></th>
                                    <th class="text-capitalize text-center"><?php echo $piFPS ?></th>
                                    <th class="text-capitalize text-center"><?php echo $piMilkShop ?></th>
                                    <th class="text-capitalize text-center"><?php echo $piShopONE ?></th>
                                    <th class="text-capitalize text-center"><?php echo $piEssentialServices ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noMonOfficial ?></th>
                                    <th class="text-capitalize text-center"><?php echo $ndiFlour ?></th>
                                    <th class="text-capitalize text-center"><?php echo $ndiPulse ?></th>
                                    <th class="text-capitalize text-center"><?php echo $ndiSalt ?></th>
                                    <th class="text-capitalize text-center"><?php echo $ndiSugar ?></th>
                                    <th class="text-capitalize text-center"><?php echo $ndiEdOil ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noPersonIpHomeDelivery ?></th>
                                </tr>
                                <?php } ?>
                            </thead>
                    </table>
                </div><!-- bd-0 -->
            </div><!-- br-section-wrapper -->
        </div><!-- br-mainpanel -->
        <?php include_once('include/footer.php'); ?>
    </div><!-- bd-0 -->
            </div><!-- br-section-wrapper -->
        </div><!-- br-mainpanel -->
        <?php include_once('include/footer.php'); ?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php include_once('include/footerscript.php'); ?>
</body>

</html> 