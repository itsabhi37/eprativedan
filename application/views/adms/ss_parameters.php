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
                <span class="breadcrumb-item active">Social Security Parameters</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Social Security Parameters</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Today's Social Security Parameters Report Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/adms/update_ss_parameters', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/adms/insert_ss_parameters', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $esId                         =   $singleRecord->sId;
                        $eprcntPdsFGPrevMonth         =   $singleRecord->prcntPdsFGPrevMonth;
                        $eprcntPdsAnbFGPrevTwoMonth   =   $singleRecord->prcntPdsAnbFGPrevTwoMonth;
                        $eprcntPdsFGCurMonth          =   $singleRecord->prcntPdsFGCurMonth;
                        $enohDistrPdsFGPrevMonthNFSA  =   $singleRecord->nohDistrPdsFGPrevMonthNFSA;
                        $enohDistrPdsFGCurMonthNFSA   =   $singleRecord->nohDistrPdsFGCurMonthNFSA;
                        $enopBenANBRicePrevTwoMonth   =   $singleRecord->nopBenANBRicePrevTwoMonth;
                        $enohDistFGPrevTwoMonthANB    =   $singleRecord->nohDistFGPrevTwoMonthANB;
                        $enohDistFG10KGLastMonth      =   $singleRecord->nohDistFG10KGLastMonth;
                        $enopGvnBenefitStateContFund  =   $singleRecord->nopGvnBenefitStateContFund;
                        $enoDalBhatCentreOprnl        =   $singleRecord->noDalBhatCentreOprnl;
                        $enopAteAboveP10PrevDay       =   $singleRecord->nopAteAboveP10PrevDay;
                        $enoCKOprtdByNGO              =   $singleRecord->noCKOprtdByNGO;
                        $enopAteAbvPt12PrevDay        =   $singleRecord->nopAteAbvPt12PrevDay;
                        $enoMigLabour                 =   $singleRecord->noMigLabour;
                        $enoMigLabourFed              =   $singleRecord->noMigLabourFed;
                        $enoPktDryRationDst           =   $singleRecord->noPktDryRationDst;
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">% of lifting of PDS food grains for (Previous Month): <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="filterme form-control" type="text" name="prcntPdsFGPrevMonth" value="'.$eprcntPdsFGPrevMonth.'" placeholder="0.0" required>';
                                    echo '<input class="form-control" type="text" name="sId" value="'.$esId.'" readonly="true" hidden="true">';
                                }else{
                                    echo '<input class="filterme form-control" type="text" name="prcntPdsFGPrevMonth" value="" placeholder="0.0" required>';
                                }                                
                                ?> 
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">% of lifting of ANB food grains for (Previous two months): <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="filterme form-control" type="text" name="prcntPdsAnbFGPrevTwoMonth" value="'.$eprcntPdsAnbFGPrevTwoMonth.'" placeholder="0.0" required>';
                                }else{
                                    echo '<input class="filterme form-control" type="text" name="prcntPdsAnbFGPrevTwoMonth" value="" placeholder="0.0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">% of lifting of PDS food grains for (Current month): <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="filterme form-control" type="text" name="prcntPdsFGCurMonth" value="'.$eprcntPdsFGCurMonth .'" placeholder="0.0" required>';
                                }else{
                                    echo '<input class="filterme form-control" type="text" name="prcntPdsFGCurMonth" value="" placeholder="0.0" required>';
                                }
                                ?>
                                
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Number of Households distributed PDS food grains for (previous month) under NFSA:<span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="nohDistrPdsFGPrevMonthNFSA" value="'.$enohDistrPdsFGPrevMonthNFSA.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="nohDistrPdsFGPrevMonthNFSA" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                                
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Number of Households distributed PDS food grains for (current month) under NFSA: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="nohDistrPdsFGCurMonthNFSA" value="'.$enohDistrPdsFGCurMonthNFSA.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="nohDistrPdsFGCurMonthNFSA" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?> 
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Number of Person Benefited for ANB Rice (Previous Two Months): <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="nopBenANBRicePrevTwoMonth" value="'.$enopBenANBRicePrevTwoMonth.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="nopBenANBRicePrevTwoMonth" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Number of Households distributed PDS food grains for (previous two months) under ANB: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="nohDistFGPrevTwoMonthANB" value="'.$enohDistFGPrevTwoMonthANB.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="nohDistFGPrevTwoMonthANB" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                                
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Number of Households dostributed food grains @ 10Kg for (last month):<span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="nohDistFG10KGLastMonth" value="'.$enohDistFG10KGLastMonth.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="nohDistFG10KGLastMonth" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                                
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Number of person given benefit from state contingency fund : <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="nopGvnBenefitStateContFund" value="'.$enopGvnBenefitStateContFund.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="nopGvnBenefitStateContFund" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?> 
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Number of Daal Bhaat Centres Operational: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="noDalBhatCentreOprnl" value="'.$enoDalBhatCentreOprnl.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="noDalBhatCentreOprnl" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Number of persons who ate above (Point-10) on previous day: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="nopAteAboveP10PrevDay" value="'.$enopAteAboveP10PrevDay.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="nopAteAboveP10PrevDay" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                                
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Number of Community Kitchens operated by NGO/CSO etc:<span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="noCKOprtdByNGO" value="'.$enoCKOprtdByNGO.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="noCKOprtdByNGO" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                                
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Number of person who ate above (Point-12) on previos day: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="nopAteAbvPt12PrevDay" value="'.$enopAteAbvPt12PrevDay.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="nopAteAbvPt12PrevDay" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?> 
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Number of Migrant Labour : <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="noMigLabour" value="'.$enoMigLabour.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="noMigLabour" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Number of Migrant Labour fed: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="noMigLabourFed" value="'.$enoMigLabourFed.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="noMigLabourFed" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>                                
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Number of packets of dry ration distributed:<span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="noPktDryRationDst" value="'.$enoPktDryRationDst.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="noPktDryRationDst" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>                                
                            </div>
                        </div><!-- col-3 -->
                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/adms/ss_parameters') ?>">Cancel</a>
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
                <p class="mg-t-10 text-danger tx-italic tx-12 tx-bold">1. Value fields accepts number only(Except I,II & III no. fields).<br />2. * are Required fields. <br />3. I,II & III no. fields accepts decimal values.</p>
                </form>
                <!-- <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-10">Bordered Table</h6>
          <p class="mg-b-25 mg-lg-b-50">Add borders on all sides of the table and cells.</p> -->

                <div class="bd rounded table-responsive mt-4" style="overflow-x: scroll;">
                    <table class="table table-bordered mg-b-0" id="truenat">
                        <thead class="thead-colored thead-teal">
                            <tr>
                                <th class="text-capitalize text-center">Sl. No.</th>
                                <th class="text-capitalize text-center">% of lifting of PDS food grains for (Previous Month)</th>
                                <th class="text-capitalize text-center">% of lifting of ANB food grains for (Previous two months)</th>
                                <th class="text-capitalize text-center">% of lifting of PDS food grains for (Current month)</th>
                                <th class="text-capitalize text-center">No. of Households distributed PDS food grains for (previous month) under NFSA</th>
                                <th class="text-capitalize text-center">No. of Households distributed PDS food grains for (current month) under NFSA</th>
                                <th class="text-capitalize text-center">No. of Person Benefited for ANB Rice (Previous Two Months)</th>
                                <th class="text-capitalize text-center">No. of Households distributed PDS food grains for (previous two months) under ANB</th>
                                <th class="text-capitalize text-center">No. of Households dostributed food grains @ 10Kg for (last month)</th>
                                <th class="text-capitalize text-center">No. of person given benefit from state contingency fund </th>
                                <th class="text-capitalize text-center">No. of Daal Bhaat Centres Operational</th>
                                <th class="text-capitalize text-center">No. of persons who ate above (Point-10) on previous day</th>
                                <th class="text-capitalize text-center">No. of Community Kitchens operated by NGO/CSO etc</th>
                                <th class="text-capitalize text-center">No. of person who ate above (Point-12) on previos day</th>
                                <th class="text-capitalize text-center">No. of Migrant Labour </th>
                                <th class="text-capitalize text-center">No. of Migrant Labour fed</th>
                                <th class="text-capitalize text-center">No. of packets of dry ration distributed</th>
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
                                        <td class="text-center"><?php echo $tod->prcntPdsFGPrevMonth; ?></td>
                                        <td class="text-center"><?php echo $tod->prcntPdsAnbFGPrevTwoMonth; ?></td>
                                        <td class="text-center"><?php echo $tod->prcntPdsFGCurMonth; ?></td>
                                        <td class="text-center"><?php echo $tod->nohDistrPdsFGPrevMonthNFSA; ?></td>
                                        <td class="text-center"><?php echo $tod->nohDistrPdsFGCurMonthNFSA; ?></td>
                                        <td class="text-center"><?php echo $tod->nopBenANBRicePrevTwoMonth; ?></td>
                                        <td class="text-center"><?php echo $tod->nohDistFGPrevTwoMonthANB; ?></td>
                                        <td class="text-center"><?php echo $tod->nohDistFG10KGLastMonth; ?></td>
                                        <td class="text-center"><?php echo $tod->nopGvnBenefitStateContFund; ?></td>
                                        <td class="text-center"><?php echo $tod->noDalBhatCentreOprnl; ?></td>
                                        <td class="text-center"><?php echo $tod->nopAteAboveP10PrevDay; ?></td>
                                        <td class="text-center"><?php echo $tod->noCKOprtdByNGO; ?></td>
                                        <td class="text-center"><?php echo $tod->nopAteAbvPt12PrevDay; ?></td>
                                        <td class="text-center"><?php echo $tod->noMigLabour; ?></td>
                                        <td class="text-center"><?php echo $tod->noMigLabourFed; ?></td>
                                        <td class="text-center"><?php echo $tod->noPktDryRationDst; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/adms/edit_ss_parameters/' . $tod->sId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                                            </div>
                                        </td>
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="18" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                        </tbody>

                        <!-- Table Footer Data Total Viewer -->
                        <?php if (count($todayEntries)) { ?>
                            <thead class="thead-colored thead-teal">
                                <?php
                                $value1   =   0;  //  % of lifting of PDS food grains for (Previous Month)
                                $value2   =   0;  //  % of lifting of ANB food grains for (Previous two months)
                                $value3    =   0;  // % of lifting of PDS food grains for (Current month)
                                $value4   =   0;  //  No. of Households distributed PDS food grains for (previous month) under NFSA
                                $value5   =   0;  //  No. of Households distributed PDS food grains for (current month) under NFSA
                                $value6   =   0;  //  No. of Person Benefited for ANB Rice (Previous Two Months)
                                $value7    =   0;  //  No. of Households distributed PDS food grains for (previous two months) under ANB
                                $value8   =   0;  //  No. of Households dostributed food grains @ 10Kg for (last month)
                                $value9   =   0;  //  No. of person given benefit from state contingency fund 
                                $value10   =   0;  //  No. of Daal Bhaat Centres Operational
                                $value11    =   0;  //  No. of persons who ate above (Point-10) on previous day
                                $value12   =   0;  //  No. of Community Kitchens operated by NGO/CSO etc
                                $value13   =   0;  //  No. of person who ate above (Point-12) on previos day
                                $value14   =   0;  //  No. of Migrant Labour 
                                $value15    =   0;  //  No. of Migrant Labour fed
                                $value16   =   0;  //  No. of packets of dry ration distributed

                                foreach ($todayEntries as $tod) {
                                    $value1  = $value1 + $tod->prcntPdsFGPrevMonth;
                                    $value2    = $value2 + $tod->prcntPdsAnbFGPrevTwoMonth;
                                    $value3   = $value3 + $tod->prcntPdsFGCurMonth;
                                    $value4 = $value4 + $tod->nohDistrPdsFGPrevMonthNFSA;
                                    $value5 = $value5 + $tod->nohDistrPdsFGCurMonthNFSA;
                                    $value6 = $value6 + $tod->nopBenANBRicePrevTwoMonth;
                                    $value7 = $value7 + $tod->nohDistFGPrevTwoMonthANB;
                                    $value8 = $value8 + $tod->nohDistFG10KGLastMonth;
                                    $value9 = $value9 + $tod->nopGvnBenefitStateContFund;
                                    $value10 = $value10 + $tod->noDalBhatCentreOprnl;
                                    $value11 = $value11 + $tod->nopAteAboveP10PrevDay;
                                    $value12 = $value12 + $tod->noCKOprtdByNGO;
                                    $value13 = $value13 + $tod->nopAteAbvPt12PrevDay;
                                    $value14 = $value14 + $tod->noMigLabour;
                                    $value15 = $value15 + $tod->noMigLabourFed;
                                    $value16 = $value16 + $tod->noPktDryRationDst;
                                }
                                ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th class="text-capitalize text-center"><?php echo $value1; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value2; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value3; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value4; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value5; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value6; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value7; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value8; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value9; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value10; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value11; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value12; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value13; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value14; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value15; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $value16; ?></th>
                                    <th class="text-capitalize text-center"></th>
                                </tr>
                            </thead>
                        <?php } //endif
                        ?>
                    </table>
                </div><!-- bd-0 -->
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

    //Function for Accepting Only Float Value
    $(function () {
        $('.filterme').keypress(function(eve) {
        if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
            eve.preventDefault();
        }
            
        // this part is when left part of number is deleted and leaves a . in the leftmost position. For example, 33.25, then 33 is deleted
        $('.filterme').keyup(function(eve) {
        if($(this).val().indexOf('.') == 0) {    $(this).val($(this).val().substring(1));
        }
        });
        });
    });
</script>
</html>