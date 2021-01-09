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
                <span class="breadcrumb-item active">Isolation Center Master</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Isolation Center Master</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">Isolation Center Master Section</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('superadmin/dashboard/update_isolation_master', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('superadmin/dashboard/insert_isolation_master', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        // If Page Load in Edit Mode then
                        $eisoId              =   $singleRecord->isoId  ;
                        $eisoCentreName      =   $singleRecord->isoCentreName;
                    }
                ?>
                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="row mg-t-25">
                    <div class="col-xl-6">
                        <div class="form-layout form-layout-4">
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                   <?php
                                    if ($this->uri->segment(4)) {
                                        echo '<input type="text" name="txtName" value="'.$eisoCentreName.'" class="form-control" placeholder="Isolation Center Name" required>';
                                        echo '<input class="form-control" type="text" name="isoId" value="' . $eisoId . '" readonly="true" hidden="true">';
                                    } else {
                                        echo '<input type="text" name="txtName" class="form-control" placeholder="Isolation Center Name" required>';
                                    }
                                ?>
                                </div>
                            </div><!-- row -->
                            <div class="form-layout-footer mg-t-30">
                                <button class="btn btn-teal text-capitalize"> Save Data</button>
                                <a class="btn btn-secondary text-capitalize" href="<?= base_url('superadmin/dashboard/isolation_master') ?>">Cancel</a>
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
                
                <div class="bd pd-10 table-wrapper">
            <table id="datatable1" class="table display responsive nowrap" width="100%">
              <thead class="thead-colored thead-teal">
                <tr>
                  <th class="wd-15p text-center">Sl. No.</th>
                  <th class="wd-15p text-center">Isolation Center Name</th>
                  <th class="wd-20p text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                            <?php if (count($totalEntries)) { ?>
                                <?php $sln = 0;
                                foreach ($totalEntries as $tot) {
                                    $sln = $sln + 1; ?>
                                    <tr class="text-inverse">
                                        <td class="text-center"><?php echo $sln; ?></td>
                                        <td class="text-center"><?php echo $tot->isoCentreName; ?></td>
                                        <td class="text-center">
                                        <a href="<?= base_url('superadmin/dashboard/edit_isolation_master/' . $tot->isoId ) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                        </td>
                                        
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="3" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
                            } //else End Here 
                            ?>
                </tbody>
            </table>
          </div><!-- table-wrapper -->
            
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