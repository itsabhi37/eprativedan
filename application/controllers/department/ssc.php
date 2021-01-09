<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ssc extends CI_Controller {

    public function __construct(){
        //if user is not logged in then redirect to Login Page       
       parent::__construct();
       if($this->session->userdata('logged_user_role')!="Data Entry Operator" || $this->session->userdata('logged_user_department')!=9){
            // Social Security Department Id - 9    
            return redirect('home');
           }
   }

    public function index()
    {
        // SSC Dashboard
       $lastest_ssc = $this->mymodel->point_six(); // Latest SSC Record
       $data = array('lastest_ssc' => $lastest_ssc);
       $this->load->view('ssc/dashboard', $data);
    }
  

    public function edit_ssc_update($id){
        // Edit Social Service Update
       
        $singleRecord = $this->mymodel->fetch_data('sscId',$id,'scl_sec');
        $currentdate = date('Y-m-d'); // Today Date

        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'scl_sec');
        $data = array('singleRecord'=>$singleRecord, 'todayEntries' => $todayEntries);
        $this->load->view('ssc/ssc_update', $data);
    }
    public function ssc_update(){
         
         $currentdate = date('Y-m-d'); // Today Date
         $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'scl_sec');
         $data = array('todayEntries' => $todayEntries);
         $this->load->view('ssc/ssc_update',$data);
    }
     public function update_ssc_update(){
        // Update SCL_SEC Information Record
        $this->form_validation->set_rules('nopSSPension', 'Number of persons distributed Social Security Pension for (Previous Month)', 'required');
        $this->form_validation->set_rules('month', 'Month', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error','Something went wrong pls try again..');
                $loc='department/ssc/edit_ssc_update'.$this->input->post('sscId');
                return redirect($loc);  
        }
        else{
            // On Success  
            $sscId=$this->input->post('sscId');  
            $nopSSPension = $this->input->post('nopSSPension');
             $month=$this->input->post('month');
             $dtofRept=date('Y-m-d');
                // Update data on afmlo
               $data = array('nopSSPension'=>$nopSSPension,'month'=>$month,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg($this->mymodel->update_data('sscId',$sscId,$data,'scl_sec'),
                       'Pention Data Updated Successfully.','Something went wrong, please try again!','department/ssc/ssc_update');
        }        
    } 

    public function insert_ssc_update(){
	//INSERT INTO SCL_SEC TABLE
       $this->form_validation->set_rules('nopSSPension', 'Number of persons distributed Social Security Pension for (Previous Month)', 'required');
        $this->form_validation->set_rules('month', 'Month', 'required');

            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail  
             $currentdate = date('Y-m-d'); // Today Date
             $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'scl_sec');
             $data = array('todayEntries' => $todayEntries);
             $this->load->view('ssc/ssc_update', $data);
         } else {
             // On Success Save Details in Add Mode   
             $nopSSPension = $this->input->post('nopSSPension');
             $month=$this->input->post('month');
             $dtofRept=date('Y-m-d'); // Today Date
            
            if($this->mymodel->count_data_with_condition('scl_sec','dtofRept',$dtofRept) > 0){
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/ssc/ssc_update');
            }else{
                $data = array('nopSSPension'=>$nopSSPension,'month'=>$month,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('scl_sec', $data),
                    'Pension Data Inserted Successfully.',
                    'Something went wrong, please try again!','department/ssc/ssc_update'
                );
            }             
         }
    }
     public function ssc_report(){
        // Load Social Service report Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y",strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'scl_sec');
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('ssc/ssc_report',$data);
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
            $this->load->view('ssc/ssc_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries =  $this->mymodel->fetch_data_result('dtofRept',$reportdate,'scl_sec');
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('ssc/ssc_report',$data);
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