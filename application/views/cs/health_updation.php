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
                <span class="breadcrumb-item active">Health Parameters</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Health Parameters</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Health Parameters Report Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/cs/update_health_update', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/cs/insert_health_update', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $ecvhId          =   $singleRecord->cvhId;
                        $enoRetPvtDocTrained=   $singleRecord->noRetPvtDocTrained;
                        $enoPvtHospEnlisted =   $singleRecord->noPvtHospEnlisted;
                        $enopHQ  =   $singleRecord->nopHQ;
                        $enopGQ  =   $singleRecord->nopGQ;
                        $enoHCIsolation =   $singleRecord->noHCIsolation;
                        $enopStamped  =   $singleRecord->nopStamped;
                        $enoN95MaskAvlbl =   $singleRecord->noN95MaskAvlbl;
                        $enoTLMaskAvlbl=   $singleRecord->noTLMaskAvlbl;
                        $enoPPEKitAvlbl=   $singleRecord->noPPEKitAvlbl;
                        $enoIsoBedAvlbl =   $singleRecord->noIsoBedAvlbl;
                        $enoVTMKitAvlbl =   $singleRecord->noVTMKitAvlbl;
                        $enoVentWithNPAvlbl =   $singleRecord->noVentWithNPAvlbl;
                        $enopDepForSpplyES=   $singleRecord->nopDepForSpplyES;
                        $enoCovidHosp=   $singleRecord->noCovidHosp;
                        $enoHotelLodgeAcqIso  =   $singleRecord->noHotelLodgeAcqIso;
                        $enoProGearDriver  =   $singleRecord->noProGearDriver;
                        $eelMortAvlbl  =   $singleRecord->elMortAvlbl;
                        $enoICUBed =   $singleRecord->noICUBed;
                        $enoIsoBed =   $singleRecord->noIsoBed;
                        $enoBedCovidPatient =   $singleRecord->noBedCovidPatient;
                        $enoBedCovidSerPatient =   $singleRecord->noBedCovidSerPatient;
                        $enoDocTrICU=   $singleRecord->noDocTrICU;
                        $enopTrContTrace =   $singleRecord->nopTrContTrace;
                        $ecusContaPlanPlace =   $singleRecord->cusContaPlanPlace;
                        $enoParamedicTrained=   $singleRecord->noParamedicTrained;
                        $enoDeathRespProb=   $singleRecord->noDeathRespProb;
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-control-label text-capitalize tx-bold">Number of retired/ private doctors trained <span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noRetPvtDocTrained" name="noRetPvtDocTrained" value="' . $enoRetPvtDocTrained . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="cvhId" value="' . $ecvhId . '" readonly="true" hidden="true">';
                                } else {
                                    echo '<input class="form-control" type="text" id="noRetPvtDocTrained" name="noRetPvtDocTrained" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of private hospitals enlisted <span class="tx-danger">*</span></label>
                               
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noPvtHospEnlisted" name="noPvtHospEnlisted" value="' . $enoPvtHospEnlisted . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noPvtHospEnlisted" name="noPvtHospEnlisted" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of persons in Home Quarantine<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopHQ" name="nopHQ" value="' . $enopHQ . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopHQ" name="nopHQ" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group ">
                                <label class="form-control-label text-capitalize tx-bold">Number of persons in Government Quarantine<span class="tx-danger">*</span></label>
                               
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopGQ" name="nopGQ" value="' . $enopGQ . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopGQ" name="nopGQ" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Health Centres Isolation<span class="tx-danger">*</span></label>
                               
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noHCIsolation" name="noHCIsolation" value="' . $enoHCIsolation . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noHCIsolation" name="noHCIsolation" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                         <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Persons Stamped<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopStamped" name="nopStamped" value="' . $enopStamped . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopStamped" name="nopStamped" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                   

                          <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of N-95 Mask availabe<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noN95MaskAvlbl" name="noN95MaskAvlbl" value="' . $enoN95MaskAvlbl . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noN95MaskAvlbl" name="noN95MaskAvlbl" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Number of Triple Layer Mask available<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noTLMaskAvlbl" name="noTLMaskAvlbl" value="' . $enoTLMaskAvlbl . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noTLMaskAvlbl" name="noTLMaskAvlbl" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of PPE Kit available<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noPPEKitAvlbl" name="noPPEKitAvlbl" value="' . $enoPPEKitAvlbl . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noPPEKitAvlbl" name="noPPEKitAvlbl" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                         <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Isolation Beds available<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noIsoBedAvlbl" name="noIsoBedAvlbl" value="' . $enoIsoBedAvlbl . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noIsoBedAvlbl" name="noIsoBedAvlbl" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of VTM Kits available<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noVTMKitAvlbl" name="noVTMKitAvlbl" value="' . $enoVTMKitAvlbl . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noVTMKitAvlbl" name="noVTMKitAvlbl" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                         <div class="col-md-3 mg-t--1">
                            <div class="form-group ">
                                <label class="form-control-label text-capitalize tx-bold">Number of Ventilators with necessary persons available<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noVentWithNPAvlbl" name="noVentWithNPAvlbl" value="' . $enoVentWithNPAvlbl . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noVentWithNPAvlbl" name="noVentWithNPAvlbl" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                          <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of persons deployed for supply of essentials to 3 & 4 point above<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopDepForSpplyES" name="nopDepForSpplyES" value="' . $enopDepForSpplyES . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopDepForSpplyES" name="nopDepForSpplyES" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of COVID Hospitals<span class="tx-danger">*</span></label>
                               
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noCovidHosp" name="noCovidHosp" value="' . $enoCovidHosp . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noCovidHosp" name="noCovidHosp" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                         <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Hotel/ Lodge acquired for Isolation<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noHotelLodgeAcqIso" name="noHotelLodgeAcqIso" value="' . $enoHotelLodgeAcqIso . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noHotelLodgeAcqIso" name="noHotelLodgeAcqIso" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>


                        <div class="col-md-3 mg-t--1">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Number of protective gear for driver of Ambulance<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopnoProGearDriverHQ" name="noProGearDriver" value="' . $enoProGearDriver . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noProGearDriver" name="noProGearDriver" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Electric Mortuary available<span class="tx-danger">*</span></label>
                               
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="elMortAvlbl" name="elMortAvlbl" value="' . $eelMortAvlbl . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="elMortAvlbl" name="elMortAvlbl" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of ICU Beds<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noICUBed" name="noICUBed" value="' . $enoICUBed . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noICUBed" name="noICUBed" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Isolation Beds<span class="tx-danger">*</span></label>
                               
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noIsoBed" name="noIsoBed" value="' . $enoIsoBed . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noIsoBed" name="noIsoBed" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                         <div class="col-md-3 mg-t--1">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Number of beds for COVID patients<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noBedCovidPatient" name="noBedCovidPatient" value="' . $enoBedCovidPatient . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noBedCovidPatient" name="noBedCovidPatient" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of beds for COVID serious patients<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noBedCovidSerPatient" name="noBedCovidSerPatient" value="' . $enoBedCovidSerPatient . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noBedCovidSerPatient" name="noBedCovidSerPatient" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>


                        <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Doctors trained for ICU<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noDocTrICU" name="noDocTrICU" value="' . $enoDocTrICU . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noDocTrICU" name="noDocTrICU" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        

                        
                        <div class="col-md-3 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of trained for Contact Tracing<span class="tx-danger">*</span></label>
                               
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopTrContTrace" name="nopTrContTrace" value="' . $enopTrContTrace . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopTrContTrace" name="nopTrContTrace" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div><!-- col-3 -->

                        <!--col-4-->
                          <div class="col-md-4 mg-t--1">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Cluster Containment Plan in Place<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="cusContaPlanPlace" name="cusContaPlanPlace" value="' . $ecusContaPlanPlace . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="cusContaPlanPlace" name="cusContaPlanPlace" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Paramedics trained<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noParamedicTrained" name="noParamedicTrained" value="' . $enoParamedicTrained . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noParamedicTrained" name="noParamedicTrained" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4 mg-t--1">
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Deaths due to Respiratory Problems<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noDeathRespProb" name="noDeathRespProb" value="' . $enoDeathRespProb . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noDeathRespProb" name="noDeathRespProb" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        <!--col-4-->
                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/cs/health_updation') ?>">Cancel</a>
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

                                           
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/cs/edit_health_update/' . $tod->cvhId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                                            </div>
                                        </td>
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
                                    
                                  <th class="text-capitalize text-center"></th>
                                </tr>
                                <?php } ?>
                            </thead>
                    </table>
                </div>
                <!-- bd-0 -->
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

    function calBedVaccant() {
        // nbi = No of Beds Installed
        // nbo = No of Beds Occupied
        // nbv = No of Beds Vaccant
        var nbi = document.getElementById("txtNOBI").value;
        var nbo = document.getElementById("txtNOBO").value;
        if (nbi == "")
            nbi = 0;
        if (nbo == "")
            nbo = 0;
        var nbv = parseInt(nbi) - parseInt(nbo);
        document.getElementById("txtNOBV").value = nbv;
    }
</script>
</html>