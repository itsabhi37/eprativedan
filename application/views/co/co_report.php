<?php include_once('include/header.php') ?>

<body>
    <?php include_once('include/leftmenu.php') ?>
    <?php include_once('include/headmenu.php') ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url('home') ?>">Dashboard</a>
                <a class="breadcrumb-item" href="#">Reports</a>
                <span class="breadcrumb-item active">CO Checklist Reports</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">CO Checklist Reports</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">CO Checklist Reports Section</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                echo form_open_multipart('department/co/show_co_report', 'data-parsley-validate');
                ?>
                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="row mg-t-25">
                <div class="col-xl-1"></div>
                    <div class="col-xl-6">
                        <div class="form-layout form-layout-4">
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Date: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="date" name="txtDate" class="form-control" placeholder="Date" required>
                                </div>
                            </div><!-- row -->
                            <div class="form-layout-footer mg-t-30">
                                <button class="btn btn-teal text-capitalize"> Show Data</button>
                                <a class="btn btn-secondary text-capitalize" href="<?= base_url('department/co/co_report') ?>">Cancel</a>
                            </div><!-- form-layout-footer -->
                        </div><!-- form-layout -->
                        <p class="mg-t-15 text-danger tx-italic tx-12 tx-bold">1. * are Required fields.</p>
                    </div><!-- col-6 -->
                    <div class="col-xl-4 mg-t-20 mg-md-t-0 text-center">
                        <div class="card bd-1" style="border-color:#00B297;">
                            <div class="card-body bg-teal tx-white">
                                <h6 class="tx-18 mg-b-3 tx-white">Report Date</h6>
                                <span class="tx-15 tx-white-8 tx-bold"><?php echo $showdateonCard; ?></span>
                            </div><!-- card-body -->
                            <i class="fa fa-calendar tx-74 tx-teal mt-2 mb-2"></i>
                        </div><!-- card -->
                    </div><!-- col -->
                </div><!-- row -->
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
                </form>

                <div class="bd bd-r-1-force rounded table-responsive mt-4" style="overflow-x: scroll;">
                    <table class="table table-bordered mg-b-0" id="truenat">
                        <thead class="thead-colored thead-teal">
                            <tr>
                                <th class="text-capitalize text-center">Sl. No.</th>
                                <th class="text-capitalize text-center">Block/Circle</th>
                                <th class="text-capitalize text-center">Incident Commander</th>
                                <th class="text-capitalize text-center">PS</th>
                                <th class="text-capitalize text-center">Containment Zone/Place</th>
                                <th class="text-capitalize text-center">Enforcement</th>
                                <th class="text-capitalize text-center">Withdrawl</th>
                                <th class="text-capitalize text-center">Contact Tracing to be done</th>
                                <th class="text-capitalize text-center">No. Of Person Identified</th>
                                <th class="text-capitalize text-center">Special Cell for Home or Institutional Quarantine of individual on risk assessment</th>
                                <th class="text-capitalize text-center">Testing of all Cases with severe acute repiratory infection (SARI) influenza like illness (ILI) and other symptoms</th>
                                <th class="text-capitalize text-center">House to house survey and surveillance</th>
                                <th class="text-capitalize text-center">Clinical management of all cases as per protocol </th>
                                <th class="text-capitalize text-center">Counseling and educating people and establishing effective communication strategies </th>
                                <th class="text-capitalize text-center">Regular Sensitization and Cleanness of the area</th>
                                <th class="text-capitalize text-center">Download of Aarogyasetu App among the resident of Containment Zone</th>
                                <th class="text-capitalize text-center">Supply of essentials and medical requirement</th>
                                <th class="text-capitalize text-center">Supply of essentials/facilites in respect of the Containment Zone</th>
                                <th class="text-capitalize text-center">Barricaded the Containment Zone</th>
                                <th class="text-capitalize text-center">Control Room Establish</th>
                                
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
                                        <td class="text-center"><?php echo $tod->IncCmndr; ?></td>
                                        <td class="text-center"><?php echo $tod->PS; ?></td>
                                        <td class="text-center"><?php echo $tod->contZonePlace; ?></td>
                                        <td class="text-center"><?php 
                                        $Enforcementdate = date('d-m-Y', strtotime($tod->Enforcementdate));
                                        echo  $Enforcementdate;
                                        ?></td>
                                        <td class="text-center"><?php 
                                        $WithdrawalDate = date('d-m-Y', strtotime($tod->WithdrawalDate));
                                        echo  $WithdrawalDate;
                                        ?></td>
                                        <td class="text-center"><?php 
                                            if($tod->conTraceDone=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                           echo $tod->nopIdentified;
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->splCellforQuarantine=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->testSymptoms=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->hthSurveynSurvlnc=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->clinicMngmnt=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->counselling=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->regSensitizn=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->ddArApResContnmnt=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->supplyEsnMedicine=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->supplyEsFacility=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->barricade=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                         <td class="text-center"><?php 
                                            if($tod->controlRoom=='Y')echo 'YES';
                                            else echo 'NO';
                                         ?></td>
                                        
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="20" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                        </tbody>
                        <!--Table Footer-->
                       <thead class="thead-colored thead-teal">
                                <?php 
                                if(count($todayEntries)){
                                    //variable declaration
                                $nopIdentified=0;
                               
                                    //total count
                                foreach ($todayEntries as $tod) {
                                  $nopIdentified+=$tod->nopIdentified;
                                }
                            
                                     ?>
                                <tr>
                                    <th class="text-capitalize text-center">Total</th>
                                    <th colspan="7"></th>
                                    <th class="text-capitalize text-center"><?php echo $nopIdentified ?></th>
                                    
                                    
                                    <th class="text-capitalize text-center" colspan="11"></th>
                                   
                                </tr>
                                <?php } ?>
                            </thead>
                    </table>
                </div><!-- bd-0 -->
            </div><!-- br-section-wrapper -->
        </div><!-- br-mainpanel -->
        <?php include_once('include/footer.php'); ?>
    </div><!-- bd-0 -->
            </div><!-- br-section-wrapper -->
        </div><!-- br-mainpanel -->
        <?php include_once('include/footer.php'); ?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php include_once('include/footerscript.php'); ?>
</body>

</html> 