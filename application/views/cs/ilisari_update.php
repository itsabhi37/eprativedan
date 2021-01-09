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
                <span class="breadcrumb-item active">ILI/SARI Update</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">ILI/SARI Update</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">ILI/SARI Update Report Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/cs/update_ilisari_update', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/cs/insert_ilisari_update', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $ecvsId          =   $singleRecord->cvsId;
                        $edstId          =   $singleRecord->dstId;
                        $eidntForty      =   $singleRecord->idntForty;
                        $eidntSari          =   $singleRecord->idntSari;
                        $eidntScreen       =   $singleRecord->idntScreen;
                        $eidntImmune          =   $singleRecord->idntImmune;
                        $enopScreenSari          =   $singleRecord->nopScreenSari;
                        $enopSwabCollec         =   $singleRecord->nopSwabCollec;
                        $enopScreenCamp          =   $singleRecord->nopScreenCamp;
                        $enocImmune          =   $singleRecord->nocImmune;
                        
                        
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">District: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="dstId" class="form-control select2-show-search" data-placeholder="Select District" required>
                                    <option value="">Select District</option>
                                    <?php
                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                        if (count($district)) {
                                            foreach ($district as $dist) {
                                                if ($dist->dstId == $edstId) {
                                                    echo '<option value="' . $dist->dstId . '" selected>' . $dist->dstName . '</option>';
                                                } else {
                                                    echo '<option value="' . $dist->dstId . '">' . $dist->dstName . '</option>';
                                                }
                                            }
                                        }
                                    } else {
                                        // Add New Mode
                                        if (count($district)) {
                                            foreach ($district as $dist) {
                                                echo '<option value="' . $dist->dstId . '">' . $dist->dstName . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            
                            <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Identified 40+(age)<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="idntForty" name="idntForty" value="' . $eidntForty . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="cvsId" value="' . $ecvsId . '" readonly="true" hidden="true">';
                                } else {
                                    echo '<input class="form-control" type="text" id="idntForty" name="idntForty" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                           <div class="form-group bd-l-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Identified SARI/ILI<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="idntSari" name="idntSari" value="' . $eidntSari . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="idntSari" name="idntSari" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                        </div>
                        </div><!-- col-4 -->

                        <div class="col-md-4">
                            <div class="form-group bd-t-0-force">
                                 <label class="form-control-label text-capitalize tx-bold">Identified for Screening<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="idntScreen" name="idntScreen" value="' . $eidntScreen . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="idntScreen" name="idntScreen" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                               <label class="form-control-label text-capitalize tx-bold">Identified for Immunisation<span class="tx-danger">*</span></label>
                                
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="idntImmune" name="idntImmune" value="' . $eidntImmune . '" onkeypress="return isNumber(event);" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="idntImmune" name="idntImmune" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                            
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                            <label class="form-control-label text-capitalize tx-bold">Total number of Patient Appeared in Screeening Camp for SARI/ILI <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopScreenSari" name="nopScreenSari" value="' . $enopScreenSari . '" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopScreenSari" name="nopScreenSari" value="" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Total Number of Patient Reffered for Swab Collection  <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopSwabCollec" name="nopSwabCollec" value="' . $enopScreenSari . '" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopSwabCollec" name="nopSwabCollec" value="" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Total Number of Paitent appeared in Screening Camp <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nopScreenCamp" name="nopScreenCamp" value="' . $enopScreenCamp . '" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nopScreenCamp" name="nopScreenCamp" value="" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Total Number of Children immunised<span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="nocImmune" name="nocImmune" value="' . $enocImmune . '" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="nocImmune" name="nocImmune" value="" onkeypress="return isNumber(event);" onchange="calBedVaccant();" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div>
                        <!-- col-3 -->

                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/cs/ilisari_update') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">District</th>
                                <th class="text-capitalize text-center">Identified 40+(age)</th>
                                <th class="text-capitalize text-center">Identified SARI/ILI</th>
                                <th class="text-capitalize text-center">Identified for Screening</th>
                                <th class="text-capitalize text-center">Identified for Immunisation</th>
                                <th class="text-capitalize text-center">Total number of Patient Appeared in Screeening Camp for SARI/ILI</th>
                                <th class="text-capitalize text-center">Total Number of Patient Reffered for Swab Collection </th>
                                <th class="text-capitalize text-center">Total Number of Paitent appeared in Screening Camp</th>
                                <th class="text-capitalize text-center">Total Number of Children immunised</th>
                                
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
                                        <td class="text-center"><?php echo $tod->dstName; ?></td>
                                        <td class="text-center"><?php echo $tod->idntForty; ?></td>

                                        <td class="text-center"><?php echo $tod->idntSari; ?></td>
                                        <td class="text-center"><?php echo $tod->idntScreen; ?></td>
                                        <td class="text-center"><?php echo $tod->idntImmune; ?></td>
                                        <td class="text-center"><?php echo $tod->nopScreenSari; ?></td>
                                        <td class="text-center"><?php echo $tod->nopSwabCollec; ?></td>
                                        <td class="text-center"><?php echo $tod->nopScreenCamp; ?></td>
                                        <td class="text-center"><?php echo $tod->nocImmune; ?></td>
                                        
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/cs/edit_ilisari_update/' . $tod->cvsId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
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
                        <thead class="thead-colored thead-teal">
                                <?php 
                                if(count($todayEntries)){
                                    $idntForty=0;
                                    $idntSari=0;
                                    $idntScreen=0;
                                    $idntImmune=0;
                                    $nopScreenSari=0;
                                    $nopSwabCollec=0;
                                    $nopScreenCamp=0;
                                    $nocImmune=0;
                                    //total count
                                foreach ($todayEntries as $tod) {
                                    $idntForty+=$tod->idntForty;
                                    $idntSari+=$tod->idntSari;
                                    $idntScreen+=$tod->idntScreen;
                                    $idntImmune+=$tod->idntImmune;
                                    $nopScreenSari+=$tod->nopScreenSari;
                                    $nopSwabCollec+=$tod->nopSwabCollec;
                                    $nopScreenCamp+=$tod->nopScreenCamp;
                                    $nocImmune+=$tod->nocImmune;
                                }
                            
                                     ?>
                                <tr>
                                    <th class="text-capitalize text-center" colspan="2">Total:</th>
                                    
                                        <th class="text-capitalize text-center"><?php echo $idntForty; ?></th>

                                        <th class="text-capitalize text-center"><?php echo $idntSari; ?></th> 
                                        <th class="text-capitalize text-center"><?php echo 
                                        $idntScreen; ?></th>
                                        <th class="text-capitalize text-center"><?php echo 
                                        $idntImmune; ?></th>
                                        <td class="text-center"><?php echo $nopScreenSari; ?></td>
                                        <th class="text-capitalize text-center"><?php echo $nopSwabCollec; ?></th>
                                        <th class="text-capitalize text-center"><?php echo $nopScreenCamp; ?></th>
                                        <th class="text-capitalize text-center"><?php echo $nocImmune; ?></th>
                                    
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