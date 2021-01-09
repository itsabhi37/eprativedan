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
                <span class="breadcrumb-item active">CO Checklist</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">CO Checklist</h4>
            
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Checklist for Essential Services in Containment Zone Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/co/update_co_update', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/co/insert_co_update', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $echId                =   $singleRecord->chId;
                        $eblkcrclId                =   $singleRecord->blkcrclId;
                        $eIncCmndr                 =   $singleRecord->IncCmndr;
                        $ePS                       =   $singleRecord->PS;
                        $econtZonePlace            =   $singleRecord->contZonePlace;
                        $eEnforcementdate          =   $singleRecord->Enforcementdate;
                        $eWithdrawalDate           =   $singleRecord->WithdrawalDate;
                        $econTraceDone             =   $singleRecord->conTraceDone;
                        $enopIdentified            =   $singleRecord->nopIdentified;
                        $esplCellforQuarantine     =   $singleRecord->splCellforQuarantine;
                        $etestSymptoms             =   $singleRecord->testSymptoms;
                        $ehthSurveynSurvlnc        =   $singleRecord->hthSurveynSurvlnc;
                        $eclinicMngmnt             =   $singleRecord->clinicMngmnt;
                        $ecounselling              =   $singleRecord->counselling;
                        $eregSensitizn             =   $singleRecord->regSensitizn;
                        $eddArApResContnmnt        =   $singleRecord->ddArApResContnmnt;
                        $esupplyEsnMedicine        =   $singleRecord->supplyEsnMedicine;
                        $esupplyEsFacility         =   $singleRecord->supplyEsFacility;
                        $ebarricade                =   $singleRecord->barricade;
                        $econtrolRoom              =   $singleRecord->controlRoom;
                        
                        
                        
                        
                        
                    }

                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <!-- col-4-->   

                        <div class="col-md-4">
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Block/Circle<span class="tx-danger">*</span></label>
                                
                                <?php
                                
                                    echo '<input class="form-control" type="text"  value="'.$circle[0]->blkName.'" readonly>';
                                    echo '<input class="form-control" type="text" id="blkcrclId" name="blkcrclId" value="'.$circle[0]->blkId.'"  placeholder="" hidden="true" required>';
                               
                                ?>
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Incident Commander<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="IncCmndr" name="IncCmndr" value="' . $eIncCmndr . '"  placeholder="" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="IncCmndr" name="IncCmndr" value=""  placeholder="" required>';
                                }
                                ?>
                                
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">PS<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="PS" name="PS" value="' . $ePS . '"  placeholder="" required>';
                                    echo '<input class="form-control" type="text" name="chId" value="' . $echId . '" readonly="true" hidden="true">';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="PS" name="PS" value=""  placeholder="" required>';
                                }
                                ?>
                        </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Containment Zone/Place<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="contZonePlace" name="contZonePlace" value="' . $econtZonePlace . '"  placeholder="" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="contZonePlace" name="contZonePlace" value=""  placeholder="" required>';
                                }
                                ?>
                        </div>
                        </div>

                            <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">
                                    Enforcement <span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="date" id="Enforcementdate" name="Enforcementdate" value="' . $eEnforcementdate . '"  placeholder="Select Date:" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="date" id="Enforcementdate" name="Enforcementdate" value="" required>';
                                }
                                ?>
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">
                                    Withdrawl <span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="date" id="WithdrawalDate" name="WithdrawalDate" value="' . $eWithdrawalDate . '"  placeholder="Select Date:" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="date" id="WithdrawalDate" name="WithdrawalDate" value="" required>';
                                }
                                ?>

                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1 bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Contact Tracing to be done(If Yes then please provide no. of person identified)<span class="tx-danger">*</span></label>
                                <select id="conTraceDone" 
                                <?php if($this->uri->segment(4)){ 
                                echo 'onchange="show_hide_input_edit()"';}
                                else{
                                echo 'onchange="show_hide_input()"'; } 
                                ?> 
                                name="conTraceDone" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($econTraceDone=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($econTraceDone=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
                                    <?php
                                    } else {
                                        // Add New Mode
                                        echo '<option value="Y">Yes</option>';
                                        echo '<option value="N">No</option>';
                                       
                                    }
                                    ?>
                                    <!--If "YES" selected then Display-->
                                    <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopIdentified" name="nopIdentified" value="' . $enopIdentified . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    
                                } else {
                                    echo '<input class="form-control" type="text" id="nopIdentified" name="nopIdentified" value="0" onkeypress="return isNumber(event);" placeholder="0" required hidden="true">';
                                }
                                ?> 
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1 bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Special Cell for Home or Institutional Quarantine of individual on risk assessment<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="splCellforQuarantine" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($esplCellforQuarantine=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($esplCellforQuarantine=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                            <div class="form-group mg-md-l--1 bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Testing of all Cases with severe acute repiratory infection (SARI) influenza like illness (ILI) and other symptoms<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="testSymptoms" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($etestSymptoms=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($etestSymptoms=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                            <div class="form-group mg-md-l--1 bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">House to house survey and surveillance<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="hthSurveynSurvlnc" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($ehthSurveynSurvlnc=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($ehthSurveynSurvlnc=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                            <div class="form-group mg-md-l--1 bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Clinical management of all cases as per protocol <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="clinicMngmnt" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($eclinicMngmnt=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($eclinicMngmnt=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                            <div class="form-group mg-md-l--1 bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Counseling and educating people and establishing effective communication strategies<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="counselling" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($ecounselling=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($ecounselling=="N"){ echo 'selected="selected"';} ?>> No</option>;
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
                            <div class="form-group mg-md-l--1 bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Regular Sensitization and Cleanness of the area<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="regSensitizn" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($eregSensitizn=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($eregSensitizn=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                            <div class="form-group mg-md-l--1 bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Download of Aarogyasetu App among the resident of Containment Zone<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="ddArApResContnmnt" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($eddArApResContnmnt=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($eddArApResContnmnt=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                            <div class="form-group mg-md-l--1 bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Supply of essentials and medical requirement <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="supplyEsnMedicine" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                       
                                        <option value="Y" <?php if($esupplyEsnMedicine=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($esupplyEsnMedicine=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Supply of essentials/facilites in respect of the Containment Zone <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="supplyEsFacility" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($esupplyEsFacility=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($esupplyEsFacility=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Barricaded the Containment Zone<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="barricade" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($ebarricade=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($ebarricade=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Control Room Establish<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="controlRoom" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($econtrolRoom=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($econtrolRoom=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                        <!-- col-4--> 
                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/co/co_update') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">Block/Circle</th>
                                <th class="text-capitalize text-center">Incident Commander</th>
                                <th class="text-capitalize text-center">PS</th>
                                <th class="text-capitalize text-center">Containment Zone/Place</th>
                                <th class="text-capitalize text-center">Enforcement</th>
                                <th class="text-capitalize text-center">Withdrawl</th>
                                <th class="text-capitalize text-center">Contact Tracing to be done</th>
                                <th class="text-capitalize text-center">No. Of Person Identified</th>
                                <th class="text-capitalize text-center">Special Cell for Home or Institutional Quarantine of individual on risk assessment</th>
                                <th class="text-capitalize text-center">Testing of all Cases with severe acute repiratory infection (SARI) influenza like illness (ILI) and other symptoms</th>
                                <th class="text-capitalize text-center">House to house survey and surveillance</th>
                                <th class="text-capitalize text-center">Clinical management of all cases as per protocol </th>
                                <th class="text-capitalize text-center">Counseling and educating people and establishing effective communication strategies </th>
                                <th class="text-capitalize text-center">Regular Sensitization and Cleanness of the area</th>
                                <th class="text-capitalize text-center">Download of Aarogyasetu App among the resident of Containment Zone</th>
                                <th class="text-capitalize text-center">Supply of essentials and medical requirement</th>
                                <th class="text-capitalize text-center">Supply of essentials/facilites in respect of the Containment Zone</th>
                                <th class="text-capitalize text-center">Barricaded the Containment Zone</th>
                                <th class="text-capitalize text-center">Control Room Establish</th>
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
                                        <td class="text-center"><?php echo $tod->blkName; ?></td>
                                        <td class="text-center"><?php echo $tod->IncCmndr; ?></td>
                                        <td class="text-center"><?php echo $tod->PS; ?></td>
                                        <td class="text-center"><?php echo $tod->contZonePlace; ?></td>
                                        <td class="text-center"><?php 
                                        $Enforcementdate = date('d-m-Y', strtotime($tod->Enforcementdate));
                                        echo  $Enforcementdate;
                                        ?></td>
                                        <td class="text-center"><?php 
                                        $WithdrawalDate = date('d-m-Y', strtotime($tod->WithdrawalDate));
                                        echo  $WithdrawalDate;
                                        ?></td>
                                        <td class="text-center"><?php 
                                            if($tod->conTraceDone=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            echo $tod->nopIdentified;
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->splCellforQuarantine=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->testSymptoms=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->hthSurveynSurvlnc=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->clinicMngmnt=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->counselling=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->regSensitizn=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->ddArApResContnmnt=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->supplyEsnMedicine=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->supplyEsFacility=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->barricade=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->controlRoom=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/co/edit_co_update/' . $tod->chId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                                            </div>
                                        </td>
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="21" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                        </tbody>
                        <!--Table Footer-->
                       <thead class="thead-colored thead-teal">
                                <?php 
                                if(count($todayEntries)){
                                    //variable declaration
                                $nopIdentified=0;
                               
                                    //total count
                                foreach ($todayEntries as $tod) {
                                  $nopIdentified+=$tod->nopIdentified;
                                }
                            
                                     ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th colspan="7"></th>
                                    <th class="text-capitalize text-center"><?php echo $nopIdentified ?></th>
                                    
                                    
                                    <th class="text-capitalize text-center" colspan="11"></th>
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
  
    //Show or hide nopIdentified box in ADD mode
    function show_hide_input(){
        var value=document.getElementById('conTraceDone').value;
        if(value=='Y')
        {
            document.getElementById('nopIdentified').removeAttribute('hidden');
            
            document.getElementById('nopIdentified').value='';
        }
        else{
            document.getElementById('nopIdentified').setAttribute('hidden','true');
            document.getElementById('nopIdentified').value=0;
          }  
    }
    //Show or hide nopIdentified box in edit mode
    <?php if($this->uri->segment(4)){ ?>
    show_hide_input_edit();
    <?php } ?>
    function show_hide_input_edit(){
        var value=document.getElementById('conTraceDone').value;
        if(value=='Y')
        {
            document.getElementById('nopIdentified').removeAttribute('hidden');
           <?php if($nopIdentified==0) {?>
            document.getElementById('nopIdentified').value="";
           <?php }
           else{ ?>
            document.getElementById('nopIdentified').value="<?php echo $nopIdentified ?>";
           <?php } ?>
        }
        else{
            document.getElementById('nopIdentified').setAttribute('hidden','true');
            document.getElementById('nopIdentified').value=0;
          }  
    }
    

</script>
</html>