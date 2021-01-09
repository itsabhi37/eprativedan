<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
	public function index()
	{
        if($this->session->userdata('logged_user_userid') && $this->session->userdata('logged_user_role')=='Super Admin'){
            return redirect('superadmin/dashboard');
        }

        if($this->session->userdata('logged_user_userid') && $this->session->userdata('logged_user_role')=='Data Entry Operator' && $this->session->userdata('logged_user_department')){
            // Redirect to Specific Department Dashboard
            $this->mymodel->get_department_info($this->session->userdata('logged_user_department'));
        }
        //return redirect('home');
        $this->session->unset_userdata('success');
		$this->load->view('login');
	}
    
    public function verify_login(){
       
        $this->form_validation->set_rules('txtUserId', 'Username', 'required|trim');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');        
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error', validation_errors());
                return redirect('home');
        }
        else{
                // On Success
                $username=$this->input->post('txtUserId');
                $password=$this->input->post('txtPassword');             
                            
                $userDetails=$this->mymodel->validate_login($username,$password); 

                if($userDetails->role=='Super Admin'){
                    // valid credential. If logged user is Super Admin
                    $this->session->set_userdata('logged_user_userid',$userDetails->userid);
                    $this->session->set_userdata('logged_user_name',$userDetails->name);
                    $this->session->set_userdata('logged_user_department',$userDetails->department);
                    $this->session->set_userdata('logged_user_role',$userDetails->role);
                    
                    return redirect('superadmin/dashboard');
                }
                else if($userDetails->role=='Data Entry Operator'){
                    // valid credential. If logged user is Data Entry Operator
                    $this->session->set_userdata('logged_user_userid',$userDetails->userid);
                    $this->session->set_userdata('logged_user_name',$userDetails->name);
                    $this->session->set_userdata('logged_user_department',$userDetails->department);
                    $this->session->set_userdata('logged_user_role',$userDetails->role);
                    $this->session->set_userdata('blkId',$userDetails->blkId);
                    
                    // Redirect to Specific Department Dashboard
                    if($this->mymodel->get_department_info($this->session->userdata('logged_user_department'))==false){
                        // If Department Id of Logged user is Unkown then it's redirect to login page
                        $this->session->set_flashdata('error','Authentication Failed!');                    
                        $this->load->view('login'); 
                    }                     
                }
                else{
                    // authentication failed.
                    $this->session->set_flashdata('error','Authentication Failed!');
                    return redirect('home');
                }
        }
    }

    public function forgotPassword()
    {    
          $this->session->unset_userdata('OTP');      // Unset OTP Session
          $this->session->unset_userdata('timeout'); // Unset Timeout Session 
          $this->session->unset_userdata('mobile'); // Unset Mobile Session 
          $this->load->view('forgot_password');
    }
    public function send_OTP(){
        $this->form_validation->set_rules('txtMobile', 'Mobile', 'required|trim');
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error', validation_errors());
                return redirect('home/forgotPassword');
        }
        else{
            // On Success
                $mobile=$this->input->post('txtMobile');
                if($this->mymodel->count_data_with_condition('logindetails','mobile',$mobile)==1){
                   // If Mobile Number Matched 
                   $six_digit_random_number = mt_rand(100000, 999999); //Generate OTP
                   $this->session->set_userdata('OTP',$six_digit_random_number); 
                   $this->session->set_userdata('timeout',strtotime('+15 minutes', time())); // Set Session Expire Time Or OTP Expired Time
                   $this->session->set_userdata('mobile',$mobile); 
                   
                    // Send OTP on Mobile                    
                    $authKey = "269550ARB1OFyLTX5c9b546e";
                    /*Multiple mobiles numbers separated by comma*/
                    $mobileNumber = $mobile;
                    /*Your message to send, Add URL encoding here.*/
                    $message = 'Use '.$this->session->userdata('OTP') .' is the One Time Password(OTP) for Reset Password on e-Prativedan Portal. This OTP is valid for 15 minutes.';
                    /*Sender ID,While using route4 sender id should be 6 characters long.*/
                    $senderId = "DCDHAN";                    
                    /*Define route */
                    $route = "route=4";
                    
                    /*Prepare post parameters*/
                    $postData = array(
                    'authkey' => $authKey,
                    'mobiles' => $mobileNumber,
                    'message' => $message,
                    'sender' => $senderId,
                    'route' => $route
                    );
                    
                    /*API URL*/
                    $url="http://sms.nisbusiness.com/api/sendhttp.php";
                    
                   $this->post_to_url($url,$postData);
                    
                   $this->session->set_flashdata('success', 'OTP Sent to your Registered Mobile number!');
                   $data = array('mobile'=>$mobile); 
                   $this->load->view('forgot_password',$data);
                }else{
                    // If Mobile Number Not Matched 
                   $this->session->set_flashdata('error', 'Please enter valid Registered Mobile number!');
                   return redirect('home/forgotPassword');
                }
        }
    }
    public function validate_OTP(){
        $this->form_validation->set_rules('txtOTP', 'OTP', 'required|trim');
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error', validation_errors());
                return redirect('home/forgotPassword');
        }
        else{
            $otp=$this->input->post('txtOTP');
            if( time() > $this->session->userdata('timeout')){
                // If Time Exceed then unset OTP Session and redirect to forgotPassword function to reset all the sessions
                $this->session->unset_userdata('OTP');
                $this->session->set_flashdata('error', 'Session Expired, Please try again...!');
                return redirect('home/forgotPassword');
            }
                
            if($otp==$this->session->userdata('OTP')){
                // Valid OTP Inserted
                    return redirect('home/load_changePassword');
                    // redirect to change password page
                }else{
                    $this->session->set_flashdata('error', 'Invalid One Time Password inserted, Please try again...!');
                    return redirect('home/forgotPassword');
                }
        }
    }
    public function load_changePassword(){
        $this->load->view('change_password');
    }
    public function changePassword(){
        // Change Password............
        $this->form_validation->set_rules('txtNewPassword', 'New Password', 'required|trim');
        $this->form_validation->set_rules('txtConfirmPassword', 'Re-Type Password', 'required|trim');
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('error', validation_errors());
                return redirect('home/load_changePassword');
        }else{
            $newPassword=$this->input->post('txtNewPassword');
            $confirmPassword=$this->input->post('txtConfirmPassword');
            if($newPassword!=$confirmPassword){
                $this->session->set_flashdata('error', 'Your New Password & Re-Type Password must be same.');
                return redirect('home/load_changePassword');
            }else{
                $mobile=$this->input->post('txtMobile');
                $confirmPassword=SHA1($confirmPassword);
                
                $data = array('pwd'=>$confirmPassword);                
                $this->action_redirect_msg($this->mymodel->update_data('mobile',$mobile,$data,'logindetails'),
                       'Password Changed Successfully.','Something went wrong, please try again!','home');
            }
        }
    }
    
    public function logout(){
        $this->session->unset_userdata('logged_user_userid');
        $this->session->unset_userdata('logged_user_name');
        $this->session->unset_userdata('logged_user_department');
        $this->session->unset_userdata('logged_user_role');
        return redirect('home');
    }
    public function post_to_url($url,$postData){
        /* init the resource */
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        /*,CURLOPT_FOLLOWLOCATION => true*/
        ));
        /*Ignore SSL certificate verification*/
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        /*get response*/
        $output = curl_exec($ch);
        /*Print error if any*/
        if(curl_errno($ch)){
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
    }
    
    private function action_redirect_msg($actions, $successmsg, $failmsg,$redirectLocation)
    {
        if ($actions) {
            $this->session->set_flashdata('successchng', $successmsg);
        } else {
            $this->session->set_flashdata('error', $failmsg);
        }
        return redirect($redirectLocation);
    }
    
    public function change_password_after_login(){
        //Check whether the current password exist or not
            $password=sha1($this->input->post('current_password'));
            if ($this->mymodel->count_rows(array('pwd', 'userid'), array('pwd' => $password, 'userid' => $this->session->userdata('logged_user_userid')), 'logindetails', '') == 0) 
            {
                echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oops!</strong> Invalid current password eneterd. Try to enter valid password again.</div>';
            }
            else
            {
                $new_password=sha1($this->input->post('new_password'));
                if ($this->mymodel->update_data('userid',$this->session->userdata('logged_user_userid'), array('pwd' => $new_password), 'logindetails') == 1) 
                {
                    echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Wow!</strong> Your password has been changed successfully.</div>';
                }
            }
    }
}