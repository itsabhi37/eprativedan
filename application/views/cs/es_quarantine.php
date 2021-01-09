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
                <span class="breadcrumb-item active">Essential Services On QC</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Essential Services Available On Quarantine Centre</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Essential Services Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/cs/update_es_quarantine', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/cs/insert_es_quarantine', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $eesqcId         =   $singleRecord->esqcId;                        
                        $ecentId         =   $singleRecord->centId;
                        $enoBed          =   $singleRecord->noBed;
                        $enopIn          =   $singleRecord->nopIn;
                        $enopCompleted   =   $singleRecord->nopCompleted;
                        $eDwFacility     =   $singleRecord->DwFacility;
                        $eelecFacility   =   $singleRecord->elecFacility;
                        $etoiletFacility =   $singleRecord->toiletFacility;
                        $efoodFacility   =   $singleRecord->foodFacility;
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Quarantine Center: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbQuarantine" class="form-control select2-show-search" data-placeholder="Select Quarantine Center Name" required>
                                    <option value="">Select Quarantine Center Name</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                        if (count($quarantineCenter)) {
                                            foreach ($quarantineCenter as $qc) {
                                                if ($qc->csqcId == $ecentId) {
                                                    echo '<option value="' . $qc->csqcId . '" selected>' . $qc->csqcName . '</option>';
                                                } else {
                                                    echo '<option value="' . $qc->csqcId . '">' . $qc->csqcName . '</option>';
                                                }
                                            }
                                        }
                                    } else {
                                        // Add New Mode
                                        if (count($quarantineCenter)) {
                                            foreach ($quarantineCenter as $qc) {
                                                echo '<option value="' . $qc->csqcId . '">' . $qc->csqcName . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Total No of Beds: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtTNOB" value="'.$enoBed.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="txtesqcId" value="'.$eesqcId.'" readonly="true" hidden="true">';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtTNOB" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">No of Persons in QC: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtNOQC" value="'.$enopIn.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtNOQC" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-md-4 mg-t--1">
                            <div class="form-group">
                            <label class="form-control-label text-capitalize tx-bold">Total No of People who Completed Quarantine: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtTNOPWCQ" value="'.$enopCompleted.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtTNOPWCQ" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>    
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Drinking Water: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbDrinkingWater" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($eDwFacility=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($eDwFacility=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                    <?php
                                    } else {
                                        // Add New Mode
                                        echo '<option value="Y">Yes</option>';
                                        echo '<option value="N">No</option>';
                                    }
                                    ?>
                                </select>                               
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1">
                            <div class="form-group mg-md-l--1">
                            <label class="form-control-label text-capitalize tx-bold">Electricity: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbElectricity" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($eelecFacility=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($eelecFacility=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                    <?php
                                    } else {
                                        // Add New Mode
                                        echo '<option value="Y">Yes</option>';
                                        echo '<option value="N">No</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-md-4 mg-t--1">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Toilets: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbToilets" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($etoiletFacility=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($etoiletFacility=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                    <?php
                                    } else {
                                        // Add New Mode
                                        echo '<option value="Y">Yes</option>';
                                        echo '<option value="N">No</option>';
                                    }
                                    ?>
                                </select>                                 
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1">
                            <div class="form-group mg-md-l--1">                                
                                <label class="form-control-label text-capitalize tx-bold">Food: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbFood" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($efoodFacility=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($efoodFacility=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                    <?php
                                    } else {
                                        // Add New Mode
                                        echo '<option value="Y">Yes</option>';
                                        echo '<option value="N">No</option>';
                                    }
                                    ?>
                                </select>                              
                            </div>
                        </div><!-- col-4 -->                        
                        <div class="col-md-4 mg-t--1">
                            <div class="form-group mg-md-l--1">                                                                
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/cs/es_quarantine') ?>">Cancel</a>
                    </div><!-- form-group -->
                </div><!-- form-layout -->
                <!-- If Error Occurs Message Show in this Section-->
                <?php if ($this->session->flashdata('error') || validation_errors()==TRUE) : ?>
                    <div id="errordismiss" class="mt-2 alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-close alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                            <span><strong>Error!</strong> 
                            <?php if($error=$this->session->flashdata('error')){echo $error;}?>
                            <?php echo validation_errors(); ?> 
                            </span>
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

                <div class="bd rounded table-responsive mt-4">
                    <table class="table table-bordered mg-b-0" id="truenat">
                        <thead class="thead-colored thead-teal">
                            <tr>
                                <th class="text-capitalize text-center">Sl. No.</th>
                                <th class="text-capitalize text-center">Quarantine Center Name </th>
                                <th class="text-capitalize text-center">Total No. of Beds</th>
                                <th class="text-capitalize text-center">No. of Persons in QC</th>
                                <th class="text-capitalize text-center">Total No. of People who Completed Quarantine</th>
                                <th class="text-capitalize text-center">Drinking Water</th>
                                <th class="text-capitalize text-center">Electricity</th>
                                <th class="text-capitalize text-center">Toilets</th>
                                <th class="text-capitalize text-center">Food</th>
                                <th class="text-capitalize text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($todayEntries)) { ?>
                                <?php $sln = 0;
                                foreach ($todayEntries as $tode) {
                                    $sln = $sln + 1; ?>
                                    <tr class="text-inverse">
                                        <td class="text-center"><?php echo $sln; ?></td>
                                        <td class="text-center"><?php echo $tode->csqcName; ?></td>
                                        <td class="text-center"><?php echo $tode->noBed; ?></td>
                                        <td class="text-center"><?php echo $tode->nopIn; ?></td>
                                        <td class="text-center"><?php echo $tode->nopCompleted; ?></td>
                                        <td class="text-center"><?php if($tode->DwFacility=='Y'){ echo 'Yes';} if($tode->DwFacility=='N'){ echo 'No';} ?></td>
                                        <td class="text-center"><?php if($tode->elecFacility=='Y'){ echo 'Yes';} if($tode->elecFacility=='N'){ echo 'No';} ?></td>
                                        <td class="text-center"><?php if($tode->toiletFacility=='Y'){ echo 'Yes';} if($tode->toiletFacility=='N'){ echo 'No';} ?></td>
                                        <td class="text-center"><?php if($tode->foodFacility=='Y'){ echo 'Yes';} if($tode->foodFacility=='N'){ echo 'No';} ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/cs/edit_es_quarantine/' . $tode->esqcId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                                            </div>
                                        </td>
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="10" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                        </tbody>

                        <!-- Table Footer Data Total Viewer -->
                        <?php if (count($todayEntries)) { ?>
                            <thead class="thead-colored thead-teal">
                                <?php
                                $TNOB   =   0;  //  Total Number of Bed
                                $TNOPIQC   =   0;  //  No. of Persons in QC
                                $TNOPWCQ   =   0;  //  Total No. of People who Completed Quarantine

                                foreach ($todayEntries as $tode) {
                                    $TNOB = $TNOB + $tode->noBed;
                                    $TNOPIQC = $TNOPIQC + $tode->nopIn;
                                    $TNOPWCQ = $TNOPWCQ + $tode->nopCompleted;
                                }
                                ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th class="text-capitalize text-center"></th>
                                    <th class="text-capitalize text-center"><?php echo $TNOB; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $TNOPIQC; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $TNOPWCQ; ?></th>
                                    <th class="text-capitalize text-center"></th>
                                    <th class="text-capitalize text-center"></th>
                                    <th class="text-capitalize text-center"></th>
                                    <th class="text-capitalize text-center"></th>
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
</script>

</html>