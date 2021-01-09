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
                <span class="breadcrumb-item active">Pension Distribution</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Pension Distribution</h4>
            
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Pension Distribution Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/ssc/update_ssc_update', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/ssc/insert_ssc_update', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $esscId                    =   $singleRecord->sscId;
                        $enopSSPension             =   $singleRecord->nopSSPension;
                        $emonth                    =   $singleRecord->month;
                        
                        
                        
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <!-- col-4-->
                       

                        <div class="col-md-6 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Number of persons distributed Social Security Pension for (Previous Month)<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopSSPension" name="nopSSPension" value="' . $enopSSPension . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="sscId" value="' . $esscId . '" readonly="true" hidden="true">';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopSSPension" name="nopSSPension" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                        <div class="col-md-6 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-sm-l-1-force bd-md-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Month<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="date" id="month" name="month" value="' . $emonth . '" required>';
                                } else {
                                    echo '<input class="form-control" type="date" id="month" name="month" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div>

                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/ssc/ssc_update') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">Number of persons distributed Social Security Pension for (Previous Month)</th>
                                <th class="text-capitalize text-center">Month</th>
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
                                        <td class="text-center"><?php echo $tod->nopSSPension; ?></td>
                                        <td class="text-center"><?php 
                                        echo date('m-Y',strtotime($tod->month)); 
                                        ?></td>
                                        
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/ssc/edit_ssc_update/' . $tod->sscId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
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
                        <!--Table Footer-->
                        <thead class="thead-colored thead-teal">
                                <?php 
                                if(count($todayEntries)){
                                    //variable declaration
                                $nopSSPension=0;
                               
                                    //total count
                                foreach ($todayEntries as $tod) {
                                   $nopSSPension+=$tod->nopSSPension;
                                }
                            
                                     ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th class="text-capitalize text-center"><?php echo $nopSSPension ?></th>
                                    <th class="text-capitalize text-center"></th>
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