<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>e-Prativedan | Forgot Password</title>
	<link rel="icon" href="<?=base_url()?>/assets/img/icon.png" type="image/gif">
    <!-- vendor css -->
    <?= link_tag('assets/lib/font-awesome/css/font-awesome.css') ?>
    <?= link_tag('assets/lib/Ionicons/css/ionicons.css') ?>

    <!-- Bracket CSS -->
    <?= link_tag('assets/css/bracket.css') ?>
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <div class="login-wrapper wd-300 wd-xs-350 pd-20 pd-xs-l-45-force pd-xs-r-40-force pd-xs-t-30-force pd-xs-b-20-force bg-white rounded shadow-base">
            <div class="tx-center tx-20 tx-bold tx-inverse"><img src="<?=base_url('assets/img/icon.png')?>" style="width:100px;" alt="Profile Image"><br/><span class="tx-normal"></span> e-Prativedan </div><hr style="border-top: 2px double #00B297;" class="mb-4" />
            <!-- <div class="tx-center mg-b-20">Dhanbad District Administration</div> -->
            
            <?php 
                if($this->session->userdata('mobile')!=NULL){
                    echo form_open('home/changePassword');
                }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" name="txtMobile" placeholder="Enter Registered Mobile Number Here" onkeypress="return isNumber(event)" value="<?php if($this->session->userdata('mobile')!=NULL){echo $this->session->userdata('mobile');}?>" maxlength="10" minlength="10" readonly>
            </div><!-- form-group -->
            
            <div class="form-group">
                <input type="password" class="form-control" name="txtNewPassword" placeholder="New Password" autofocus required>
            </div><!-- form-group -->
            
            <div class="form-group">
                <input type="password" class="form-control" name="txtConfirmPassword" placeholder="Re-Type Password" required >
            </div><!-- form-group -->
            
            
            <button type="submit" class="btn btn-teal btn-block">Change Password</button>
            </form>
            <!-- Invalid Login -->
            <?php if ($error = $this->session->flashdata('error')) : ?>                
                <div id="errordismiss" class="mt-2 alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo $error; ?>
                </div><!-- alert -->
            <?php endif; ?>
            
            <!-- If Success then Message Show in this Section-->
                <?php if ($success = $this->session->flashdata('success')) : ?>
                    <div id="successdismiss" class="mt-2 alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>

            <!-- <div class="mg-t-20 tx-center">Not yet a member? <a href="#" class="tx-info">Sign Up</a></div> -->
            
            <div class="mg-t-60 tx-center">
                <div class="mg-t-10 tx-11">
                    Designed, Developed & Maintained By <a href="https://dhanbad.nic.in" target="_blank" class="tx-teal">National Informatics Centre, Dhanbad</a>
                    <br/>
                    <img class="mt-2" src="<?=base_url('assets/img/niclogo.png')?>" style="width:100px;" alt="Profile Image">
                </div>
            </div>
        </div><!-- login-wrapper -->        
    </div><!-- d-flex -->
    
    <script src="<?= base_url('assets/lib/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/lib/popper.js/popper.js') ?>"></script>
    <script src="<?= base_url('assets/lib/bootstrap/bootstrap.js') ?>"></script>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#errordismiss').delay(5000).fadeOut();
    });
    
    $(document).ready(function() {
        $('#successdismiss').delay(5000).fadeOut();
    });
    
    function isNumber(event) {
    if ((event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode === 13) {
        return true;
    } else {
        return false;
    }
}
</script>

<script type="text/javascript">
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
     $(document).on("keydown", disableF5);
});
</script>

</html>