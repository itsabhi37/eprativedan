    <?php include_once('include/header.php') ?>
<body>
    <?php include_once('include/leftmenu.php') ?>
    <?php include_once('include/headmenu.php') ?>


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">District Admin Dashboard</h4>
            <!--<p class="mg-b-0">Do big things with Bracket, the responsive bootstrap 4 admin template.</p>-->
        </div><!-- d-flex -->

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-info rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-user-plus tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">COVID Positive(+ve) Cases</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_noPosCase[0]->total > 0 ){ echo $total_noPosCase[0]->total; } else { echo '0'; } ?></p>
                                 <span class="tx-11 tx-roboto tx-white-6">Today</span> 
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                    <div class="bg-danger rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-users tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Active COVID Positive(+ve) Cases</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_activeCase[0]->total > 0 ){ echo $total_activeCase[0]->total; } else { echo '0'; } ?></p>
                                 <span class="tx-11 tx-roboto tx-white-6">Now</span> 
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-teal rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-blind tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Number of Recovered COVID Cases</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_recvrdCase[0]->total > 0 ){ echo $total_recvrdCase[0]->total; } else { echo '0'; } ?></p>
                                 <span class="tx-11 tx-roboto tx-white-6">Till Today</span> 
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-warning rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="fa fa-user-times tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Number of Deaths due to COVID</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php if($total_deathCase[0]->total > 0 ){ echo $total_deathCase[0]->total; } else { echo '0'; } ?></p>
                                 <span class="tx-11 tx-roboto tx-white-6">Till Today</span> 
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
            </div><!-- row -->
            <div class="row row-sm mg-t-20">
                <div class="col-lg-8 col-sm-12">
                    <div class="card pd-30 bd-0 shadow-base">
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Last 7 Days COVID Case Status</h6>
                        <div id="morrisBar1" class="ht-200 ht-sm-300 bd"></div>
                    </div><!-- card -->
                </div><!-- col-9 -->
                <div class="col-lg-4 col-sm-12">
                    <div class="card bd-0 shadow-base pd-30">
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Doctor Availability Status</h6>
                        <div id="morrisDonut1" class="ht-200 ht-sm-300"></div>
                    </div><!-- card -->
                </div><!-- col-3 -->
            </div><!-- row -->
            
        </div><!-- br-pagebody -->
        <?php include_once('include/footer.php'); ?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
        <?php include_once('include/footerscript.php'); ?>
</body>
<script>
new Morris.Bar({
    element: 'morrisBar1',
    data: [
        <?php 
            for($i=6;$i>=0;$i--){
                $newdate[] = date("d-m", strtotime("-".$i."days"));
            }        
            for($i=0;$i<=6;$i++){
                $newdate[$i];
                $record[$i];
                if(empty($record[$i])){
                    //echo 'Blank';
                    echo "{ y: '".$newdate[$i]."', a: 0, b: 0,   c:0 },";
                }else{
                    echo "{ y: '".$newdate[$i]."', a: ".$record[$i]->noPosCase.", b: ".$record[$i]->recvrdCase.",   c:".$record[$i]->deathCase." },";
                }
            }
        ?>
    ],
    xkey: 'y',
    ykeys: ['a', 'b','c'],
    labels: ['Positive', 'Recovered', 'Death'],
    barColors: ['#F49917','#00B297', '#DC3545'],
    gridTextSize: 12,
    hideHover: 'auto',
    resize: true
  });    
    
new Morris.Donut({
    element: 'morrisDonut1',
    data: [
      {label: "Government", value: <?php if(isset($point_nine)){ echo $point_nine->gvtdoc; }else{ echo '0';}?>},
      {label: "Private", value: <?php if(isset($point_nine)){ echo $point_nine->pvtdoc; }else{ echo '0';}?>},
      {label: "Retired", value: <?php if(isset($point_nine)){ echo $point_nine->retdoc; }else{ echo '0';}?>}
    ],
    colors: ['#00B297','#DC3545','#14A0C1'],
    resize: true
  });
</script>
</html>