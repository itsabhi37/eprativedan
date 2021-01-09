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
                <span class="breadcrumb-item active">Quaratine Status Blockwise Update</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Quaratine Status Blockwise Update</h4>
            
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Quaratine Status Blockwise Update Report Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/bdo/update_bdo_update', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/bdo/insert_bdo_update', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                    $eqsbId                =   $singleRecord->qsbId;
                    $eblkId                =   $singleRecord->blkId;
                    $enopHomeQuarantine                =   $singleRecord->nopHomeQuarantine;
                    $enopGovtQuarantine                =   $singleRecord->nopGovtQuarantine;
                    $enopCompleteQrtn                =   $singleRecord->nopCompleteQrtn;
                    $enopFromOtherCity                =   $singleRecord->nopFromOtherCity;
                    $enopStamped                =   $singleRecord->nopStamped;
                    $enoBedInstalled                =   $singleRecord->noBedInstalled;
                    $enoOperationalQuarantineCentre = $singleRecord->noOperationalQuarantineCentre;
                    $enoBedsOperationalQuarantine =   $singleRecord->noBedsOperationalQuarantine;
                    $edwFacilityAvlbl                =   $singleRecord->dwFacilityAvlbl;
                    $eelectricityFacilityAvlbl    =   $singleRecord->electricityFacilityAvlbl;
                    $efodFacilityAvlbl                =   $singleRecord->fodFacilityAvlbl;
                    $etoiletFacilityAvlbl           =   $singleRecord->toiletFacilityAvlbl;
                        
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
                                    echo '<input class="form-control" type="text" id="blkId" name="blkId" value="'.$circle[0]->blkId.'"  placeholder="" hidden="true" required>';//blkId 
                               
                                ?>
                        </div>
                        </div>

                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of People in Home Quarantine (At Present)<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopHomeQuarantine" name="nopHomeQuarantine" value="' . $enopHomeQuarantine . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="qsbId" value="' . $eqsbId . '" readonly="true" hidden="true">';//primary key
                                } else {
                                    echo '<input class="form-control" type="text" id="nopHomeQuarantine" name="nopHomeQuarantine" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of People in Govt. Quarantine Center (At Present)<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopGovtQuarantine" name="nopGovtQuarantine" value="' . $enopGovtQuarantine . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopGovtQuarantine" name="nopGovtQuarantine" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of People Completed Qurantine till date<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopCompleteQrtn" name="nopCompleteQrtn" value="' . $enopCompleteQrtn . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopCompleteQrtn" name="nopCompleteQrtn" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of People coming from other city after 15 Feb 2020<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopFromOtherCity" name="nopFromOtherCity" value="' . $enopFromOtherCity . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopFromOtherCity" name="nopFromOtherCity" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of People Stamped<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopStamped" name="nopStamped" value="' . $enopStamped . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopStamped" name="nopStamped" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Beds (Total Installed)<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noBedInstalled" name="noBedInstalled" value="' . $enoBedInstalled . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noBedInstalled" name="noBedInstalled" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Operational Quarantine Centre (At Present)<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noOperationalQuarantineCentre" name="noOperationalQuarantineCentre" value="' . $enoOperationalQuarantineCentre . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noOperationalQuarantineCentre" name="noOperationalQuarantineCentre" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group bd-l-0-force bd-b-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Number of Beds in Operational Quarantine Centre<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="noBedsOperationalQuarantine" name="noBedsOperationalQuarantine" value="' . $enoBedsOperationalQuarantine . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="noBedsOperationalQuarantine" name="noBedsOperationalQuarantine" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        <!--col-4-->
                        <!--col-3-->
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Facility Available<br>(Drinking Water)<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="dwFacilityAvlbl" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($edwFacilityAvlbl=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($edwFacilityAvlbl=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Facility Available<br>(Electricity)<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="electricityFacilityAvlbl" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($eelectricityFacilityAvlbl=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($eelectricityFacilityAvlbl=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Facility Available<br>(Food)<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="fodFacilityAvlbl" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($efodFacilityAvlbl=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($efodFacilityAvlbl=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Facility Available<br>(Toilet)<span class="tx-danger">*</span></label>
                                <select id="select2-a" name="toiletFacilityAvlbl" class="form-control select2-show-search" data-placeholder="Select Status" required>
                                    <option value="">Select Status</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                    ?>
                                        <option value="Y" <?php if($etoiletFacilityAvlbl=="Y"){ echo 'selected="selected"';} ?>> Yes</option>;
                                        <option value="N" <?php if($etoiletFacilityAvlbl=="N"){ echo 'selected="selected"';} ?>> No</option>;
                                        
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
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/bdo/bdo_update') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">Block/Circle Name</th>
                                <th class="text-capitalize text-center">Number of People in Home Quarantine (At Present)</th>
                                <th class="text-capitalize text-center">Number of People in Govt. Quarantine Center (At Present)</th>
                                <th class="text-capitalize text-center">Number of People Completed Qurantine till date</th>
                                <th class="text-capitalize text-center">Number of People coming from other city after 15 Feb 2020</th>
                                <th class="text-capitalize text-center">Number of People Stamped</th>
                                <th class="text-capitalize text-center">Number of Beds (Total Installed)</th>
                                <th class="text-capitalize text-center">Number of Operational Quarantine Centre (At Present)</th>
                                <th class="text-capitalize text-center">Number of Beds in Operational Quarantine Centre</th>
                                <th class="text-capitalize text-center">Facility at QC (Drinking Water)</th>
                                <th class="text-capitalize text-center">Facility at QC (Electricity)</th>
                                <th class="text-capitalize text-center">Facility at QC (Food)</th>
                                <th class="text-capitalize text-center">Facility at QC (Toilet)</th>
                                
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
                                        <td class="text-center"><?php echo $tod->nopHomeQuarantine; ?></td>
                                        <td class="text-center"><?php echo $tod->nopGovtQuarantine; ?></td>
                                        <td class="text-center"><?php echo $tod->nopCompleteQrtn; ?></td>
                                        <td class="text-center"><?php echo $tod->nopFromOtherCity; ?></td>
                                        <td class="text-center"><?php echo $tod->nopStamped; ?></td>
                                        <td class="text-center"><?php echo $tod->noBedInstalled; ?></td>
                                        <td class="text-center"><?php echo $tod->noOperationalQuarantineCentre; ?></td>
                                        <td class="text-center"><?php echo $tod->noBedsOperationalQuarantine; ?></td>
                                        <td class="text-center"><?php 
                                            if($tod->dwFacilityAvlbl=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->electricityFacilityAvlbl=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->fodFacilityAvlbl=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->toiletFacilityAvlbl=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                        
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/bdo/edit_bdo_update/' . $tod->qsbId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                                            </div>
                                        </td>
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="13" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                        </tbody>
                        <!--Table Footer-->
                       <thead class="thead-colored thead-teal">
                                <?php 
                                if(count($todayEntries)){
                                    //variable declaration
                                $nopHomeQuarantine=0;
                                $nopGovtQuarantine=0;
                                $nopCompleteQrtn=0;
                                $nopFromOtherCity=0;
                                $nopStamped=0;
                                $noBedInstalled=0;
                                $noOperationalQuarantineCentre=0;
                                $noBedsOperationalQuarantine=0;
                               
                                    //total count
                                foreach ($todayEntries as $tod) {
                                  $nopHomeQuarantine+=$tod->nopHomeQuarantine;
                                  $nopGovtQuarantine+=$tod->nopGovtQuarantine;
                                  $nopCompleteQrtn+=$tod->nopCompleteQrtn;
                                  $nopFromOtherCity+=$tod->nopFromOtherCity;
                                  $nopStamped+=$tod->nopStamped;
                                  $noBedInstalled+=$tod->noBedInstalled;
                                  $noOperationalQuarantineCentre+=$tod->noOperationalQuarantineCentre;
                                  $noBedsOperationalQuarantine+=$tod->noBedsOperationalQuarantine;
                                }
                            
                                     ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th colspan></th>
                                    <th class="text-capitalize text-center"><?php echo $nopHomeQuarantine ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopGovtQuarantine ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopCompleteQrtn ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopFromOtherCity ?></th>
                                    <th class="text-capitalize text-center"><?php echo $nopStamped ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noBedInstalled ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noOperationalQuarantineCentre ?></th>
                                    <th class="text-capitalize text-center"><?php echo $noBedsOperationalQuarantine ?></th>
                                    
                                    
                                    <th class="text-capitalize text-center" colspan="4"></th>
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