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
                <span class="breadcrumb-item active">L&O Parameters Reports</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Law & Order Parameters Reports</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Law & Order Parameters Reports Section</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                echo form_open_multipart('department/admlo/show_admlo_report', 'data-parsley-validate');
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
                                <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/admlo/admlo_report') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">Number of Incident Commanders appointed</th>
                                <th class="text-capitalize text-center">Number of person booked for lockdown violations to date</th>
                                <th class="text-capitalize text-center" >Number of Check Naka in place</th>
                                <th class="text-capitalize text-center">Number of FIR lodged for lockdown violations</th>
                                <th class="text-capitalize text-center">Number of arrests made for lockdown violations</th>
                                <th class="text-capitalize text-center">Number of persons arrived after lockdown declaration</th>
                                <th class="text-capitalize text-center">Number of constables deployed for monitoring Institutional Quarantine</th>
                                <th class="text-capitalize text-center">Number of FIR lodged under EC Act</th>
                                <th class="text-capitalize text-center">24x7 Control Room in operation (Yes/ No)</th>
                                <th class="text-capitalize text-center">Number of calls received at DCR</th>
                                <th class="text-capitalize text-center" colspan="3">Top three complaints in DCR</th>
                                <th class="text-capitalize text-center">Religious congregations banned (Yes/ No)</th>
                                <th class="text-capitalize text-center">Number of lockdown violations reported to date</th>
                                <th class="text-capitalize text-center">Number of vehicles seized</th>
                                <th class="text-capitalize text-center">Total Fine Collected</th>
                                <th class="text-capitalize text-center">Number of FIRs for crimes other than lockdown violations</th>
                                <th class="text-capitalize text-center">Number of foreign nationals arrival since 01.03.2020</th>
                                <th class="text-capitalize text-center" colspan="5">Worry locations for Social Distancing (Top Five)</th>
                            </tr>
                        </thead>
                       <tbody>
                            <?php if (count($todayEntries)) { ?>
                                <?php $sln = 0;
                                foreach ($todayEntries as $tod) {
                                    $sln = $sln + 1; ?>
                                    <tr class="text-inverse">
                                        <td class="text-center"><?php echo $sln; ?></td>
                                        <td class="text-center"><?php echo $tod->noICAppointed; ?></td>
                                        <td class="text-center"><?php echo $tod->nopBkdLDViolation; ?></td>
                                        <td class="text-center"><?php echo $tod->noChecknaka; ?></td>
                                        <td class="text-center"><?php echo $tod->noFIRLodgedLDViolation; ?></td>
                                        <td class="text-center"><?php echo $tod->noArrestLDViolation; ?></td>
                                        <td class="text-center"><?php echo $tod->nopArvdAftrLDDclrn; ?></td>
                                        <td class="text-center"><?php echo $tod->noConDeplMonIQ; ?></td>
                                        <td class="text-center"><?php echo $tod->noFIRlodgedECAct; ?></td>
                                        <td class="text-center"><?php 
                                            if($tod->CRinOprn=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                        <td class="text-center"><?php echo $tod->noCallRecvdDCR; ?></td>
                                        <td class="text-center"><?php echo $tod->DCRCompln1; ?></td>
                                        <td class="text-center"><?php echo $tod->DCRCompln2; ?></td>
                                        <td class="text-center"><?php echo $tod->DCRCompln3; ?></td>
                                        <td class="text-center"><?php 
                                        if($tod->relgsCongrnBanned=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                        <td class="text-center"><?php echo $tod->noLDViolnReport; ?></td>
                                        <td class="text-center"><?php echo $tod->noVehicleSeized; ?></td>
                                        <td class="text-center"><?php echo $tod->totlFineCollected; ?></td>
                                        <td class="text-center"><?php echo $tod->noFIRCrimeotLD; ?></td>
                                        <td class="text-center"><?php echo $tod->noForeignNtnArrived; ?></td>
                                        <td class="text-center"><?php echo $tod->wlSD1; ?></td>
                                        <td class="text-center"><?php echo $tod->wlSD2; ?></td>
                                        <td class="text-center"><?php echo $tod->wlSD3; ?></td>
                                        <td class="text-center"><?php echo $tod->wlSD4; ?></td>
                                        <td class="text-center"><?php echo $tod->wlSD5  ; ?></td>
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
                                $noICAppointed=0;
                                   $nopBkdLDViolation=0;
                                   $noChecknaka=0;
                                   $noFIRLodgedLDViolation=0;
                                   $noArrestLDViolation=0;
                                   $nopArvdAftrLDDclrn=0;
                                   $noConDeplMonIQ=0;
                                   $noFIRlodgedECAct=0;
                                   $noCallRecvdDCR=0;
                                   $noLDViolnReport=0;
                                   $noVehicleSeized=0;
                                   $totlFineCollected=0;
                                   $noFIRCrimeotLD=0;
                                   $noForeignNtnArrived=0;
                               
                                    //total count
                                foreach ($todayEntries as $tod) {
                                   $noICAppointed+=$tod->noICAppointed;
                                   $nopBkdLDViolation+=$tod->nopBkdLDViolation;
                                   $noChecknaka+=$tod->noChecknaka;
                                   $noFIRLodgedLDViolation+=$tod->noFIRLodgedLDViolation;
                                   $noArrestLDViolation+=$tod->noArrestLDViolation;
                                   $nopArvdAftrLDDclrn+=$tod->nopArvdAftrLDDclrn;
                                   $noConDeplMonIQ+=$tod->noConDeplMonIQ;
                                   $noFIRlodgedECAct+=$tod->noFIRlodgedECAct;
                                   $noCallRecvdDCR+=$tod->noCallRecvdDCR;
                                   $noLDViolnReport+=$tod->noLDViolnReport;
                                   $noVehicleSeized+=$tod->noVehicleSeized;
                                   $totlFineCollected+=$tod->totlFineCollected;
                                   $noFIRCrimeotLD+=$tod->noFIRCrimeotLD;
                                   $noForeignNtnArrived+=$tod->noForeignNtnArrived;
                                }
                                     ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th class="text-capitalize text-center"><?php echo $noICAppointed ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopBkdLDViolation ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noChecknaka ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noFIRLodgedLDViolation ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noArrestLDViolation ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopArvdAftrLDDclrn ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noConDeplMonIQ ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noFIRlodgedECAct ?></th>
                                    <th class="text-capitalize text-center"></th>
                                    <th class="text-capitalize text-center"><?php echo $noCallRecvdDCR ?></th>
                                    <th class="text-capitalize text-center" colspan="3"></th>
                                    <th class="text-capitalize text-center"></th>
                                    <th class="text-capitalize text-center"><?php echo $noLDViolnReport ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noVehicleSeized ?></th>
                                    <th class="text-capitalize text-center"><?php echo $totlFineCollected ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noFIRCrimeotLD ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noForeignNtnArrived ?></th>
                                    <th class="text-capitalize text-center" colspan="5"></th>
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