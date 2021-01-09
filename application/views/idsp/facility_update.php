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
                <span class="breadcrumb-item active">COVID Facility Update</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">COVID Facility Update</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">COVID Facility Update Report Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/idsp/update_facility_update', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/idsp/insert_facility_update', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $ecvfId          =   $singleRecord->cvfId;
                        $ecvfNameId      =   $singleRecord->cvfNameId;
                        $eDCH            =   $singleRecord->DCH;
                        $eDCHC           =   $singleRecord->DCHC;
                        $eCCC            =   $singleRecord->CCC;
                        $enoBedInstalled =   $singleRecord->noBedInstalled;
                        $enoBedOccupied  =   $singleRecord->noBedOccupied;
                        $enoBedVacant    =   $singleRecord->noBedVacant;
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">COVID Facility Name: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbFacility" class="form-control select2-show-search" data-placeholder="Select Facility Name" required>
                                    <option value="">Select Facility Name</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                        if (count($covidfacility)) {
                                            foreach ($covidfacility as $cfac) {
                                                if ($cfac->cvfNameId == $ecvfNameId) {
                                                    echo '<option value="' . $cfac->cvfNameId . '" selected>' . $cfac->cvdFacilityName . '</option>';
                                                } else {
                                                    echo '<option value="' . $cfac->cvfNameId . '">' . $cfac->cvdFacilityName . '</option>';
                                                }
                                            }
                                        }
                                    } else {
                                        // Add New Mode
                                        if (count($covidfacility)) {
                                            foreach ($covidfacility as $cfac) {
                                                echo '<option value="' . $cfac->cvfNameId . '">' . $cfac->cvdFacilityName . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">DCH: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbDCH" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($eDCH=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($eDCH=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        <option value="NA" <?php if($eDCH=="NA"){ echo 'selected="selected"';} ?>> Not Applicable</option>;
                                    <?php
                                    } else {
                                        // Add New Mode
                                        echo '<option value="Y">Yes</option>';
                                        echo '<option value="N">No</option>';
                                        echo '<option value="NA">Not Applicable</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">DCHC: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbDCHC" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($eDCHC=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($eDCHC=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        <option value="NA" <?php if($eDCHC=="NA"){ echo 'selected="selected"';} ?>> Not Applicable</option>;
                                    <?php
                                    } else {
                                        // Add New Mode
                                        echo '<option value="Y">Yes</option>';
                                        echo '<option value="N">No</option>';
                                        echo '<option value="NA">Not Applicable</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-md-3">
                            <div class="form-group bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">CCC: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbCCC" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($eCCC=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($eCCC=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        <option value="NA" <?php if($eCCC=="NA"){ echo 'selected="selected"';} ?>> Not Applicable</option>;
                                    <?php
                                    } else {
                                        // Add New Mode
                                        echo '<option value="Y">Yes</option>';
                                        echo '<option value="N">No</option>';
                                        echo '<option value="NA">Not Applicable</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-md-3">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">No of Beds Installed: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtNOBI" name="txtNOBI" value="' . $enoBedInstalled . '" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="txtcvfId" value="' . $ecvfId . '" readonly="true" hidden="true">';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtNOBI" name="txtNOBI" value="" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-md-3">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                            <label class="form-control-label text-capitalize tx-bold">No of Beds Occupied: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtNOBO" name="txtNOBO" value="' . $enoBedOccupied . '" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtNOBO" name="txtNOBO" value="" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-md-3">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">No of Beds Vaccant: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtNOBV" name="txtNOBV" value="' . $enoBedVacant . '" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" readonly required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtNOBV" name="txtNOBV" value="" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" readonly required>';
                                }
                                ?>

                            </div>
                        </div><!-- col-3 -->

                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/idsp/facility_update') ?>">Cancel</a>
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

                <div class="bd rounded table-responsive mt-4">
                    <table class="table table-bordered mg-b-0" id="truenat">
                        <thead class="thead-colored thead-teal">
                            <tr>
                                <th class="text-capitalize text-center">Sl. No.</th>
                                <th class="text-capitalize text-center">COVID Facility Name </th>
                                <th class="text-capitalize text-center">DCH</th>
                                <th class="text-capitalize text-center">DCHC</th>
                                <th class="text-capitalize text-center">CCC</th>
                                <th class="text-capitalize text-center">No of Beds Installed</th>
                                <th class="text-capitalize text-center">No of Beds Occupied</th>
                                <th class="text-capitalize text-center">No of Beds Vaccant</th>
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
                                        <td class="text-center"><?php echo $tod->cvdFacilityName; ?></td>
                                        <td class="text-center">
                                        <?php 
                                            if($tod->DCH=='Y'){
                                                echo 'Yes';
                                            }else if($tod->DCH=='N'){
                                                echo 'No';    
                                            }else{
                                                echo 'Not Applicable';  
                                            } 
                                        ?>
                                        </td>
                                        <td class="text-center">
                                        <?php 
                                            if($tod->DCHC=='Y'){
                                                echo 'Yes';
                                            }else if($tod->DCHC=='N'){
                                                echo 'No';    
                                            }else{
                                                echo 'Not Applicable';  
                                            } 
                                        ?>
                                        </td>
                                        <td class="text-center">
                                        <?php 
                                            if($tod->CCC=='Y'){
                                                echo 'Yes';
                                            }else if($tod->CCC=='N'){
                                                echo 'No';    
                                            }else{
                                                echo 'Not Applicable';  
                                            } 
                                        ?>
                                        </td>
                                        <td class="text-center"><?php echo $tod->noBedInstalled; ?></td>
                                        <td class="text-center"><?php echo $tod->noBedOccupied; ?></td>
                                        <td class="text-center"><?php echo $tod->noBedVacant; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/idsp/edit_facility_update/' . $tod->cvfId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                                            </div>
                                        </td>
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="8" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                        </tbody>

                        <!-- Table Footer Data Total Viewer -->
                        <?php if (count($todayEntries)) { ?>
                            <thead class="thead-colored thead-teal">
                                <?php
                                $NOBI   =   0;  //  No of Beds Installed
                                $NOBO    =   0;  //  No of Beds Occupied
                                $NOBV   =   0;  //  No of Beds Vaccant

                                foreach ($todayEntries as $tod) {
                                    $NOBI = $NOBI + $tod->noBedInstalled;
                                    $NOBO = $NOBO + $tod->noBedOccupied;
                                    $NOBV = $NOBV + $tod->noBedVacant;
                                }
                                ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th class="text-capitalize text-center" colspan="4"></th>
                                    <th class="text-capitalize text-center"><?php echo $NOBI; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $NOBO; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $NOBV; ?></th>
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