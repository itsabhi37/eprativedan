 <!-- ########## START: LEFT PANEL ########## -->
 <div class="br-logo"><a href=""><span>[</span>e-Prativedan<span>]</span></a></div>
 <div class="br-sideleft overflow-y-auto">
     <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
     <div class="br-sideleft-menu">
         <a href="<?=base_url('home')?>" class="br-menu-link <?php $pg=$this->uri->segment(2); if($pg=="idsp" && $this->uri->segment(3)==""){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                 <span class="menu-item-label">Dashboard</span>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         
         <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="covid_case" || $pg=="facility_update" || $pg=="portal_updation" || $pg=="edit_covid_case" || $pg=="edit_facility_update" || $pg=="edit_portal_updation"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                 <span class="menu-item-label">Entry Forms</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
             <li class="nav-item"><a href="<?=base_url('department/idsp/covid_case')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="covid_case" || $pg=="edit_covid_case"){echo 'active' ;} ?>">COVID Case Info</a></li>
             <li class="nav-item"><a href="<?=base_url('department/idsp/facility_update')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="facility_update" || $pg=="edit_facility_update"){echo 'active' ;} ?>">COVID Facility Update</a></li>
             <li class="nav-item"><a href="<?=base_url('department/idsp/portal_updation')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="portal_updation" || $pg=="edit_portal_updation"){echo 'active' ;} ?>">ICMR Portal Updation</a></li>
         </ul>

         <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="covid_case_report" || $pg=="covid_facility_report" || $pg=="icmr_portal_report" || $pg=="show_covid_case_report" || $pg=="show_covid_facility_report" || $pg=="show_icmr_portal_report"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
             <li class="nav-item"><a href="<?=base_url('department/idsp/covid_case_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="covid_case_report" || $pg=="show_covid_case_report"){echo 'active' ;} ?>">COVID Case Reports</a></li>
             <li class="nav-item"><a href="<?=base_url('department/idsp/covid_facility_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="covid_facility_report" || $pg=="show_covid_facility_report"){echo 'active' ;} ?>">COVID Facility Reports</a></li>
             <li class="nav-item"><a href="<?=base_url('department/idsp/icmr_portal_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="icmr_portal_report" || $pg=="show_icmr_portal_report"){echo 'active' ;} ?>">ICMR Portal Reports</a></li>
         </ul>
     </div><!-- br-sideleft-menu -->
     <br>
 </div><!-- br-sideleft -->
 <!-- ########## END: LEFT PANEL ########## -->