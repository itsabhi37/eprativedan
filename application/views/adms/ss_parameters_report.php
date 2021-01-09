<?php include_once('include/header.php') ?>

<body>
    <?php include_once('include/leftmenu.php') ?>
    <?php include_once('include/headmenu.php') ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url('home') ?>">Dashboard</a>
                <a class="breadcrumb-item" href="#">Reports</a>
                <span class="breadcrumb-item active">SS Parameters Reports</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Social Security Parameters Reports</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Social Security Parameters Section</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                echo form_open_multipart('department/adms/show_ss_parameters_report', 'data-parsley-validate');
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
                                <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/adms/ss_parameters_report') ?>">Cancel</a>
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
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="17" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
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
                                </tr>
                            </thead>
                        <?php } //endif
                        ?>
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