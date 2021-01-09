<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sdo extends CI_Controller {

    public function __construct(){
        //if user is not logged in then redirect to Login Page       
       parent::__construct();
       if($this->session->userdata('logged_user_role')!="Data Entry Operator" || $this->session->userdata('logged_user_department')!=6){
            // SDO Department Id - 6    
            return redirect('home');
           }
   }

    public function index()
    {
        // SDO Dashboard
       $currentdate = date('Y-m-d'); // Today Date
       $total_piGroceryShop = $this->mymodel->get_Sum('piGroceryShop','dtofRept',$currentdate,'sdo'); // Number of Passes issued to Grocery Shop
       $total_piFruitVegVendor = $this->mymodel->get_Sum('piFruitVegVendor','dtofRept',$currentdate,'sdo'); // Number of Passes issued to Fruits & Vegetable vendors
       $total_piMedia = $this->mymodel->get_Sum('piMedia','dtofRept',$currentdate,'sdo'); // Number of Passes issued to Media
       $total_piMedicalShop = $this->mymodel->get_Sum('piMedicalShop','dtofRept',$currentdate,'sdo'); // Number of Passes issued to Medicine Shops
       $data = array('total_piGroceryShop' => $total_piGroceryShop, 'total_piFruitVegVendor' => $total_piFruitVegVendor,'total_piMedia'=>$total_piMedia,'total_piMedicalShop'=>$total_piMedicalShop);
       $this->load->view('sdo/dashboard', $data);
    } 

    public function sdo_update(){
        //SDO UPDATE PAGE
        $currentdate = date('Y-m-d'); // Today Date
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'sdo');
        $data = array('todayEntries' => $todayEntries);
        $this->load->view('sdo/sdo_update',$data);
    }    
    public function insert_sdo_update(){
        //INSERT INTO SDO TABLE
       $this->form_validation->set_rules('piGroceryShop', 'Number of Passes issued to Grocery Shop', 'required');
       $this->form_validation->set_rules('piFruitVegVendor', 'Number of Passes issued to Fruits & Vegetable vendors', 'required');
       $this->form_validation->set_rules('piMedia', 'Number of Passes issued to Media', 'required');
       $this->form_validation->set_rules('piMedicalShop', 'Number of Passes issued to Medicine Shops', 'required');
       $this->form_validation->set_rules('piWStockist', 'Number of Passes issued to wholesale stockists/ C&F for above, 1, 2 & 4', 'required');
       $this->form_validation->set_rules('piPrintMedia', 'Number of Passes issued to those in supply chain of print media', 'required');
       $this->form_validation->set_rules('piTranspGoods', 'Number of Passes issued for transportation of goods', 'required');
       $this->form_validation->set_rules('piFPS', 'Number of Passes issued to fair price shops', 'required');
       $this->form_validation->set_rules('piMilkShop', 'Number of Passes issued to milk shops', 'required');
       $this->form_validation->set_rules('piShopONE', 'Number of Passes issued to shops selling other notified essentials', 'required');
       $this->form_validation->set_rules('piEssentialServices', 'Number of Passes issued for services like electricity, water supply, telecommunications, municipality and administration', 'required');
       $this->form_validation->set_rules('noMonOfficial', 'Number of officials monitoring all the above', 'required');
       $this->form_validation->set_rules('ndiFlour', 'Number of days of inventory of Flour', 'required');
       $this->form_validation->set_rules('ndiPulse', 'Number of days of inventory of Pulses', 'required');
       $this->form_validation->set_rules('ndiSalt', 'Number of days of inventory of Salt', 'required');
       $this->form_validation->set_rules('ndiSugar', 'Number of days of inventory of Sugar', 'required');
       $this->form_validation->set_rules('ndiEdOil', 'Number of days of inventory of Edible Oil', 'required');
       $this->form_validation->set_rules('noPersonIpHomeDelivery', 'Number of persons issued passes for Home delivery', 'required');
        

            if ($this->form_validation->run() == FALSE) {
             //On Validation Fail  
             $currentdate = date('Y-m-d'); // Today Date
             $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'sdo');
             $data = array('todayEntries' => $todayEntries);
             $this->load->view('sdo/sdo_update', $data);
         } else {
             // On Success Save Details in Add Mode   
             $piGroceryShop = $this->input->post('piGroceryShop');
             $piFruitVegVendor = $this->input->post('piFruitVegVendor');
             $piMedia = $this->input->post('piMedia');
             $piMedicalShop = $this->input->post('piMedicalShop');
             $piWStockist = $this->input->post('piWStockist');
             $piPrintMedia = $this->input->post('piPrintMedia');
             $piTranspGoods = $this->input->post('piTranspGoods');
             $piFPS = $this->input->post('piFPS');
             $piMilkShop = $this->input->post('piMilkShop');
             $piShopONE = $this->input->post('piShopONE');
             $piEssentialServices = $this->input->post('piEssentialServices');
             $noMonOfficial = $this->input->post('noMonOfficial');
             $ndiFlour = $this->input->post('ndiFlour');
             $ndiPulse = $this->input->post('ndiPulse');
             $ndiSalt = $this->input->post('ndiSalt');
             $ndiSugar = $this->input->post('ndiSugar');
             $ndiEdOil = $this->input->post('ndiEdOil');
             $noPersonIpHomeDelivery = $this->input->post('noPersonIpHomeDelivery');

             
             $dtofRept=date('Y-m-d'); // Today Date
            
            if($this->mymodel->count_data_with_condition('sdo','dtofRept',$dtofRept) > 0){
                $this->action_redirect_onMultipleEntry('You Can not Insert Multiple data on same date.','department/sdo/sdo_update');
            }else{
                $data = array('piGroceryShop'=>$piGroceryShop,'piFruitVegVendor'=>$piFruitVegVendor,'piMedia'=>$piMedia,'piMedicalShop'=>$piMedicalShop,'piWStockist'=>$piWStockist,'piPrintMedia'=>$piPrintMedia,'piTranspGoods'=>$piTranspGoods,'piFPS'=>$piFPS,'piMilkShop'=>$piMilkShop,'piShopONE'=>$piShopONE,'piEssentialServices'=>$piEssentialServices,'noMonOfficial'=>$noMonOfficial,'ndiFlour'=>$ndiFlour,'ndiPulse'=>$ndiPulse,'ndiSalt'=>$ndiSalt,'ndiSugar'=>$ndiSugar,'ndiEdOil'=>$ndiEdOil,'noPersonIpHomeDelivery'=>$noPersonIpHomeDelivery,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg(
                    $this->mymodel->insert_data('sdo', $data),
                    'Essential Supply Parameters Records Inserted Successfully.',
                    'Something went wrong, please try again!','department/sdo/sdo_update'
                );
            }             
         }
    }
    public function edit_sdo_update($id){
        // Edit SDO Update
       
        $singleRecord = $this->mymodel->fetch_data('sId',$id,'sdo');
        $currentdate = date('Y-m-d'); // Today Date

        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'sdo');
        $data = array('singleRecord'=>$singleRecord, 'todayEntries' => $todayEntries);
        $this->load->view('sdo/sdo_update', $data);
    }
    public function update_sdo_update(){
        // Update SDO Information Record
       $this->form_validation->set_rules('piGroceryShop', 'Number of Passes issued to Grocery Shop', 'required');
       $this->form_validation->set_rules('piFruitVegVendor', 'Number of Passes issued to Fruits & Vegetable vendors', 'required');
       $this->form_validation->set_rules('piMedia', 'Number of Passes issued to Media', 'required');
       $this->form_validation->set_rules('piMedicalShop', 'Number of Passes issued to Medicine Shops', 'required');
       $this->form_validation->set_rules('piWStockist', 'Number of Passes issued to wholesale stockists/ C&F for above, 1, 2 & 4', 'required');
       $this->form_validation->set_rules('piPrintMedia', 'Number of Passes issued to those in supply chain of print media', 'required');
       $this->form_validation->set_rules('piTranspGoods', 'Number of Passes issued for transportation of goods', 'required');
       $this->form_validation->set_rules('piFPS', 'Number of Passes issued to fair price shops', 'required');
       $this->form_validation->set_rules('piMilkShop', 'Number of Passes issued to milk shops', 'required');
       $this->form_validation->set_rules('piShopONE', 'Number of Passes issued to shops selling other notified essentials', 'required');
       $this->form_validation->set_rules('piEssentialServices', 'Number of Passes issued for services like electricity, water supply, telecommunications, municipality and administration', 'required');
       $this->form_validation->set_rules('noMonOfficial', 'Number of officials monitoring all the above', 'required');
       $this->form_validation->set_rules('ndiFlour', 'Number of days of inventory of Flour', 'required');
       $this->form_validation->set_rules('ndiPulse', 'Number of days of inventory of Pulses', 'required');
       $this->form_validation->set_rules('ndiSalt', 'Number of days of inventory of Salt', 'required');
       $this->form_validation->set_rules('ndiSugar', 'Number of days of inventory of Sugar', 'required');
       $this->form_validation->set_rules('ndiEdOil', 'Number of days of inventory of Edible Oil', 'required');
       $this->form_validation->set_rules('noPersonIpHomeDelivery', 'Number of persons issued passes for Home delivery', 'required');
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error','Something went wrong pls try again..');
                $loc='department/sdo/edit_sdo_update'.$this->input->post('sId');
                return redirect($loc);  
        }
        else{
            // On Success  
            $sId=$this->input->post('sId');  
            $piGroceryShop = $this->input->post('piGroceryShop');
             $piFruitVegVendor = $this->input->post('piFruitVegVendor');
             $piMedia = $this->input->post('piMedia');
             $piMedicalShop = $this->input->post('piMedicalShop');
             $piWStockist = $this->input->post('piWStockist');
             $piPrintMedia = $this->input->post('piPrintMedia');
             $piTranspGoods = $this->input->post('piTranspGoods');
             $piFPS = $this->input->post('piFPS');
             $piMilkShop = $this->input->post('piMilkShop');
             $piShopONE = $this->input->post('piShopONE');
             $piEssentialServices = $this->input->post('piEssentialServices');
             $noMonOfficial = $this->input->post('noMonOfficial');
             $ndiFlour = $this->input->post('ndiFlour');
             $ndiPulse = $this->input->post('ndiPulse');
             $ndiSalt = $this->input->post('ndiSalt');
             $ndiSugar = $this->input->post('ndiSugar');
             $ndiEdOil = $this->input->post('ndiEdOil');
             $noPersonIpHomeDelivery = $this->input->post('noPersonIpHomeDelivery');
             $dtofRept=date('Y-m-d');
                // Update data on sdo
               $data = array('piGroceryShop'=>$piGroceryShop,'piFruitVegVendor'=>$piFruitVegVendor,'piMedia'=>$piMedia,'piMedicalShop'=>$piMedicalShop,'piWStockist'=>$piWStockist,'piPrintMedia'=>$piPrintMedia,'piTranspGoods'=>$piTranspGoods,'piFPS'=>$piFPS,'piMilkShop'=>$piMilkShop,'piShopONE'=>$piShopONE,'piEssentialServices'=>$piEssentialServices,'noMonOfficial'=>$noMonOfficial,'ndiFlour'=>$ndiFlour,'ndiPulse'=>$ndiPulse,'ndiSalt'=>$ndiSalt,'ndiSugar'=>$ndiSugar,'ndiEdOil'=>$ndiEdOil,'noPersonIpHomeDelivery'=>$noPersonIpHomeDelivery,'dtofRept'=>$dtofRept);
            
                $this->action_redirect_msg($this->mymodel->update_data('sId',$sId,$data,'sdo'),
                       'Essential Supply Parameters Records Updated Successfully.','Something went wrong, please try again!','department/sdo/sdo_update');
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

    // Report

     public function sdo_report(){
        // Load SDO report Page
        $currentdate = date('Y-m-d'); // Today Date
        $showdateonCard=date("d-m-Y",strtotime($currentdate)); // Show this date on Card
        $todayEntries = $this->mymodel->fetch_data_result('dtofRept',$currentdate,'sdo');
        $data = array('todayEntries' => $todayEntries,'showdateonCard'=>$showdateonCard);
        $this->load->view('sdo/sdo_report',$data);
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
            $this->load->view('sdo/sdo_report',$data);
        } else {
            // On Success Save Details in Add Mode   
            $reportdate = $this->input->post('txtDate');
            $reportdate=date("Y-m-d", strtotime($reportdate)); // Convert date to YYYY-MM-DD format
            $showdateonCard=date("d-m-Y", strtotime($reportdate)); // Show this date on Card
            $showEntries =  $this->mymodel->fetch_data_result('dtofRept',$reportdate,'sdo');
            $data = array('todayEntries' => $showEntries,'showdateonCard'=>$showdateonCard);
            $this->load->view('sdo/sdo_report',$data);
        }
    }
}