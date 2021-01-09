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
                <span class="breadcrumb-item active">TrueNat Testing</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">TrueNat Testing</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Today's TrueNat Testing Report Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/pmch/update_TruenatRecord', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/pmch/insert_TruenatRecord', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $ettestId                       =   $singleRecord->ttestId;
                        $ettlId                         =   $singleRecord->ttlId;
                        $esamplesCollectedTillDate      =   $singleRecord->samplesCollectedTillDate;
                        $etestConductedTillDate         =   $singleRecord->testConductedTillDate;
                        $eentriesDonePortal             =   $singleRecord->entriesDonePortal;
                        $eposCaseIdentifyTillDate       =   $singleRecord->posCaseIdentifyTillDate;
                        $esamplesCollectedToday         =   $singleRecord->samplesCollectedToday;
                        $etestConductedToday            =   $singleRecord->testConductedToday;
                        $eposIdentifiedToday            =   $singleRecord->posIdentifiedToday;
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Facility: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbFacility" class="form-control select2-show-search" data-placeholder="Select Facility Name" required>
                                    <option value="">Select Facility Name</option>
                                    <?php

                                    if($this->uri->segment(4)){
                                        // Edit Mode
                                        if (count($facility)) {
                                            foreach ($facility as $fac) {
                                                if($fac->ttlId == $ettlId){
                                                    echo '<option value="' . $fac->ttlId . '" selected>' . $fac->ttlName . '</option>';
                                                }else{
                                                    echo '<option value="' . $fac->ttlId . '">' . $fac->ttlName . '</option>';
                                                }                                                
                                            }
                                        }
                                    }else{
                                        // Add New Mode
                                        if (count($facility)) {
                                            foreach ($facility as $fac) {
                                                echo '<option value="' . $fac->ttlId . '">' . $fac->ttlName . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Total Samples Collected Till Date: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtTSCTD" value="'.$esamplesCollectedTillDate.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="txtttestId" value="'.$ettestId.'" readonly="true" hidden="true">';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtTSCTD" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Total Test conducted till date: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtTTCTD" value="'.$etestConductedTillDate.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtTTCTD" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                                
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-md-4">
                            <div class="form-group bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">No of entries done in Portal: <span class="tx-danger">*</span></label>
                                <?php 
                                    if ($this->uri->segment(4)) {
                                        echo '<input class="form-control" type="text" name="txtNOEDIP" value="'.$eentriesDonePortal.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    }else{
                                        echo '<input class="form-control" type="text" name="txtNOEDIP" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    }
                                ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Total +ve cases identified till date: <span class="tx-danger">*</span></label>
                                <?php 
                                    if ($this->uri->segment(4)) {
                                        echo '<input class="form-control" type="text" name="txtTPCITD" value="'.$eposCaseIdentifyTillDate.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    }else{
                                        echo '<input class="form-control" type="text" name="txtTPCITD" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    }
                                ?>
                                
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">No of Samples collected today: <span class="tx-danger">*</span></label>
                                <?php 
                                    if ($this->uri->segment(4)) {
                                        echo '<input class="form-control" type="text" name="txtNOSCT" value="'.$esamplesCollectedToday.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    }else{
                                        echo '<input class="form-control" type="text" name="txtNOSCT" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    }
                                ?>
                                
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-md-4">
                            <div class="form-group bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Total test conducted today: <span class="tx-danger">*</span></label>
                                <?php 
                                    if ($this->uri->segment(4)) {
                                        echo '<input class="form-control" type="text" name="txtTTCD" value="'.$etestConductedToday.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    }else{
                                        echo '<input class="form-control" type="text" name="txtTTCD" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    }?>
                                
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-8">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">No of +ve cases identified today: <span class="tx-danger">*</span></label>
                                <?php 
                                    if ($this->uri->segment(4)) {
                                        echo '<input class="form-control" type="text" name="txtNOPCID" value="'.$eposIdentifiedToday.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    }else{
                                        echo '<input class="form-control" type="text" name="txtNOPCID" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    }?>
                                
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/pmch/truenat') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">Facility</th>
                                <th class="text-capitalize text-center">Total Samples Collected Till Date</th>
                                <th class="text-capitalize text-center">Total Test conducted till date</th>
                                <th class="text-capitalize text-center">No of entries done in Portal</th>
                                <th class="text-capitalize text-center">Total +ve cases identified till date</th>
                                <th class="text-capitalize text-center">No of Samples collected today</th>
                                <th class="text-capitalize text-center">Total test conducted today</th>
                                <th class="text-capitalize text-center">No of +ve cases identified today</th>
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
                                        <td class="text-center"><?php echo $tod->ttlName; ?></td>
                                        <td class="text-center"><?php echo $tod->samplesCollectedTillDate; ?></td>
                                        <td class="text-center"><?php echo $tod->testConductedTillDate; ?></td>
                                        <td class="text-center"><?php echo $tod->entriesDonePortal; ?></td>
                                        <td class="text-center"><?php echo $tod->posCaseIdentifyTillDate; ?></td>
                                        <td class="text-center"><?php echo $tod->samplesCollectedToday; ?></td>
                                        <td class="text-center"><?php echo $tod->testConductedToday; ?></td>
                                        <td class="text-center"><?php echo $tod->posIdentifiedToday; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/pmch/edit_TruenatRecord/' . $tod->ttestId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                                            </div>
                                        </td>
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