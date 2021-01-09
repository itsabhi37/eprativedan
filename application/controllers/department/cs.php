<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cs extends CI_Controller
{

    public function __construct()
    {
        //if user is not logged in then redirect to Login Page       
        parent::__construct();
        if ($this->session->userdata('logged_user_role') != "Data Entry Operator" || $this->session->userdata('logged_user_department') != 3) {
            // CS Department Id - 3    
            return redirect('home');
        }
    }

    public function index()
    {
        // CS Dashboard
        $currentdate = date('Y-m-d'); // Today Date
        $total_thermalScanner = $this->mymodel->get_Sum('thermalScanner', 'dtofRept', $currentdate, 'inventory'); // Today's Thermal Scanner on Stock
        $total_gloves = $this->mymodel->get_Sum('gloves', 'dtofRept', $currentdate, 'inventory'); // Today's Gloves on Stock
        $total_sanitizer500ml = $this->mymodel->get_Sum('sanitizer500ml', 'dtofRept', $currentdate, 'inventory'); // Today's Gloves on Stock
        $total_sanitizer600ml = $this->mymodel->get_Sum('sanitizer600ml', 'dtofRept', $currentdate, 'inventory'); // Today's Gloves on Stock
        $data = array('total_thermalScanner' => $total_thermalScanner, 'total_gloves' => $total_gloves, 'total_sanitizer500ml' => $total_sanitizer500ml, 'total_sanitizer600ml' => $total_sanitizer600ml);
        $this->load->view('cs/dashboard', $data);
    }

    // Isolation Facilities
    public function isolation_facilities()
    {
        // Load  Isolation Facilities
        $isolationCenter = $this->mymodel->fetch_all('isolationcentre'); // For Isolation Center Dropdown
        //$currentdate = date('Y-m-d'); // Today Date
        $isolationFacilities = $this->mymodel->fetch_isofacility(); // For Isolation Facility
        $data = array('isolationCenter' => $isolationCenter, 'isolationFacilities' => $isolationFacilities);
        $this->load->view('cs/isolation_facilities', $data);
    }

    public function insert_isolation_facilities()
    {
        // Insert Isolation Facilities
        $this->form_validation->set_rules('cmbIsolation', 'Isolation Center', 'required|is_unique[isolationfacilities.isoId]');
        $this->form_validation->set_rules('txtNOB', 'No of Beds', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $isolationCenter = $this->mymodel->fetch_all('isolationcentre'); // For Isolation Center Dropdown
            $isolationFacilities = $this->mymodel->fetch_isofacility(); // For Isolation Facility
            $data = array('isolationCenter' => $isolationCenter, 'isolationFacilities' => $isolationFacilities);
            $this->load->view('cs/isolation_facilities', $data);
        } else {
            // On Success Save Details in Add Mode   
            $isoId = $this->input->post('cmbIsolation');
            $noBed = $this->input->post('txtNOB');

            // Check Whether it is Multiple Entry on same date or not
            // if($this->mymodel->count_data_with_condition('cvdcaseinfo','dtofRept',$dtofRept) > 0){
            //     $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/idsp/covid_case');
            // }else{
            $data = array('isoId' => $isoId, 'noBed' => $noBed);
            $this->action_redirect_msg(
                $this->mymodel->insert_data('isolationfacilities', $data),
                'Isolation Facility Record Inserted Successfully.',
                'Something went wrong, please try again!',
                'department/cs/isolation_facilities'
            );
            // }
        }
    }

    public function edit_isolation_facilities($id)
    {
        // Edit Isolation Facilities
        $singleRecord = $this->mymodel->fetch_data('ifId', $id, 'isolationfacilities');
        $isolationCenter = $this->mymodel->fetch_all('isolationcentre'); // For Isolation Center Dropdown
        $isolationFacilities = $this->mymodel->fetch_isofacility(); // For Isolation Facility
        $data = array('singleRecord' => $singleRecord, 'isolationCenter' => $isolationCenter, 'isolationFacilities' => $isolationFacilities);
        $this->load->view('cs/isolation_facilities', $data);
    }

    public function update_isolation_facilities()
    {
        // Update Isolation Facilities
        $this->form_validation->set_rules('cmbIsolation', 'Isolation Center', 'required');
        $this->form_validation->set_rules('txtNOB', 'No of Beds', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail
            $this->session->set_flashdata('error', 'Something went wrong pls try again..');
            $loc = 'department/cs/edit_isolation_facilities/' . $this->input->post('txtifId');
            return redirect($loc);
        } else {
            // On Success    
            $ifId = $this->input->post('txtifId');
            $isoId = $this->input->post('cmbIsolation');
            $noBed = $this->input->post('txtNOB');

            // Update data on isolationfacilities
            $data = array('isoId' => $isoId, 'noBed' => $noBed);
            $this->action_redirect_msg(
                $this->mymodel->update_data('ifId', $ifId, $data, 'isolationfacilities'),
                'Isolation Facility Record Updated Successfully.',
                'Something went wrong, please try again!',
                'department/cs/isolation_facilities'
            );
        }
    }

    // Essential Services at Quarantine
    public function es_quarantine()
    {
        // Load Essential Services at Qurantine 
        $quarantineCenter = $this->mymodel->fetch_all('csqc'); // For Quarantine Center Dropdown
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_qc($currentdate); // For Quarantine Center
        $data = array('quarantineCenter' => $quarantineCenter, 'todayEntries' => $todayEntries);
        $this->load->view('cs/es_quarantine', $data);
    }

    public function insert_es_quarantine()
    {
        // Insert Essential Services at Qurantine
        $this->form_validation->set_rules('cmbQuarantine', 'Quarantine Center', 'required');
        $this->form_validation->set_rules('txtTNOB', 'Total No of Beds', 'required|trim');
        $this->form_validation->set_rules('txtNOQC', 'No of Persons in QC', 'required|trim');
        $this->form_validation->set_rules('txtTNOPWCQ', 'Total No of People who Completed Quarantine', 'required|trim');
        $this->form_validation->set_rules('cmbDrinkingWater', 'Drinking Water', 'required');
        $this->form_validation->set_rules('cmbElectricity', 'Electricity', 'required');
        $this->form_validation->set_rules('cmbToilets', 'Toilets', 'required');
        $this->form_validation->set_rules('cmbFood', 'Food', 'required');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $quarantineCenter = $this->mymodel->fetch_all('csqc'); // For Quarantine Center Dropdown
            $currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_qc($currentdate); // For Quarantine Center
            $data = array('quarantineCenter' => $quarantineCenter, 'todayEntries' => $todayEntries);
            $this->load->view('cs/es_quarantine', $data);
        } else {
            // On Success Save Details in Add Mode   
            $centId = $this->input->post('cmbQuarantine');
            $noBed = $this->input->post('txtTNOB');
            $nopIn = $this->input->post('txtNOQC');
            $nopCompleted = $this->input->post('txtTNOPWCQ');
            $DwFacility = $this->input->post('cmbDrinkingWater');
            $elecFacility = $this->input->post('cmbElectricity');
            $toiletFacility = $this->input->post('cmbToilets');
            $foodFacility = $this->input->post('cmbFood');
            $dtofRept = date('Y-m-d'); // Today Date

            if ($this->mymodel->count_data_with_2condition('essentialserviceqc', 'centId', $centId, 'dtofRept', $dtofRept) > 0) {
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.', 'department/cs/es_quarantine');
            } else {
                $data = array('centId' => $centId, 'noBed' => $noBed, 'nopIn' => $nopIn, 'nopCompleted' => $nopCompleted, 'DwFacility' => $DwFacility, 'elecFacility' => $elecFacility, 'toiletFacility' => $toiletFacility, 'foodFacility' => $foodFacility, 'dtofRept' => $dtofRept);
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('essentialserviceqc', $data),
                    'Essential Services Available On Quarantine Centre Record Inserted Successfully.',
                    'Something went wrong, please try again!',
                    'department/cs/es_quarantine'
                );
            }
        }
    }

    public function edit_es_quarantine($id)
    {
        // Edit Essential Services at Qurantine
        $quarantineCenter = $this->mymodel->fetch_all('csqc'); // For Quarantine Center Dropdown
        $singleRecord = $this->mymodel->fetch_data('esqcId', $id, 'essentialserviceqc');
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_qc($currentdate); // For Quarantine Center
        $data = array('quarantineCenter' => $quarantineCenter, 'singleRecord' => $singleRecord, 'todayEntries' => $todayEntries);
        $this->load->view('cs/es_quarantine', $data);
    }

    public function update_es_quarantine()
    {
        // Update Essential Services at Qurantine Record
        $this->form_validation->set_rules('cmbQuarantine', 'Quarantine Center', 'required');
        $this->form_validation->set_rules('txtTNOB', 'Total No of Beds', 'required|trim');
        $this->form_validation->set_rules('txtNOQC', 'No of Persons in QC', 'required|trim');
        $this->form_validation->set_rules('txtTNOPWCQ', 'Total No of People who Completed Quarantine', 'required|trim');
        $this->form_validation->set_rules('cmbDrinkingWater', 'Drinking Water', 'required');
        $this->form_validation->set_rules('cmbElectricity', 'Electricity', 'required');
        $this->form_validation->set_rules('cmbToilets', 'Toilets', 'required');
        $this->form_validation->set_rules('cmbFood', 'Food', 'required');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail
            $this->session->set_flashdata('error', 'Something went wrong pls try again..');
            $loc = 'department/cs/edit_es_quarantine/' . $this->input->post('txtesqcId');
            return redirect($loc);
        } else {
            // On Success    
            $esqcId = $this->input->post('txtesqcId');
            $centId = $this->input->post('cmbQuarantine');
            $noBed = $this->input->post('txtTNOB');
            $nopIn = $this->input->post('txtNOQC');
            $nopCompleted = $this->input->post('txtTNOPWCQ');
            $DwFacility = $this->input->post('cmbDrinkingWater');
            $elecFacility = $this->input->post('cmbElectricity');
            $toiletFacility = $this->input->post('cmbToilets');
            $foodFacility = $this->input->post('cmbFood');
            $dtofRept = date('Y-m-d'); // Today Date

            // Update data on essentialserviceqc
            $data = array('centId' => $centId, 'noBed' => $noBed, 'nopIn' => $nopIn, 'nopCompleted' => $nopCompleted, 'DwFacility' => $DwFacility, 'elecFacility' => $elecFacility, 'toiletFacility' => $toiletFacility, 'foodFacility' => $foodFacility, 'dtofRept' => $dtofRept);
            $this->action_redirect_msg(
                $this->mymodel->update_data('esqcId', $esqcId, $data, 'essentialserviceqc'),
                'Essential Services Available On Quarantine Centre Record Updated Successfully.',
                'Something went wrong, please try again!',
                'department/cs/es_quarantine'
            );
        }
    }

    // Inventory
    public function inventory()
    {
        // Load Inventory
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'inventory'); // For Inventory
        $data = array('todayEntries' => $todayEntries);
        $this->load->view('cs/inventory', $data);
    }

    public function insert_inventory()
    {
        // Insert Inventory
        $this->form_validation->set_rules('txtThermalScanner', 'Thermal Scanner', 'required|trim');
        $this->form_validation->set_rules('txtGloves', 'Gloves', 'required|trim');
        $this->form_validation->set_rules('txtS500', 'Sanitizer (500 ml)', 'required|trim');
        $this->form_validation->set_rules('txtS600', 'Sanitizer (600 ml)', 'required|trim');
        $this->form_validation->set_rules('txtS5L', 'Sanitizer (5 l)', 'required|trim');
        $this->form_validation->set_rules('txtS15L', 'Sanitizer (15 l)', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'inventory'); // For Inventory
            $data = array('todayEntries' => $todayEntries);
            $this->load->view('cs/inventory', $data);
        } else {
            // On Success Save Details in Add Mode   
            $thermalScanner = $this->input->post('txtThermalScanner');
            $gloves = $this->input->post('txtGloves');
            $sanitizer500ml = $this->input->post('txtS500');
            $sanitizer600ml = $this->input->post('txtS600');
            $sanitizer5L = $this->input->post('txtS5L');
            $sanitizer15L = $this->input->post('txtS15L');
            $dtofRept = date('Y-m-d'); // Today Date

            // Check Whether it is Multiple Entry on same date or not
            if ($this->mymodel->count_data_with_condition('inventory', 'dtofRept', $dtofRept) > 0) {
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.', 'department/cs/inventory');
            } else {
                $data = array('thermalScanner' => $thermalScanner, 'gloves' => $gloves, 'sanitizer500ml' => $sanitizer500ml, 'sanitizer600ml' => $sanitizer600ml, 'sanitizer5L' => $sanitizer5L, 'sanitizer15L' => $sanitizer15L, 'dtofRept' => $dtofRept);
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('inventory', $data),
                    'Inventory Record Inserted Successfully.',
                    'Something went wrong, please try again!',
                    'department/cs/inventory'
                );
            }
        }
    }

    public function edit_inventory($id)
    {
        // Edit Inventory
        $singleRecord = $this->mymodel->fetch_data('inId', $id, 'inventory');
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'inventory'); // For Inventory
        $data = array('singleRecord' => $singleRecord, 'todayEntries' => $todayEntries);
        $this->load->view('cs/inventory', $data);
    }

    public function update_inventory()
    {
        // Update Facility Update Record
        $this->form_validation->set_rules('txtThermalScanner', 'Thermal Scanner', 'required|trim');
        $this->form_validation->set_rules('txtGloves', 'Gloves', 'required|trim');
        $this->form_validation->set_rules('txtS500', 'Sanitizer (500 ml)', 'required|trim');
        $this->form_validation->set_rules('txtS600', 'Sanitizer (600 ml)', 'required|trim');
        $this->form_validation->set_rules('txtS5L', 'Sanitizer (5 l)', 'required|trim');
        $this->form_validation->set_rules('txtS15L', 'Sanitizer (15 l)', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail
            $this->session->set_flashdata('error', 'Something went wrong pls try again..');
            $loc = 'department/cs/edit_inventory/' . $this->input->post('txtinId');
            return redirect($loc);
        } else {
            // On Success    
            $inId = $this->input->post('txtinId');
            $thermalScanner = $this->input->post('txtThermalScanner');
            $gloves = $this->input->post('txtGloves');
            $sanitizer500ml = $this->input->post('txtS500');
            $sanitizer600ml = $this->input->post('txtS600');
            $sanitizer5L = $this->input->post('txtS5L');
            $sanitizer15L = $this->input->post('txtS15L');
            $dtofRept = date('Y-m-d'); // Today Date

            // Update data on inventory
            $data = array('thermalScanner' => $thermalScanner, 'gloves' => $gloves, 'sanitizer500ml' => $sanitizer500ml, 'sanitizer600ml' => $sanitizer600ml, 'sanitizer5L' => $sanitizer5L, 'sanitizer15L' => $sanitizer15L, 'dtofRept' => $dtofRept);

            $this->action_redirect_msg(
                $this->mymodel->update_data('inId', $inId, $data, 'inventory'),
                'Inventory Record Updated Successfully.',
                'Something went wrong, please try again!',
                'department/cs/inventory'
            );
        }
    }

    // Doctor Availability
    public function doctor_availability()
    {
        // Load Doctor Availability
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'dctravail'); // For Doctor Availability
        $data = array('todayEntries' => $todayEntries);
        $this->load->view('cs/doctor_availability', $data);
    }
    public function insert_doctor_availability()
    {
        // Insert Doctor Availability
        $this->form_validation->set_rules('gvtdoc', 'Government Doctors', 'required|trim');
        $this->form_validation->set_rules('pvtdoc', 'Private Doctors', 'required|trim');
        $this->form_validation->set_rules('retdoc', 'Retired Doctors', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'dctravail'); // For Doctor Availability
            $data = array('todayEntries' => $todayEntries);
            $this->load->view('cs/doctor_availability', $data);
        } else {
            // On Success Save Details in Add Mode   
            $gvtdoc = $this->input->post('gvtdoc');
            $pvtdoc = $this->input->post('pvtdoc');
            $retdoc = $this->input->post('retdoc');
            $dtofRept = date('Y-m-d'); // Today Date

            // Check Whether it is Multiple Entry on same date or not
            if ($this->mymodel->count_data_with_condition('dctravail', 'dtofRept', $dtofRept) > 0) {
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.', 'department/cs/doctor_availability');
            } else {
                $data = array('gvtdoc' => $gvtdoc, 'pvtdoc' => $pvtdoc, 'retdoc' => $retdoc, 'dtofRept' => $dtofRept);
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('dctravail', $data),
                    'Doctor Availability Record Inserted Successfully.',
                    'Something went wrong, please try again!',
                    'department/cs/doctor_availability'
                );
            }
        }
    }

    public function edit_doctor_availability($id)
    {
        // Edit Doctor Availability
        $singleRecord = $this->mymodel->fetch_data('id', $id, 'dctravail');
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'dctravail'); // For Doctor Availability
        $data = array('singleRecord' => $singleRecord,'todayEntries' => $todayEntries);
        $this->load->view('cs/doctor_availability', $data);
    }

    public function update_doctor_availability()
    {
        // Update Doctor Availability Record
        $this->form_validation->set_rules('gvtdoc', 'Government Doctors', 'required|trim');
        $this->form_validation->set_rules('pvtdoc', 'Private Doctors', 'required|trim');
        $this->form_validation->set_rules('retdoc', 'Retired Doctors', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail
            $this->session->set_flashdata('error', 'Something went wrong pls try again..');
            $loc = 'department/cs/edit_doctor_availability/' . $this->input->post('txtid');
            return redirect($loc);
        } else {
            // On Success    
            $id = $this->input->post('txtid');
            $gvtdoc = $this->input->post('gvtdoc');
            $pvtdoc = $this->input->post('pvtdoc');
            $retdoc = $this->input->post('retdoc');
            $dtofRept = date('Y-m-d'); // Today Date

            // Update data on dctravail
            $data = array('gvtdoc' => $gvtdoc, 'pvtdoc' => $pvtdoc, 'retdoc' => $retdoc, 'dtofRept' => $dtofRept);
                
            $this->action_redirect_msg(
                $this->mymodel->update_data('id', $id, $data, 'dctravail'),
                'Doctor Availability Record Updated Successfully.',
                'Something went wrong, please try again!',
                'department/cs/doctor_availability'
            );
        }
    }

    // Health Paratmeters
    public function health_updation()
    {
        // Load Helath Parameters
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'cvhealth');
        $data = array('todayEntries' => $todayEntries);
        $this->load->view('cs/health_updation', $data);
    }

    public function insert_health_update()
    {
        // Insert Helath Parameters Update
        $this->form_validation->set_rules('noRetPvtDocTrained', 'Number of retired/ private doctors trained', 'required|trim');
        $this->form_validation->set_rules('noPvtHospEnlisted', 'Number of private hospitals enlisted', 'required|trim');
        $this->form_validation->set_rules('nopHQ', 'Number of persons in Home Quarantine', 'required|trim');
        $this->form_validation->set_rules('nopGQ', 'Number of persons in Government Quarantine', 'required|trim');
        $this->form_validation->set_rules('noHCIsolation', 'Number of Health Centres Isolation', 'required|trim');
        $this->form_validation->set_rules('nopStamped', 'Number of Persons Stamped', 'required|trim');
        $this->form_validation->set_rules('noN95MaskAvlbl', 'Number of N-95 Mask availabe', 'required|trim');
        $this->form_validation->set_rules('noTLMaskAvlbl', 'Number of Triple Layer Mask available', 'required|trim');
        $this->form_validation->set_rules('noPPEKitAvlbl', 'Number of PPE Kit available', 'required|trim');
        $this->form_validation->set_rules('noIsoBedAvlbl', 'Number of Isolation Beds available', 'required|trim');
        $this->form_validation->set_rules('noVTMKitAvlbl', 'Number of VTM Kits available', 'required|trim');
        $this->form_validation->set_rules('noVentWithNPAvlbl', 'Number of Ventilators with necessary persons available', 'required|trim');
        $this->form_validation->set_rules('nopDepForSpplyES', 'Number of persons deployed for supply of essentials to 3 & 4 point above', 'required|trim');
        $this->form_validation->set_rules('noCovidHosp', 'Number of COVID Hospitals', 'required|trim');
        $this->form_validation->set_rules('noHotelLodgeAcqIso', 'Number of Hotel/ Lodge acquired for Isolation', 'required|trim');
        $this->form_validation->set_rules('noProGearDriver', 'Number of protective gear for driver of Ambulance', 'required|trim');
        $this->form_validation->set_rules('elMortAvlbl', 'Electric Mortuary available', 'required|trim');
        $this->form_validation->set_rules('noICUBed', 'Number of ICU Beds', 'required|trim');
        $this->form_validation->set_rules('noIsoBed', 'Number of Isolation Beds', 'required|trim');
        $this->form_validation->set_rules('noBedCovidPatient', 'Number of beds for COVID patients', 'required|trim');
        $this->form_validation->set_rules('noBedCovidSerPatient', 'Number of beds for COVID serious patients', 'required|trim');
        $this->form_validation->set_rules('noDocTrICU', 'Number of Doctors trained for ICU', 'required|trim');
        $this->form_validation->set_rules('nopTrContTrace', 'Number of trained for Contact Tracing', 'required|trim');
        $this->form_validation->set_rules('cusContaPlanPlace', 'Cluster Containment Plan in Place', 'required|trim');
        $this->form_validation->set_rules('noParamedicTrained', 'Number of Paramedics trained', 'required|trim');
        $this->form_validation->set_rules('noDeathRespProb', 'Number of Deaths due to Respiratory Problems', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $covidfacility = $this->mymodel->fetch_all('cvhealth'); // For Health Paratmeters
            $currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'cvhealth');
            $data = array('covidfacility' => $covidfacility, 'todayEntries' => $todayEntries);
            $this->load->view('cs/health_updation', $data);
        } else {
            // On Success Save Details in Add Mode   
            $noRetPvtDocTrained = $this->input->post('noRetPvtDocTrained');
            $noPvtHospEnlisted = $this->input->post('noPvtHospEnlisted');
            $nopHQ = $this->input->post('nopHQ');
            $nopGQ = $this->input->post('nopGQ');
            $noHCIsolation = $this->input->post('noHCIsolation');
            $nopStamped = $this->input->post('nopStamped');
            $noN95MaskAvlbl = $this->input->post('noN95MaskAvlbl');
            $noTLMaskAvlbl = $this->input->post('noTLMaskAvlbl');
            $noPPEKitAvlbl = $this->input->post('noPPEKitAvlbl');
            $noIsoBedAvlbl = $this->input->post('noIsoBedAvlbl');
            $noVTMKitAvlbl = $this->input->post('noVTMKitAvlbl');
            $noVentWithNPAvlbl = $this->input->post('noVentWithNPAvlbl');
            $nopDepForSpplyES = $this->input->post('nopDepForSpplyES');
            $noCovidHosp = $this->input->post('noCovidHosp');
            $noHotelLodgeAcqIso = $this->input->post('noHotelLodgeAcqIso');
            $noProGearDriver = $this->input->post('noProGearDriver');
            $elMortAvlbl = $this->input->post('elMortAvlbl');
            $noICUBed = $this->input->post('noICUBed');
            $noIsoBed = $this->input->post('noIsoBed');
            $noBedCovidPatient = $this->input->post('noBedCovidPatient');
            $noBedCovidSerPatient = $this->input->post('noBedCovidSerPatient');
            $noDocTrICU = $this->input->post('noDocTrICU');
            $nopTrContTrace = $this->input->post('nopTrContTrace');
            $cusContaPlanPlace = $this->input->post('cusContaPlanPlace');
            $noParamedicTrained = $this->input->post('noParamedicTrained');
            $noDeathRespProb = $this->input->post('noDeathRespProb');
            $dtofRept = date('Y-m-d'); // Today Date

            if ($this->mymodel->count_data_with_condition('cvhealth', 'dtofRept', $dtofRept) > 0) {
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.', 'department/cs/health_updation');
            } else {
                $data = array('noRetPvtDocTrained' => $noRetPvtDocTrained, 'noPvtHospEnlisted' => $noPvtHospEnlisted, 'nopHQ' => $nopHQ, 'nopGQ' => $nopGQ, 'noHCIsolation' => $noHCIsolation, 'nopStamped' => $nopStamped, 'noN95MaskAvlbl' => $noN95MaskAvlbl, 'noTLMaskAvlbl' => $noTLMaskAvlbl, 'noPPEKitAvlbl' => $noPPEKitAvlbl, 'noPPEKitAvlbl' => $noPPEKitAvlbl, 'noIsoBedAvlbl' => $noIsoBedAvlbl, 'noVTMKitAvlbl' => $noVTMKitAvlbl, 'noVentWithNPAvlbl' => $noVentWithNPAvlbl, 'nopDepForSpplyES' => $nopDepForSpplyES, 'noCovidHosp' => $noCovidHosp, 'noHotelLodgeAcqIso' => $noHotelLodgeAcqIso, 'noProGearDriver' => $noProGearDriver, 'elMortAvlbl' => $elMortAvlbl, 'noICUBed' => $noICUBed, 'noIsoBed' => $noIsoBed, 'noBedCovidPatient' => $noBedCovidPatient, 'noBedCovidSerPatient' => $noBedCovidSerPatient, 'noDocTrICU' => $noDocTrICU, 'nopTrContTrace' => $nopTrContTrace, 'cusContaPlanPlace' => $cusContaPlanPlace, 'noParamedicTrained' => $noParamedicTrained, 'noDeathRespProb' => $noDeathRespProb, 'dtofRept' => $dtofRept);
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('cvhealth', $data),
                    'Health Parameters Record Inserted Successfully.',
                    'Something went wrong, please try again!',
                    'department/cs/health_updation'
                );
            }
        }
    }

    public function edit_health_update($id)
    {
        // Edit Helath Parameters
        $singleRecord = $this->mymodel->fetch_data('cvhId', $id, 'cvhealth');
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'cvhealth');
        $data = array('singleRecord' => $singleRecord, 'todayEntries' => $todayEntries);
        $this->load->view('cs/health_updation', $data);
    }

    public function update_health_update()
    {
        // Update Helath Parameters 
        $this->form_validation->set_rules('noRetPvtDocTrained', 'Number of retired/ private doctors trained', 'required|trim');
        $this->form_validation->set_rules('noPvtHospEnlisted', 'Number of private hospitals enlisted', 'required|trim');
        $this->form_validation->set_rules('nopHQ', 'Number of persons in Home Quarantine', 'required|trim');
        $this->form_validation->set_rules('nopGQ', 'Number of persons in Government Quarantine', 'required|trim');
        $this->form_validation->set_rules('noHCIsolation', 'Number of Health Centres Isolation', 'required|trim');
        $this->form_validation->set_rules('nopStamped', 'Number of Persons Stamped', 'required|trim');
        $this->form_validation->set_rules('noN95MaskAvlbl', 'Number of N-95 Mask availabe', 'required|trim');
        $this->form_validation->set_rules('noTLMaskAvlbl', 'Number of Triple Layer Mask available', 'required|trim');
        $this->form_validation->set_rules('noPPEKitAvlbl', 'Number of PPE Kit available', 'required|trim');
        $this->form_validation->set_rules('noIsoBedAvlbl', 'Number of Isolation Beds available', 'required|trim');
        $this->form_validation->set_rules('noVTMKitAvlbl', 'Number of VTM Kits available', 'required|trim');
        $this->form_validation->set_rules('noVentWithNPAvlbl', 'Number of Ventilators with necessary persons available', 'required|trim');
        $this->form_validation->set_rules('nopDepForSpplyES', 'Number of persons deployed for supply of essentials to 3 & 4 point above', 'required|trim');
        $this->form_validation->set_rules('noCovidHosp', 'Number of COVID Hospitals', 'required|trim');
        $this->form_validation->set_rules('noHotelLodgeAcqIso', 'Number of Hotel/ Lodge acquired for Isolation', 'required|trim');
        $this->form_validation->set_rules('noProGearDriver', 'Number of protective gear for driver of Ambulance', 'required|trim');
        $this->form_validation->set_rules('elMortAvlbl', 'Electric Mortuary available', 'required|trim');
        $this->form_validation->set_rules('noICUBed', 'Number of ICU Beds', 'required|trim');
        $this->form_validation->set_rules('noIsoBed', 'Number of Isolation Beds', 'required|trim');
        $this->form_validation->set_rules('noBedCovidPatient', 'Number of beds for COVID patients', 'required|trim');
        $this->form_validation->set_rules('noBedCovidSerPatient', 'Number of beds for COVID serious patients', 'required|trim');
        $this->form_validation->set_rules('noDocTrICU', 'Number of Doctors trained for ICU', 'required|trim');
        $this->form_validation->set_rules('nopTrContTrace', 'Number of trained for Contact Tracing', 'required|trim');
        $this->form_validation->set_rules('cusContaPlanPlace', 'Cluster Containment Plan in Place', 'required|trim');
        $this->form_validation->set_rules('noParamedicTrained', 'Number of Paramedics trained', 'required|trim');
        $this->form_validation->set_rules('noDeathRespProb', 'Number of Deaths due to Respiratory Problems', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $loc = 'department/cs/edit_health_update/' . $this->input->post('cvhId');
            return redirect($loc);
        } else {
            // On Success
            $cvhId = $this->input->post('cvhId');
            $noRetPvtDocTrained = $this->input->post('noRetPvtDocTrained');
            $noPvtHospEnlisted = $this->input->post('noPvtHospEnlisted');
            $nopHQ = $this->input->post('nopHQ');
            $nopGQ = $this->input->post('nopGQ');
            $noHCIsolation = $this->input->post('noHCIsolation');
            $nopStamped = $this->input->post('nopStamped');
            $noN95MaskAvlbl = $this->input->post('noN95MaskAvlbl');
            $noTLMaskAvlbl = $this->input->post('noTLMaskAvlbl');
            $noPPEKitAvlbl = $this->input->post('noPPEKitAvlbl');
            $noIsoBedAvlbl = $this->input->post('noIsoBedAvlbl');
            $noVTMKitAvlbl = $this->input->post('noVTMKitAvlbl');
            $noVentWithNPAvlbl = $this->input->post('noVentWithNPAvlbl');
            $nopDepForSpplyES = $this->input->post('nopDepForSpplyES');
            $noCovidHosp = $this->input->post('noCovidHosp');
            $noHotelLodgeAcqIso = $this->input->post('noHotelLodgeAcqIso');
            $noProGearDriver = $this->input->post('noProGearDriver');
            $elMortAvlbl = $this->input->post('elMortAvlbl');
            $noICUBed = $this->input->post('noICUBed');
            $noIsoBed = $this->input->post('noIsoBed');
            $noBedCovidPatient = $this->input->post('noBedCovidPatient');
            $noBedCovidSerPatient = $this->input->post('noBedCovidSerPatient');
            $noDocTrICU = $this->input->post('noDocTrICU');
            $nopTrContTrace = $this->input->post('nopTrContTrace');
            $cusContaPlanPlace = $this->input->post('cusContaPlanPlace');
            $noParamedicTrained = $this->input->post('noParamedicTrained');
            $noDeathRespProb = $this->input->post('noDeathRespProb');
            $dtofRept = date('Y-m-d'); // Today Date

            // Update data on cvhealth
            $data = array('noRetPvtDocTrained' => $noRetPvtDocTrained, 'noPvtHospEnlisted' => $noPvtHospEnlisted, 'nopHQ' => $nopHQ, 'nopGQ' => $nopGQ, 'noHCIsolation' => $noHCIsolation, 'nopStamped' => $nopStamped, 'noN95MaskAvlbl' => $noN95MaskAvlbl, 'noTLMaskAvlbl' => $noTLMaskAvlbl, 'noPPEKitAvlbl' => $noPPEKitAvlbl, 'noPPEKitAvlbl' => $noPPEKitAvlbl, 'noIsoBedAvlbl' => $noIsoBedAvlbl, 'noVTMKitAvlbl' => $noVTMKitAvlbl, 'noVentWithNPAvlbl' => $noVentWithNPAvlbl, 'nopDepForSpplyES' => $nopDepForSpplyES, 'noCovidHosp' => $noCovidHosp, 'noHotelLodgeAcqIso' => $noHotelLodgeAcqIso, 'noProGearDriver' => $noProGearDriver, 'elMortAvlbl' => $elMortAvlbl, 'noICUBed' => $noICUBed, 'noIsoBed' => $noIsoBed, 'noBedCovidPatient' => $noBedCovidPatient, 'noBedCovidSerPatient' => $noBedCovidSerPatient, 'noDocTrICU' => $noDocTrICU, 'nopTrContTrace' => $nopTrContTrace, 'cusContaPlanPlace' => $cusContaPlanPlace, 'noParamedicTrained' => $noParamedicTrained, 'noDeathRespProb' => $noDeathRespProb, 'dtofRept' => $dtofRept);
            $this->action_redirect_msg(
                $this->mymodel->update_data('cvhId', $cvhId, $data, 'cvhealth'),
                'Health Parameters Record Updated Successfully.',
                'Something went wrong, please try again!',
                'department/cs/health_updation'
            );
        }
    }

    // ILI / SARI
    public function ilisari_update()
    {
        // Load ILI / SARI
        $district = $this->mymodel->fetch_all('testdist'); // For District Dropdown
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_ilisari_dist($currentdate);
        $data = array('district' => $district, 'todayEntries' => $todayEntries);
        $this->load->view('cs/ilisari_update', $data);
    }
    public function insert_ilisari_update()
    {
        // INSERT ILI / SARI
        $this->form_validation->set_rules('dstId', 'District', 'required');
        $this->form_validation->set_rules('idntForty', 'Identified 40+(age)', 'required');
        $this->form_validation->set_rules('idntSari', 'Identified SARI/ILI', 'required');
        $this->form_validation->set_rules('idntScreen', 'Identified for Screening ', 'required');
        $this->form_validation->set_rules('idntImmune', 'Identified for Immunisation', 'required|trim');
        $this->form_validation->set_rules('nopScreenSari', 'Total number of Patient Appeared in Screeening Camp for SARI/ILI', 'required|trim');
        $this->form_validation->set_rules('nopSwabCollec', 'Total Number of Patient Reffered for Swab Collection ', 'required|trim');
        $this->form_validation->set_rules('nopScreenCamp', 'Total Number of Paitent appeared in Screening Camp', 'required|trim');
        $this->form_validation->set_rules('nocImmune', 'Total Number of Children immunised', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail  
            $district = $this->mymodel->fetch_all('testdist'); // For Facility Dropdown
            $currentdate = date('Y-m-d'); // Today Date
            $todayEntries = $this->mymodel->fetch_ilisari_dist($currentdate);
            $data = array('district' => $district, 'todayEntries' => $todayEntries);
            $this->load->view('cs/ilisari_update', $data);
        } else {
            // On Success Save Details in Add Mode   
            $dstId = $this->input->post('dstId');
            $idntForty = $this->input->post('idntForty');
            $idntSari = $this->input->post('idntSari');
            $idntScreen = $this->input->post('idntScreen');
            $idntImmune = $this->input->post('idntImmune');
            $nopScreenSari = $this->input->post('nopScreenSari');
            $nopSwabCollec = $this->input->post('nopSwabCollec');
            $nopScreenCamp = $this->input->post('nopScreenCamp');
            $nocImmune  = $this->input->post('nocImmune');

            $dtofRept = date('Y-m-d'); // Today Date
            if ($this->mymodel->count_data_with_2condition('cvsari', 'dstId',$dstId,'dtofRept', $dtofRept) > 0) {
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.', 'department/cs/ilisari_update');
            } else {
                $data = array('dstId' => $dstId, 'idntForty' => $idntForty, 'idntSari' => $idntSari, 'idntScreen' => $idntScreen, 'idntImmune' => $idntImmune, 'nopScreenSari' => $nopScreenSari, 'nopSwabCollec' => $nopSwabCollec, 'nopScreenCamp' => $nopScreenCamp, 'nocImmune' => $nocImmune, 'dtofRept' => $dtofRept);
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('cvsari', $data),
                    'ILI/SARI Record Inserted Successfully.',
                    'Something went wrong, please try again!',
                    'department/cs/ilisari_update'
                );
            }
        }
    }
    public function edit_ilisari_update($id)
    {
        // Edit  ILI / SARI
        $singleRecord = $this->mymodel->fetch_data('cvsId', $id, 'cvsari');
        $district = $this->mymodel->fetch_all('testdist');
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_ilisari_dist($currentdate);
        $data = array('singleRecord' => $singleRecord, 'todayEntries' => $todayEntries, 'district' => $district);
        $this->load->view('cs/ilisari_update', $data);
    }
    public function update_ilisari_update()
    {
        // Update ILI / SARI
        $this->form_validation->set_rules('dstId', 'District', 'required');
        $this->form_validation->set_rules('idntForty', 'Identified 40+(age)', 'required');
        $this->form_validation->set_rules('idntSari', 'Identified SARI/ILI', 'required');
        $this->form_validation->set_rules('idntScreen', 'Identified for Screening ', 'required');
        $this->form_validation->set_rules('idntImmune', 'Identified for Immunisation', 'required|trim');
        $this->form_validation->set_rules('nopScreenSari', 'Total number of Patient Appeared in Screeening Camp for SARI/ILI', 'required|trim');
        $this->form_validation->set_rules('nopSwabCollec', 'Total Number of Patient Reffered for Swab Collection ', 'required|trim');
        $this->form_validation->set_rules('nopScreenCamp', 'Total Number of Paitent appeared in Screening Camp', 'required|trim');
        $this->form_validation->set_rules('nocImmune', 'Total Number of Children immunised', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //On Validation Fail
            $this->session->set_flashdata('error', 'Something went wrong pls try again..');
            $loc = 'department/cs/edit_ilisari_update' . $this->input->post('cvsId');
            return redirect($loc);
        } else {
            // On Success  
            $cvsId = $this->input->post('cvsId');
            $dstId = $this->input->post('dstId');
            $idntForty = $this->input->post('idntForty');
            $idntSari = $this->input->post('idntSari');
            $idntScreen = $this->input->post('idntScreen');
            $idntImmune = $this->input->post('idntImmune');
            $nopScreenSari = $this->input->post('nopScreenSari');
            $nopSwabCollec = $this->input->post('nopSwabCollec');
            $nopScreenCamp = $this->input->post('nopScreenCamp');
            $nocImmune  = $this->input->post('nocImmune'); // Today Date
            $dtofRept = date('Y-m-d');
            // Update data on cvsari
            $data = array('dstId' => $dstId, 'idntForty' => $idntForty, 'idntSari' => $idntSari, 'idntScreen' => $idntScreen, 'idntImmune' => $idntImmune, 'nopScreenSari' => $nopScreenSari, 'nopSwabCollec' => $nopSwabCollec, 'nopScreenCamp' => $nopScreenCamp, 'nocImmune' => $nocImmune, 'dtofRept' => $dtofRept);
            $this->action_redirect_msg(
                $this->mymodel->update_data('cvsId', $cvsId, $data, 'cvsari'),
                'ILI/SARI Record Updated Successfully.',
                'Something went wrong, please try again!',
                'department/cs/ilisari_update'
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

    // Reports 

    // Inventory Report
    public function inventory_report(){
        // Load Inventory Report
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard = date("d-m-Y", strtotime($currentdate));
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'inventory');
        $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
        $this->load->view('cs/inventory_report', $data);
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
            $this->load->view('cs/inventory_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept', $reportdate, 'inventory');
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('cs/inventory_report', $data);
        }
    }

    // Doctor Availability Report
    public function doctor_availability_report(){
        // Load Doctor Availability Report
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard = date("d-m-Y", strtotime($currentdate));
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept', $currentdate, 'dctravail');
        $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
        $this->load->view('cs/doctor_availability_report', $data);
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
            $this->load->view('cs/doctor_availability_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept', $reportdate, 'dctravail');
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('cs/doctor_availability_report', $data);
        }
    }

    // Essential Services at Quarantine Center
    public function es_quarantine_report(){
        // Load Essential Services at Quarantine Center Report
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard = date("d-m-Y", strtotime($currentdate));
        $todayEntries = $this->mymodel->fetch_qc($currentdate);
        $data = array('todayEntries' => $todayEntries, 'showdateonCard' => $showdateonCard);
        $this->load->view('cs/es_quarantine_report', $data);
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
            $this->load->view('cs/es_quarantine_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_qc($reportdate);
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('cs/es_quarantine_report', $data);
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
        $this->load->view('cs/health_report', $data);
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
            $this->load->view('cs/health_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_data_result('dtofRept', $reportdate, 'cvhealth');
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('cs/health_report', $data);
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
        $this->load->view('cs/ilisari_report', $data);
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
            $this->load->view('cs/ilisari_report', $data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate = date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard = date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries = $this->mymodel->fetch_ilisari_dist($reportdate);
            $data = array('todayEntries' => $showEntries, 'showdateonCard' => $showdateonCard);
            $this->load->view('cs/ilisari_report', $data);
        }
    }    
}
