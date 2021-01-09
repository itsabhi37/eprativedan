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
                <span class="breadcrumb-item active">User Master</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">User Master</h4>
            <!-- <p class="mg-b-0">A collection basic to advanced table design that you can use to your data.</p> -->
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-17 mg-t-5 mg-b-10">User Master Section</h6>
                <hr style="border-top: 2px double #00B297;" />
                <!-- <p class="mg-b-30 tx-gray-600">A demo for using custom layout for validation.</p> -->
                <?php
                if ($this->uri->segment(4)) {
                    echo form_open_multipart('superadmin/dashboard/update_user_master', 'data-parsley-validate');
                } else {
                    echo form_open_multipart('superadmin/dashboard/insert_user_master', 'data-parsley-validate');
                }
                ?>
                <?php
                    if ($this->uri->segment(4)) {
                        //echo "<script>$('#departmentSection').show();
          //$('#cmbDepartment').prop('disabled', false);</script>";
                        // If Page Load in Edit Mode then
                        $eid            =   $singleRecord->id  ;
                        $euserid        =   $singleRecord->userid ;
                        $ename          =   $singleRecord->name ;
                        $emobile        =   $singleRecord->mobile ;
                        $edepartment    =   $singleRecord->department ;
                        $eblkId         =   $singleRecord->blkId ;
                        $edesignation   =   $singleRecord->designation ;
                        $erole          =   $singleRecord->role ;                        
                    }
                ?>
                <!-- <form action="form-validation.html" data-parsley-validate> -->
                <div class="row mg-t-25">
                    <div class="col-xl-6">
                        <div class="form-layout form-layout-4">
                          
                           <div class="row mt-3">
                                <label class="col-sm-4 form-control-label">Role: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                   <?php
                                    if ($this->uri->segment(4)) {
                                    ?>
                                        <select name="cmbRole" id="cmbRole" class="form-control select2-show-search" data-placeholder="Select User Role" required style="width:100%;">
                                            <option value="">Select Role</option>
                                            <option value="Super Admin" <?php if($erole=='Super Admin'){ echo 'Selected';}?>>Super Admin</option>
                                            <option value="Data Entry Operator" <?php if($erole=='Data Entry Operator'){ echo 'Selected';}?>>Data Entry Operator</option>
                                        </select>
                                    <?php
                                    } else {
                                        ?>
                                        <select name="cmbRole" id="cmbRole"  style="width:100%;" class="form-control select2-show-search" data-placeholder="Select User Role" required>
                                            <option value="">Select Role</option>
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Data Entry Operator">Data Entry Operator</option>
                                            
                                        </select>
                                        <?php
                                    }
                                ?>
                                </div>
                            </div><!-- row -->
                           
                            <div class="row mt-3">
                                <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                   <?php
                                    if ($this->uri->segment(4)) {
                                        echo '<input type="text" name="txtName" value="'.$ename.'" class="form-control" placeholder="Full Name" required>';
                                        echo '<input class="form-control" type="text" name="id" value="' . $eid . '" readonly="true" hidden="true">';
                                    } else {
                                        echo '<input type="text" name="txtName" class="form-control" placeholder="Full Name" required>';
                                    }
                                ?>
                                </div>
                            </div><!-- row -->
                            
                            <div class="row mt-3">
                                <label class="col-sm-4 form-control-label">Mobile: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                   <?php
                                    if ($this->uri->segment(4)) {
                                        echo '<input type="text" name="txtMobile" value="'.$emobile.'" class="form-control" placeholder="Mobile Number" onkeypress="return isNumber(event)" maxlength="10" minlength="10" required>';
                                    } else {
                                        echo '<input type="text" name="txtMobile" class="form-control" onkeypress="return isNumber(event)" maxlength="10" minlength="10" placeholder="Mobile Number" required>';
                                    }
                                ?>
                                </div>
                            </div><!-- row -->
                            
                            <div class="row mt-3" id="departmentSection">
                                <label class="col-sm-4 form-control-label">Department: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                   <?php
                                    if ($this->uri->segment(4)) {
                                       ?>
                                       <select name="cmbDepartment"  style="width:100%;" class="form-control select2-show-search" data-placeholder="Select Department" required id="cmbDepartment">
                                            <option value="">Select Role</option>
                                            <?php if (count($departments)) { ?>
                                            <?php 
                                                foreach ($departments as $dept) {
                                                    if($dept->id==$edepartment){
                                                        echo '<option value="'.$dept->id.'" selected>'.$dept->name.'</option>';
                                                    }else{
                                                        echo '<option value="'.$dept->id.'">'.$dept->name.'</option>';
                                                    }
                                                }
                                            }
                                            ?>   
                                        </select>
                                       <?php
                                    } else {
                                        ?>
                                        <select name="cmbDepartment"  style="width:100%;" class="form-control select2-show-search" data-placeholder="Select Department" required id="cmbDepartment">
                                            <option value="">Select Role</option>
                                            <?php if (count($departments)) { ?>
                                            <?php 
                                                foreach ($departments as $dept) { 
                                                    echo '<option value="'.$dept->id.'">'.$dept->name.'</option>';
                                                }
                                            }
                                            ?>   
                                        </select>
                                        <?php
                                    }
                                ?>
                                </div>
                            </div><!-- row -->
                             
                            <div class="row mt-3" id="blockSection">
                                <label class="col-sm-4 form-control-label">Block: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                   <?php
                                    if ($this->uri->segment(4)) {
                                        ?>
                                        <select name="cmbBlock" id="cmbBlock" style="width:100%;" class="form-control select2-show-search" data-placeholder="Select Block" required>
                                            <option value="">Select Role</option>
                                            <?php if (count($blockmuncmaster)) { ?>
                                            <?php 
                                                foreach ($blockmuncmaster as $blck) {
                                                    if($blck->blkId==$eblkId){
                                                        echo '<option value="'.$blck->blkId .'" selected>'.$blck->blkName.'</option>';
                                                    }else{
                                                         echo '<option value="'.$blck->blkId .'">'.$blck->blkName.'</option>';
                                                    }
                                                }
                                            }
                                            ?>   
                                        </select>
                                        <?php
                                    } else {
                                        ?>
                                        <select name="cmbBlock" id="cmbBlock" style="width:100%;" class="form-control select2-show-search" data-placeholder="Select Block" required>
                                            <option value="">Select Role</option>
                                            <?php if (count($blockmuncmaster)) { ?>
                                            <?php 
                                                foreach ($blockmuncmaster as $blck) { 
                                                    echo '<option value="'.$blck->blkId .'">'.$blck->blkName.'</option>';
                                                }
                                            }
                                            ?>   
                                        </select>
                                        <?php
                                    }
                                ?>
                                </div>
                            </div><!-- row -->
                            
                            <div class="row mt-3">
                                <label class="col-sm-4 form-control-label">Designation: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                   <?php
                                    if ($this->uri->segment(4)) {
                                        echo '<input type="text" name="txtDesignation" value="'.$edesignation.'" class="form-control" placeholder="Designation" required>';
                                    } else {
                                        echo '<input type="text" name="txtDesignation" class="form-control" placeholder="Designation" required>';
                                    }
                                ?>
                                </div>
                            </div><!-- row -->
                            
                            <div class="row mt-3">
                                <label class="col-sm-4 form-control-label">User Id: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                   <?php
                                    if ($this->uri->segment(4)) {
                                        echo '<input type="text" name="txtUserId" value="'.$euserid.'" class="form-control" placeholder="User Id" required disabled>';
                                    } else {
                                        echo '<input type="text" name="txtUserId" class="form-control" placeholder="User Id" required>';
                                    }
                                ?>
                                </div>
                            </div><!-- row -->
                            
                            <div class="row mt-3">
                                <label class="col-sm-4 form-control-label">Password: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                   <?php
                                    if ($this->uri->segment(4)) {
                                        echo '
                                        <div class="input-group">
                                        <input type="password" id="password" class="form-control" placeholder="Password" value="" name="txtPassword" disabled>
                                        <span class="input-group-addon" id="pwd_btn" onclick="show_hide_pwd()">
                                        <i class="fa fa-eye tx-16 lh-0 op-6" ></i></span>
                                        </div>';
                                    } else {
                                        echo '
                                        <div class="input-group">
                                        <input type="password" id="password" class="form-control" placeholder="Password" name="txtPassword" required>
                                        <span class="input-group-addon" id="pwd_btn" onclick="show_hide_pwd()">
                                        <i class="fa fa-eye tx-16 lh-0 op-6" ></i></span>
                                        </div>';
                                    }
                                ?>
                                </div>
                                
                            </div><!-- row -->
                            
                            
                            
                            <div class="form-layout-footer mg-t-30">
                                <button class="btn btn-teal text-capitalize"> Save Data</button>
                                <a class="btn btn-secondary text-capitalize" href="<?= base_url('superadmin/dashboard/user_master') ?>">Cancel</a>
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
            <table id="datatable1" class="table display responsive nowrap" style="width:100%;">
              <thead class="thead-colored thead-teal">
                <tr>
                  <th>Sl. No.</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Department</th>
                  <th>Block</th>
                  <th>User Id</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                            <?php if (count($totalEntries)) { ?>
                                <?php $sln = 0;
                                foreach ($totalEntries as $tot) {
                                    $sln = $sln + 1; ?>
                                    <tr class="text-inverse">
                                        <td><?php echo $sln; ?></td>
                                        <td><?php echo $tot->name; ?></td>
                                        <td><?php echo $tot->mobile; ?></td>
                                        <td><?php echo $tot->department; ?></td>
                                        <td><?php echo $tot->blkName; ?></td>
                                        <td><?php echo $tot->userid; ?></td>
                                        <td><?php echo $tot->role; ?></td>
                                        <td>
                                        <a href="<?= base_url('superadmin/dashboard/edit_user_master/' . $tot->id ) ?>" class="btn btn-teal btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                        </td>
                                        
                                    </tr>
                                <?php } // End foreach 
                                ?>
                            <?php } else { //End If and Else started //
                                echo '<tr><td colspan="9" class="text-center text-danger tx-bold">No Record Found !</td></tr>';
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
<script>
function show_hide_pwd(){
    var type=$('#password').prop('type');
    if(type=="password"){
        $('#password').attr('type','text'); 
        $('#pwd_btn').children().removeClass('fa-eye');
        $('#pwd_btn').children().addClass('fa-eye-slash');
    }
    else{
        $('#password').attr('type','password'); 
        $('#pwd_btn').children().removeClass('fa-eye-slash');
        $('#pwd_btn').children().addClass('fa-eye');
    }
}
function isNumber(event) {
    if ((event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode === 13) {
        return true;
    } else {
        return false;
    }
}
    
//    $(document).ready(function() {
//        $('#departmentSection').hide();
//        $('#blockSection').hide();
//        $('#cmbDepartment').prop('disabled', true);
//        $('#cmbBlock').prop('disabled', true);
//    });
    
    document.getElementById("cmbDepartment").onchange = function(){
    var value = document.getElementById("cmbDepartment").value;
        if(value==7 || value==8){
          $('#blockSection').show();
          $('#cmbBlock').prop('disabled', false);
       }else{
           $('#blockSection').hide();
           $('#cmbBlock').prop('disabled', true);
       }
    };
    
    document.getElementById("cmbRole").onchange = function(){
    var value = document.getElementById("cmbRole").value;
        if(value=='Data Entry Operator'){
          $('#departmentSection').show();
          $('#cmbDepartment').prop('disabled', false);
          $('#blockSection').hide();
          $('#cmbBlock').prop('disabled', true);
       }else{
           $('#departmentSection').hide(); 
           $('#blockSection').hide();
           $('#cmbDepartment').prop('disabled', true);
           $('#cmbBlock').prop('disabled', true);
       }
    };
</script>
<script>
        // On Edit Mode
        var urivalue='<?php if ($this->uri->segment(4)!=NULL){echo 'Yes';} ?>';
        if(urivalue=='Yes'){
            var role='<?php if(isset($erole)){ echo $erole;}?>';
            var department='<?php if(isset($edepartment)){ echo $edepartment;}?>';
            if(role=='Super Admin'){
                $('#departmentSection').hide(); 
                $('#blockSection').hide();
                $('#cmbDepartment').prop('disabled', true);
                $('#cmbBlock').prop('disabled', true);
            }else if(role=='Data Entry Operator'){
                $('#departmentSection').show();
                $('#cmbDepartment').prop('disabled', false);
                
                if(department=='7' || department=='8'){
                    $('#blockSection').show();
                    $('#cmbBlock').prop('disabled', false);
                }else{
                    $('#blockSection').hide();
                    $('#cmbBlock').prop('disabled', true);
                }
            }
        }
        
</script>
</body>
</html> 