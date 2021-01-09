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
                <span class="breadcrumb-item active">RT-PCR Testing</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">RT-PCR Testing</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Today's RT-PCR Testing Report Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/pmch/update_RtpcrRecord', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/pmch/insert_RtpcrRecord', 'data-parsley-validate');
                }
                ?>
                <?php
                if ($this->uri->segment(4)) {
                    // If Page Load in Edit Mode then
                    $ertpcrTId                   =   $singleRecord->rtpcrTId;
                    $etdstId                     =   $singleRecord->tdstId;
                    $eopBalPendingSample         =   $singleRecord->opBalPendingSample;
                    $esampleRecvdToday           =   $singleRecord->sampleRecvdToday;
                    $epositiveReport             =   $singleRecord->positiveReport;
                    $enegativeReport             =   $singleRecord->negativeReport;
                    $erepeatSamplePositive       =   $singleRecord->repeatSamplePositive;
                    $esampleRejected             =   $singleRecord->sampleRejected;
                    $esampleTested               =   $singleRecord->sampleTested;
                    $eclBalSamples               =   $singleRecord->clBalSamples;
                }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">District: <span class="tx-danger">*</span></label>
                                <select id="select2-a" name="cmbDistrict" class="form-control select2-show-search" data-placeholder="Select District Name" required>
                                    <option value="">Select District Name</option>
                                    <?php

                                    if ($this->uri->segment(4)) {
                                        // Edit Mode
                                        if (count($district)) {
                                            foreach ($district as $dist) {
                                                if ($dist->dstId == $etdstId) {
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
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Opening Balance of Pending Samples: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtOBOPS" name="txtOBOPS" value="' . $eopBalPendingSample . '" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="txtrtpcrTId" value="' . $ertpcrTId . '" readonly="true" hidden="true">';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtOBOPS" name="txtOBOPS" value="" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Samples Received Today: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtSRT" name="txtSRT" value="' . $esampleRecvdToday . '" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtSRT" name="txtSRT" value="" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                }
                                ?>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-md-4">
                            <div class="form-group bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Reported Positive: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtRP" name="txtRP" value="' . $epositiveReport . '" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtRP" name="txtRP" value="" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                }
                                ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Reported Negative: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtRN" name="txtRN" value="' . $enegativeReport . '" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtRN" name="txtRN" value="" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                }
                                ?>

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Repeat Sample Positive: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtRSP" name="txtRSP" value="' . $erepeatSamplePositive . '" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtRSP" name="txtRSP" value="" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                }
                                ?>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-md-4">
                            <div class="form-group bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Samples Rejected: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtSR" name="txtSR" value="' . $esampleRejected . '" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtSR" name="txtSR" value="" onkeypress="return isNumber(event);" onchange="calSampleTested();calClosingBalance();" placeholder="0" required>';
                                } ?>

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Samples Tested: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtST" name="txtST" value="' . $esampleTested . '" onkeypress="return isNumber(event);" placeholder="0" required readonly>';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtST" name="txtST" value="" onkeypress="return isNumber(event);" placeholder="0" required readonly>';
                                } ?>

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label text-capitalize tx-bold">Closing Balance of Samples: <span class="tx-danger">*</span></label>
                                <?php
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" id="txtCBOS" name="txtCBOS" value="' . $eclBalSamples . '" onkeypress="return isNumber(event);" placeholder="0" required readonly>';
                                } else {
                                    echo '<input class="form-control" type="text" id="txtCBOS"  name="txtCBOS" value="" onkeypress="return isNumber(event);" placeholder="0" required readonly>';
                                } ?>

                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/pmch/rtpcr') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">Opening Balance of Pending Samples</th>
                                <th class="text-capitalize text-center">Samples Received Today</th>
                                <th class="text-capitalize text-center">Reported (+ve)</th>
                                <th class="text-capitalize text-center">Reported (-ve)</th>
                                <th class="text-capitalize text-center">Repeat Sample Positive</th>
                                <th class="text-capitalize text-center">Samples Rejected</th>
                                <th class="text-capitalize text-center">Samples Tested</th>
                                <th class="text-capitalize text-center">Closing Balance of Samples</th>
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
                                        <td class="text-center"><?php echo $tod->opBalPendingSample; ?></td>
                                        <td class="text-center"><?php echo $tod->sampleRecvdToday; ?></td>
                                        <td class="text-center"><?php echo $tod->positiveReport; ?></td>
                                        <td class="text-center"><?php echo $tod->negativeReport; ?></td>
                                        <td class="text-center"><?php echo $tod->repeatSamplePositive; ?></td>
                                        <td class="text-center"><?php echo $tod->sampleRejected; ?></td>
                                        <td class="text-center td-color-teal"><?php echo $tod->sampleTested; ?></td>
                                        <td class="text-center td-color-teal"><?php echo $tod->clBalSamples; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/pmch/edit_RtpcrRecord/' . $tod->rtpcrTId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
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
                                $OBOPS   =   0;  //  Opening Balance of Pending Samples
                                $SRT =   0;  //  Samples Received Today
                                $RP    =   0;  //  Reported Positive
                                $RN   =   0;  //  Reported Negative
                                $RSP    =   0;  //  Repeat Sample Positive
                                $SR    =   0;  //  Samples Rejected
                                $ST     =   0;  //  Samples Tested
                                $CBOS     =   0;  //  Closing Balance of Samples

                                foreach ($todayEntries as $tod) {
                                    $OBOPS = $OBOPS + $tod->opBalPendingSample;
                                    $SRT = $SRT + $tod->sampleRecvdToday;
                                    $RP = $RP + $tod->positiveReport;
                                    $RN = $RN + $tod->negativeReport;
                                    $RSP = $RSP + $tod->repeatSamplePositive;
                                    $SR = $SR + $tod->sampleRejected;
                                    $ST = $ST + $tod->sampleTested;
                                    $CBOS = $CBOS + $tod->clBalSamples;
                                }
                                ?>
                                <tr>
                                    <th class="text-capitalize text-center tx-bold" colspan="2" >Total</th>
                                    <th class="text-capitalize text-center tx-bold"><?php echo $OBOPS; ?></th>
                                    <th class="text-capitalize text-center tx-bold"><?php echo $SRT; ?></th>
                                    <th class="text-capitalize text-center tx-bold"><?php echo $RP; ?></th>
                                    <th class="text-capitalize text-center tx-bold"><?php echo $RN; ?></th>
                                    <th class="text-capitalize text-center tx-bold"><?php echo $RSP; ?></th>
                                    <th class="text-capitalize text-center tx-bold"><?php echo $SR; ?></th>
                                    <th class="text-capitalize text-center tx-bold"><?php echo $ST; ?></th>
                                    <th class="text-capitalize text-center tx-bold"><?php echo $CBOS; ?></th>
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

    function calSampleTested() {
        // rp = Report Positive, rn = Report Negative, rsp = Repeat Sample Positive
        // sr = Sample Rejected, st = samples Tested

        var rp = document.getElementById("txtRP").value;
        var rn = document.getElementById("txtRN").value;
        var rsp = document.getElementById("txtRSP").value;
        var sr = document.getElementById("txtSR").value;
        if (rp == "")
            rp = 0;
        if (rn == "")
            rn = 0;
        if (rsp == "")
            rsp = 0;
        if (sr == "")
            sr = 0;
        var st = parseInt(rp) + parseInt(rn) + parseInt(rsp) + parseInt(sr);
        document.getElementById("txtST").value = st;
    }

    function calClosingBalance() {
        // obops = Opening Balance of Pending Samples
        // srt = Samples Received Today, st = samples Tested
        // cbos = Closing Balance of Samples

        var obops = document.getElementById("txtOBOPS").value;
        var srt = document.getElementById("txtSRT").value;
        var st = document.getElementById("txtST").value;
        if (obops == "")
            obops = 0;
        if (srt == "")
            srt = 0;
        if (st == "")
            st = 0;
        var cbos = parseInt(obops) + parseInt(srt) - parseInt(st);
        document.getElementById("txtCBOS").value = cbos;
    }
</script>

</html>