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
                <span class="breadcrumb-item active">ICMR Portal Updation</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">ICMR Portal Updation</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Today's ICMR Portal Updation Report Form</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('department/idsp/update_portal_updation', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('department/idsp/insert_portal_updation', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $eipuId                     =   $singleRecord->ipuId;
                        $enoPosEntrytobeDone        =   $singleRecord->noPosEntrytobeDone;
                        $enoEntryDoneTillYestrday   =   $singleRecord->noEntryDoneTillYestrday;
                        $enoEntryAddToday           =   $singleRecord->noEntryAddToday;
                        $etotalPending              =   $singleRecord->totalPending;
                    }
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label text-capitalize tx-bold">Total no. of Portal Entries to be Done: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtTNOPETBD" value="'.$enoPosEntrytobeDone.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                    echo '<input class="form-control" type="text" name="txtipuId" value="'.$eipuId.'" readonly="true" hidden="true">';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtTNOPETBD" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?> 
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">No of entries done till yesterday: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtNOEDTY" value="'.$enoEntryDoneTillYestrday.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtNOEDTY" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }                                
                                ?>                                
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">No of entries added today: <span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtNOEAD" value="'.$enoEntryAddToday.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtNOEAD" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                                
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label text-capitalize tx-bold">Total Pending:<span class="tx-danger">*</span></label>
                                <?php 
                                if ($this->uri->segment(4)) {
                                    echo '<input class="form-control" type="text" name="txtTP" value="'.$etotalPending.'" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }else{
                                    echo '<input class="form-control" type="text" name="txtTP" value="" onkeypress="return isNumber(event);" placeholder="0" required>';
                                }
                                ?>
                                
                            </div>
                        </div><!-- col-3 -->
                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button class="btn btn-teal text-capitalize"> Save Data</button>
                        <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/idsp/portal_updation') ?>">Cancel</a>
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
                                <th class="text-capitalize text-center">Total no. of Portal Entries to be Done </th>
                                <th class="text-capitalize text-center">No of entries done till yesterday</th>
                                <th class="text-capitalize text-center">No of entries added today</th>
                                <th class="text-capitalize text-center">Total Pending</th>
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
                                        <td class="text-center"><?php echo $tod->noPosEntrytobeDone; ?></td>
                                        <td class="text-center"><?php echo $tod->noEntryDoneTillYestrday; ?></td>
                                        <td class="text-center"><?php echo $tod->noEntryAddToday; ?></td>
                                        <td class="text-center"><?php echo $tod->totalPending; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('department/idsp/edit_portal_updation/' . $tod->ipuId) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
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
                                $TNOPETBD   =   0;  //  Total no. of Portal Entries to be Done
                                $NOEDTY   =   0;  //  No of entries done till yesterday
                                $NOEAT    =   0;  //  No of entries added today
                                $TP   =   0;  //  Total Pending

                                foreach ($todayEntries as $tod) {
                                    $TNOPETBD = $TNOPETBD + $tod->noPosEntrytobeDone;
                                    $NOEDTY = $NOEDTY + $tod->noEntryDoneTillYestrday;
                                    $NOEAT = $NOEAT + $tod->noEntryAddToday;
                                    $TP = $TP + $tod->totalPending;
                                }
                                ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th class="text-capitalize text-center"><?php echo $TNOPETBD; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $NOEDTY; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $NOEAT; ?></th>
                                    <th class="text-capitalize text-center"><?php echo $TP; ?></th>
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