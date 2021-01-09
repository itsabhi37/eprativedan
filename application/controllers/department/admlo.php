<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admlo extends CI_Controller
{

    public function __construct()
    {
        //if user is not logged in then redirect to Login Page       
        parent::__construct();
        if ($this->session->userdata('logged_user_role') != "Data Entry Operator" || $this->session->userdata('logged_user_department') != 4) {
            // ADM L&O Department Id - 4    
            return redirect('home');
        }
    }

    public function index()
    {
        // ADM L&O Dashboard
        $currentdate = date('Y-m-d'); // Today Date
        $total_noICAppointed = $this->mymodel->get_Sum('noICAppointed', 'dtofRept', $currentdate, 'afmlo'); // Number of Incident Commanders appointed
        $total_noConDeplMonIQ = $this->mymodel->get_Sum('noConDeplMonIQ', 'dtofRept', $currentdate, 'afmlo'); // Number of constables deployed for monitoring Institutional Quarantine
        $total_noVehicleSeized = $this->mymodel->get_Sum('noVehicleSeized', 'dtofRept', $currentdate, 'afmlo'); // Number of vehicles seized
        $total_totlFineCollected = $this->mymodel->get_Sum('totlFineCollected', 'dtofRept', $currentdate, 'afmlo'); // Total Fine Collected
        $data = array('total_noICAppointed' => $total_noICAppointed, 'total_noConDeplMonIQ' => $total_noConDeplMonIQ, 'total_noVehicleSeized' => $total_noVehicleSeized, 'total_totlFineCollected' => $total_totlFineCollected);
        $this->load->view('admlo/dashboard', $data);
    }

    public function admlo_update()
    {
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'afmlo');
        $data = array('todayEntries' => $todayEntries);
        $this->load->view('admlo/admlo_update', $data);
    }
    public function insert_admlo_update()
    {
        //INSERT INTO AFMLO TABLE
        $this->form_validation->set_rules('noICAppointed', 'Number of Incident Commanders appointed', 'required');
        $this->form_validation->set_rules('nopBkdLDViolation', 'Number of person booked for lockdown violations to date', 'required');
        $this->form_validation->set_rules('noChecknaka', 'Number of Check Naka in place', 'required');
        $this->form_validation->set_rules('noFIRLodgedLDViolation', 'Number of FIR lodged for lockdown violations', 'required');
        $this->form_validation->set_rules('noArrestLDViolation', 'Number of arrests made for lockdown violations', 'required');
        $this->form_validation->set_rules('nopArvdAftrLDDclrn', 'Number of persons arrived after lockdown declaration', 'required');
        $this->form_validation->set_rules('noConDeplMonIQ', 'Number of constables deployed for monitoring Institutional Quarantine', 'required');
        $this->form_validation->set_rules('noFIRlodgedECAct', 'Number of FIR lodged under EC Act', 'required');
        $this->form_validation->set_rules('CRinOprn', '24x7 Control Room in operation (Yes/ No)', 'required');
        $this->form_validation->set_rules('noCallRecvdDCR', 'Number of calls received at DCR', 'required');
        $this->form_validation->set_rules('DCRCompln1', 'Top three complaints in DCR -1', 'required');
        $this->form_validation->set_rules('DCRCompln2', 'Top three complaints in DCR -2', 'required');
        $this->form_validation->set_rules('DCRCompln3', 'Top three complaints in DCR -3', 'required');
        $this->form_validation->set_rules('relgsCongrnBanned', 'Religious congregations banned (Yes/ No)', 'required');
        $this->form_validation->set_rules('noLDViolnReport', 'Number of lockdown violations reported to date', 'required');
        $this->form_validation->set_rules('noVehicleSeized', 'Number of vehicles seized', 'required');
        $this->form_validation->set_rules('totlFineCollected', 'Total Fine Collected', 'required');
        $this->form_validation->set_rules('noFIRCrimeotLD', 'Number of FIRs for crimes other than lockdown violations', 'required');
        $this->form_validation->set_rules('noForeignNtnArrived', 'Number of foreign nationals arrival since 01.03.2020', 'required');
        $this->form_validation->set_rules('wlSD1', 'Worry locations for Social Distancing -1', 'required');
        $this->form_validation->set_rules('wlSD2', 'Worry locations for Social Distancing -2', 'required');
        $this->form_validation->set_rules('wlSD3', 'Worry locations for Social Distancing -3', 'required');
        $this->form_validation->set_rules('wlSD4', 'Worry locations for Social Distancing -4', 'required');
        $this->form_validation->set_rules('wlSD5', 'Worry locations for Social Distancing -5', 'required');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'afmlo');
            $data = array('todayEntries' => $todayEntries);
            $this->load->view('admlo/admlo_update', $data);
        } else {
            // On Success Save Details in Add Mode   
            $noICAppointed = $this->input->post('noICAppointed');
            $nopBkdLDViolation = $this->input->post('nopBkdLDViolation');
            $noChecknaka = $this->input->post('noChecknaka');
            $noFIRLodgedLDViolation = $this->input->post('noFIRLodgedLDViolation');
            $noArrestLDViolation = $this->input->post('noArrestLDViolation');
            $nopArvdAftrLDDclrn = $this->input->post('nopArvdAftrLDDclrn');
            $noConDeplMonIQ = $this->input->post('noConDeplMonIQ');
            $noFIRlodgedECAct = $this->input->post('noFIRlodgedECAct');
            $CRinOprn = $this->input->post('CRinOprn');
            $noCallRecvdDCR = $this->input->post('noCallRecvdDCR');
            $DCRCompln1 = $this->input->post('DCRCompln1');
            $DCRCompln2 = $this->input->post('DCRCompln2');
            $DCRCompln3 = $this->input->post('DCRCompln3');
            $relgsCongrnBanned = $this->input->post('relgsCongrnBanned');
            $noLDViolnReport = $this->input->post('noLDViolnReport');
            $noVehicleSeized = $this->input->post('noVehicleSeized');
            $totlFineCollected = $this->input->post('totlFineCollected');
            $noFIRCrimeotLD = $this->input->post('noFIRCrimeotLD');
            $noForeignNtnArrived = $this->input->post('noForeignNtnArrived');
            $wlSD1 = $this->input->post('wlSD1');
            $wlSD2 = $this->input->post('wlSD2');
            $wlSD3 = $this->input->post('wlSD3');
            $wlSD4 = $this->input->post('wlSD4');
            $wlSD5 = $this->input->post('wlSD5');
            $dtofRept = date('Y-m-d'); // Today Date

            if ($this->mymodel->count_data_with_condition('afmlo', 'dtofRept', $dtofRept) > 0) {
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.', 'department/admlo/admlo_update');
            } else {
                $data = array('noICAppointed' => $noICAppointed, 'nopBkdLDViolation' => $nopBkdLDViolation, 'noChecknaka' => $noChecknaka, 'noFIRLodgedLDViolation' => $noFIRLodgedLDViolation, 'noArrestLDViolation' => $noArrestLDViolation, 'nopArvdAftrLDDclrn' => $nopArvdAftrLDDclrn, 'noConDeplMonIQ' => $noConDeplMonIQ, 'noFIRlodgedECAct' => $noFIRlodgedECAct, 'CRinOprn' => $CRinOprn, 'noCallRecvdDCR' => $noCallRecvdDCR, 'DCRCompln1' => $DCRCompln1, 'DCRCompln2 ' => $DCRCompln2, 'DCRCompln3' => $DCRCompln3, 'relgsCongrnBanned' => $relgsCongrnBanned, 'noLDViolnReport' => $noLDViolnReport, 'noVehicleSeized' => $noVehicleSeized, 'totlFineCollected' => $totlFineCollected, 'noFIRCrimeotLD' => $noFIRCrimeotLD, 'noForeignNtnArrived' => $noForeignNtnArrived, 'wlSD1' => $wlSD1, 'wlSD2' => $wlSD2, 'wlSD3' => $wlSD3, 'wlSD4' => $wlSD4, 'wlSD5' => $wlSD5, 'dtofRept' => $dtofRept);

                $this->action_redirect_msg(
                    $this->mymodel->insert_data('afmlo', $data),
                    'Law & Order Parameters Record Inserted Successfully.',
                    'Something went wrong, please try again!',
                    'department/admlo/admlo_update'
                );
            }
        }
    }
    public function edit_admlo_update($id)
    {
        // Edit ADM L&O Update
        $singleRecord = $this->mymodel->fetch_data('aId', $id, 'afmlo');
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'afmlo');
        $data = array('singleRecord' => $singleRecord, 'todayEntries' => $todayEntries);
        $this->load->view('admlo/admlo_update', $data);
    }    
    public function update_admlo_update()
    {
        // Update ADM L&O Information Record
        $this->form_validation->set_rules('noICAppointed', 'Number of Incident Commanders appointed', 'required');
        $this->form_validation->set_rules('nopBkdLDViolation', 'Number of person booked for lockdown violations to date', 'required');
        $this->form_validation->set_rules('noChecknaka', 'Number of Check Naka in place', 'required');
        $this->form_validation->set_rules('noFIRLodgedLDViolation', 'Number of FIR lodged for lockdown violations', 'required');
        $this->form_validation->set_rules('noArrestLDViolation', 'Number of arrests made for lockdown violations', 'required');
        $this->form_validation->set_rules('nopArvdAftrLDDclrn', 'Number of persons arrived after lockdown declaration', 'required');
        $this->form_validation->set_rules('noConDeplMonIQ', 'Number of constables deployed for monitoring Institutional Quarantine', 'required');
        $this->form_validation->set_rules('noFIRlodgedECAct', 'Number of FIR lodged under EC Act', 'required');
        $this->form_validation->set_rules('CRinOprn', '24x7 Control Room in operation (Yes/ No)', 'required');
        $this->form_validation->set_rules('noCallRecvdDCR', 'Number of calls received at DCR', 'required');
        $this->form_validation->set_rules('DCRCompln1', 'Top three complaints in DCR -1', 'required');
        $this->form_validation->set_rules('DCRCompln2', 'Top three complaints in DCR -2', 'required');
        $this->form_validation->set_rules('DCRCompln3', 'Top three complaints in DCR -3', 'required');
        $this->form_validation->set_rules('relgsCongrnBanned', 'Religious congregations banned (Yes/ No)', 'required');
        $this->form_validation->set_rules('noLDViolnReport', 'Number of lockdown violations reported to date', 'required');
        $this->form_validation->set_rules('noVehicleSeized', 'Number of vehicles seized', 'required');
        $this->form_validation->set_rules('totlFineCollected', 'Total Fine Collected', 'required');
        $this->form_validation->set_rules('noFIRCrimeotLD', 'Number of FIRs for crimes other than lockdown violations', 'required');
        $this->form_validation->set_rules('noForeignNtnArrived', 'Number of foreign nationals arrival since 01.03.2020', 'required');
        $this->form_validation->set_rules('wlSD1', 'Worry locations for Social Distancing -1', 'required');
        $this->form_validation->set_rules('wlSD2', 'Worry locations for Social Distancing -2', 'required');
        $this->form_validation->set_rules('wlSD3', 'Worry locations for Social Distancing -3', 'required');
        $this->form_validation->set_rules('wlSD4', 'Worry locations for Social Distancing -4', 'required');
        $this->form_validation->set_rules('wlSD5', 'Worry locations for Social Distancing -5', 'required');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail
            $this->session->set_flashdata('error', 'Something went wrong pls try again..');
            $loc = 'department/admlo/edit_admlo_update' . $this->input->post('aId');
            return redirect($loc);
        } else {
            // On Success  
            $aId = $this->input->post('aId');
            $noICAppointed = $this->input->post('noICAppointed');
            $nopBkdLDViolation = $this->input->post('nopBkdLDViolation');
            $noChecknaka = $this->input->post('noChecknaka');
            $noFIRLodgedLDViolation = $this->input->post('noFIRLodgedLDViolation');
            $noArrestLDViolation = $this->input->post('noArrestLDViolation');
            $nopArvdAftrLDDclrn = $this->input->post('nopArvdAftrLDDclrn');
            $noConDeplMonIQ = $this->input->post('noConDeplMonIQ');
            $noFIRlodgedECAct = $this->input->post('noFIRlodgedECAct');
            $CRinOprn = $this->input->post('CRinOprn');
            $noCallRecvdDCR = $this->input->post('noCallRecvdDCR');
            $DCRCompln1 = $this->input->post('DCRCompln1');
            $DCRCompln2 = $this->input->post('DCRCompln2');
            $DCRCompln3 = $this->input->post('DCRCompln3');
            $relgsCongrnBanned = $this->input->post('relgsCongrnBanned');
            $noLDViolnReport = $this->input->post('noLDViolnReport');
            $noVehicleSeized = $this->input->post('noVehicleSeized');
            $totlFineCollected = $this->input->post('totlFineCollected');
            $noFIRCrimeotLD = $this->input->post('noFIRCrimeotLD');
            $noForeignNtnArrived = $this->input->post('noForeignNtnArrived');
            $wlSD1 = $this->input->post('wlSD1');
            $wlSD2 = $this->input->post('wlSD2');
            $wlSD3 = $this->input->post('wlSD3');
            $wlSD4 = $this->input->post('wlSD4');
            $wlSD5 = $this->input->post('wlSD5');
            $dtofRept = date('Y-m-d');
            // Update data on afmlo
            $data = array('noICAppointed' => $noICAppointed, 'nopBkdLDViolation' => $nopBkdLDViolation, 'noChecknaka' => $noChecknaka, 'noFIRLodgedLDViolation' => $noFIRLodgedLDViolation, 'noArrestLDViolation' => $noArrestLDViolation, 'nopArvdAftrLDDclrn' => $nopArvdAftrLDDclrn, 'noConDeplMonIQ' => $noConDeplMonIQ, 'noFIRlodgedECAct' => $noFIRlodgedECAct, 'CRinOprn' => $CRinOprn, 'noCallRecvdDCR' => $noCallRecvdDCR, 'DCRCompln1' => $DCRCompln1, 'DCRCompln2 ' => $DCRCompln2, 'DCRCompln3' => $DCRCompln3, 'relgsCongrnBanned' => $relgsCongrnBanned, 'noLDViolnReport' => $noLDViolnReport, 'noVehicleSeized' => $noVehicleSeized, 'totlFineCollected' => $totlFineCollected, 'noFIRCrimeotLD' => $noFIRCrimeotLD, 'noForeignNtnArrived' => $noForeignNtnArrived, 'wlSD1' => $wlSD1, 'wlSD2' => $wlSD2, 'wlSD3' => $wlSD3, 'wlSD4' => $wlSD4, 'wlSD5' => $wlSD5, 'dtofRept' => $dtofRept);

            $this->action_redirect_msg(
                $this->mymodel->update_data('aId', $aId, $data, 'afmlo'),
                'Law & Order Parameters Record Updated Successfully.',
                'Something went wrong, please try again!',
                'department/admlo/admlo_update'
            );
        }
    }
    
    private function action_redirect_msg($actions, $successmsg, $failmsg, $redirectLocation)
    {
        if ($actions) {
            $this->session->set_flashdata('success', $successmsg);
        } else {
            $this->session->set_flashdata('error', $failmsg);
        }
        return redirect($redirectLocation);
    }

    // Error Message on Mulitple Entry
    private function action_redirect_onMultipleEntry($failmsg, $redirectLocation)
    {
        $this->session->set_flashdata('error', $failmsg);
        return redirect($redirectLocation);
    }

    // Report
    public function admlo_report()
    {
        // Load ADM L&O report Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard = date("d-m-Y", strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'afmlo');
        $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
        $this->load->view('admlo/admlo_report', $data);
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
            $this->load->view('admlo/admlo_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries =  $this->mymodel->fetch_data_result('dtofRept', $reportdate, 'afmlo');
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('admlo/admlo_report', $data);
        }
    } 
}
