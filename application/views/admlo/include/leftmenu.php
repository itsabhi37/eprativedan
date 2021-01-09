 <!-- ########## START: LEFT PANEL ########## -->
 <div class="br-logo"><a href=""><span>[</span>e-Prativedan<span>]</span></a></div>
 <div class="br-sideleft overflow-y-auto">
     <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
     <div class="br-sideleft-menu">
         <a href="<?=base_url('home')?>" class="br-menu-link <?php $pg=$this->uri->segment(2); if($pg=="admlo" && $this->uri->segment(3)==""){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                 <span class="menu-item-label">Dashboard</span>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         
         <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="admlo_update"  || $pg=="edit_admlo_update"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                 <span class="menu-item-label">Entry Forms</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
         <li class="nav-item"><a href="<?=base_url('department/admlo/admlo_update')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="admlo_update" || $pg=="edit_admlo_update"){echo 'active' ;} ?>">Law & Order Parameters</a></li>
         </ul>

         <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="admlo_report" || $pg=="show_admlo_report"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
         <li class="nav-item"><a href="<?=base_url('department/admlo/admlo_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="admlo_report" || $pg=="show_admlo_report"){echo 'active' ;} ?>">L&O Parameters Reports</a></li>
         </ul>
     </div><!-- br-sideleft-menu -->
     <br>
 </div><!-- br-sideleft -->
 <!-- ########## END: LEFT PANEL ########## -->