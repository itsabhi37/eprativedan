<?php include_once('include/header.php') ?>

<body>
    <?php include_once('include/leftmenu.php') ?>
    <?php include_once('include/headmenu.php') ?>


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url('home') ?>">Dashboard</a>
                <a class="breadcrumb-item" href="#">Master Entry</a>
                <span class="breadcrumb-item active">Query Master</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Query Master</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Query Master Section</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                    echo form_open_multipart('superadmin/dashboard/show_query_master', 'data-parsley-validate');
                ?>

                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="row mg-t-25">
                    <div class="col-xl-6">
                        <div class="form-layout form-layout-4">

                            <div class="row mt-3">
                                <label class="col-sm-4 form-control-label">Query Type: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <select name="cmbqueryType" id="cmbRole" style="width:100%;" class="form-control select2-show-search" data-placeholder="Please Select Query Type" required>
                                        <option value="">Please Select Query Type</option>
                                        <option value="DDL">DDL(ALTER, DROP, CREATE)</option>
                                        <option value="DML">DML(INSERT, UPDATE, DELETE)</option>
                                        <option value="DQL">DQL(SELECT)</option>
                                    </select>
                                </div>
                            </div><!-- row -->

                            <div class="row mt-3">
                                <label class="col-sm-4 form-control-label">Query: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <textarea class="form-control" name="txtQuery" placeholder="Type your Query here" required></textarea>
                                </div>
                            </div><!-- row -->
                            <div class="form-layout-footer mg-t-30">
                                <button class="btn btn-teal text-capitalize"> Run Query</button>
                                <a class="btn btn-secondary text-capitalize" href="<?= base_url('superadmin/dashboard/query_master') ?>">Cancel</a>
                            </div><!-- form-layout-footer -->
                        </div><!-- form-layout -->
                        <p class="mg-t-15 text-danger tx-italic tx-12 tx-bold">1. * are Required fields.</p>
                    </div><!-- col-6 -->
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
                <div class="bd pd-10">
                   <?php 
						if(isset($getQuery)){
							if(count($getQuery)){
                    ?>
                    <div class="btn-group pull-right mb-1 mr-1 mt-1" role="group">
                        <button class="btn btn-teal btn-sm dropdown-toggle" id="btnGroupDrop4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-download"></i> Export To</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" onclick="exportTableAs('exportopdf','xls');"><b><i class="fa fa-file-excel-o"></i></b> XLS</a>
                            <a class="dropdown-item" href="#" onclick="exportTableAs('exportopdf','pdf');"><b><i class="fa fa-file-pdf-o"></i></b> PDF</a>
                        </div>
                    </div>
                    <?php 
                            }
                        }
                    ?>
                    <div class="bd table-responsive mt-1 table-wrapper"  style="overflow-x: scroll;width:100%;">
                    <?php 
						if(isset($getQuery)){
							if(count($getQuery)){
								$i=0;
								echo '<table class="table table-bordered mg-b-0 nowrap exportopdf">';
								foreach ($getQuery as $query){	
										// Design Heading
										if($i==0){
											echo '<thead class="thead-colored thead-teal"><tr>';
												foreach($query as $key => $value) {
													// This is for Heading
													echo '<th>'.$key.'</th>';
												}
											echo '</tr></thead><tbody>';
										}
										// For Data
										echo '<tr class="text-inverse">';				
											foreach($query as $key => $value) {
												// This is for Row
												echo '<td>'. $value .'</td>';
											}				
										echo '</tr>';
										
										$i++;			
								}
								echo '</tbody></table>';
							}else{
								echo '<table class="table table-bordered mg-b-0 nowrap"><tr  class="text-center text-danger tx-bold"><td>No Record Found...</td></tr></table>';
							}
						}else{
								echo '<table class="table table-bordered mg-b-0 nowrap"><tr  class="text-center text-teal tx-bold"><td>Table content Shows here...</td></tr></table>';
                        }
						?>
                    </div><!-- table-wrapper -->
                 </div>
                
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#errordismiss').delay(5000).fadeOut();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#successdismiss').delay(5000).fadeOut();
        });
        
    </script>
</body>

</html>