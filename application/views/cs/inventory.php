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
                <span class="breadcrumb-item active">Inventory</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Inventory</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Inventory Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/cs/update_inventory', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/cs/insert_inventory', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $einId           =   $singleRecord->inId;                        
                        $ethermalScanner =   $singleRecord->thermalScanner;
                        $egloves         =   $singleRecord->gloves;
                        $esanitizer500ml =   $singleRecord->sanitizer500ml;
                        $esanitizer600ml =   $singleRecord->sanitizer600ml;
                        $esanitizer5L    =   $singleRecord->sanitizer5L;
                        $esanitizer15L   =   $singleRecord->sanitizer15L;
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Thermal Scanner: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtThermalScanner" value="'.$ethermalScanner.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="txtinId" value="'.$einId.'" readonly="true" hidden="true">';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtThermalScanner" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?> 
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Gloves: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtGloves" value="'.$egloves.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtGloves" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Sanitizer (500 ml): <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtS500" value="'.$esanitizer500ml.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtS500" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-md-4 mg-t--1">
                            <div class="form-group">
                            <label class="form-control-label text-capitalize tx-bold">Sanitizer (600 ml): <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtS600" value="'.$esanitizer600ml.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtS600" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>    
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1">
                            <div class="form-group mg-md-l--1">
                            <label class="form-control-label text-capitalize tx-bold">Sanitizer (5 l): <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtS5L" value="'.$esanitizer5L.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtS5L" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                               
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1">
                            <div class="form-group mg-md-l--1">
                            <label class="form-control-label text-capitalize tx-bold">Sanitizer (15 l): <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtS15L" value="'.$esanitizer15L.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtS15L" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?> 
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/cs/inventory') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">Thermal Scanner</th>
                                <th class="text-capitalize text-center">Gloves</th>
                                <th class="text-capitalize text-center">Sanitizer (500 ml)</th>
                                <th class="text-capitalize text-center">Sanitizer (600 ml)</th>
                                <th class="text-capitalize text-center">Sanitizer (5 l)</th>
                                <th class="text-capitalize text-center">Sanitizer (15 l)</th>
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
                                        <td class="text-center"><?php echo $tode->thermalScanner; ?></td>
                                        <td class="text-center"><?php echo $tode->gloves; ?></td>
                                        <td class="text-center"><?php echo $tode->sanitizer500ml; ?></td>
                                        <td class="text-center"><?php echo $tode->sanitizer600ml; ?></td>
                                        <td class="text-center"><?php echo $tode->sanitizer5L; ?></td>
                                        <td class="text-center"><?php echo $tode->sanitizer15L; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/cs/edit_inventory/' . $tode->inId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
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
                                $TTS   =   0;  //  Total Thermal Scanner
                                $TG   =   0;  //  Total Gloves
                                $TS500ML   =   0;  //  Total Sanitizer (500 ml)
                                $TS600ML   =   0;  //  Total Sanitizer (600 ml)
                                $TS5L   =   0;  //  Total Sanitizer (5 l) 	
                                $TS15L   =   0;  //  Total Sanitizer (15 l)

                                foreach ($todayEntries as $tode) {
                                    $TTS = $TTS + $tode->thermalScanner;
                                    $TG = $TG + $tode->gloves;
                                    $TS500ML = $TS500ML + $tode->sanitizer500ml;
                                    $TS600ML = $TS600ML + $tode->sanitizer600ml;
                                    $TS5L = $TS5L + $tode->sanitizer5L;
                                    $TS15L = $TS15L + $tode->sanitizer15L;
                                }
                                ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>                                    
                                    <th class="text-capitalize text-center"><?php echo $TTS; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $TG; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $TS500ML; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $TS600ML; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $TS5L; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $TS15L; ?></th>
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