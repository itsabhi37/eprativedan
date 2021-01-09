<?php include_once('include/header.php') ?>

<body>
    <?php include_once('include/leftmenu.php') ?>
    <?php include_once('include/headmenu.php') ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url('home') ?>">Dashboard</a>
                <a class="breadcrumb-item" href="#">Entry Forms</a>
                <span class="breadcrumb-item active">Essential Supply Parameters</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Essential Supply Parameters</h4>
            
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Essential Supply Parameters Report Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/sdo/update_sdo_update', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/sdo/insert_sdo_update', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $esId                       =   $singleRecord->sId;
                        $epiGroceryShop             =   $singleRecord->piGroceryShop;
                        $epiFruitVegVendor          =   $singleRecord->piFruitVegVendor;
                        $epiMedia                   =   $singleRecord->piMedia;
                        $epiMedicalShop             =   $singleRecord->piMedicalShop;
                        $epiWStockist               =   $singleRecord->piWStockist;
                        $epiPrintMedia              =   $singleRecord->piPrintMedia;
                        $epiTranspGoods             =   $singleRecord->piTranspGoods;
                        $epiFPS                     =   $singleRecord->piFPS;
                        $epiMilkShop                =   $singleRecord->piMilkShop;
                        $epiShopONE                 =   $singleRecord->piShopONE;
                        $epiEssentialServices       =   $singleRecord->piEssentialServices;
                        $enoMonOfficial             =   $singleRecord->noMonOfficial;
                        $endiFlour                  =   $singleRecord->ndiFlour;
                        $endiPulse                  =   $singleRecord->ndiPulse;
                        $endiSalt                   =   $singleRecord->ndiSalt;
                        $endiSugar                  =   $singleRecord->ndiSugar;
                        $endiEdOil                  =   $singleRecord->ndiEdOil;
                        $enoPersonIpHomeDelivery    =   $singleRecord->noPersonIpHomeDelivery;
                        
                        
                        
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <!-- col-4-->
                    
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued to Grocery Shop<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piGroceryShop" name="piGroceryShop" value="' . $epiGroceryShop . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="sId" value="' . $esId . '" readonly="true" hidden="true">';
                                } else {
                                    echo '<input class="form-control" type="text" id="piGroceryShop" name="piGroceryShop" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued to Fruits & Vegetable vendors<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piFruitVegVendor" name="piFruitVegVendor" value="' . $epiFruitVegVendor . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="piFruitVegVendor" name="piFruitVegVendor" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued to Media<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piMedia" name="piMedia" value="' . $epiMedia . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="piMedia" name="piMedia" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued to Medicine Shops<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piMedicalShop" name="piMedicalShop" value="' . $epiMedicalShop . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="piMedicalShop" name="piMedicalShop" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued to wholesale stockists/ C&F for  1, 2 & 4 no. fields<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piWStockist" name="piWStockist" value="' . $epiWStockist . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="piWStockist" name="piWStockist" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued to those in supply chain of print media<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piPrintMedia" name="piPrintMedia" value="' . $epiPrintMedia . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="piPrintMedia" name="piPrintMedia" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued for transportation of goods<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piTranspGoods" name="piTranspGoods" value="' . $epiTranspGoods . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="piTranspGoods" name="piTranspGoods" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued to fair price shops<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piFPS" name="piFPS" value="' . $epiFPS . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="piFPS" name="piFPS" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued to milk shops<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piMilkShop" name="piMilkShop" value="' . $epiMilkShop . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="piMilkShop" name="piMilkShop" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued to shops selling other notified essentials<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piShopONE" name="piShopONE" value="' . $epiShopONE . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="piShopONE" name="piShopONE" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Passes issued for services like electricity, water supply, telecommunications, municipality and administration<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="piEssentialServices" name="piEssentialServices" value="' . $epiEssentialServices . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="piEssentialServices" name="piEssentialServices" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of officials monitoring all the above<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noMonOfficial" name="noMonOfficial" value="' . $enoMonOfficial . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noMonOfficial" name="noMonOfficial" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of days of inventory of Flour<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="ndiFlour" name="ndiFlour" value="' . $endiFlour . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="ndiFlour" name="ndiFlour" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of days of inventory of Pulses<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="ndiPulse" name="ndiPulse" value="' . $endiPulse . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="ndiPulse" name="ndiPulse" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of days of inventory of Salt<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="ndiSalt" name="ndiSalt" value="' . $endiSalt . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="ndiSalt" name="ndiSalt" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Number of days of inventory of Sugar<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="ndiSugar" name="ndiSugar" value="' . $endiSugar . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="ndiSugar" name="ndiSugar" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of days of inventory of Edible Oil<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="ndiEdOil" name="ndiEdOil" value="' . $endiEdOil . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="ndiEdOil" name="ndiEdOil" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of persons issued passes for Home delivery<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noPersonIpHomeDelivery" name="noPersonIpHomeDelivery" value="' . $enoPersonIpHomeDelivery . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noPersonIpHomeDelivery" name="noPersonIpHomeDelivery" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                         <!-- col-4-->
                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/sdo/sdo_update') ?>">Cancel</a>
                    </div><!-- form-group -->
                </div><!-- form-layout -->
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
                <p class="mg-t-10 text-danger tx-italic tx-12 tx-bold">1. Value fields accepts number only.<br />2. * are Required fields.</p>
                </form>
                <!-- <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-10">Bordered Table</h6>
          <p class="mg-b-25 mg-lg-b-50">Add borders on all sides of the table and cells.</p> -->
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
                                <th class="text-capitalize text-center">Action</th>
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
                                        
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/sdo/edit_sdo_update/' . $tod->sId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                                            </div>
                                        </td>
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="20" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
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
                                    <th class="text-capitalize text-center"></th>
                                </tr>
                                <?php } ?>
                            </thead>
                    </table>
            </div>
            </div><!-- br-section-wrapper -->
        </div><!-- br-mainpanel -->
        <?php include_once('include/footer.php'); ?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php include_once('include/footerscript.php'); ?>
</body>

<script>
    // Input Character Integer Only
    function isNumber(event) {
        if ((event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode === 13) {
            return true;
        } else {
            return false;
        }
    }

</script>
</html>