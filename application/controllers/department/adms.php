<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adms extends CI_Controller {

    public function __construct(){
        //if user is not logged in then redirect to Login Page       
       parent::__construct();
       if($this->session->userdata('logged_user_role')!="Data Entry Operator" || $this->session->userdata('logged_user_department')!=5){
            // ADM Supply Department Id - 5    
            return redirect('home');
           }
   }

    public function index()
    {
        // ADMS Dashboard
       $currentdate = date('Y-m-d'); // Today Date
       $total_prcntPdsFGPrevMonth = $this->mymodel->get_Sum('prcntPdsFGPrevMonth','dtofRept',$currentdate,'supply'); // % of lifting of PDS food grains for (Previous Month)
       $total_prcntPdsAnbFGPrevTwoMonth = $this->mymodel->get_Sum('prcntPdsAnbFGPrevTwoMonth','dtofRept',$currentdate,'supply'); // % of lifting of ANB food grains for (Previous two months)
       $total_prcntPdsFGCurMonth = $this->mymodel->get_Sum('prcntPdsFGCurMonth','dtofRept',$currentdate,'supply'); // % of lifting of PDS food grains for (Current month)
       $total_noPktDryRationDst= $this->mymodel->get_Sum('noPktDryRationDst','dtofRept',$currentdate,'supply'); // Number of packets of dry ration distributed
       $data = array('total_prcntPdsFGPrevMonth' => $total_prcntPdsFGPrevMonth, 'total_prcntPdsAnbFGPrevTwoMonth' => $total_prcntPdsAnbFGPrevTwoMonth,'total_prcntPdsFGCurMonth'=>$total_prcntPdsFGCurMonth,'total_noPktDryRationDst'=>$total_noPktDryRationDst);
       $this->load->view('adms/dashboard',$data);
    }

     // Social Security Parameters
    public function ss_parameters()
    {
         // Load Social Security Parameters
         $currentdate = date('Y-m-d'); // Today Date
         $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'supply');
         $data = array('todayEntries' => $todayEntries);
         $this->load->view('adms/ss_parameters', $data);
    }
     
    public function insert_ss_parameters()
    {
        // Insert Social Security Parameters
        $this->form_validation->set_rules('prcntPdsFGPrevMonth', '% of lifting of PDS food grains for (Previous Month)', 'required|trim');
        $this->form_validation->set_rules('prcntPdsAnbFGPrevTwoMonth', '% of lifting of ANB food grains for (Previous two months)', 'required|trim');
        $this->form_validation->set_rules('prcntPdsFGCurMonth', '% of lifting of PDS food grains for (Current month)', 'required|trim');
        $this->form_validation->set_rules('nohDistrPdsFGPrevMonthNFSA', 'No. of Households distributed PDS food grains for (previous month) under NFSA', 'required|trim');
        $this->form_validation->set_rules('nohDistrPdsFGCurMonthNFSA', 'No. of Households distributed PDS food grains for (current month) under NFSA', 'required|trim');
        $this->form_validation->set_rules('nopBenANBRicePrevTwoMonth', 'No. of Person Benefited for ANB Rice (Previous Two Months)', 'required|trim');
        $this->form_validation->set_rules('nohDistFGPrevTwoMonthANB', 'No. of Households distributed PDS food grains for (previous two months) under ANB', 'required|trim');
        $this->form_validation->set_rules('nohDistFG10KGLastMonth', 'No. of Households dostributed food grains @ 10Kg for (last month)', 'required|trim');
        $this->form_validation->set_rules('nopGvnBenefitStateContFund', 'No. of person given benefit from state contingency fund', 'required|trim');
        $this->form_validation->set_rules('noDalBhatCentreOprnl', 'No. of Daal Bhaat Centres Operational', 'required|trim');
        $this->form_validation->set_rules('nopAteAboveP10PrevDay', 'No. of persons who ate above (Point-10) on previous day', 'required|trim');
        $this->form_validation->set_rules('noCKOprtdByNGO', 'No. of Community Kitchens operated by NGO/CSO etc', 'required|trim');
        $this->form_validation->set_rules('nopAteAbvPt12PrevDay', 'No. of person who ate above (Point-12) on previos day', 'required|trim');
        $this->form_validation->set_rules('noMigLabour', 'No. of Migrant Labour', 'required|trim');
        $this->form_validation->set_rules('noMigLabourFed', 'No. of Migrant Labour fed', 'required|trim');
        $this->form_validation->set_rules('noPktDryRationDst', 'No. of packets of dry ration distributed', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'supply');
            $data = array('todayEntries' => $todayEntries);
            $this->load->view('adms/ss_parameters', $data);
        } else {
            // On Success Save Details in Add Mode   
            $prcntPdsFGPrevMonth = $this->input->post('prcntPdsFGPrevMonth');
            $prcntPdsAnbFGPrevTwoMonth = $this->input->post('prcntPdsAnbFGPrevTwoMonth');
            $prcntPdsFGCurMonth = $this->input->post('prcntPdsFGCurMonth');
            $nohDistrPdsFGPrevMonthNFSA = $this->input->post('nohDistrPdsFGPrevMonthNFSA');
            $nohDistrPdsFGCurMonthNFSA = $this->input->post('nohDistrPdsFGCurMonthNFSA');
            $nopBenANBRicePrevTwoMonth = $this->input->post('nopBenANBRicePrevTwoMonth');
            $nohDistFGPrevTwoMonthANB = $this->input->post('nohDistFGPrevTwoMonthANB');
            $nohDistFG10KGLastMonth = $this->input->post('nohDistFG10KGLastMonth');
            $nopGvnBenefitStateContFund = $this->input->post('nopGvnBenefitStateContFund');
            $noDalBhatCentreOprnl = $this->input->post('noDalBhatCentreOprnl');
            $nopAteAboveP10PrevDay = $this->input->post('nopAteAboveP10PrevDay');
            $noCKOprtdByNGO = $this->input->post('noCKOprtdByNGO');
            $nopAteAbvPt12PrevDay = $this->input->post('nopAteAbvPt12PrevDay');
            $noMigLabour = $this->input->post('noMigLabour');
            $noMigLabourFed = $this->input->post('noMigLabourFed');
            $noPktDryRationDst = $this->input->post('noPktDryRationDst');
            $dtofRept=date('Y-m-d'); // Today Date

            // Check Whether it is Multiple Entry on same date or not
            if($this->mymodel->count_data_with_condition('supply','dtofRept',$dtofRept) > 0){
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/adms/ss_parameters');
            }else{
                $data = array('prcntPdsFGPrevMonth' => $prcntPdsFGPrevMonth, 'prcntPdsAnbFGPrevTwoMonth' => $prcntPdsAnbFGPrevTwoMonth,'prcntPdsFGCurMonth' => $prcntPdsFGCurMonth,'nohDistrPdsFGPrevMonthNFSA'=>$nohDistrPdsFGPrevMonthNFSA,'nohDistrPdsFGCurMonthNFSA' => $nohDistrPdsFGCurMonthNFSA, 'nopBenANBRicePrevTwoMonth' => $nopBenANBRicePrevTwoMonth,'nohDistFGPrevTwoMonthANB' => $nohDistFGPrevTwoMonthANB,'nohDistFG10KGLastMonth'=>$nohDistFG10KGLastMonth,'nopGvnBenefitStateContFund' => $nopGvnBenefitStateContFund, 'noDalBhatCentreOprnl' => $noDalBhatCentreOprnl,'nopAteAboveP10PrevDay' => $nopAteAboveP10PrevDay,'noCKOprtdByNGO'=>$noCKOprtdByNGO,'nopAteAbvPt12PrevDay' => $nopAteAbvPt12PrevDay, 'noMigLabour' => $noMigLabour,'noMigLabourFed' => $noMigLabourFed,'noPktDryRationDst'=>$noPktDryRationDst,'dtofRept'=>$dtofRept);
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('supply', $data),
                    'Social Security Parameters Record Inserted Successfully.',
                    'Something went wrong, please try again!','department/adms/ss_parameters'
                );
            }
        }
    }
    public function edit_ss_parameters($id){
        // Edit Social Security Parameters
        $singleRecord = $this->mymodel->fetch_data('sId',$id,'supply');
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'supply');
        $data = array('singleRecord'=>$singleRecord, 'todayEntries' => $todayEntries);
        $this->load->view('adms/ss_parameters', $data);
    }
    public function update_ss_parameters(){
        // Update Social Security Parameters
        $this->form_validation->set_rules('prcntPdsFGPrevMonth', '% of lifting of PDS food grains for (Previous Month)', 'required|trim');
        $this->form_validation->set_rules('prcntPdsAnbFGPrevTwoMonth', '% of lifting of ANB food grains for (Previous two months)', 'required|trim');
        $this->form_validation->set_rules('prcntPdsFGCurMonth', '% of lifting of PDS food grains for (Current month)', 'required|trim');
        $this->form_validation->set_rules('nohDistrPdsFGPrevMonthNFSA', 'No. of Households distributed PDS food grains for (previous month) under NFSA', 'required|trim');
        $this->form_validation->set_rules('nohDistrPdsFGCurMonthNFSA', 'No. of Households distributed PDS food grains for (current month) under NFSA', 'required|trim');
        $this->form_validation->set_rules('nopBenANBRicePrevTwoMonth', 'No. of Person Benefited for ANB Rice (Previous Two Months)', 'required|trim');
        $this->form_validation->set_rules('nohDistFGPrevTwoMonthANB', 'No. of Households distributed PDS food grains for (previous two months) under ANB', 'required|trim');
        $this->form_validation->set_rules('nohDistFG10KGLastMonth', 'No. of Households dostributed food grains @ 10Kg for (last month)', 'required|trim');
        $this->form_validation->set_rules('nopGvnBenefitStateContFund', 'No. of person given benefit from state contingency fund', 'required|trim');
        $this->form_validation->set_rules('noDalBhatCentreOprnl', 'No. of Daal Bhaat Centres Operational', 'required|trim');
        $this->form_validation->set_rules('nopAteAboveP10PrevDay', 'No. of persons who ate above (Point-10) on previous day', 'required|trim');
        $this->form_validation->set_rules('noCKOprtdByNGO', 'No. of Community Kitchens operated by NGO/CSO etc', 'required|trim');
        $this->form_validation->set_rules('nopAteAbvPt12PrevDay', 'No. of person who ate above (Point-12) on previos day', 'required|trim');
        $this->form_validation->set_rules('noMigLabour', 'No. of Migrant Labour', 'required|trim');
        $this->form_validation->set_rules('noMigLabourFed', 'No. of Migrant Labour fed', 'required|trim');
        $this->form_validation->set_rules('noPktDryRationDst', 'No. of packets of dry ration distributed', 'required|trim');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error','Something went wrong pls try again..');
                $loc='department/adms/edit_ss_parameters/'.$this->input->post('sId');
                return redirect($loc);  
        }
        else{
            // On Success    
                $sId=$this->input->post('sId');
                $prcntPdsFGPrevMonth = $this->input->post('prcntPdsFGPrevMonth');
                $prcntPdsAnbFGPrevTwoMonth = $this->input->post('prcntPdsAnbFGPrevTwoMonth');
                $prcntPdsFGCurMonth = $this->input->post('prcntPdsFGCurMonth');
                $nohDistrPdsFGPrevMonthNFSA = $this->input->post('nohDistrPdsFGPrevMonthNFSA');
                $nohDistrPdsFGCurMonthNFSA = $this->input->post('nohDistrPdsFGCurMonthNFSA');
                $nopBenANBRicePrevTwoMonth = $this->input->post('nopBenANBRicePrevTwoMonth');
                $nohDistFGPrevTwoMonthANB = $this->input->post('nohDistFGPrevTwoMonthANB');
                $nohDistFG10KGLastMonth = $this->input->post('nohDistFG10KGLastMonth');
                $nopGvnBenefitStateContFund = $this->input->post('nopGvnBenefitStateContFund');
                $noDalBhatCentreOprnl = $this->input->post('noDalBhatCentreOprnl');
                $nopAteAboveP10PrevDay = $this->input->post('nopAteAboveP10PrevDay');
                $noCKOprtdByNGO = $this->input->post('noCKOprtdByNGO');
                $nopAteAbvPt12PrevDay = $this->input->post('nopAteAbvPt12PrevDay');
                $noMigLabour = $this->input->post('noMigLabour');
                $noMigLabourFed = $this->input->post('noMigLabourFed');
                $noPktDryRationDst = $this->input->post('noPktDryRationDst');
                $dtofRept=date('Y-m-d'); // Today Date
            
                // Update data on supply
                $data = array('prcntPdsFGPrevMonth' => $prcntPdsFGPrevMonth, 'prcntPdsAnbFGPrevTwoMonth' => $prcntPdsAnbFGPrevTwoMonth,'prcntPdsFGCurMonth' => $prcntPdsFGCurMonth,'nohDistrPdsFGPrevMonthNFSA'=>$nohDistrPdsFGPrevMonthNFSA,'nohDistrPdsFGCurMonthNFSA' => $nohDistrPdsFGCurMonthNFSA, 'nopBenANBRicePrevTwoMonth' => $nopBenANBRicePrevTwoMonth,'nohDistFGPrevTwoMonthANB' => $nohDistFGPrevTwoMonthANB,'nohDistFG10KGLastMonth'=>$nohDistFG10KGLastMonth,'nopGvnBenefitStateContFund' => $nopGvnBenefitStateContFund, 'noDalBhatCentreOprnl' => $noDalBhatCentreOprnl,'nopAteAboveP10PrevDay' => $nopAteAboveP10PrevDay,'noCKOprtdByNGO'=>$noCKOprtdByNGO,'nopAteAbvPt12PrevDay' => $nopAteAbvPt12PrevDay, 'noMigLabour' => $noMigLabour,'noMigLabourFed' => $noMigLabourFed,'noPktDryRationDst'=>$noPktDryRationDst,'dtofRept'=>$dtofRept);
                $this->action_redirect_msg($this->mymodel->update_data('sId',$sId,$data,'supply'),
                       'Social Security Parameters Record Updated Successfully.','Something went wrong, please try again!','department/adms/ss_parameters');
        }        
    }   
    
    // Ration Distribution
    public function ration_distribution(){
        // Load Ration Distribution
        //$currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_all('rtndistribution');
        $data = array('todayEntries' => $todayEntries);
        $this->load->view('adms/ration_distribution', $data);
    }
    public function insert_ration_distribution()
    {
        // Insert Ration Distribution
        $this->form_validation->set_rules('target', 'Target', 'required|trim');
        $this->form_validation->set_rules('distributed', 'Distributed', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            //$currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_all('rtndistribution');
            $data = array('todayEntries' => $todayEntries);
            $this->load->view('adms/ration_distribution', $data);
        } else {
            // On Success Save Details in Add Mode   
            $target = $this->input->post('target');
            $distributed = $this->input->post('distributed');
            $currentdate = date('Y-m-d');
            // Check Whether it is Multiple Entry on same date or not
                if($this->mymodel->count_data_with_condition('rtndistribution','dtofRept',$dtofRept) > 0){
                 $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/adms/ration_distribution');
            }else{
                $data = array('target' => $target, 'distributed' => $distributed,'dtofRept'=>$currentdate);
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('rtndistribution', $data),
                    'Ration Distribution Record Inserted Successfully.',
                    'Something went wrong, please try again!','department/adms/ration_distribution'
                );
             }
        }
    }
    public function edit_ration_distribution($id){
        // Edit Ration Distribution
        $singleRecord = $this->mymodel->fetch_data('id',$id,'rtndistribution');
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_all('rtndistribution');
        $data = array('singleRecord'=>$singleRecord, 'todayEntries' => $todayEntries);
        $this->load->view('adms/ration_distribution', $data);
    }
    public function update_ration_distribution(){
        // Update Ration Distribution
        $this->form_validation->set_rules('target', 'Target', 'required|trim');
        $this->form_validation->set_rules('distributed', 'Distributed', 'required|trim');

        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error','Something went wrong pls try again..');
                $loc='department/adms/edit_ration_distribution/'.$this->input->post('id');
                return redirect($loc);  
        }
        else{
            // On Success    
                $id=$this->input->post('id');
                $target = $this->input->post('target');
                $distributed = $this->input->post('distributed');
                $dtofRept=date('Y-m-d'); // Today Date
            
                // Update data on rtndistribution
                $data = array('target' => $target, 'distributed' => $distributed);
                $this->action_redirect_msg($this->mymodel->update_data('id',$id,$data,'rtndistribution'),
                       'Ration Distribution Record Updated Successfully.','Something went wrong, please try again!','department/adms/ration_distribution');
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
    //Social Security Parameters Reports
    public function ss_parameters_report(){
        // Load Social Security Parameters Reports Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'supply');
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('adms/ss_parameters_report',$data);
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
            $this->load->view('adms/ss_parameters_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept',$reportdate,'supply');
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('adms/ss_parameters_report',$data);
        }
    }
}