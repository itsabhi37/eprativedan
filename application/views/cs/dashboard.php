    <?php include_once('include/header.php') ?>

<body>
    <?php include_once('include/leftmenu.php') ?>
    <?php include_once('include/headmenu.php') ?>


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">CS Dashboard</h4>
            <!-- <p class="mg-b-0">Do big things with Bracket, the responsive bootstrap 4 admin template.</p> -->
        </div><!-- d-flex -->

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-info rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-thermometer tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Thermal Scanner's</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_thermalScanner[0]->total > 0 ){ echo $total_thermalScanner[0]->total; } else { echo '0'; } ?></p>
                                <span class="tx-11 tx-roboto tx-white-6">In Stock</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                    <div class="bg-danger rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-hand-paper-o tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Gloves</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_gloves[0]->total > 0 ){ echo $total_gloves[0]->total; } else { echo '0'; } ?></p>
                                <span class="tx-11 tx-roboto tx-white-6">In Stock</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-teal rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-hourglass-end tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Sanitizer 500ml</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_sanitizer500ml[0]->total > 0 ){ echo $total_sanitizer500ml[0]->total; } else { echo '0'; } ?></p>
                                <span class="tx-11 tx-roboto tx-white-6">In Stock</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-warning rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-hourglass-half tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Sanitizer 600ml</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_sanitizer600ml[0]->total > 0 ){ echo $total_sanitizer600ml[0]->total; } else { echo '0'; } ?></p>
                                <span class="tx-11 tx-roboto tx-white-6">In Stock</span>
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