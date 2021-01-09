<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bdo extends CI_Controller {

    public function __construct(){
        //if user is not logged in then redirect to Login Page       
       parent::__construct();
       if($this->session->userdata('logged_user_role')!="Data Entry Operator" || $this->session->userdata('logged_user_department')!=8){
            // BDO Department Id - 8    
            return redirect('home');
           }
   }

    public function index()
    {
        // BDO Dashboard
       $currentdate = date('Y-m-d'); // Today Date
        
        $total_homeQuarantine = $this->mymodel->get_Sum_With_2Condition('nopHomeQuarantine','dtofRept',$currentdate,'blkId',$this->session->userdata('blkId'),'quarantinestatusblockwise'); // Today's Home Quarantine
        $total_gvtQuarantine = $this->mymodel->get_Sum_With_2Condition('nopGovtQuarantine','dtofRept',$currentdate,'blkId',$this->session->userdata('blkId'),'quarantinestatusblockwise'); // Today's Govt. Quarantine
        $total_cmpltQuarantine = $this->mymodel->get_Sum_With_2Condition('nopCompleteQrtn','dtofRept',$currentdate,'blkId',$this->session->userdata('blkId'),'quarantinestatusblockwise'); // Today's Completed Quarantine
        $total_stamped = $this->mymodel->get_Sum_With_2Condition('nopStamped','dtofRept',$currentdate,'blkId',$this->session->userdata('blkId'),'quarantinestatusblockwise'); // Today's Stamped
        
        $circle=$this->mymodel->fetch_data_result('blkId',$this->session->userdata('blkId'),'blockmuncmaster');//CIRCLE/BLOCK NAME
        $data = array('total_homeQuarantine' => $total_homeQuarantine, 'total_gvtQuarantine' => $total_gvtQuarantine,'total_cmpltQuarantine'=>$total_cmpltQuarantine,'total_stamped'=>$total_stamped,'circle'=>$circle);

        $this->load->view('bdo/dashboard', $data);
    }
  

    public function edit_bdo_update($id){
        // Edit BDO Update
        $circle=$this->mymodel->fetch_data_result('blkId',$this->session->userdata('blkId'),'blockmuncmaster');//Circle/Block dropdown
        $singleRecord = $this->mymodel->fetch_data('qsbId',$id,'quarantinestatusblockwise');
        $currentdate = date('Y-m-d'); // Today Date

        $todayEntries = $this->mymodel->fetch_bdo_circle($currentdate);
        $data = array('singleRecord'=>$singleRecord, 'todayEntries' => $todayEntries,'circle'=>$circle);
        $this->load->view('bdo/bdo_update', $data);
    }
    public function bdo_update(){
         //BDO UPDATE PAGE
        $circle=$this->mymodel->fetch_data_result('blkId',$this->session->userdata('blkId'),'blockmuncmaster');//Circle/Block dropdown
         $currentdate = date('Y-m-d'); // Today Date
         $todayEntries = $this->mymodel->fetch_bdo_circle($currentdate);
         $data = array('todayEntries' => $todayEntries,'circle'=>$circle);
         $this->load->view('bdo/bdo_update',$data);
    }
     public function update_bdo_update(){
        // Update BDO Information Record
       $this->form_validation->set_rules('qsbId', 'Block/Circle', 'required');
       $this->form_validation->set_rules('blkId', 'Name(Block/Circle)', 'required');
       $this->form_validation->set_rules('nopHomeQuarantine', 'Number of People in Home Quarantine (At Present)', 'required');
       $this->form_validation->set_rules('nopGovtQuarantine', 'Number of People in Govt. Quarantine Center (At Present)', 'required');
       $this->form_validation->set_rules('nopCompleteQrtn', 'Number of People Completed Qurantine till date', 'required');
       $this->form_validation->set_rules('nopFromOtherCity', 'Number of People coming from other city after 15 Feb 2020', 'required');
       $this->form_validation->set_rules('nopStamped', 'Number of People Stamped', 'required');
       $this->form_validation->set_rules('noBedInstalled', 'Number of Beds (Total Installed)', 'required');
       $this->form_validation->set_rules('noOperationalQuarantineCentre', 'Number of Operational Quarantine Centre (At Present)', 'required');
       $this->form_validation->set_rules('noBedsOperationalQuarantine', 'Number of Beds in Operational Quarantine Centre', 'required');
       $this->form_validation->set_rules('dwFacilityAvlbl', 'Facility(Drinking water)', 'required');
       $this->form_validation->set_rules('electricityFacilityAvlbl', 'Facility(Electricity)', 'required');
       $this->form_validation->set_rules('fodFacilityAvlbl', 'Facility(Food)', 'required');
       $this->form_validation->set_rules('toiletFacilityAvlbl', 'Facility(Toilet)', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error','Something went wrong pls try again..');
                $loc='department/bdo/edit_bdo_update'.$this->input->post('qsbId');
                return redirect($loc);  
        }
        else{
            // On Success  
             $qsbId=$this->input->post('qsbId');  
             $blkId = $this->input->post('blkId');
             $nopHomeQuarantine = $this->input->post('nopHomeQuarantine');
             $nopGovtQuarantine = $this->input->post('nopGovtQuarantine');
             $nopCompleteQrtn = $this->input->post('nopCompleteQrtn');
             $nopFromOtherCity = $this->input->post('nopFromOtherCity');
             $nopStamped = $this->input->post('nopStamped');
             $noBedInstalled = $this->input->post('noBedInstalled');
             $noOperationalQuarantineCentre = $this->input->post('noOperationalQuarantineCentre');
             $noBedsOperationalQuarantine = $this->input->post('noBedsOperationalQuarantine');
             $dwFacilityAvlbl = $this->input->post('dwFacilityAvlbl');
             $electricityFacilityAvlbl = $this->input->post('electricityFacilityAvlbl');
             $fodFacilityAvlbl = $this->input->post('fodFacilityAvlbl');
             $toiletFacilityAvlbl = $this->input->post('toiletFacilityAvlbl');
             $dtofRept=date('Y-m-d');
                // Update data on bdo
               $data = array('blkId'=>$blkId,'nopHomeQuarantine'=>$nopHomeQuarantine,'nopGovtQuarantine'=>$nopGovtQuarantine,'nopCompleteQrtn'=>$nopCompleteQrtn,'nopFromOtherCity'=>$nopFromOtherCity,'nopStamped'=>$nopStamped,'noBedInstalled'=>$noBedInstalled,'noOperationalQuarantineCentre'=>$noOperationalQuarantineCentre,'noBedsOperationalQuarantine'=>$noBedsOperationalQuarantine,'dwFacilityAvlbl'=>$dwFacilityAvlbl,'electricityFacilityAvlbl'=>$electricityFacilityAvlbl,'fodFacilityAvlbl'=>$fodFacilityAvlbl,'toiletFacilityAvlbl'=>$toiletFacilityAvlbl,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg($this->mymodel->update_data('qsbId',$qsbId,$data,'quarantinestatusblockwise'),
                       'Block Quarantine Records Updated Successfully.','Something went wrong, please try again!','department/bdo/bdo_update');
        }        
    } 

    public function insert_bdo_update(){
//INSERT INTO quarantinestatusblockwise  TABLE
       $this->form_validation->set_rules('blkId', 'Name(Block/Circle)', 'required');
       $this->form_validation->set_rules('nopHomeQuarantine', 'Number of People in Home Quarantine (At Present)', 'required');
       $this->form_validation->set_rules('nopGovtQuarantine', 'Number of People in Govt. Quarantine Center (At Present)', 'required');
       $this->form_validation->set_rules('nopCompleteQrtn', 'Number of People Completed Qurantine till date', 'required');
       $this->form_validation->set_rules('nopFromOtherCity', 'Number of People coming from other city after 15 Feb 2020', 'required');
       $this->form_validation->set_rules('nopStamped', 'Number of People Stamped', 'required');
       $this->form_validation->set_rules('noBedInstalled', 'Number of Beds (Total Installed)', 'required');
       $this->form_validation->set_rules('noOperationalQuarantineCentre', 'Number of Operational Quarantine Centre (At Present)', 'required');
       $this->form_validation->set_rules('noBedsOperationalQuarantine', 'Number of Beds in Operational Quarantine Centre', 'required');
       $this->form_validation->set_rules('dwFacilityAvlbl', 'Facility(Drinking water)', 'required');
       $this->form_validation->set_rules('electricityFacilityAvlbl', 'Facility(Electricity)', 'required');
       $this->form_validation->set_rules('fodFacilityAvlbl', 'Facility(Food)', 'required');
       $this->form_validation->set_rules('toiletFacilityAvlbl', 'Facility(Toilet)', 'required');
       


            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail  
              print_r('cvbxzn,m');exit();
             $currentdate = date('Y-m-d'); // Today Date
             $todayEntries = $this->mymodel->fetch_bdo_circle($currentdate);
             $data = array('todayEntries' => $todayEntries);
             $this->load->view('bdo/bdo_update', $data);
         } else {
             // On Success Save Details in Add Mode   
             $blkId = $this->input->post('blkId');
             $nopHomeQuarantine = $this->input->post('nopHomeQuarantine');
             $nopGovtQuarantine = $this->input->post('nopGovtQuarantine');
             $nopCompleteQrtn = $this->input->post('nopCompleteQrtn');
             $nopFromOtherCity = $this->input->post('nopFromOtherCity');
             $nopStamped = $this->input->post('nopStamped');
             $noBedInstalled = $this->input->post('noBedInstalled');
             $noOperationalQuarantineCentre = $this->input->post('noOperationalQuarantineCentre');
             $noBedsOperationalQuarantine = $this->input->post('noBedsOperationalQuarantine');
             $dwFacilityAvlbl = $this->input->post('dwFacilityAvlbl');
             $electricityFacilityAvlbl = $this->input->post('electricityFacilityAvlbl');
             $fodFacilityAvlbl = $this->input->post('fodFacilityAvlbl');
             $toiletFacilityAvlbl = $this->input->post('toiletFacilityAvlbl');
             
             $dtofRept=date('Y-m-d'); // Today Date
            
            if($this->mymodel->count_data_with_2condition('quarantinestatusblockwise','blkId',$blkId,'dtofRept',$dtofRept) > 0){
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/bdo/bdo_update');
            }else{
                $data = array('blkId'=>$blkId,'nopHomeQuarantine'=>$nopHomeQuarantine,'nopGovtQuarantine'=>$nopGovtQuarantine,'nopCompleteQrtn'=>$nopCompleteQrtn,'nopFromOtherCity'=>$nopFromOtherCity,'nopStamped'=>$nopStamped,'noBedInstalled'=>$noBedInstalled,'noOperationalQuarantineCentre'=>$noOperationalQuarantineCentre,'noBedsOperationalQuarantine'=>$noBedsOperationalQuarantine,'dwFacilityAvlbl'=>$dwFacilityAvlbl,'electricityFacilityAvlbl'=>$electricityFacilityAvlbl,'fodFacilityAvlbl'=>$fodFacilityAvlbl,'toiletFacilityAvlbl'=>$toiletFacilityAvlbl,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('quarantinestatusblockwise', $data),
                    'Block Quarantine Records Inserted Successfully.',
                    'Something went wrong, please try again!','department/bdo/bdo_update'
                );
            }             
         }
    }
     public function bdo_report(){
        // Load BDO report Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y",strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_bdo_circle($currentdate);
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('bdo/bdo_report',$data);
    }

    public function show_bdo_report()
    {
         $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_bdo_circle($currentdate);
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('bdo/bdo_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries =  $this->mymodel->fetch_bdo_circle($reportdate);
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('bdo/bdo_report',$data);
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

     
}