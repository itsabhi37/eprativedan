<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pmch extends CI_Controller
{

    public function __construct()
    {
        //if user is not logged in then redirect to Login Page       
        parent::__construct();
        if ($this->session->userdata('logged_user_role') != "Data Entry Operator" || $this->session->userdata('logged_user_department') != 1) {
            // PMCH Department Id - 1 
            return redirect('home');
        }
    }

    public function index()
    {
        $currentdate = date('Y-m-d'); // Today Date
        $total_RTPCR_sampleTested = $this->mymodel->get_Sum('sampleTested','dtofRept',$currentdate,'rtpcrtestreport'); // Today's Total RTPCR Sample Tested SUM
        $total_RTPCR_samplePending = $this->mymodel->get_Sum('clBalSamples','dtofRept',$currentdate,'rtpcrtestreport'); // Today's Total RTPCR Sample Pending SUM
        $total_TRUENAT_sampleCollected = $this->mymodel->get_Sum('samplesCollectedTillDate','','','trueneattest'); // Total TRUENAT Sample Collected Till Date SUM
        $total_TRUENAT_sampleTested = $this->mymodel->get_Sum('testConductedTillDate','','','trueneattest'); // Total TRUENAT Sample Tested Till Date SUM
        $data = array('total_RTPCR_sampleTested' => $total_RTPCR_sampleTested, 'total_RTPCR_samplePending' => $total_RTPCR_samplePending,'total_TRUENAT_sampleCollected'=>$total_TRUENAT_sampleCollected,'total_TRUENAT_sampleTested'=>$total_TRUENAT_sampleTested);
        //print_r($total_TRUENAT_sampleCollected);
        //print_r($total_TRUENAT_sampleTested);
        $this->load->view('pmch/dashboard',$data);
    }

    // TrueNat Testing 
    public function truenat()
    {
        // Load Truenat Page
        $facility = $this->mymodel->fetch_all('truenattestlab'); //Facility Details for Dropdown
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_truenat($currentdate);
        $data = array('facility' => $facility, 'todayEntries' => $todayEntries);
        $this->load->view('pmch/truenat', $data);
    }

    public function insert_TruenatRecord()
    {
        // Insert New TrueNat Record
        $this->form_validation->set_rules('cmbFacility', 'Facility Name', 'required');
        $this->form_validation->set_rules('txtTSCTD', 'Total samples collected till date', 'required|trim');
        $this->form_validation->set_rules('txtTTCTD', 'Total test conducted till date', 'required|trim');
        $this->form_validation->set_rules('txtNOEDIP', 'No of entries done in Portal', 'required|trim');
        $this->form_validation->set_rules('txtTPCITD', 'Total +ve cases identified till date', 'required|trim');
        $this->form_validation->set_rules('txtNOSCT', 'No of Samples collected today', 'required|trim');
        $this->form_validation->set_rules('txtTTCD', 'Total test conducted today', 'required|trim');
        $this->form_validation->set_rules('txtNOPCID', 'No of +ve cases identified today', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $facility = $this->mymodel->fetch_all('truenattestlab'); //Facility Details for Dropdown
            $currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_truenat($currentdate);
            $data = array('facility' => $facility, 'todayEntries' => $todayEntries);
            $this->load->view('pmch/truenat', $data);
        } else {
            // On Success Save Details in Add Mode   
            $ttlId = $this->input->post('cmbFacility');
            $samplesCollectedTillDate = $this->input->post('txtTSCTD');
            $testConductedTillDate= $this->input->post('txtTTCTD');
            $entriesDonePortal = $this->input->post('txtNOEDIP');
            $posCaseIdentifyTillDate = $this->input->post('txtTPCITD');
            $samplesCollectedToday = $this->input->post('txtNOSCT');
            $testConductedToday = $this->input->post('txtTTCD');
            $posIdentifiedToday = $this->input->post('txtNOPCID');
            $dtofRept=date('Y-m-d'); // Today Date

            if($this->mymodel->count_data_with_2condition('trueneattest','ttlId',$ttlId,'dtofRept',$dtofRept) > 0){
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/pmch/truenat');
            }else{
            $data = array('ttlId' => $ttlId, 'samplesCollectedTillDate' => $samplesCollectedTillDate,'testConductedTillDate' => $testConductedTillDate,'entriesDonePortal'=>$entriesDonePortal,'posCaseIdentifyTillDate'=>$posCaseIdentifyTillDate,'samplesCollectedToday'=>$samplesCollectedToday,'testConductedToday'=>$testConductedToday,'posIdentifiedToday'=>$posIdentifiedToday,'dtofRept'=>$dtofRept);
            $this->action_redirect_msg(
                $this->mymodel->insert_data('trueneattest', $data),
                'TrueNat Test Record Inserted Successfully.',
                'Something went wrong, please try again!','department/pmch/truenat'
            );
            }
        }
    }

    public function edit_TruenatRecord($id)
    {
        // Edit TrueNat Record
        $singleRecord = $this->mymodel->fetch_data('ttestId',$id,'trueneattest');
        $facility = $this->mymodel->fetch_all('truenattestlab'); //Facility Details for Dropdown
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_truenat($currentdate);
        $data = array('singleRecord'=>$singleRecord,'facility' => $facility, 'todayEntries' => $todayEntries);
        $this->load->view('pmch/truenat', $data);
    }

    public function update_TruenatRecord(){
        // Update TrueNat Record
        $this->form_validation->set_rules('cmbFacility', 'Facility Name', 'required');
        $this->form_validation->set_rules('txtTSCTD', 'Total samples collected till date', 'required|trim');
        $this->form_validation->set_rules('txtTTCTD', 'Total test conducted till date', 'required|trim');
        $this->form_validation->set_rules('txtNOEDIP', 'No of entries done in Portal', 'required|trim');
        $this->form_validation->set_rules('txtTPCITD', 'Total +ve cases identified till date', 'required|trim');
        $this->form_validation->set_rules('txtNOSCT', 'No of Samples collected today', 'required|trim');
        $this->form_validation->set_rules('txtTTCD', 'Total test conducted today', 'required|trim');
        $this->form_validation->set_rules('txtNOPCID', 'No of +ve cases identified today', 'required|trim');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error','Something went wrong pls try again..');
                $loc='department/pmch/edit_TruenatRecord/'.$this->input->post('txtttestId');
                return redirect($loc);  
        }
        else{
            // On Success    
                $ttestId=$this->input->post('txtttestId');
                $ttlId = $this->input->post('cmbFacility');
                $samplesCollectedTillDate = $this->input->post('txtTSCTD');
                $testConductedTillDate= $this->input->post('txtTTCTD');
                $entriesDonePortal = $this->input->post('txtNOEDIP');
                $posCaseIdentifyTillDate = $this->input->post('txtTPCITD');
                $samplesCollectedToday = $this->input->post('txtNOSCT');
                $testConductedToday = $this->input->post('txtTTCD');
                $posIdentifiedToday = $this->input->post('txtNOPCID');
                $dtofRept=date('Y-m-d'); // Today Date
            
                // Update data on trueneattest
                $data = array('ttlId' => $ttlId, 'samplesCollectedTillDate' => $samplesCollectedTillDate,'testConductedTillDate' => $testConductedTillDate,'entriesDonePortal'=>$entriesDonePortal,'posCaseIdentifyTillDate'=>$posCaseIdentifyTillDate,'samplesCollectedToday'=>$samplesCollectedToday,'testConductedToday'=>$testConductedToday,'posIdentifiedToday'=>$posIdentifiedToday,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg($this->mymodel->update_data('ttestId',$ttestId,$data,'trueneattest'),
                       'TrueNat Test Record Updated Successfully.','Something went wrong, please try again!','department/pmch/truenat');
        }        
    }

    // RT-PCR Testing 
    public function rtpcr()
    {
        // Load RT-PCR Page
        $district = $this->mymodel->fetch_all('testdist'); //District Details for Dropdown
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_rtpcr($currentdate);
        $data = array('district' => $district, 'todayEntries' => $todayEntries);
        $this->load->view('pmch/rtpcr', $data);
    }

    public function insert_RtpcrRecord()
    {
        // Insert New RTPCR Record
        $this->form_validation->set_rules('cmbDistrict', 'District Name', 'required');
        $this->form_validation->set_rules('txtOBOPS', 'Opening Balance of Pending Samples', 'required|trim');
        $this->form_validation->set_rules('txtSRT', 'Samples Received Today', 'required|trim');
        $this->form_validation->set_rules('txtRP', 'Reported Positive', 'required|trim');
        $this->form_validation->set_rules('txtRN', 'Reported Negative', 'required|trim');
        $this->form_validation->set_rules('txtRSP', 'Repeat Sample Positive', 'required|trim');
        $this->form_validation->set_rules('txtSR', 'Samples Rejected', 'required|trim');
        $this->form_validation->set_rules('txtST', 'Samples Tested', 'required|trim');
        $this->form_validation->set_rules('txtCBOS', 'Closing Balance of Samples', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $district = $this->mymodel->fetch_all('testdist'); //District Details for Dropdown
            $currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_rtpcr($currentdate);
            $data = array('district' => $district, 'todayEntries' => $todayEntries);
            $this->load->view('pmch/rtpcr', $data);
        } else {
            // On Success Save Details in Add Mode   
            $tdstId = $this->input->post('cmbDistrict');
            $opBalPendingSample = $this->input->post('txtOBOPS');
            $sampleRecvdToday= $this->input->post('txtSRT');
            $positiveReport = $this->input->post('txtRP');
            $negativeReport = $this->input->post('txtRN');
            $repeatSamplePositive = $this->input->post('txtRSP');
            $sampleRejected = $this->input->post('txtSR');
            $sampleTested = $this->input->post('txtST');
            $clBalSamples = $this->input->post('txtCBOS');
            $dtofRept=date('Y-m-d'); // Today Date

            if($this->mymodel->count_data_with_2condition('rtpcrtestreport','tdstId',$tdstId,'dtofRept',$dtofRept) > 0){
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/pmch/rtpcr');
            }else{
                $data = array('tdstId' => $tdstId, 'opBalPendingSample' => $opBalPendingSample,'sampleRecvdToday' => $sampleRecvdToday,'positiveReport'=>$positiveReport,'negativeReport'=>$negativeReport,'repeatSamplePositive'=>$repeatSamplePositive,'sampleRejected'=>$sampleRejected,'sampleTested'=>$sampleTested,'clBalSamples'=>$clBalSamples,'dtofRept'=>$dtofRept);
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('rtpcrtestreport', $data),
                    'RT-PCR Test Record Inserted Successfully.',
                    'Something went wrong, please try again!','department/pmch/rtpcr'
                );
            }            
        }
    }

    public function edit_RtpcrRecord($id)
    {
        // Edit RTPCR Record
        $singleRecord = $this->mymodel->fetch_data('rtpcrTId',$id,'rtpcrtestreport');
        $district = $this->mymodel->fetch_all('testdist'); //District Details for Dropdown
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_rtpcr($currentdate);
        $data = array('singleRecord'=>$singleRecord,'district' => $district, 'todayEntries' => $todayEntries);
        $this->load->view('pmch/rtpcr', $data);       
    }

    public function update_RtpcrRecord(){
        // Update RTPCR Record
        $this->form_validation->set_rules('cmbDistrict', 'District Name', 'required');
        $this->form_validation->set_rules('txtOBOPS', 'Opening Balance of Pending Samples', 'required|trim');
        $this->form_validation->set_rules('txtSRT', 'Samples Received Today', 'required|trim');
        $this->form_validation->set_rules('txtRP', 'Reported Positive', 'required|trim');
        $this->form_validation->set_rules('txtRN', 'Reported Negative', 'required|trim');
        $this->form_validation->set_rules('txtRSP', 'Repeat Sample Positive', 'required|trim');
        $this->form_validation->set_rules('txtSR', 'Samples Rejected', 'required|trim');
        $this->form_validation->set_rules('txtST', 'Samples Tested', 'required|trim');
        $this->form_validation->set_rules('txtCBOS', 'Closing Balance of Samples', 'required|trim');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error','Something went wrong pls try again..');
                $loc='department/pmch/edit_RtpcrRecord/'.$this->input->post('txtrtpcrTId');
                return redirect($loc);  
        }
        else{
            // On Success    
                $rtpcrTId=$this->input->post('txtrtpcrTId');
                $tdstId = $this->input->post('cmbDistrict');
                $opBalPendingSample = $this->input->post('txtOBOPS');
                $sampleRecvdToday= $this->input->post('txtSRT');
                $positiveReport = $this->input->post('txtRP');
                $negativeReport = $this->input->post('txtRN');
                $repeatSamplePositive = $this->input->post('txtRSP');
                $sampleRejected = $this->input->post('txtSR');
                $sampleTested = $this->input->post('txtST');
                $clBalSamples = $this->input->post('txtCBOS');
                $dtofRept=date('Y-m-d'); // Today Date
            
                // Update data on rtpcrtestreport
                $data = array('tdstId' => $tdstId, 'opBalPendingSample' => $opBalPendingSample,'sampleRecvdToday' => $sampleRecvdToday,'positiveReport'=>$positiveReport,'negativeReport'=>$negativeReport,'repeatSamplePositive'=>$repeatSamplePositive,'sampleRejected'=>$sampleRejected,'sampleTested'=>$sampleTested,'clBalSamples'=>$clBalSamples,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg($this->mymodel->update_data('rtpcrTId',$rtpcrTId,$data,'rtpcrtestreport'),
                       'RT-PCR Test Record Updated Successfully.','Something went wrong, please try again!','department/pmch/rtpcr');
        }        
    }
    
    public function rtpcr_reports(){
        // Load rtpcr_reports Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_rtpcr($currentdate);
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('pmch/rtpcr_reports',$data);
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
            $this->load->view('pmch/rtpcr_reports',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_rtpcr($reportdate);
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('pmch/rtpcr_reports',$data);
        }
    }

    public function truenat_reports(){
        // Load truenat_reports Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_truenat($currentdate);
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('pmch/truenat_reports',$data);
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
            $this->load->view('pmch/truenat_reports',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_truenat($reportdate);
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('pmch/truenat_reports',$data);
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
