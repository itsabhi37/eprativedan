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
                <span class="breadcrumb-item active">Law & Order Parameters</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Law & Order Parameters</h4>
            
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Law & Order Parameters Report Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/admlo/update_admlo_update', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/admlo/insert_admlo_update', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $eaId                    =   $singleRecord->aId;
                        $enoICAppointed          =   $singleRecord->noICAppointed;
                        $enopBkdLDViolation      =   $singleRecord->nopBkdLDViolation;
                        $enoChecknaka            =   $singleRecord->noChecknaka;
                        $enoFIRLodgedLDViolation =   $singleRecord->noFIRLodgedLDViolation;
                        $enoArrestLDViolation    =   $singleRecord->noArrestLDViolation;
                        $enopArvdAftrLDDclrn     =   $singleRecord->nopArvdAftrLDDclrn;
                        $enoConDeplMonIQ         =   $singleRecord->noConDeplMonIQ;
                        $enoFIRlodgedECAct       =   $singleRecord->noFIRlodgedECAct;
                        $eCRinOprn               =   $singleRecord->CRinOprn;
                        $enoCallRecvdDCR         =   $singleRecord->noCallRecvdDCR;
                        $eDCRCompln1             =   $singleRecord->DCRCompln1;
                        $eDCRCompln2             =   $singleRecord->DCRCompln2;
                        $eDCRCompln3             =   $singleRecord->DCRCompln3;
                        $erelgsCongrnBanned      =   $singleRecord->relgsCongrnBanned;
                        $enoLDViolnReport        =   $singleRecord->noLDViolnReport;
                        $enoVehicleSeized        =   $singleRecord->noVehicleSeized;
                        $etotlFineCollected      =   $singleRecord->totlFineCollected;
                        $enoFIRCrimeotLD         =   $singleRecord->noFIRCrimeotLD;
                        $enoForeignNtnArrived    =   $singleRecord->noForeignNtnArrived;
                        $ewlSD1                  =   $singleRecord->wlSD1;
                        $ewlSD2                  =   $singleRecord->wlSD2;
                        $ewlSD3                  =   $singleRecord->wlSD3;
                        $ewlSD4                  =   $singleRecord->wlSD4;
                        $ewlSD5                  =   $singleRecord->wlSD5;
                        
                        
                        
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <!-- col-4-->
                       

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Incident Commanders appointed<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noICAppointed" name="noICAppointed" value="' . $enoICAppointed . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="aId" value="' . $eaId . '" readonly="true" hidden="true">';
                                } else {
                                    echo '<input class="form-control" type="text" id="noICAppointed" name="noICAppointed" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of person booked for lockdown violations to date<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopBkdLDViolation" name="nopBkdLDViolation" value="' . $enopBkdLDViolation . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="nopBkdLDViolation" name="nopBkdLDViolation" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Check Naka in place<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noChecknaka" name="noChecknaka" value="' . $enoChecknaka . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="noChecknaka" name="noChecknaka" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of FIR lodged for lockdown violations<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noFIRLodgedLDViolation" name="noFIRLodgedLDViolation" value="' . $enoFIRLodgedLDViolation . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="noFIRLodgedLDViolation" name="noFIRLodgedLDViolation" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of arrests made for lockdown violations<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noArrestLDViolation" name="noArrestLDViolation" value="' . $enoArrestLDViolation . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="noArrestLDViolation" name="noArrestLDViolation" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of persons arrived after lockdown declaration<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopArvdAftrLDDclrn" name="nopArvdAftrLDDclrn" value="' . $enopArvdAftrLDDclrn . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="nopArvdAftrLDDclrn" name="nopArvdAftrLDDclrn" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of constables deployed for monitoring Institutional Quarantine<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noConDeplMonIQ" name="noConDeplMonIQ" value="' . $enoConDeplMonIQ . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="noConDeplMonIQ" name="noConDeplMonIQ" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                         <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of FIR lodged under EC Act<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noFIRlodgedECAct" name="noFIRlodgedECAct" value="' . $enoFIRlodgedECAct . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="noFIRlodgedECAct" name="noFIRlodgedECAct" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1 bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">24x7 Control Room in operation (Yes/ No)<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="CRinOprn" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($eCRinOprn=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($eCRinOprn=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
                                    <?php
                                    } else {
                                        // Add New Mode
                                        echo '<option value="Y">Yes</option>';
                                        echo '<option value="N">No</option>';
                                       
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!--col-4-->
                        <!--col-12-->
                        <div class="col-md-12 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Top three complaints in DCR<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="DCRCompln1" name="DCRCompln1" value="' . $eDCRCompln1 . '" placeholder="Complaint 1" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="DCRCompln1" name="DCRCompln1" value=""  placeholder="Complaint 1" required>';
                                }
                                ?>
                                <hr>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="DCRCompln2" name="DCRCompln2" value="' . $eDCRCompln2 . '" placeholder="Complaint 2" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="DCRCompln2" name="DCRCompln2" value=""  placeholder="Complaint 2" required>';
                                }
                                ?><hr>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="DCRCompln3" name="DCRCompln3" value="' . $eDCRCompln3 . '" placeholder="Complaint 3" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="DCRCompln3" name="DCRCompln3" value=""  placeholder="Complaint 3" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <!--col-12-->
                        <!--col-4-->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of calls received at DCR<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noCallRecvdDCR" name="noCallRecvdDCR" value="' . $enoCallRecvdDCR . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="noCallRecvdDCR" name="noCallRecvdDCR" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1 bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Religious congregations banned (Yes/ No)<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="relgsCongrnBanned" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($erelgsCongrnBanned=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($erelgsCongrnBanned=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
                                    <?php
                                    } else {
                                        // Add New Mode
                                        echo '<option value="Y">Yes</option>';
                                        echo '<option value="N">No</option>';
                                       
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of lockdown violations reported to date<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noLDViolnReport" name="noLDViolnReport" value="' . $enoLDViolnReport . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="noLDViolnReport" name="noLDViolnReport" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of vehicles seized<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noVehicleSeized" name="noVehicleSeized" value="' . $enoVehicleSeized . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="noVehicleSeized" name="noVehicleSeized" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Total Fine Collected<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="totlFineCollected" name="totlFineCollected" value="' . $etotlFineCollected . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="totlFineCollected" name="totlFineCollected" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of FIRs for crimes other than lockdown violations<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noFIRCrimeotLD" name="noFIRCrimeotLD" value="' . $enoFIRCrimeotLD . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="noFIRCrimeotLD" name="noFIRCrimeotLD" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group ">
                                <label class="form-control-label text-capitalize tx-bold">Number of foreign nationals arrival since 01.03.2020<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noForeignNtnArrived" name="noForeignNtnArrived" value="' . $enoForeignNtnArrived . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="noForeignNtnArrived" name="noForeignNtnArrived" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <!--col-4-->
                        <!--col-8-->
                         <div class="col-md-8 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Worry locations for Social Distancing (Top Five)<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="wlSD1" name="wlSD1" value="' . $ewlSD1 . '"  placeholder="Location 1" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="wlSD1" name="wlSD1" value=""  placeholder="Location 1" required>';
                                }
                                ?> <hr>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="wlSD2" name="wlSD2" value="' . $ewlSD2 . '"  placeholder="Location 2" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="wlSD2" name="wlSD2" value=""  placeholder="Location 2" required>';
                                }
                                ?> <hr>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="wlSD3" name="wlSD3" value="' . $ewlSD3 . '"  placeholder="Location 3" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="wlSD3" name="wlSD3" value=""  placeholder="Location 3" required>';
                                }
                                ?> <hr>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="wlSD4" name="wlSD4" value="' . $ewlSD4 . '"  placeholder="Location 4" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="wlSD4" name="wlSD4" value="" placeholder="Location 4" required>';
                                }
                                ?> <hr>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="wlSD5" name="wlSD5" value="' . $ewlSD5 . '"  placeholder="Location 5" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="wlSD5" name="wlSD5" value=""  placeholder="Location 5" required>';
                                }
                                ?>
                            
                        </div>
                        </div>
                        <!--col-8-->

                       

                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/admlo/admlo_update') ?>">Cancel</a>
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
                                        
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/admlo/edit_admlo_update/' . $tod->aId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
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
                                    <th class="text-capitalize text-center"></th>
                                </tr>
                                <?php } ?>
                            </thead>
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

</script>
</html>