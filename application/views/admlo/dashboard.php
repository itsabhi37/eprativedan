    <?php include_once('include/header.php') ?>

<body>
    <?php include_once('include/leftmenu.php') ?>
    <?php include_once('include/headmenu.php') ?>


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">ADM Law & Order Dashboard</h4>
            <!-- <p class="mg-b-0">Do big things with Bracket, the responsive bootstrap 4 admin template.</p> -->
        </div><!-- d-flex -->

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-teal rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-user-secret tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Incident Comm. </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_noICAppointed[0]->total > 0 ){ echo $total_noICAppointed[0]->total; } else { echo '0'; } ?></p>
                                <span class="tx-11 tx-roboto tx-white-6">Appointed</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                    <div class="bg-danger rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-group tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Constables</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_noConDeplMonIQ[0]->total > 0 ){ echo $total_noConDeplMonIQ[0]->total; } else { echo '0'; } ?></p>
                                <span class="tx-11 tx-roboto tx-white-6">Deployed</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-info rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-car tx-54 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Vehicles Seized</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_noVehicleSeized[0]->total > 0 ){ echo $total_noVehicleSeized[0]->total; } else { echo '0'; } ?></p>
                                <span class="tx-11 tx-roboto tx-white-6">Total</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-warning rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-rupee tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Fine Collected</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_totlFineCollected[0]->total > 0 ){ echo $total_totlFineCollected[0]->total; } else { echo '0'; } ?></p>
                                <span class="tx-11 tx-roboto tx-white-6">Total</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                
            </div><!-- row -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>    
            <br>
            <br>
            <br>
            <br>
            <br> 

        </div><!-- br-pagebody -->
        <?php include_once('include/footer.php'); ?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
        <?php include_once('include/footerscript.php'); ?>
</body>

</html>