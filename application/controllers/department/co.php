<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Co extends CI_Controller {

    public function __construct(){
        //if user is not logged in then redirect to Login Page       
       parent::__construct();
       if($this->session->userdata('logged_user_role')!="Data Entry Operator" || $this->session->userdata('logged_user_department')!=7){
            // CO Department Id - 7    
            return redirect('home');
           }
   }

    public function index()
    {
        // CO Dashboard
       $currentdate = date('Y-m-d'); // Today Date
       $total_IncCmndr = $this->mymodel->get_Sum_With_2Condition('IncCmndr','dtofRept',$currentdate,'blkcrclId',$this->session->userdata('blkId'),'checklistescontzonw'); // Today's Positive Cases
       $total_contZonePlace = $this->mymodel->get_Sum_With_2Condition('contZonePlace','dtofRept',$currentdate,'blkcrclId',$this->session->userdata('blkId'),'checklistescontzonw'); // Total Active Cases Currently
       //$total_recvrdCase = $this->mymodel->get_Sum('recvrdCase','','','cvdcaseinfo'); // Total Recovered Till Date SUM
      // $total_deathCase = $this->mymodel->get_Sum('deathCase','','','cvdcaseinfo'); // Total Death Till Date 
       $circle=$this->mymodel->fetch_data_result('blkId',$this->session->userdata('blkId'),'blockmuncmaster');
       $data = array('total_IncCmndr' => $total_IncCmndr, 'total_contZonePlace' => $total_contZonePlace,'circle'=>$circle);
       $this->load->view('co/dashboard', $data);
    }
  

    public function edit_co_update($id){
        // Edit CO Update
        $circle=$this->mymodel->fetch_data_result('blkId',$this->session->userdata('blkId'),'blockmuncmaster');//Circle/Block dropdown
        $singleRecord = $this->mymodel->fetch_data('chId',$id,'checklistescontzonw');
        $currentdate = date('Y-m-d'); // Today Date

        $todayEntries = $this->mymodel->fetch_co_circle($currentdate);
        $data = array('singleRecord'=>$singleRecord, 'todayEntries' => $todayEntries,'circle'=>$circle);
        $this->load->view('co/co_update', $data);
    }
    public function co_update(){
         //CO UPDATE PAGE
        $circle=$this->mymodel->fetch_data_result('blkId',$this->session->userdata('blkId'),'blockmuncmaster');//Circle/Block dropdown
         $currentdate = date('Y-m-d'); // Today Date
         $todayEntries = $this->mymodel->fetch_co_circle($currentdate);
         $data = array('todayEntries' => $todayEntries,'circle'=>$circle);
         $this->load->view('co/co_update',$data);
    }
     public function update_co_update(){
        // Update CO Information Record
       $this->form_validation->set_rules('blkcrclId', 'Block/Circle', 'required');
       $this->form_validation->set_rules('IncCmndr', 'Incident Commander', 'required');
       $this->form_validation->set_rules('PS', 'PS', 'required');
       $this->form_validation->set_rules('contZonePlace', 'Containment Zone/Place', 'required');
       $this->form_validation->set_rules('Enforcementdate', 'Enforcement', 'required');
       $this->form_validation->set_rules('WithdrawalDate', 'Withdrawal', 'required');
       $this->form_validation->set_rules('conTraceDone', 'Contact Tracing to be done', 'required');
       $this->form_validation->set_rules('nopIdentified', 'No of people Identified', 'required');
       $this->form_validation->set_rules('splCellforQuarantine', 'Special Cell for Home or Institutional Quarantine of individual on risk assessment', 'required');
       $this->form_validation->set_rules('testSymptoms', 'Testing of all Cases with severe acute repiratory infection (SARI) influenza like illness (ILI) and other symptoms', 'required');
       $this->form_validation->set_rules('hthSurveynSurvlnc', 'House to house survey and surveillance', 'required');
       $this->form_validation->set_rules('clinicMngmnt', 'Clinical management of all cases as per protocol', 'required');
       $this->form_validation->set_rules('counselling', 'Counseling and educating people and establishing effective communication strategies', 'required');
       $this->form_validation->set_rules('regSensitizn', 'Regular Sensitization and Cleanness of the area', 'required');
       $this->form_validation->set_rules('ddArApResContnmnt', 'Download of Aarogyasetu App among the resident of Containment Zone', 'required');
       $this->form_validation->set_rules('supplyEsnMedicine', 'Supply of essentials and medical requirement', 'required');
       $this->form_validation->set_rules('supplyEsFacility', 'Supply of essentials/facilites in respect of the Containment Zone ', 'required');
       $this->form_validation->set_rules('barricade', 'Barricaded the Containment Zone', 'required');
       $this->form_validation->set_rules('controlRoom', 'Control Room Establish', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error','Something went wrong pls try again..');
                $loc='department/co/edit_co_update'.$this->input->post('chId');
                return redirect($loc);  
        }
        else{
            // On Success  
            $chId=$this->input->post('chId');  
            $blkcrclId = $this->input->post('blkcrclId');
             $IncCmndr = $this->input->post('IncCmndr');
             $PS = $this->input->post('PS');
             $contZonePlace = $this->input->post('contZonePlace');
             $Enforcementdate = $this->input->post('Enforcementdate');
             $WithdrawalDate = $this->input->post('WithdrawalDate');
             $conTraceDone = $this->input->post('conTraceDone');
             $nopIdentified = $this->input->post('nopIdentified');
             $splCellforQuarantine = $this->input->post('splCellforQuarantine');
             $testSymptoms = $this->input->post('testSymptoms');
             $hthSurveynSurvlnc = $this->input->post('hthSurveynSurvlnc');
             $clinicMngmnt = $this->input->post('clinicMngmnt');
             $counselling = $this->input->post('counselling');
             $regSensitizn = $this->input->post('regSensitizn');
             $ddArApResContnmnt = $this->input->post('ddArApResContnmnt');
             $supplyEsnMedicine = $this->input->post('supplyEsnMedicine');
             $supplyEsFacility = $this->input->post('supplyEsFacility');
             $barricade = $this->input->post('barricade');
             $controlRoom = $this->input->post('controlRoom');
             $dtofRept=date('Y-m-d');
                // Update data on sdo
               $data = array('blkcrclId'=>$blkcrclId,'IncCmndr'=>$IncCmndr,'PS'=>$PS,'contZonePlace'=>$contZonePlace,'Enforcementdate'=>$Enforcementdate,'WithdrawalDate'=>$WithdrawalDate,'conTraceDone'=>$conTraceDone,'nopIdentified'=>$nopIdentified,'splCellforQuarantine'=>$splCellforQuarantine,'testSymptoms'=>$testSymptoms,'hthSurveynSurvlnc'=>$hthSurveynSurvlnc,'clinicMngmnt'=>$clinicMngmnt,'counselling'=>$counselling,'regSensitizn'=>$regSensitizn,'ddArApResContnmnt'=>$ddArApResContnmnt,'supplyEsnMedicine'=>$supplyEsnMedicine,'supplyEsFacility'=>$supplyEsFacility,'barricade'=>$barricade,'controlRoom'=>$controlRoom,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg($this->mymodel->update_data('chId',$chId,$data,'checklistescontzonw'),
                       'CO Checklist Record Updated Successfully.','Something went wrong, please try again!','department/co/co_update');
        }        
    } 

    public function insert_co_update(){
//INSERT INTO checklistescontzonw  TABLE
       $this->form_validation->set_rules('blkcrclId', 'Block/Circle', 'required');
       $this->form_validation->set_rules('IncCmndr', 'Incident Commander', 'required');
       $this->form_validation->set_rules('PS', 'PS', 'required');
       $this->form_validation->set_rules('contZonePlace', 'Containment Zone/Place', 'required');
       $this->form_validation->set_rules('Enforcementdate', 'Enforcement', 'required');
       $this->form_validation->set_rules('WithdrawalDate', 'Withdrawal', 'required');
       $this->form_validation->set_rules('conTraceDone', 'Contact Tracing to be done', 'required');
       $this->form_validation->set_rules('nopIdentified', 'No of people Identified', 'required');
       $this->form_validation->set_rules('splCellforQuarantine', 'Special Cell for Home or Institutional Quarantine of individual on risk assessment', 'required');
       $this->form_validation->set_rules('testSymptoms', 'Testing of all Cases with severe acute repiratory infection (SARI) influenza like illness (ILI) and other symptoms', 'required');
       $this->form_validation->set_rules('hthSurveynSurvlnc', 'House to house survey and surveillance', 'required');
       $this->form_validation->set_rules('clinicMngmnt', 'Clinical management of all cases as per protocol', 'required');
       $this->form_validation->set_rules('counselling', 'Counseling and educating people and establishing effective communication strategies', 'required');
       $this->form_validation->set_rules('regSensitizn', 'Regular Sensitization and Cleanness of the area', 'required');
       $this->form_validation->set_rules('ddArApResContnmnt', 'Download of Aarogyasetu App among the resident of Containment Zone', 'required');
       $this->form_validation->set_rules('supplyEsnMedicine', 'Supply of essentials and medical requirement', 'required');
       $this->form_validation->set_rules('supplyEsFacility', 'Supply of essentials/facilites in respect of the Containment Zone ', 'required');
       $this->form_validation->set_rules('barricade', 'Barricaded the Containment Zone', 'required');
       $this->form_validation->set_rules('controlRoom', 'Control Room Establish', 'required');


            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail  
              print_r('cvbxzn,m');exit();
             $currentdate = date('Y-m-d'); // Today Date
             $todayEntries = $this->mymodel->fetch_co_circle($currentdate);
             $data = array('todayEntries' => $todayEntries);
             $this->load->view('co/co_update', $data);
         } else {
             // On Success Save Details in Add Mode   
             $blkcrclId = $this->input->post('blkcrclId');
             $IncCmndr = $this->input->post('IncCmndr');
             $PS = $this->input->post('PS');
             $contZonePlace = $this->input->post('contZonePlace');
             $Enforcementdate = $this->input->post('Enforcementdate');
             $WithdrawalDate = $this->input->post('WithdrawalDate');
             $conTraceDone = $this->input->post('conTraceDone');
             $nopIdentified = $this->input->post('nopIdentified');
             $splCellforQuarantine = $this->input->post('splCellforQuarantine');
             $testSymptoms = $this->input->post('testSymptoms');
             $hthSurveynSurvlnc = $this->input->post('hthSurveynSurvlnc');
             $clinicMngmnt = $this->input->post('clinicMngmnt');
             $counselling = $this->input->post('counselling');
             $regSensitizn = $this->input->post('regSensitizn');
             $ddArApResContnmnt = $this->input->post('ddArApResContnmnt');
             $supplyEsnMedicine = $this->input->post('supplyEsnMedicine');
             $supplyEsFacility = $this->input->post('supplyEsFacility');
             $barricade = $this->input->post('barricade');
             $controlRoom = $this->input->post('controlRoom');
             

             
             $dtofRept=date('Y-m-d'); // Today Date
            
            if($this->mymodel->count_data_with_2condition('checklistescontzonw','blkcrclId',$blkcrclId,'dtofRept',$dtofRept) > 0){
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/co/co_update');
            }else{
                $data = array('blkcrclId'=>$blkcrclId,'IncCmndr'=>$IncCmndr,'PS'=>$PS,'contZonePlace'=>$contZonePlace,'Enforcementdate'=>$Enforcementdate,'WithdrawalDate'=>$WithdrawalDate,'conTraceDone'=>$conTraceDone,'nopIdentified'=>$nopIdentified,'splCellforQuarantine'=>$splCellforQuarantine,'testSymptoms'=>$testSymptoms,'hthSurveynSurvlnc'=>$hthSurveynSurvlnc,'clinicMngmnt'=>$clinicMngmnt,'counselling'=>$counselling,'regSensitizn'=>$regSensitizn,'ddArApResContnmnt'=>$ddArApResContnmnt,'supplyEsnMedicine'=>$supplyEsnMedicine,'supplyEsFacility'=>$supplyEsFacility,'barricade'=>$barricade,'controlRoom'=>$controlRoom,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('checklistescontzonw', $data),
                    'CO Checklist Record Inserted Successfully.',
                    'Something went wrong, please try again!','department/co/co_update'
                );
            }             
         }
    }
     public function co_report(){
        // Load CO report Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y",strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_co_circle($currentdate);
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('co/co_report',$data);
    }

    public function show_co_report()
    {
         $this->form_validation->set_rules('txtDate', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
            $todayEntries = $this->mymodel->fetch_co_circle($currentdate);
            $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('co/co_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries =  $this->mymodel->fetch_co_circle($reportdate);
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('co/co_report',$data);
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