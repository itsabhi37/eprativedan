<!-- ########## START: HEAD PANEL ########## -->
<div class="br-header">
    <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- br-header-left -->
    <div class="br-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name hidden-md-down"><?php echo $this->session->userdata('logged_user_name'); ?></span>
                    <img src="<?=base_url('assets/img/profile_img.png')?>" class="wd-32 rounded-circle" alt="Profile Image">
                    <span class="square-10 bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <!--<li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                        
                        <li><a href=""><i class="icon ion-ios-download"></i> Downloads</a></li>
                        <li><a href=""><i class="icon ion-ios-star"></i> Favorites</a></li>
                        <li><a href=""><i class="icon ion-ios-folder"></i> Collections</a></li>-->
                        <li><a onclick="#" href="#" data-href="#" style="outline:none;" class="dropdown-item" data-toggle="modal" data-target="#passwordChangeModal" title="Settings"><i class="icon ion-ios-gear"></i> Settings</a></li>
                        <li><a href="<?=base_url('home/logout')?>"><i class="icon ion-power"></i> Sign Out</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
    </div><!-- br-header-right -->
</div><!-- br-header -->
<!-- ########## END: HEAD PANEL ########## -->




<!-- Password Change Modals-->
         <div id="passwordChangeModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-vertical-center" style="width:100%;">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h4 class="modal-title" id="myModalLabel"><b><font color='#FFF'><i class="fa fa-cog fa-lg"></i> Change Password </font></b></h4>
                    <button type="button" style="outline:none;color=#000;" class="close" data-dismiss="modal" aria-hidden="true" aria-label="Close">×</button>
                </div>
                <form class="password-change-form" role="form" enctype="multipart/form-data">
                <div class="modal-body pd-25">                        
                        
                        <div class="form-group">
                          <label for="basic-url">Current Password: <span class="tx-danger">*</span></label>
                          <input type="password" class="form-control" name="current_password" id="current_password" required placeholder="Enter the current password">
                        </div>
                        
                        
                        <div class="form-group">
                          <label for="basic-url">New Password: <span class="tx-danger">*</span></label>
                          <input type="password" class="form-control" name="new_password" id="new_password" required placeholder="Enter the new password">
                        </div>

                        
                        <div class="form-group">
                          <label for="basic-url">Confirm New Password: <span class="tx-danger">*</span></label>
                         <input type="password" class="form-control" name="confirm_password" id="confirm_password" required placeholder="Enter the confirm password">
                        </div>
                        
                        <div style="margin-top: 20px;" class="row">
                            <div id="password-change-info" class="col-lg-12">
                           
                            </div>
                        </div>
                </div>
                <div class="modal-footer">  
                    <button type="submit" class="btn btn-teal change-pass-btn"> Change Password</button>                  
                    <button type="button" style="outline:none;" class="btn btn-secondary" data-dismiss="modal"> Cancel</button>
                </div>
                 </form>
            </div>
        </div>
    </div>