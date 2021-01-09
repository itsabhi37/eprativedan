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
                <span class="breadcrumb-item active">Doctor Availability</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Doctor Availability</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Doctor Availability Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/cs/update_doctor_availability', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/cs/insert_doctor_availability', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $eid           =   $singleRecord->id;                        
                        $egvtdoc       =   $singleRecord->gvtdoc;
                        $epvtdoc       =   $singleRecord->pvtdoc;
                        $eretdoc       =   $singleRecord->retdoc;
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Government Doctors: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="gvtdoc" value="'.$egvtdoc.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="txtid" value="'.$eid.'" readonly="true" hidden="true">';
                                }else{
                                    echo '<input class="form-control" type="text" name="gvtdoc" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?> 
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Private Doctors: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="pvtdoc" value="'.$epvtdoc.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="pvtdoc" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Retired Doctors: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="retdoc" value="'.$eretdoc.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="retdoc" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/cs/doctor_availability') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">Government Doctors</th>
                                <th class="text-capitalize text-center">Private Doctors</th>
                                <th class="text-capitalize text-center">Retired Doctors</th>
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
                                        <td class="text-center"><?php echo $tode->gvtdoc; ?></td>
                                        <td class="text-center"><?php echo $tode->pvtdoc; ?></td>
                                        <td class="text-center"><?php echo $tode->retdoc; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/cs/edit_doctor_availability/' . $tode->id) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                                            </div>
                                        </td>
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="5" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                        </tbody>

                        <!-- Table Footer Data Total Viewer -->
                        <?php if (count($todayEntries)) { ?>
                            <thead class="thead-colored thead-teal">
                                <?php
                                $gvtdoc   =   0;  //  Government Doctors
                                $pvtdoc   =   0;  //  Private Doctors
                                $retdoc   =   0;  //  Retired Doctors

                                foreach ($todayEntries as $tode) {
                                    $gvtdoc = $gvtdoc + $tode->gvtdoc;
                                    $pvtdoc = $pvtdoc + $tode->pvtdoc;
                                    $retdoc = $retdoc + $tode->retdoc;
                                }
                                ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>                                    
                                    <th class="text-capitalize text-center"><?php echo $gvtdoc; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $pvtdoc; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $retdoc; ?></th>
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