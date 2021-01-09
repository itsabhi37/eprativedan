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
                <span class="breadcrumb-item active">TrueNat Reports</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">TrueNat Reports</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">TrueNat Testing Report Section</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                echo form_open_multipart('department/pmch/show_truenat_reports', 'data-parsley-validate');
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
                                <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/pmch/truenat_reports') ?>">Cancel</a>
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

                <div class="bd rounded table-responsive mt-2">
                    <table class="table table-bordered mg-b-0" id="truenat">
                        <thead class="thead-colored thead-teal">
                            <tr>
                                <th class="text-capitalize text-center">Sl. No.</th>
                                <th class="text-capitalize text-center">Facility</th>
                                <th class="text-capitalize text-center">Total Samples Collected Till Date</th>
                                <th class="text-capitalize text-center">Total Test conducted till date</th>
                                <th class="text-capitalize text-center">No of entries done in Portal</th>
                                <th class="text-capitalize text-center">Total +ve cases identified till date</th>
                                <th class="text-capitalize text-center">No of Samples collected today</th>
                                <th class="text-capitalize text-center">Total test conducted today</th>
                                <th class="text-capitalize text-center">No of +ve cases identified today</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($todayEntries)) { ?>
                                <?php $sln = 0;
                                foreach ($todayEntries as $tod) {
                                    $sln = $sln + 1; ?>
                                    <tr class="text-inverse">
                                        <td class="text-center"><?php echo $sln; ?></td>
                                        <td class="text-center"><?php echo $tod->ttlName; ?></td>
                                        <td class="text-center"><?php echo $tod->samplesCollectedTillDate; ?></td>
                                        <td class="text-center"><?php echo $tod->testConductedTillDate; ?></td>
                                        <td class="text-center"><?php echo $tod->entriesDonePortal; ?></td>
                                        <td class="text-center"><?php echo $tod->posCaseIdentifyTillDate; ?></td>
                                        <td class="text-center"><?php echo $tod->samplesCollectedToday; ?></td>
                                        <td class="text-center"><?php echo $tod->testConductedToday; ?></td>
                                        <td class="text-center"><?php echo $tod->posIdentifiedToday; ?></td>
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="9" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                        </tbody>

                        <!-- Table Footer Data Total Viewer -->
                        <?php if (count($todayEntries)) { ?>
                            <thead class="thead-colored thead-teal">
                                <?php
                                $SCTD   =   0;  //  Total Samples Collected Till Date
                                $TCTD   =   0;  //  Total Test conducted till date
                                $EDP    =   0;  //  No of entries done in Portal
                                $CITD   =   0;  //  Total +ve cases identified till date
                                $SCT    =   0;  //  No of Samples collected today
                                $TCT    =   0;  //  Total test conducted today
                                $IT     =   0;  //  No of +ve cases identified today

                                foreach ($todayEntries as $tod) {
                                    $SCTD = $SCTD + $tod->samplesCollectedTillDate;
                                    $TCTD = $TCTD + $tod->testConductedTillDate;
                                    $EDP = $EDP + $tod->entriesDonePortal;
                                    $CITD = $CITD + $tod->posCaseIdentifyTillDate;
                                    $SCT = $SCT + $tod->samplesCollectedToday;
                                    $TCT = $TCT + $tod->testConductedToday;
                                    $IT = $IT + $tod->posIdentifiedToday;
                                }
                                ?>
                                <tr>
                                    <th class="text-capitalize text-center" colspan="2">Total</th>
                                    <th class="text-capitalize text-center"><?php echo $SCTD; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $TCTD; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $EDP; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $CITD; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $SCT; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $TCT; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $IT; ?></th>
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

</html>