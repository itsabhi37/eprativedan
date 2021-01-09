<?php include_once('include/header.php') ?>

<body>
    <?php include_once('include/leftmenu.php') ?>
    <?php include_once('include/headmenu.php') ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url('home') ?>">Dashboard</a>
                <a class="breadcrumb-item" href="#">CS Reports</a>
                <span class="breadcrumb-item active">Health Parameters Reports</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Health Parameters Reports</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Health Parameters Report Section</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                echo form_open_multipart('superadmin/dashboard/show_health_report', 'data-parsley-validate');
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
                                <a class="btn btn-secondary text-capitalize" href="<?= base_url('superadmin/dashboard/health_report') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">No. of retired/ private doctors trained</th>
                                <th class="text-capitalize text-center">No. of private hospitals enlisted</th>
                                <th class="text-capitalize text-center">No. of persons in Home Quarantine</th>
                                <th class="text-capitalize text-center">No. of persons in Government Quarantine</th>
                                <th class="text-capitalize text-center">No. of Health Centres Isolation</th>
                                <th class="text-capitalize text-center">No. of Persons Stamped</th>
                                <th class="text-capitalize text-center">No. of N-95 Mask availabe</th>
                                <th class="text-capitalize text-center">No. of Triple Layer Mask available</th>
                                <th class="text-capitalize text-center">No. of PPE Kit available</th>
                                <th class="text-capitalize text-center">No. of Isolation Beds available</th>
                                <th class="text-capitalize text-center">No. of VTM Kits available</th>
                                <th class="text-capitalize text-center">No. of Ventilators with necessary persons available</th>
                                <th class="text-capitalize text-center">No. of persons deployed for supply of essentials to 3 & 4 point above</th>
                                <th class="text-capitalize text-center">No. of COVID Hospitals</th>
                                <th class="text-capitalize text-center">No. of Hotel/ Lodge acquired for Isolation</th>
                                <th class="text-capitalize text-center">No. of protective gear for driver of Ambulance</th>
                                <th class="text-capitalize text-center">Electric Mortuary available</th>
                                <th class="text-capitalize text-center">No. of ICU Beds</th>
                                <th class="text-capitalize text-center">No. of Isolation Beds</th>
                                <th class="text-capitalize text-center">No. of beds for COVID patients</th>
                                <th class="text-capitalize text-center">No. of beds for COVID serious patients</th>
                                <th class="text-capitalize text-center">No. of Doctors trained for ICU</th>
                                <th class="text-capitalize text-center">No. of trained for Contact Tracing</th>
                                <th class="text-capitalize text-center">Cluster Containment Plan in Place</th>
                                <th class="text-capitalize text-center">No. of Paramedics trained</th>
                                <th class="text-capitalize text-center">No. of Deaths due to Respiratory Problems</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($todayEntries)) { ?>
                                <?php $sln = 0;
                                foreach ($todayEntries as $tod) {
                                    $sln = $sln + 1; ?>
                                    <tr class="text-inverse">
                                        <td class="text-center"><?php echo $sln; ?></td>
                                        <td class="text-center"><?php echo $tod->noRetPvtDocTrained; ?></td>
                                        <td class="text-center"><?php echo $tod->noPvtHospEnlisted; ?></td>
                                        <td class="text-center"><?php echo $tod->nopHQ; ?></td>
                                        <td class="text-center"><?php echo $tod->nopGQ; ?></td>
                                        <td class="text-center"><?php echo $tod->noHCIsolation; ?></td>
                                        <td class="text-center"><?php echo $tod->nopStamped; ?></td>
                                        <td class="text-center"><?php echo $tod->noN95MaskAvlbl; ?></td>
                                        <td class="text-center"><?php echo $tod->noTLMaskAvlbl; ?></td>
                                        <td class="text-center"><?php echo $tod->noPPEKitAvlbl; ?></td>
                                        <td class="text-center"><?php echo $tod->noIsoBedAvlbl; ?></td>
                                        <td class="text-center"><?php echo $tod->noVTMKitAvlbl; ?></td>
                                        <td class="text-center"><?php echo $tod->noVentWithNPAvlbl; ?></td>
                                        <td class="text-center"><?php echo $tod->nopDepForSpplyES; ?></td>
                                        <td class="text-center"><?php echo $tod->noCovidHosp; ?></td>
                                        <td class="text-center"><?php echo $tod->noHotelLodgeAcqIso; ?></td>
                                        <td class="text-center"><?php echo $tod->noProGearDriver; ?></td>
                                        <td class="text-center"><?php echo $tod->elMortAvlbl; ?></td>
                                        <td class="text-center"><?php echo $tod->noICUBed; ?></td>
                                        <td class="text-center"><?php echo $tod->noIsoBed; ?></td>
                                        <td class="text-center"><?php echo $tod->noBedCovidPatient; ?></td>
                                        <td class="text-center"><?php echo $tod->noBedCovidSerPatient; ?></td>
                                        <td class="text-center"><?php echo $tod->noDocTrICU; ?></td>
                                        <td class="text-center"><?php echo $tod->nopTrContTrace; ?></td>
                                        <td class="text-center"><?php echo $tod->cusContaPlanPlace; ?></td>
                                        <td class="text-center"><?php echo $tod->noParamedicTrained; ?></td>
                                        <td class="text-center"><?php echo $tod->noDeathRespProb; ?></td>
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="28" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                        </tbody>

                        <!-- Table Footer Data Total Viewer -->
                       <thead class="thead-colored thead-teal">
                                <?php 
                                if(count($todayEntries)){
                                $noRetPvtDocTrained=0;
                                   $noPvtHospEnlisted=0;
                                   $nopHQ=0;
                                   $nopGQ=0;
                                   $noHCIsolation=0;
                                   $nopStamped=0;
                                   $noN95MaskAvlbl=0;
                                   $noTLMaskAvlbl=0;
                                   $noPPEKitAvlbl=0;
                                   $noIsoBedAvlbl=0;
                                   $noVTMKitAvlbl=0;
                                   $noVentWithNPAvlbl=0;
                                   $nopDepForSpplyES=0;
                                   $noCovidHosp=0;
                                   $noHotelLodgeAcqIso=0;
                                   $noProGearDriver=0;
                                   $elMortAvlbl=0;
                                   $noICUBed=0;
                                   $noIsoBed=0;
                                   $noBedCovidPatient=0;
                                   $noBedCovidSerPatient=0;
                                   $noDocTrICU=0;
                                   $nopTrContTrace=0;
                                   $cusContaPlanPlace=0;
                                   $noParamedicTrained=0;
                                   $noDeathRespProb=0 ;
                                    //total count
                                foreach ($todayEntries as $tod) {
                                   $noRetPvtDocTrained+=$tod->noRetPvtDocTrained;
                                   $noPvtHospEnlisted+=$tod->noPvtHospEnlisted;
                                   $nopHQ+=$tod->nopHQ;
                                   $nopGQ+=$tod->nopGQ;
                                   $noHCIsolation+=$tod->noHCIsolation;
                                   $nopStamped+=$tod->nopStamped;
                                   $noN95MaskAvlbl+=$tod->noN95MaskAvlbl;
                                   $noTLMaskAvlbl+=$tod->noTLMaskAvlbl;
                                   $noPPEKitAvlbl+=$tod->noPPEKitAvlbl;
                                   $noIsoBedAvlbl+=$tod->noIsoBedAvlbl;
                                   $noVTMKitAvlbl+=$tod->noVTMKitAvlbl;
                                   $noVentWithNPAvlbl+=$tod->noVentWithNPAvlbl;
                                   $nopDepForSpplyES+=$tod->nopDepForSpplyES;
                                   $noCovidHosp+=$tod->noCovidHosp;
                                   $noHotelLodgeAcqIso+=$tod->noHotelLodgeAcqIso;
                                   $noProGearDriver+=$tod->noProGearDriver;
                                   $elMortAvlbl+=$tod->elMortAvlbl;
                                   $noICUBed+=$tod->noICUBed;
                                   $noIsoBed+=$tod->noIsoBed;
                                   $noBedCovidPatient+=$tod->noBedCovidPatient;
                                   $noBedCovidSerPatient+=$tod->noBedCovidSerPatient;
                                   $noDocTrICU+=$tod->noDocTrICU;
                                   $nopTrContTrace+=$tod->nopTrContTrace;
                                   $cusContaPlanPlace+=$tod->cusContaPlanPlace;
                                   $noParamedicTrained+=$tod->noParamedicTrained;
                                   $noDeathRespProb +=$tod->noDeathRespProb ;
                                }
                                     ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th class="text-capitalize text-center"><?php echo $noRetPvtDocTrained; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noPvtHospEnlisted; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopHQ; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopGQ; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noHCIsolation; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopStamped; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noN95MaskAvlbl; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noTLMaskAvlbl; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noPPEKitAvlbl; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noIsoBedAvlbl; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noVTMKitAvlbl; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noVentWithNPAvlbl; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopDepForSpplyES; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noCovidHosp; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noHotelLodgeAcqIso; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noProGearDriver; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $elMortAvlbl; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noICUBed; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noIsoBed; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noBedCovidPatient; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noBedCovidSerPatient; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noDocTrICU; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopTrContTrace; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $cusContaPlanPlace; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noParamedicTrained; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noDeathRespProb; ?></th>
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