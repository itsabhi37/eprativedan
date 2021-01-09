<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        //if user is not logged in then redirect to Login Page       
       parent::__construct();
       if($this->session->userdata('logged_user_role')!="Super Admin"){
                return redirect('home');
           }
   }

    public function index(){
        $currentdate = date('Y-m-d'); // Today Date
        $total_noPosCase = $this->mymodel->get_Sum('noPosCase','dtofRept',$currentdate,'cvdcaseinfo'); // Today's Positive Cases
        $total_activeCase = $this->mymodel->get_Sum('activeCase','dtofRept',$currentdate,'cvdcaseinfo'); // Total Active Cases Currently
        $total_recvrdCase = $this->mymodel->get_Sum('recvrdCase','','','cvdcaseinfo'); // Total Recovered Till Date SUM
        $total_deathCase = $this->mymodel->get_Sum('deathCase','','','cvdcaseinfo'); // Total Death Till Date SUM        
        $point_nine=$this->mymodel->point_nine(""); // Last Updated  Doctors Availability Record
        
        for($i=6;$i>=0;$i--){
            $newdate = date("Y-m-d", strtotime("-".$i."days"));
            $record[]=$this->mymodel->fetch_data('dtofRept',$newdate,'cvdcaseinfo');
        }
        
        $data = array('point_nine'=>$point_nine,'total_noPosCase' => $total_noPosCase, 'total_activeCase' => $total_activeCase,'total_recvrdCase'=>$total_recvrdCase,'total_deathCase'=>$total_deathCase,'record'=>$record);
        
		$this->load->view('superadmin/dashboard',$data);
	}
    
    // Block Master
    // Start
    public function block_master(){
        // Load Block Master
        $totalEntries = $this->mymodel->fetch_all('blockmuncmaster');
        $data = array('totalEntries' => $totalEntries);
        $this->load->view('superadmin/block_master',$data);
    }    
    public function insert_block_master(){
	//INSERT Block Master
        $this->form_validation->set_rules('txtName', 'Block - Municipal Name', 'required|is_unique[blockmuncmaster.blkName]');
            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail
             $this->session->set_flashdata('error',validation_errors());  
             return redirect('superadmin/dashboard/block_master');
         } else {
             // On Success Save Details in Add Mode   
             $blkName = $this->input->post('txtName');
             $data = array('blkName'=>$blkName);
                
             $this->action_redirect_msg(
                    $this->mymodel->insert_data('blockmuncmaster', $data),
                    'Block - Municipal Data Inserted Successfully.',
                    'Something went wrong, please try again!','superadmin/dashboard/block_master'
                );            
         }
    }    
    public function edit_block_master($id){
        // Edit Block Master       
        $singleRecord = $this->mymodel->fetch_data('blkId',$id,'blockmuncmaster');
        $totalEntries = $this->mymodel->fetch_all('blockmuncmaster');
        
        $data = array('singleRecord'=>$singleRecord, 'totalEntries' => $totalEntries);
        $this->load->view('superadmin/block_master', $data);
    }
    public function update_block_master(){
        // Update Block Master Information Record
        $this->form_validation->set_rules('txtName', 'Block - Municipal Name', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error',validation_errors());
                $loc='superadmin/dashboard/edit_block_master/'.$this->input->post('blkId');
                return redirect($loc);  
        }
        else{
            // On Success  
            $blkId=$this->input->post('blkId');  
            $blkName = $this->input->post('txtName');
            // Update data on blockmuncmaster
               $data = array('blkName'=>$blkName);
            
            $this->action_redirect_msg($this->mymodel->update_data('blkId',$blkId,$data,'blockmuncmaster'),
                       'Block - Municipal Data Updated Successfully.','Something went wrong, please try again!','superadmin/dashboard/block_master');
        }        
    }
    
    // End
    // Block Master
    
    // Quarantine Master
    // Start
    public function csquarantine_master(){
        // Load CS Quarantine Master
        $totalEntries = $this->mymodel->fetch_all('csqc');
        $data = array('totalEntries' => $totalEntries);
        $this->load->view('superadmin/csquarantine_master',$data);
    }
    public function insert_csquarantine_master(){
	//INSERT Quarantine Master
        $this->form_validation->set_rules('txtName', 'Quarantine Center Name', 'required|is_unique[csqc.csqcName]');
            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail
             $this->session->set_flashdata('error',validation_errors());  
             return redirect('superadmin/dashboard/csquarantine_master');
         } else {
             // On Success Save Details in Add Mode   
             $csqcName = $this->input->post('txtName');
             $data = array('csqcName'=>$csqcName);
                
             $this->action_redirect_msg(
                    $this->mymodel->insert_data('csqc', $data),
                    'CS Quarantine Data Inserted Successfully.',
                    'Something went wrong, please try again!','superadmin/dashboard/csquarantine_master'
                );            
         }
    }    
    public function edit_csquarantine_master($id){
        // Edit Quarantine Master       
        $singleRecord = $this->mymodel->fetch_data('csqcId',$id,'csqc');
        $totalEntries = $this->mymodel->fetch_all('csqc');
        
        $data = array('singleRecord'=>$singleRecord, 'totalEntries' => $totalEntries);
        $this->load->view('superadmin/csquarantine_master', $data);
    }
    public function update_csquarantine_master(){
        // Update Quarantine Master Information Record
        $this->form_validation->set_rules('txtName', 'Quarantine Center Name', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error',validation_errors());
                $loc='superadmin/dashboard/edit_csquarantine_master/'.$this->input->post('csqcId');
                return redirect($loc);  
        }
        else{
            // On Success  
            $csqcId=$this->input->post('csqcId');  
            $csqcName = $this->input->post('txtName');
            // Update data on csqc
               $data = array('csqcName'=>$csqcName);
            
            $this->action_redirect_msg($this->mymodel->update_data('csqcId',$csqcId,$data,'csqc'),
                       'CS Quarantine Data Updated Successfully.','Something went wrong, please try again!','superadmin/dashboard/csquarantine_master');
        }        
    }
    // End
    // Quarantine Master
    
    // COVID Facility Master
    // Start
    public function cvdfacility_master(){
        // Load COVID Facility Master
        $totalEntries = $this->mymodel->fetch_all('cvdfailityname');
        $data = array('totalEntries' => $totalEntries);
        $this->load->view('superadmin/cvdfacility_master',$data);
    }
    public function insert_cvdfacility_master(){
	//INSERT COVID Facility Master
        $this->form_validation->set_rules('txtName', 'COVID Facility Name', 'required|is_unique[cvdfailityname.cvdFacilityName]');
            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail
             $this->session->set_flashdata('error',validation_errors());  
             return redirect('superadmin/dashboard/cvdfacility_master');
         } else {
             // On Success Save Details in Add Mode   
             $cvdFacilityName = $this->input->post('txtName');
             $data = array('cvdFacilityName'=>$cvdFacilityName);
                
             $this->action_redirect_msg(
                    $this->mymodel->insert_data('cvdfailityname', $data),
                    'COVID Facility Data Inserted Successfully.',
                    'Something went wrong, please try again!','superadmin/dashboard/cvdfacility_master'
                );            
         }
    }    
    public function edit_cvdfacility_master($id){
        // Edit COVID Facility Master       
        $singleRecord = $this->mymodel->fetch_data('cvfNameId ',$id,'cvdfailityname');
        $totalEntries = $this->mymodel->fetch_all('cvdfailityname');
        
        $data = array('singleRecord'=>$singleRecord, 'totalEntries' => $totalEntries);
        $this->load->view('superadmin/cvdfacility_master', $data);
    }
    public function update_cvdfacility_master(){
        // Update COVID Facility Master Information Record
        $this->form_validation->set_rules('txtName', 'COVID Facility Name', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error',validation_errors());
                $loc='superadmin/dashboard/edit_cvdfacility_master/'.$this->input->post('cvfNameId');
                return redirect($loc);  
        }
        else{
            // On Success  
            $cvfNameId=$this->input->post('cvfNameId');  
            $cvdFacilityName = $this->input->post('txtName');
            // Update data on cvdfailityname
               $data = array('cvdFacilityName'=>$cvdFacilityName);
            
            $this->action_redirect_msg($this->mymodel->update_data('cvfNameId',$cvfNameId,$data,'cvdfailityname'),
                       'COVID Facility Data Updated Successfully.','Something went wrong, please try again!','superadmin/dashboard/cvdfacility_master');
        }        
    }
    // End
    // COVID Facility Master

    
    // Department Master
    // Start
    public function department_master(){
        // Load Department Master
        $totalEntries = $this->mymodel->fetch_all('departmentdetails');
        $data = array('totalEntries' => $totalEntries);
        $this->load->view('superadmin/department_master',$data);
    }
    public function insert_department_master(){
	//INSERT Department Master
        $this->form_validation->set_rules('txtName', 'Department Name', 'required|is_unique[departmentdetails.name]');
            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail
             $this->session->set_flashdata('error',validation_errors());  
             return redirect('superadmin/dashboard/department_master');
         } else {
             // On Success Save Details in Add Mode   
             $name = $this->input->post('txtName');
             $data = array('name'=>$name);
                
             $this->action_redirect_msg(
                    $this->mymodel->insert_data('departmentdetails', $data),
                    'Department Data Inserted Successfully.',
                    'Something went wrong, please try again!','superadmin/dashboard/department_master'
                );            
         }
    }    
    public function edit_department_master($id){
        // Edit Department Master       
        $singleRecord = $this->mymodel->fetch_data('id ',$id,'departmentdetails');
        $totalEntries = $this->mymodel->fetch_all('departmentdetails');
        
        $data = array('singleRecord'=>$singleRecord, 'totalEntries' => $totalEntries);
        $this->load->view('superadmin/department_master', $data);
    }
    public function update_department_master(){
        // Update Department Master Information Record
        $this->form_validation->set_rules('txtName', 'Department Name', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error',validation_errors());
                $loc='superadmin/dashboard/edit_department_master/'.$this->input->post('id');
                return redirect($loc);  
        }
        else{
            // On Success  
            $id=$this->input->post('id');  
            $name = $this->input->post('txtName');
            // Update data on departmentdetails
               $data = array('name'=>$name);
            
            $this->action_redirect_msg($this->mymodel->update_data('id',$id,$data,'departmentdetails'),
                       'Department Data Updated Successfully.','Something went wrong, please try again!','superadmin/dashboard/department_master');
        }        
    }
    // End
    // Department Master
    
    // Isolation Master
    // Start
    public function isolation_master(){
        // Load Isolation Master
        $totalEntries = $this->mymodel->fetch_all('isolationcentre');
        $data = array('totalEntries' => $totalEntries);
        $this->load->view('superadmin/isolation_master',$data);
    }
    public function insert_isolation_master(){
	//INSERT Isolation Master
        $this->form_validation->set_rules('txtName', 'Isolation Center Name', 'required|is_unique[isolationcentre.isoCentreName]');
            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail
             $this->session->set_flashdata('error',validation_errors());  
             return redirect('superadmin/dashboard/isolation_master');
         } else {
             // On Success Save Details in Add Mode   
             $isoCentreName = $this->input->post('txtName');
             $data = array('isoCentreName'=>$isoCentreName);
                
             $this->action_redirect_msg(
                    $this->mymodel->insert_data('isolationcentre', $data),
                    'Isolation Center Data Inserted Successfully.',
                    'Something went wrong, please try again!','superadmin/dashboard/isolation_master'
                );            
         }
    }    
    public function edit_isolation_master($id){
        // Edit Isolation Master       
        $singleRecord = $this->mymodel->fetch_data('isoId ',$id,'isolationcentre');
        $totalEntries = $this->mymodel->fetch_all('isolationcentre');
        
        $data = array('singleRecord'=>$singleRecord, 'totalEntries' => $totalEntries);
        $this->load->view('superadmin/isolation_master', $data);
    }
    public function update_isolation_master(){
        // Update Isolation Master Information Record
        $this->form_validation->set_rules('txtName', 'Isolation Center Name', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error',validation_errors());
                $loc='superadmin/dashboard/edit_isolation_master/'.$this->input->post('isoId');
                return redirect($loc);  
        }
        else{
            // On Success  
            $isoId=$this->input->post('isoId');  
            $isoCentreName = $this->input->post('txtName');
            // Update data on isolationcentre
               $data = array('isoCentreName'=>$isoCentreName);
            
            $this->action_redirect_msg($this->mymodel->update_data('isoId',$isoId,$data,'isolationcentre'),
                       'Isolation Center Data Updated Successfully.','Something went wrong, please try again!','superadmin/dashboard/isolation_master');
        }        
    }
    // End
    // Isolation Master
    
    // Test District Master
    // Start
    public function testdist_master(){
        // Load Test District Master
        $totalEntries = $this->mymodel->fetch_all('testdist');
        $data = array('totalEntries' => $totalEntries);
        $this->load->view('superadmin/testdist_master',$data);
    }
    public function insert_testdist_master(){
	//INSERT Test District Master
        $this->form_validation->set_rules('txtName', 'District Name', 'required|is_unique[testdist.dstName]');
            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail
             $this->session->set_flashdata('error',validation_errors());  
             return redirect('superadmin/dashboard/testdist_master');
         } else {
             // On Success Save Details in Add Mode   
             $dstName = $this->input->post('txtName');
             $data = array('dstName'=>$dstName);
                
             $this->action_redirect_msg(
                    $this->mymodel->insert_data('testdist', $data),
                    'Test District Data Inserted Successfully.',
                    'Something went wrong, please try again!','superadmin/dashboard/testdist_master'
                );            
         }
    }    
    public function edit_testdist_master($id){
        // Edit Test District Master       
        $singleRecord = $this->mymodel->fetch_data('dstId',$id,'testdist');
        $totalEntries = $this->mymodel->fetch_all('testdist');
        
        $data = array('singleRecord'=>$singleRecord, 'totalEntries' => $totalEntries);
        $this->load->view('superadmin/testdist_master', $data);
    }
    public function update_testdist_master(){
        // Update Test District Master Information Record
        $this->form_validation->set_rules('txtName', 'District Name', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error',validation_errors());
                $loc='superadmin/dashboard/edit_testdist_master/'.$this->input->post('dstId');
                return redirect($loc);  
        }
        else{
            // On Success  
            $dstId=$this->input->post('dstId');  
            $dstName = $this->input->post('txtName');
            // Update data on testdist
               $data = array('dstName'=>$dstName);
            
            $this->action_redirect_msg($this->mymodel->update_data('dstId',$dstId,$data,'testdist'),
                       'Test District Data Updated Successfully.','Something went wrong, please try again!','superadmin/dashboard/testdist_master');
        }        
    }
    // End
    // Test District Master
    
    // TrueNat Test Lab Master
    // Start
    public function truenat_testlab_master(){
        // Load TrueNat Test Lab Master
        $totalEntries = $this->mymodel->fetch_all('truenattestlab');
        $data = array('totalEntries' => $totalEntries);
        $this->load->view('superadmin/truenat_testlab_master',$data);
    }
    public function insert_truenat_testlab_master(){
	//INSERT TrueNat Test Lab Master
        $this->form_validation->set_rules('txtName', 'TrueNat Testing Lab Name', 'required|is_unique[truenattestlab.ttlName]');
            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail
             $this->session->set_flashdata('error',validation_errors());  
             return redirect('superadmin/dashboard/truenat_testlab_master');
         } else {
             // On Success Save Details in Add Mode   
             $ttlName = $this->input->post('txtName');
             $data = array('ttlName'=>$ttlName);
                
             $this->action_redirect_msg(
                    $this->mymodel->insert_data('truenattestlab', $data),
                    'TrueNat Testing Lab Data Inserted Successfully.',
                    'Something went wrong, please try again!','superadmin/dashboard/truenat_testlab_master'
                );            
         }
    }    
    public function edit_truenat_testlab_master($id){
        // Edit TrueNat Test Lab Master       
        $singleRecord = $this->mymodel->fetch_data('ttlId',$id,'truenattestlab');
        $totalEntries = $this->mymodel->fetch_all('truenattestlab');
        
        $data = array('singleRecord'=>$singleRecord, 'totalEntries' => $totalEntries);
        $this->load->view('superadmin/truenat_testlab_master', $data);
    }
    public function update_truenat_testlab_master(){
        // Update TrueNat Test Lab Master Information Record
        $this->form_validation->set_rules('txtName', 'TrueNat Testing Lab Name', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error',validation_errors());
                $loc='superadmin/dashboard/edit_truenat_testlab_master/'.$this->input->post('ttlId');
                return redirect($loc);  
        }
        else{
            // On Success  
            $ttlId=$this->input->post('ttlId');  
            $ttlName = $this->input->post('txtName');
            // Update data on truenattestlab
               $data = array('ttlName'=>$ttlName);
            
            $this->action_redirect_msg($this->mymodel->update_data('ttlId',$ttlId,$data,'truenattestlab'),
                       'TrueNat Testing Lab Data Updated Successfully.','Something went wrong, please try again!','superadmin/dashboard/truenat_testlab_master');
        }        
    }
    // End
    // TrueNat Test Lab Master
    
    // User Master
    // Start
    public function user_master(){
        // Load User Master
        $totalEntries = $this->mymodel->fetch_user_details();
        $departments = $this->mymodel->fill_data('id,name','departmentdetails','id!=0','');
        $blockmuncmaster = $this->mymodel->fill_data('blkId,blkName','blockmuncmaster','blkId!=0','');
        $data = array('totalEntries' => $totalEntries,'departments'=>$departments,'blockmuncmaster'=>$blockmuncmaster);
        $this->load->view('superadmin/user_master',$data);
    }
    public function insert_user_master(){
	//INSERT User Master
        $this->form_validation->set_rules('cmbRole', 'Role', 'required');
        if($this->input->post('cmbRole')=='Data Entry Operator'){
            // If Data Entry Operator
            // Department Name Required
            $this->form_validation->set_rules('cmbDepartment', 'Department Name', 'required');
            // If BDO Office Or CO Office Selected 
            // Block Name Required
            if($this->input->post('cmbDepartment')==7 || $this->input->post('cmbDepartment')==8){
            $this->form_validation->set_rules('cmbBlock', 'Block Name', 'required');
            }
        }
        $this->form_validation->set_rules('txtName', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('txtMobile', 'Mobile No.', 'trim|required|is_unique[logindetails.mobile]');
        $this->form_validation->set_rules('txtDesignation', 'Designation', 'trim|required');
        $this->form_validation->set_rules('txtUserId', 'User Id', 'required|is_unique[logindetails.userid]|trim');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');
        
            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail
             $this->session->set_flashdata('error',validation_errors());  
             return redirect('superadmin/dashboard/user_master');
            } else {
             // On Success Save Details in Add Mode 
             $role = $this->input->post('cmbRole');
             if($role=='Data Entry Operator'){
                 $department = $this->input->post('cmbDepartment');
                 if($this->input->post('cmbDepartment')==7 || $this->input->post('cmbDepartment')==8){
                $blkId = $this->input->post('cmbBlock');
                 }else{
                     $blkId = '0';
                 }
             }else{
                 $department='0';
                 $blkId = '0';
             }
             
             $name = $this->input->post('txtName');
             $mobile = $this->input->post('txtMobile');
             $designation = $this->input->post('txtDesignation');
             $userid  = $this->input->post('txtUserId');
             $pwd     = SHA1($this->input->post('txtPassword'));
             $data = array('name'=>$name,'mobile'=>$mobile,'department'=>$department,'blkId'=>$blkId,'designation'=>$designation,'userid'=>$userid,'pwd'=>$pwd,'role'=>$role);
                
             $this->action_redirect_msg(
                    $this->mymodel->insert_data('logindetails', $data),
                    'User Data Inserted Successfully.',
                    'Something went wrong, please try again!','superadmin/dashboard/user_master'
                );            
         }
    }    
    public function edit_user_master($id){
        // Edit User Master       
        $totalEntries = $this->mymodel->fetch_user_details();
        $departments = $this->mymodel->fill_data('id,name','departmentdetails','id!=0','');
        $blockmuncmaster = $this->mymodel->fill_data('blkId,blkName','blockmuncmaster','blkId!=0','');
        
        $singleRecord = $this->mymodel->fetch_data('id',$id,'logindetails');
        
        $data = array('singleRecord'=>$singleRecord, 'totalEntries' => $totalEntries,'departments'=>$departments,'blockmuncmaster'=>$blockmuncmaster);
        $this->load->view('superadmin/user_master', $data);
    }
    public function update_user_master(){
        // Update User Master
        $this->form_validation->set_rules('cmbRole', 'Role', 'required');
        if($this->input->post('cmbRole')=='Data Entry Operator'){
            // If Data Entry Operator
            // Department Name Required
            $this->form_validation->set_rules('cmbDepartment', 'Department Name', 'required');
            // If BDO Office Or CO Office Selected 
            // Block Name Required
            if($this->input->post('cmbDepartment')==7 || $this->input->post('cmbDepartment')==8){
            $this->form_validation->set_rules('cmbBlock', 'Block Name', 'required');
            }
        }
        $this->form_validation->set_rules('txtName', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('txtMobile', 'Mobile No.', 'trim|required');
        $this->form_validation->set_rules('txtDesignation', 'Designation', 'trim|required');
//        $this->form_validation->set_rules('txtUserId', 'User Id', 'required|is_unique[logindetails.userid]|trim');
//        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');
        
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error',validation_errors());
                $loc='superadmin/dashboard/edit_user_master/'.$this->input->post('id');
                return redirect($loc);  
        }
        else{
            // On Success  
            $id=$this->input->post('id');
            $role = $this->input->post('cmbRole');
             if($role=='Data Entry Operator'){
                 $department = $this->input->post('cmbDepartment');
                 if($this->input->post('cmbDepartment')==7 || $this->input->post('cmbDepartment')==8){
                    $blkId = $this->input->post('cmbBlock');
                 }else{
                     $blkId = '0';
                 }
             }else{
                 $department='0';
                 $blkId = '0';
             }
             
             $name = $this->input->post('txtName');
             $mobile = $this->input->post('txtMobile');
             $designation = $this->input->post('txtDesignation');
            
            //$ttlName = $this->input->post('txtName');
            // Update data on truenattestlab
            //   $data = array('ttlName'=>$ttlName);
            
            $data = array('name'=>$name,'mobile'=>$mobile,'department'=>$department,'blkId'=>$blkId,'designation'=>$designation,'role'=>$role);
            
            $this->action_redirect_msg($this->mymodel->update_data('id',$id,$data,'logindetails'),
                       'User Data Updated Successfully.','Something went wrong, please try again!','superadmin/dashboard/user_master');
        }        
    }
    // End
    // User Master
    
    // Query Master
    // Start
    
    public function query_master(){
		$this->load->view('superadmin/query_master');
	}	
	public function show_query_master(){
		$this->form_validation->set_rules('txtQuery', 'Query', 'trim|required');
		$this->form_validation->set_rules('cmbqueryType', 'Query Type', 'required');
		if ($this->form_validation->run() == FALSE) {
			//On Validation Fail  
			$this->session->set_flashdata('error',validation_errors());
			//$this->load->view('distadmin/query_runner');
			return redirect('superadmin/dashboard/query_master');
			//$this->query_runner();
		}else{
			// On Success
			$txtQuery = $this->input->post('txtQuery');			
			$cmbqueryType = $this->input->post('cmbqueryType');
			if($cmbqueryType=='DQL'){
				$getQuery = $this->mymodel->dqlquery_runner($txtQuery);
				$data = array('getQuery' => $getQuery);
                $this->load->view('superadmin/query_master',$data);
			}else if($cmbqueryType=='DML'){
				$dmlQueryStatus = $this->mymodel->dmlquery_runner($txtQuery);
                if($dmlQueryStatus=='Query Failed'){
                    $this->session->set_flashdata('error','Query Failed');
                }else if($dmlQueryStatus=='Query Success'){
                    $this->session->set_flashdata('success','Query Success');
                }
                return redirect('superadmin/dashboard/query_master');
                //$this->load->view('superadmin/query_master');
				//$data = array('dmlQueryStatus' => $dmlQueryStatus);
			}else if($cmbqueryType=='DDL'){
				$ddlQueryStatus = $this->mymodel->ddlquery_runner($txtQuery);
                if($ddlQueryStatus=='Query Failed'){
                    $this->session->set_flashdata('error','Query Failed');
                }else if($ddlQueryStatus=='Query Success'){
                    $this->session->set_flashdata('success','Query Success');
                }
                return redirect('superadmin/dashboard/query_master');
                //$this->load->view('superadmin/query_master');
                //$data = array('ddlQueryStatus' => $ddlQueryStatus);
			}		
			//$this->load->view('superadmin/query_master',$data);
		}
	}
    
    // End
    // Query Master
    
    
    //11 Points Report
    public function ele_point_report(){
        $point_one=$this->mymodel->point_one();
        $point_one_block=$this->mymodel->point_one_block();
        $point_five=$this->mymodel->point_five();
        $point_six=$this->mymodel->point_six();
        $point_eight=$this->mymodel->point_eight();
        $point_nine=$this->mymodel->point_nine("");
        $point_ten=$this->mymodel->point_ten();
        $point_ten_inventory=$this->mymodel->point_ten_inventory();
        $point_eleven=$this->mymodel->point_eleven();
        $data = array('point_one' => $point_one,'point_one_block'=>$point_one_block,'point_five'=>$point_five,'point_six'=>$point_six,'point_eight'=>$point_eight,'point_nine'=>$point_nine,'point_ten'=>$point_ten,'point_ten_inventory'=>$point_ten_inventory,'point_eleven'=>$point_eleven);
       // print_r($point_five);
        $this->load->view('superadmin/ele_point_report',$data);
    }
    
    // PMCH Reports
    public function rtpcr_reports(){
        // Load rtpcr_reports Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_rtpcr($currentdate);
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('superadmin/rtpcr_reports',$data);
    }
    public function show_rtpcr_reports(){
        // Show rtpcr_reports on Page
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_rtpcr($currentdate);
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/rtpcr_reports',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_rtpcr($reportdate);
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/rtpcr_reports',$data);
        }
    }

    public function truenat_reports(){
        // Load truenat_reports Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_truenat($currentdate);
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('superadmin/truenat_reports',$data);
    }

    public function show_truenat_reports(){
        // Show truenat_reports on Page
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_truenat($currentdate);
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/truenat_reports',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_truenat($reportdate);
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/truenat_reports',$data);
        }
    }
    
    // PMCH Report End
    
    // IDSP Report Start
    public function covid_case_report(){
        // Load covid_case_reports Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'cvdcaseinfo');
        //print_r($currentdate);exit();
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('superadmin/covid_case_report',$data);
    }
    public function show_covid_case_report(){
        // Show show_covid_case_report on Page
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'cvdcaseinfo');
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/covid_case_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept',$reportdate,'cvdcaseinfo');
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/covid_case_report',$data);
        }
    }

    public function covid_facility_report(){
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_cvdfacility($currentdate);
        //print_r($currentdate);exit();
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('superadmin/covid_facility_report',$data);

    }
    public function show_covid_facility_report(){
         // Show show_facility_case_report on Page
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_cvdfacility($currentdate);
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/covid_facility_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_cvdfacility($reportdate);
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/covid_facility_report',$data);
        }
    }
    public function icmr_portal_report(){
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'icmrportalupdation');
        //print_r($currentdate);exit();
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('superadmin/icmr_portal_report',$data);
    }
    public function show_icmr_portal_report(){
        // Show show_icmr_portal_report on Page
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'icmrportalupdation');
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/icmr_portal_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept',$reportdate,'icmrportalupdation');
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/icmr_portal_report',$data);
        }
    }
    
    // IDSP Report End
    
    // CS Report Start
    // Inventory Report
    public function inventory_report(){
        // Load Inventory Report
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard = date("d-m-Y", strtotime($currentdate));
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'inventory');
        $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
        $this->load->view('superadmin/inventory_report', $data);
    }
    public function show_inventory_report(){
        // Show Inventory Report
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard = date("d-m-Y", strtotime($currentdate));
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'inventory');
            $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/inventory_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept', $reportdate, 'inventory');
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/inventory_report', $data);
        }
    }

    // Doctor Availability Report
    public function doctor_availability_report(){
        // Load Doctor Availability Report
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard = date("d-m-Y", strtotime($currentdate));
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'dctravail');
        $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
        $this->load->view('superadmin/doctor_availability_report', $data);
    }
    public function show_doctor_availability_report(){
        // Show Doctor Availability Report
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard = date("d-m-Y", strtotime($currentdate));
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'dctravail');
            $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/doctor_availability_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept', $reportdate, 'dctravail');
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/doctor_availability_report', $data);
        }
    }

    // Essential Services at Quarantine Center
    public function es_quarantine_report(){
        // Load Essential Services at Quarantine Center Report
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard = date("d-m-Y", strtotime($currentdate));
        $todayEntries = $this->mymodel->fetch_qc($currentdate);
        $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
        $this->load->view('superadmin/es_quarantine_report', $data);
    }
    public function show_es_quarantine_report(){
        // Show Essential Services at Quarantine Center Report
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard = date("d-m-Y", strtotime($currentdate));
            $todayEntries = $this->mymodel->fetch_qc($currentdate);
            $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/es_quarantine_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_qc($reportdate);
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/es_quarantine_report', $data);
        }
    }

    // Health Parameter Reports 
    public function health_report()
    {
        // Load Health Parameter Report
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard = date("d-m-Y", strtotime($currentdate));
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'cvhealth');
        $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
        $this->load->view('superadmin/health_report', $data);
    }
    public function show_health_report()
    {
        // Show Health Parameter Report
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard = date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'cvhealth');
            $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/health_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept', $reportdate, 'cvhealth');
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/health_report', $data);
        }
    }

    // ILI / SARI Reports 
    public function ilisari_report()
    {
        // Load ILI / SARI Reports 
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard = date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_ilisari_dist($currentdate);

        $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
        $this->load->view('superadmin/ilisari_report', $data);
    }
    public function show_ilisari_report()
    {
        // Show ILI / SARI Reports
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard = date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_ilisari_dist($currentdate);
            $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/ilisari_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_ilisari_dist($reportdate);
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/ilisari_report', $data);
        }
    }   
    // CS Report End
	
	//ADM L&O Start
	public function admlo_report()
    {
        // Load ADM L&O report Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard = date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'afmlo');
        $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
        $this->load->view('superadmin/admlo_report', $data);
    }
    public function show_admlo_report()
    {
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard = date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'afmlo');
            $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/admlo_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries =  $this->mymodel->fetch_data_result('dtofRept', $reportdate, 'afmlo');
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('superadmin/admlo_report', $data);
        }
    } 
	//ADM L&O End
	
	//SDO Start
	public function sdo_report(){
        // Load SDO report Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y",strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'sdo');
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('superadmin/sdo_report',$data);
    }
    public function show_sdo_report()
    {
         $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'sdo');
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/sdo_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries =  $this->mymodel->fetch_data_result('dtofRept',$reportdate,'sdo');
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/sdo_report',$data);
        }
    }
	//SDO End
	
	//ADM Supply Start
	//Social Security Parameters Reports
    public function ss_parameters_report(){
        // Load Social Security Parameters Reports Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'supply');
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('superadmin/ss_parameters_report',$data);
    }
    public function show_ss_parameters_report(){
        // Show Social Security Parameters Reports on Page
        $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail   
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'supply');
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/ss_parameters_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept',$reportdate,'supply');
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/ss_parameters_report',$data);
        }
    }
	//ADM Supply End
	
	// Social Security Start
	public function ssc_report(){
        // Load Social Service report Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y",strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'scl_sec');
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('superadmin/ssc_report',$data);
    }

    public function show_ssc_report()
    {
         $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'scl_sec');
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/ssc_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries =  $this->mymodel->fetch_data_result('dtofRept',$reportdate,'scl_sec');
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/ssc_report',$data);
        }
    }
	
	//Social Security End
	
	// BDO Start
	public function bdo_report(){
        // Load BDO report Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y",strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_bdo_allcircle($currentdate);
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('superadmin/bdo_report',$data);
    }

    public function show_bdo_report()
    {
         $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_bdo_allcircle($currentdate);
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/bdo_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries =  $this->mymodel->fetch_bdo_allcircle($reportdate);
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/bdo_report',$data);
        }
    }
	
	// BDO End
	
	//CO Start
	public function co_report(){
        // Load CO report Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y",strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_co_allcircle($currentdate);
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('superadmin/co_report',$data);
    }

    public function show_co_report()
    {
         $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_co_allcircle($currentdate);
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/co_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries =  $this->mymodel->fetch_co_allcircle($reportdate);
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('superadmin/co_report',$data);
        }
    }
	//CO End
    
     private function action_redirect_msg($actions, $successmsg, $failmsg,$redirectLocation)
    {
        if ($actions) {
            $this->session->set_flashdata('success', $successmsg);
        } else {
            $this->session->set_flashdata('error', $failmsg);
        }
        return redirect($redirectLocation);
    }

    // Error Message on Mulitple Entry
    private function action_redirect_onMultipleEntry($failmsg,$redirectLocation)
    {
        $this->session->set_flashdata('error', $failmsg);
        return redirect($redirectLocation);
    }
	
}