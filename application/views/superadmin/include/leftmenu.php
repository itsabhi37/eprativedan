 <!-- ########## START: LEFT PANEL ########## -->
 <div class="br-logo"><a href=""><span>[</span>e-Prativedan<span>]</span></a></div>
 <div class="br-sideleft overflow-y-auto">
     <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
     <div class="br-sideleft-menu">
	 <a href="<?=base_url('home')?>" class="br-menu-link <?php $pg=$this->uri->segment(2); if($pg=="dashboard" && $this->uri->segment(3)==""){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                 <span class="menu-item-label">Dashboard</span>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->  
<a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="ele_point_report"){echo 'active' ;} ?>">		 
         <!--<a href="#" class="br-menu-link">-->  
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
             <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/ele_point_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="ele_point_report" || $pg=="show_bdo_report"){echo 'active' ;} ?>">11 Points Report</a></li>
         </ul>  
          
         <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="rtpcr_reports" || $pg=="truenat_reports" || $pg=="show_rtpcr_reports" || $pg=="show_truenat_reports"){echo 'active' ;} ?>">		 
         <!--<a href="#" class="br-menu-link">-->  
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">PMCH Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
             <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/rtpcr_reports')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="rtpcr_reports" || $pg=="show_rtpcr_reports"){echo 'active' ;} ?>">RT-PCR Reports</a></li>
             <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/truenat_reports')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="truenat_reports" || $pg=="show_truenat_reports"){echo 'active' ;} ?>">TrueNat Reports</a></li>
         </ul>  
         
        <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="covid_case_report" || $pg=="covid_facility_report" || $pg=="icmr_portal_report" || $pg=="show_covid_case_report" || $pg=="show_covid_facility_report" || $pg=="show_icmr_portal_report"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">IDSP Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
             <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/covid_case_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="covid_case_report" || $pg=="show_covid_case_report"){echo 'active' ;} ?>">COVID Case Reports</a></li>
             <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/covid_facility_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="covid_facility_report" || $pg=="show_covid_facility_report"){echo 'active' ;} ?>">COVID Facility Reports</a></li>
             <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/icmr_portal_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="icmr_portal_report" || $pg=="show_icmr_portal_report"){echo 'active' ;} ?>">ICMR Portal Reports</a></li>
         </ul>  

		<a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="health_report" || $pg=="show_health_report" || $pg=="ilisari_report" || $pg=="show_ilisari_report" || $pg=="es_quarantine_report" || $pg=="show_es_quarantine_report" || $pg=="inventory_report" || $pg=="show_inventory_report" || $pg=="doctor_availability_report" || $pg=="show_doctor_availability_report" ){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">CS Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
            
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/es_quarantine_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="es_quarantine_report" || $pg=="show_es_quarantine_report"){echo 'active' ;} ?>">Essentials On QC Report</a></li>
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/inventory_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="inventory_report" || $pg=="show_inventory_report"){echo 'active' ;} ?>">Inventory Report</a></li>
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/doctor_availability_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="doctor_availability_report" || $pg=="show_doctor_availability_report"){echo 'active' ;} ?>">Doctor Availability Report</a></li>
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/health_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="health_report" || $pg=="show_health_report"){echo 'active' ;} ?>">Health Parameters Report</a></li>
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/ilisari_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="ilisari_report" || $pg=="show_ilisari_report"){echo 'active' ;} ?>">ILI/SARI Reports</a></li>
		 </ul>
		 
		 <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="admlo_report" || $pg=="show_admlo_report"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">ADM L&O Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
         <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/admlo_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="admlo_report" || $pg=="show_admlo_report"){echo 'active' ;} ?>">L&O Parameters Reports</a></li>
         </ul>
		 
		 <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="ss_parameters_report" || $pg=="show_ss_parameters_report"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">ADM Supply Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
             <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/ss_parameters_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="ss_parameters_report" || $pg=="show_ss_parameters_report"){echo 'active' ;} ?>">SS Parameters Reports</a></li>
         </ul>
		 
		 <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="sdo_report" || $pg=="show_sdo_report"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">SDO Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/sdo_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="sdo_report" || $pg=="show_sdo_report"){echo 'active' ;} ?>">ES Parameters Reports</a></li>
         </ul>
		 
		 <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="ssc_report" || $pg=="show_ssc_report"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">Social Security Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
             <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/ssc_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="ssc_report" || $pg=="show_ssc_report"){echo 'active' ;} ?>">Pension Distribution Reports</a></li>
             
         </ul>
		 
		 <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="show_bdo_report" || $pg=="bdo_report"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">BDO Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
             <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/bdo_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="bdo_report" || $pg=="show_bdo_report"){echo 'active' ;} ?>">Blockwise Quaratine Reports</a></li>
             
         </ul>
		 
		 <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="co_report" || $pg=="show_co_report" ){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
                 <span class="menu-item-label">CO Reports</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/co_report')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="co_report" || $pg=="show_co_report"){echo 'active' ;} ?>">CO Checklist Reports</a></li>
		 </ul>
		 
		 <a href="#" class="br-menu-link <?php $pg=$this->uri->segment(3); if($pg=="block_master" || $pg=="edit_block_master" ||$pg=="csquarantine_master" || $pg=="edit_csquarantine_master" || $pg=="cvdfacility_master" || $pg=="edit_cvdfacility_master" || $pg=="department_master" || $pg=="edit_department_master" || $pg=="isolation_master" || $pg=="edit_isolation_master" || $pg=="testdist_master" || $pg=="edit_testdist_master" || $pg=="truenat_testlab_master" || $pg=="edit_truenat_testlab_master" || $pg=="user_master" || $pg=="edit_user_master" || $pg=="query_master" || $pg=="show_query_master"){echo 'active' ;} ?>">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-gear-b tx-24"></i>
                 <span class="menu-item-label">Master Entry</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/block_master')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="block_master" || $pg=="edit_block_master"){echo 'active' ;} ?>">Block - Municipal</a></li>
            
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/csquarantine_master')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="csquarantine_master" || $pg=="edit_csquarantine_master"){echo 'active' ;} ?>">CS Quarantine Center</a></li>
            
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/cvdfacility_master')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="cvdfacility_master" || $pg=="edit_cvdfacility_master"){echo 'active' ;} ?>">COVID Facility</a></li>
            
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/department_master')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="department_master" || $pg=="edit_department_master"){echo 'active' ;} ?>">Department</a></li>
            
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/isolation_master')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="isolation_master" || $pg=="edit_isolation_master"){echo 'active' ;} ?>">Isolation Center</a></li>
            
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/testdist_master')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="testdist_master" || $pg=="edit_testdist_master"){echo 'active' ;} ?>">Test District</a></li>
            
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/truenat_testlab_master')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="truenat_testlab_master" || $pg=="edit_truenat_testlab_master"){echo 'active' ;} ?>">TrueNat Test Lab</a></li>
            
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/user_master')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="user_master" || $pg=="edit_user_master"){echo 'active' ;} ?>">User Master</a></li>
            
            <li class="nav-item"><a href="<?=base_url('superadmin/dashboard/query_master')?>" class="nav-link <?php $pg=$this->uri->segment(3); if($pg=="query_master" || $pg=="show_query_master"){echo 'active' ;} ?>">Query Master</a></li>
		 </ul>
		 
     </div><!-- br-sideleft-menu -->
     <br>
 </div><!-- br-sideleft -->
 <!-- ########## END: LEFT PANEL ########## -->