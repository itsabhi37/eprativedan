 <!-- ########## START: LEFT PANEL ########## -->
 <div class="br-logo"><a href=""><span>[</span>e-Prativedan<span>]</span></a></div>
 <div class="br-sideleft overflow-y-auto">
     <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
     <div class="br-sideleft-menu">
         <a href="<?=base_url('home')?>" class="br-menu-link <?php $pg=$this->uri->segment(2); if($pg=="cs" && $this->uri->segment(3)==""){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                 <span class="menu-item-label">Dashboard</span>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         
         <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="isolation_facilities" || $pg=="edit_isolation_facilities" || $pg=="es_quarantine" || $pg=="edit_es_quarantine" || $pg=="inventory" || $pg=="edit_inventory" || $pg=="doctor_availability" || $pg=="edit_doctor_availability"|| $pg=="health_updation" || $pg=="edit_health_update" || $pg=="ilisari_update" || $pg=="edit_ilisari_update"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                 <span class="menu-item-label">Entry Forms</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
             <li class="nav-item"><a href="<?=base_url('department/cs/isolation_facilities')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="isolation_facilities" || $pg=="edit_isolation_facilities"){echo 'active' ;} ?>">Isolation Facilities</a></li>
             <li class="nav-item"><a href="<?=base_url('department/cs/es_quarantine')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="es_quarantine" || $pg=="edit_es_quarantine"){echo 'active' ;} ?>">Essential Services On QC</a></li>
             <li class="nav-item"><a href="<?=base_url('department/cs/inventory')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="inventory" || $pg=="edit_inventory"){echo 'active' ;} ?>">Inventory</a></li>
             <li class="nav-item"><a href="<?=base_url('department/cs/doctor_availability')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="doctor_availability" || $pg=="edit_doctor_availability"){echo 'active' ;} ?>">Doctor Availability</a></li>
             <li class="nav-item"><a href="<?=base_url('department/cs/health_updation')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="health_updation" || $pg=="edit_health_update"){echo 'active' ;} ?>">Health Parameters</a></li>
             <li class="nav-item"><a href="<?=base_url('department/cs/ilisari_update')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="ilisari_update" || $pg=="edit_ilisari_update"){echo 'active' ;} ?>">ILI/SARI Updation</a></li>
		 
		 </ul>

         <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="health_report" || $pg=="show_health_report" || $pg=="ilisari_report" || $pg=="show_ilisari_report" || $pg=="es_quarantine_report" || $pg=="show_es_quarantine_report" || $pg=="inventory_report" || $pg=="show_inventory_report" || $pg=="doctor_availability_report" || $pg=="show_doctor_availability_report" ){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
            
            <li class="nav-item"><a href="<?=base_url('department/cs/es_quarantine_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="es_quarantine_report" || $pg=="show_es_quarantine_report"){echo 'active' ;} ?>">Essentials On QC Report</a></li>
            <li class="nav-item"><a href="<?=base_url('department/cs/inventory_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="inventory_report" || $pg=="show_inventory_report"){echo 'active' ;} ?>">Inventory Report</a></li>
            <li class="nav-item"><a href="<?=base_url('department/cs/doctor_availability_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="doctor_availability_report" || $pg=="show_doctor_availability_report"){echo 'active' ;} ?>">Doctor Availability Report</a></li>
            <li class="nav-item"><a href="<?=base_url('department/cs/health_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="health_report" || $pg=="show_health_report"){echo 'active' ;} ?>">Health Parameters Report</a></li>
            <li class="nav-item"><a href="<?=base_url('department/cs/ilisari_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="ilisari_report" || $pg=="show_ilisari_report"){echo 'active' ;} ?>">ILI/SARI Reports</a></li>
		 </ul>
     </div><!-- br-sideleft-menu -->
     <br>
 </div><!-- br-sideleft -->
 <!-- ########## END: LEFT PANEL ########## -->