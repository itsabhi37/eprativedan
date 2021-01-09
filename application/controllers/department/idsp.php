<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idsp extends CI_Controller {

    public function __construct(){
        //if user is not logged in then redirect to Login Page       
       parent::__construct();
       if($this->session->userdata('logged_user_role')!="Data Entry Operator" || $this->session->userdata('logged_user_department')!=2){
            // IDSP Department Id - 2    
            return redirect('home');
           }
   }

    public function index()
    {
        // IDSP Dashboard
       $currentdate = date('Y-m-d'); // Today Date
       $total_noPosCase = $this->mymodel->get_Sum('noPosCase','dtofRept',$currentdate,'cvdcaseinfo'); // Today's Positive Cases
       $total_activeCase = $this->mymodel->get_Sum('activeCase','dtofRept',$currentdate,'cvdcaseinfo'); // Total Active Cases Currently
       $total_recvrdCase = $this->mymodel->get_Sum('recvrdCase','','','cvdcaseinfo'); // Total Recovered Till Date SUM
       $total_deathCase = $this->mymodel->get_Sum('deathCase','','','cvdcaseinfo'); // Total Death Till Date SUM
       $data = array('total_noPosCase' => $total_noPosCase, 'total_activeCase' => $total_activeCase,'total_recvrdCase'=>$total_recvrdCase,'total_deathCase'=>$total_deathCase);
       $this->load->view('idsp/dashboard',$data);
    }

     // Covid Case Information
    public function covid_case()
    {
         // Load Covid Case Information
         $currentdate = date('Y-m-d'); // Today Date
         $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'cvdcaseinfo');
         $data = array('todayEntries' => $todayEntries);
         $this->load->view('idsp/covid_case', $data);
    }
     
    public function insert_covid_case()
    {
        // Insert Covid Case Information
        $this->form_validation->set_rules('txtTNOCC', 'Total No. of COVID +ve Cases', 'required|trim');
        $this->form_validation->set_rules('txtACC', 'Active COVID +ve Cases', 'required|trim');
        $this->form_validation->set_rules('txtNORC', 'No. of Recovered Cases', 'required|trim');
        $this->form_validation->set_rules('txtNODDTC', 'No. of Deaths due to COVID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'cvdcaseinfo');
            $data = array('todayEntries' => $todayEntries);
            $this->load->view('idsp/covid_case', $data);
        } else {
            // On Success Save Details in Add Mode   
            $noPosCase = $this->input->post('txtTNOCC');
            $activeCase = $this->input->post('txtACC');
            $recvrdCase = $this->input->post('txtNORC');
            $deathCase = $this->input->post('txtNODDTC');
            $dtofRept=date('Y-m-d'); // Today Date

            // Check Whether it is Multiple Entry on same date or not
            if($this->mymodel->count_data_with_condition('cvdcaseinfo','dtofRept',$dtofRept) > 0){
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/idsp/covid_case');
            }else{
                $data = array('noPosCase' => $noPosCase, 'activeCase' => $activeCase,'recvrdCase' => $recvrdCase,'deathCase'=>$deathCase,'dtofRept'=>$dtofRept);
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('cvdcaseinfo', $data),
                    'COVID Case Information Record Inserted Successfully.',
                    'Something went wrong, please try again!','department/idsp/covid_case'
                );
            }
        }
    }

    public function edit_covid_case($id){
        // Edit Covid Case Information
        $singleRecord = $this->mymodel->fetch_data('cvciId',$id,'cvdcaseinfo');
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'cvdcaseinfo');
        $data = array('singleRecord'=>$singleRecord, 'todayEntries' => $todayEntries);
        $this->load->view('idsp/covid_case', $data);
    }

    public function update_covid_case(){
        // Update Covid Case Information Record
        $this->form_validation->set_rules('txtTNOCC', 'Total No. of COVID +ve Cases', 'required|trim');
        $this->form_validation->set_rules('txtACC', 'Active COVID +ve Cases', 'required|trim');
        $this->form_validation->set_rules('txtNORC', 'No. of Recovered Cases', 'required|trim');
        $this->form_validation->set_rules('txtNODDTC', 'No. of Deaths due to COVID', 'required|trim');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error','Something went wrong pls try again..');
                $loc='department/idsp/edit_covid_case/'.$this->input->post('txtcvciId');
                return redirect($loc);  
        }
        else{
            // On Success    
                $cvciId=$this->input->post('txtcvciId');
                $noPosCase = $this->input->post('txtTNOCC');
                $activeCase = $this->input->post('txtACC');
                $recvrdCase = $this->input->post('txtNORC');
                $deathCase = $this->input->post('txtNODDTC');
                $dtofRept=date('Y-m-d'); // Today Date
            
                // Update data on cvdcaseinfo
                $data = array('noPosCase' => $noPosCase,'activeCase' => $activeCase,'recvrdCase'=>$recvrdCase,'deathCase'=>$deathCase,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg($this->mymodel->update_data('cvciId',$cvciId,$data,'cvdcaseinfo'),
                       'COVID Case Information Record Updated Successfully.','Something went wrong, please try again!','department/idsp/covid_case');
        }        
    }    

    // Facility Update
    public function facility_update()
    {
         // Load Facility Update
         $covidfacility = $this->mymodel->fetch_all('cvdfailityname'); // For Facility Dropdown
         $currentdate = date('Y-m-d'); // Today Date
         $todayEntries = $this->mymodel->fetch_cvdfacility($currentdate);
         $data = array('covidfacility' => $covidfacility,'todayEntries' => $todayEntries);
         $this->load->view('idsp/facility_update', $data);
    }
    public function insert_facility_update(){
         // Insert Facility Update
         $this->form_validation->set_rules('cmbFacility', 'COVID Facility Name', 'required');
         $this->form_validation->set_rules('cmbDCH', 'DCH', 'required');
         $this->form_validation->set_rules('cmbDCHC', 'DCHC', 'required');
         $this->form_validation->set_rules('cmbCCC', 'CCC', 'required');
         $this->form_validation->set_rules('txtNOBI', 'No of Beds Installed', 'required|trim');
         $this->form_validation->set_rules('txtNOBO', 'No of Beds Occupied', 'required|trim');
         $this->form_validation->set_rules('txtNOBV', 'No of Beds Vaccant', 'required|trim');
 
         if ($this->form_validation->run() == FALSE) {
             //On Validation Fail  
             $covidfacility = $this->mymodel->fetch_all('cvdfailityname'); // For Facility Dropdown
             $currentdate = date('Y-m-d'); // Today Date
             $todayEntries = $this->mymodel->fetch_cvdfacility($currentdate);
             $data = array('covidfacility' => $covidfacility,'todayEntries' => $todayEntries);
             $this->load->view('idsp/facility_update', $data);
         } else {
             // On Success Save Details in Add Mode   
             $cvfNameId = $this->input->post('cmbFacility');
             $DCH = $this->input->post('cmbDCH');
             $DCHC = $this->input->post('cmbDCHC');
             $CCC = $this->input->post('cmbCCC');
             $noBedInstalled = $this->input->post('txtNOBI');
             $noBedOccupied = $this->input->post('txtNOBO');
             $noBedVacant = $this->input->post('txtNOBV');
             $dtofRept=date('Y-m-d'); // Today Date
            
            if($this->mymodel->count_data_with_2condition('cvdfacility','cvfNameId',$cvfNameId,'dtofRept',$dtofRept) > 0){
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/idsp/facility_update');
            }else{
                $data = array('cvfNameId' => $cvfNameId, 'DCH' => $DCH,'DCHC' => $DCHC,'CCC'=>$CCC,'noBedInstalled'=>$noBedInstalled,'noBedOccupied'=>$noBedOccupied,'noBedVacant'=>$noBedVacant,'dtofRept'=>$dtofRept);
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('cvdfacility', $data),
                    'COVID Facility Record Inserted Successfully.',
                    'Something went wrong, please try again!','department/idsp/facility_update'
                );
            }             
         }
    }
    public function edit_facility_update($id){
        // Edit Facility Update
        $covidfacility = $this->mymodel->fetch_all('cvdfailityname'); // For Facility Dropdown
        $singleRecord = $this->mymodel->fetch_data('cvfId',$id,'cvdfacility');
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_cvdfacility($currentdate);
        $data = array('covidfacility' => $covidfacility,'singleRecord'=>$singleRecord, 'todayEntries' => $todayEntries);
        $this->load->view('idsp/facility_update', $data);
    }

    public function update_facility_update(){
        // Update Facility Update Record
        $this->form_validation->set_rules('cmbFacility', 'COVID Facility Name', 'required');
        $this->form_validation->set_rules('cmbDCH', 'DCH', 'required');
        $this->form_validation->set_rules('cmbDCHC', 'DCHC', 'required');
        $this->form_validation->set_rules('cmbCCC', 'CCC', 'required');
        $this->form_validation->set_rules('txtNOBI', 'No of Beds Installed', 'required|trim');
        $this->form_validation->set_rules('txtNOBO', 'No of Beds Occupied', 'required|trim');
        $this->form_validation->set_rules('txtNOBV', 'No of Beds Vaccant', 'required|trim');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error','Something went wrong pls try again..');
                $loc='department/idsp/edit_facility_update/'.$this->input->post('txtcvfId');
                return redirect($loc);  
        }
        else{
            // On Success    
                $cvfId=$this->input->post('txtcvfId');
                $cvfNameId = $this->input->post('cmbFacility');
                $DCH = $this->input->post('cmbDCH');
                $DCHC = $this->input->post('cmbDCHC');
                $CCC = $this->input->post('cmbCCC');
                $noBedInstalled = $this->input->post('txtNOBI');
                $noBedOccupied = $this->input->post('txtNOBO');
                $noBedVacant = $this->input->post('txtNOBV');
                $dtofRept=date('Y-m-d'); // Today Date
            
                // Update data on cvdcaseinfo
                $data = array('cvfNameId' => $cvfNameId, 'DCH' => $DCH,'DCHC' => $DCHC,'CCC'=>$CCC,'noBedInstalled'=>$noBedInstalled,'noBedOccupied'=>$noBedOccupied,'noBedVacant'=>$noBedVacant,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg($this->mymodel->update_data('cvfId',$cvfId,$data,'cvdfacility'),
                       'COVID Facility Record Updated Successfully.','Something went wrong, please try again!','department/idsp/facility_update');
        }        
    }    
    
     // ICMR Portal Updation
     public function portal_updation()
     {
          // Load ICMR Portal Updation
          $currentdate = date('Y-m-d'); // Today Date
          $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'icmrportalupdation');
          $data = array('todayEntries' => $todayEntries);
          $this->load->view('idsp/portal_updation', $data);
     }
      
     public function insert_portal_updation()
     {
         // Insert ICMR Portal Updation
         $this->form_validation->set_rules('txtTNOPETBD', 'Total no. of Portal Entries to be Done', 'required|trim');
         $this->form_validation->set_rules('txtNOEDTY', 'No of entries done till yesterday', 'required|trim');
         $this->form_validation->set_rules('txtNOEAD', 'No of entries added today', 'required|trim');
         $this->form_validation->set_rules('txtTP', 'Total Pending', 'required|trim');
 
         if ($this->form_validation->run() == FALSE) {
             //On Validation Fail  
             $currentdate = date('Y-m-d'); // Today Date
             $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'icmrportalupdation');
             $data = array('todayEntries' => $todayEntries);
             $this->load->view('idsp/portal_updation', $data);
         } else {
             // On Success Save Details in Add Mode   
             $noPosEntrytobeDone = $this->input->post('txtTNOPETBD');
             $noEntryDoneTillYestrday = $this->input->post('txtNOEDTY');
             $noEntryAddToday = $this->input->post('txtNOEAD');
             $totalPending = $this->input->post('txtTP');
             $dtofRept=date('Y-m-d'); // Today Date
            
             // Check Whether it is Multiple Entry on same date or not
            if($this->mymodel->count_data_with_condition('icmrportalupdation','dtofRept',$dtofRept) > 0){
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/idsp/portal_updation');
            }else{
             $data = array('noPosEntrytobeDone' => $noPosEntrytobeDone, 'noEntryDoneTillYestrday' => $noEntryDoneTillYestrday,'noEntryAddToday' => $noEntryAddToday,'totalPending'=>$totalPending,'dtofRept'=>$dtofRept);
             $this->action_redirect_msg(
                 $this->mymodel->insert_data('icmrportalupdation', $data),
                 'ICMR Portal Updation Record Inserted Successfully.',
                 'Something went wrong, please try again!','department/idsp/portal_updation'
             );
            }
         }
     }
 
     public function edit_portal_updation($id){
         // Edit ICMR Portal Updation
         $singleRecord = $this->mymodel->fetch_data('ipuId',$id,'icmrportalupdation');
         $currentdate = date('Y-m-d'); // Today Date
         $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'icmrportalupdation');
         $data = array('singleRecord'=>$singleRecord, 'todayEntries' => $todayEntries);
         $this->load->view('idsp/portal_updation', $data);
     }
 
     public function update_portal_updation(){
         // Update ICMR Portal Updation Record
         $this->form_validation->set_rules('txtTNOPETBD', 'Total no. of Portal Entries to be Done', 'required|trim');
         $this->form_validation->set_rules('txtNOEDTY', 'No of entries done till yesterday', 'required|trim');
         $this->form_validation->set_rules('txtNOEAD', 'No of entries added today', 'required|trim');
         $this->form_validation->set_rules('txtTP', 'Total Pending', 'required|trim');
             
         if ($this->form_validation->run() == FALSE){
                 //On Validation Fail
                 $this->session->set_flashdata('error','Something went wrong pls try again..');
                 $loc='department/idsp/edit_portal_updation/'.$this->input->post('txtipuId');
                 return redirect($loc);  
         }
         else{
             // On Success    
                 $ipuId=$this->input->post('txtipuId');
                 $noPosEntrytobeDone = $this->input->post('txtTNOPETBD');
                 $noEntryDoneTillYestrday = $this->input->post('txtNOEDTY');
                 $noEntryAddToday = $this->input->post('txtNOEAD');
                 $totalPending = $this->input->post('txtTP');
                 $dtofRept=date('Y-m-d'); // Today Date
             
                 // Update data on cvdcaseinfo
                 $data = array('noPosEntrytobeDone' => $noPosEntrytobeDone, 'noEntryDoneTillYestrday' => $noEntryDoneTillYestrday,'noEntryAddToday' => $noEntryAddToday,'totalPending'=>$totalPending,'dtofRept'=>$dtofRept);
             
                 $this->action_redirect_msg($this->mymodel->update_data('ipuId',$ipuId,$data,'icmrportalupdation'),
                        'ICMR Portal Updation Record Updated Successfully.','Something went wrong, please try again!','department/idsp/portal_updation');
         }        
     }

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

    //Show Reports

    public function covid_case_report(){
        // Load covid_case_reports Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'cvdcaseinfo');
        //print_r($currentdate);exit();
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('idsp/covid_case_report',$data);
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
            $this->load->view('idsp/covid_case_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept',$reportdate,'cvdcaseinfo');
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('idsp/covid_case_report',$data);
        }
    }

    public function covid_facility_report(){
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_cvdfacility($currentdate);
        //print_r($currentdate);exit();
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('idsp/covid_facility_report',$data);

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
            $this->load->view('idsp/covid_facility_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_cvdfacility($reportdate);
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('idsp/covid_facility_report',$data);
        }
    }
    public function icmr_portal_report(){
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'icmrportalupdation');
        //print_r($currentdate);exit();
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('idsp/icmr_portal_report',$data);
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
            $this->load->view('idsp/icmr_portal_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept',$reportdate,'icmrportalupdation');
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('idsp/icmr_portal_report',$data);
        }
    }
}