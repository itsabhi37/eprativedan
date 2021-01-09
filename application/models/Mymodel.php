<?php 
class Mymodel extends CI_Model{
    
    public function validate_login($username,$password){
        
        $password=sha1($password); // Encrypted Password
        
        $q=$this->db->where(['userid like binary'=>$username,'pwd like binary'=>$password])
                    ->get('logindetails');
        
        if($q->num_rows()){
            //return $q->row()->user_type;
            return $q->row();
            //return TRUE;
        }
        else {
            return FALSE;
        }
    }
    // Redirect the page to specific department as per Login
    public function get_department_info($department_id){
        switch($department_id){
            case 1:
                return redirect('department/pmch');
                break;
            case 2:
                return redirect('department/idsp');
                break;
            case 3:
                return redirect('department/cs');
                break;
            case 4:
                return redirect('department/admlo');
                break;
            case 5:
                return redirect('department/adms');
                break;
            case 6:
                return redirect('department/sdo');
                break;
            case 7:
                return redirect('department/co');
                break;
            case 8:
                return redirect('department/bdo');
                break;
            case 9:
                return redirect('department/ssc');
                break;
            default:
                return false;
        }
    }
    /* public function getVisitorId($tablename){
        $query = $this->db->query('SELECT uname FROM '.$tablename.' ORDER BY uname DESC LIMIT 1');          
        if(empty($query->result()))
        {
            $vid='JHR'.date("Y").'000001';            
            return $vid;
        }
        else{
            $lastid= $query->row()->uname;
            $onlynumber = substr($lastid, -4);
            $onlynumber=str_pad($onlynumber+1, 6, '0', STR_PAD_LEFT);            
            $vid='JHR'.date("Y").$onlynumber;
            return $vid;
        }
    } */
    public function fetch_all($tablename){
        // fetch all details from Given Table
        $query= $this->db->get($tablename); 
        return $query->result();
        
    }
    
    public function insert_data($tablename,$data){   
        return $this->db->insert($tablename, $data);
    }
    
    public function fetch_data($id,$idvalue,$tablename){
        $query=$this->db->where($id,$idvalue)
                        ->get($tablename);
        return $query->row();
    }

    public function fetch_data_result($id,$idvalue,$tablename){
        $query=$this->db->where($id,$idvalue)
                        ->get($tablename);
        return $query->result();
    }

    //Fetch Truenat Details
    public function fetch_truenat($todaydate){
        // fetch all details from joined PC tables        
        $this->db->select('tt.ttestId, tt.samplesCollectedTillDate, tt.testConductedTillDate, tt.entriesDonePortal,tt.posCaseIdentifyTillDate,tt.samplesCollectedToday,tt.testConductedToday,tt.posIdentifiedToday,tt.dtofRept,ttl.ttlName');
        $this->db->from('trueneattest tt'); 
        $this->db->join('truenattestlab ttl', 'ttl.ttlId=tt.ttlId', 'left');
        $this->db->where('tt.dtofRept',$todaydate);
        $query = $this->db->get();
        
        return $query->result();        
    }

    //Fetch Rtpcr Details
    public function fetch_rtpcr($todaydate){
        // fetch all details from joined PC tables
        $this->db->select('rt.rtpcrTId, rt.opBalPendingSample, rt.sampleRecvdToday, rt.positiveReport,rt.negativeReport,rt.repeatSamplePositive,rt.sampleRejected,rt.sampleTested,rt.clBalSamples,td.dstName');
        $this->db->from('rtpcrtestreport rt'); 
        $this->db->join('testdist td', 'td.dstId=rt.tdstId', 'left');
        $this->db->where('rt.dtofRept',$todaydate);
        $query = $this->db->get();
        
        return $query->result();        
    }

    //Fetch COVID Facility
    public function fetch_cvdfacility($todaydate){
        // fetch all details from joined PC tables
        $this->db->select('cf.cvfId, cf.DCH, cf.DCHC, cf.CCC,cf.noBedInstalled,cf.noBedOccupied,cf.noBedVacant,cfn.cvdFacilityName');
        $this->db->from('cvdfacility cf'); 
        $this->db->join('cvdfailityname cfn', 'cfn.cvfNameId=cf.cvfNameId', 'left');
        $this->db->where('cf.dtofRept',$todaydate);
        $query = $this->db->get();
        
        return $query->result();        
    }

    //Fetch Isolation Facility
    public function fetch_isofacility(){
        // fetch all details from joined PC tables
        $this->db->select('if.ifId, if.noBed, ic.isoCentreName');
        $this->db->from('isolationfacilities if'); 
        $this->db->join('isolationcentre ic', 'ic.isoId=if.isoId', 'left');
        // $this->db->where('cf.dtofRept',$todaydate);
        $query = $this->db->get();
        
        return $query->result();        
    }

    //Fetch Quarantine Center
    public function fetch_qc($todaydate){
        // fetch all details from joined PC tables
        $this->db->select('qc.esqcId, qc.noBed, qc.nopIn,qc.nopCompleted,qc.DwFacility,qc.elecFacility,qc.toiletFacility,qc.foodFacility,cs.csqcName');
        $this->db->from('essentialserviceqc qc'); 
        $this->db->join('csqc cs', 'cs.csqcId=qc.centId', 'left');
        $this->db->where('qc.dtofRept',$todaydate);
        $query = $this->db->get();
        
        return $query->result();        
    }

    public function fetch_co_circle($todaydate){
        // fetch all details from joined PC tables
        $this->db->select('cz.*,bc.blkName');
        $this->db->from('checklistescontzonw cz'); 
        $this->db->join('blockmuncmaster bc', 'bc.blkId=cz.blkcrclId', 'left');
        $this->db->where('cz.dtofRept',$todaydate);
        $this->db->where('blkcrclId',$this->session->userdata('blkId'));
        $query = $this->db->get();
        
        return $query->result();        
    }
	
	public function fetch_co_allcircle($todaydate){
        // fetch all details from joined PC tables
        $this->db->select('cz.*,bc.blkName');
        $this->db->from('checklistescontzonw cz'); 
        $this->db->join('blockmuncmaster bc', 'bc.blkId=cz.blkcrclId', 'left');
        $this->db->where('cz.dtofRept',$todaydate);
        //$this->db->where('blkcrclId',$this->session->userdata('blkId'));
        $query = $this->db->get();
        
        return $query->result();        
    }
    public function fetch_bdo_circle($todaydate){
        // fetch all details from joined PC tables
        $this->db->select('qt.*,bc.blkName');
        $this->db->from('quarantinestatusblockwise qt'); 
        $this->db->join('blockmuncmaster bc', 'bc.blkId=qt.blkId', 'left');
        $this->db->where('qt.dtofRept',$todaydate);
        $this->db->where('qt.blkId',$this->session->userdata('blkId'));
        $query = $this->db->get();
        
        return $query->result();        
    }
	public function fetch_bdo_allcircle($todaydate){
        // fetch all details from joined PC tables
        $this->db->select('qt.*,bc.blkName');
        $this->db->from('quarantinestatusblockwise qt'); 
        $this->db->join('blockmuncmaster bc', 'bc.blkId=qt.blkId', 'left');
        $this->db->where('qt.dtofRept',$todaydate);
        //$this->db->where('qt.blkId',$this->session->userdata('blkId'));
        $query = $this->db->get();
        
        return $query->result();        
    }

    /* public function fetch_data_with_department($id){
        $this->db->select('bd.uname, bd.name,bd.designation,bd.mobile,bd.address,bd.isemployee,dm.name as department');
        $this->db->from('basicdetails bd'); 
        $this->db->where('bd.uname',$id);
        $this->db->join('departmentmaster dm', 'dm.id=bd.department', 'left');
        $query = $this->db->get();        
        return $query->row();
    } */
    
    /* public function fetch_data_with_role($idvalue){
        $this->db->select('ad.id, ad.uname, ad.name,ad.designation, ad.department as departmentid, dm.name as department, ad.districtid,ad.email, ad.mobile, ad.gender, ad.image, ld.user_type');
        $this->db->from('admindetails ad');
        $this->db->where('ad.uname',$idvalue);
        $this->db->join('logindetails ld', 'ad.uname=ld.uname', 'left');
        $this->db->join('departmentmaster dm', 'ad.department=dm.id', 'left');
        $query = $this->db->get();
        
        return $query->row();
    } */

    public function fetch_data_conditional($id,$idvalue,$tablename){
        $query=$this->db->where($id,$idvalue)
                        ->get($tablename);
        return $query->result();       
    }
    
    public function delete_data($id,$idvalue,$tablename){ 
       return $this->db->delete($tablename, [$id=>$idvalue]);
    }
    
    public function update_data($id,$idvalue,Array $data,$tablename){       
        return $this->db
                    ->where($id,$idvalue)
                    ->update($tablename, $data);
    }
    
    public function count_data($tablename){ 
        $query = $this->db->query('SELECT * FROM '.$tablename);
        return $query->num_rows();
    }

    public function get_Sum($fieldtosum,$condition,$conditionvalue,$tablename){
        if($condition=="" && $conditionvalue==""){
            // if condition and condition value is blank
            $query = $this->db->query("SELECT SUM(".$fieldtosum.") as total FROM ".$tablename."");
        }else{
            $query = $this->db->query("SELECT SUM(".$fieldtosum.") as total FROM ".$tablename." WHERE ".$condition."='".$conditionvalue."'");
        }        
       return $query->result();
    }
    public function get_Sum_With_2Condition($fieldtosum,$condition1,$conditionvalue1,$condition2,$conditionvalue2,$tablename){
        // if($condition=="" && $conditionvalue==""){
        //     // if condition and condition value is blank
        //     $query = $this->db->query("SELECT SUM(".$fieldtosum.") as total FROM ".$tablename."");
        // }else{
            $query = $this->db->query("SELECT SUM(".$fieldtosum.") as total FROM ".$tablename." WHERE ".$condition1."='".$conditionvalue1."' AND ".$condition2."='".$conditionvalue2."'");
        // }        
       return $query->result();
    }
    
    /* public function count_outsider(){ 
        $query = $this->db->query('SELECT * FROM checkindetails cd,basicdetails bd WHERE cd.uname=bd.uname and bd.isemployee=0 and cd.todaydate=CURDATE()');
        return $query->num_rows();
    }
    
    public function count_employee(){ 
        $query = $this->db->query('SELECT * FROM checkindetails as cd,basicdetails as bd WHERE cd.uname=bd.uname and bd.isemployee=1 and cd.todaydate=CURDATE()');
        return $query->num_rows();
    } */
    
    /* public function count_with_symptoms(){ 
        $query = $this->db->query('SELECT * FROM checkindetails WHERE symptoms NOT IN (4) and todaydate=CURDATE()');
        return $query->num_rows();
    }
    
    public function recent_checkin($uname){
         $query = $this->db->query("SELECT cd.checkinid,cd.uname,cd.todaydate,sm.symptom_name as symptoms,cd.temperature,dm.name as department,cd.aarogyasetu,cd.visitoutside,cd.visitdate,cd.remarks FROM checkindetails cd,departmentmaster dm,symptoms_master sm WHERE dm.id=cd.department AND cd.symptoms=sm.id AND uname='".$uname."' ORDER BY checkinid DESC LIMIT 1");
        return $query->row();
    } */
    
    public function count_data_with_condition($tablename,$fieldname,$condition){ 
        $query=$this->db->where($fieldname,$condition)
                        ->get($tablename);
        return $query->num_rows();
    }

    public function count_data_with_2condition($tablename,$fieldname1,$condition1,$fieldname2,$condition2){ 
        $query=$this->db->where($fieldname1,$condition1)
                        ->where($fieldname2,$condition2)
                        ->get($tablename);
        return $query->num_rows();
    }

    public function get_info($id,$idvalue,$tablename){ 
        $query=$this->db->where($id,$idvalue)
                        ->get($tablename);
        return $query->row();
    }
    
    public function fetch_user_details(){
        // fetch all details from joined PC tables
        $this->db->select('ld.*,dd.name as department,bm.blkName');
        $this->db->from('logindetails ld'); 
        $this->db->join('departmentdetails dd', 'dd.id=ld.department', 'inner');
        $this->db->join('blockmuncmaster bm', 'ld.blkId=bm.blkId', 'inner');
        $query = $this->db->get();
        
        return $query->result();        
    }
    
    /* public function get_booked_info($todydate,$crnttime){
        $query = $this->db->query("SELECT * FROM bookingdetails WHERE date='".$todydate."' AND '".$crnttime."' BETWEEN time_from AND time_to");
       return $query->result();
    }
    public function get_booked_count($todydate,$crnttime){
        $query = $this->db->query("SELECT * FROM bookingdetails WHERE date='".$todydate."' AND '".$crnttime."' BETWEEN time_from AND time_to");
       return $query->num_rows();
    }
     */
    // This function return no. of bookings in a month this is for chart
    /* public function get_checkin_log($uname){        
        if($uname==""){
            
        $query=$this->db->query("SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', SUM(IF(month = 'Feb', total, 0)) AS 'Feb', SUM(IF(month = 'Mar', total, 0)) AS 'Mar', SUM(IF(month = 'Apr', total, 0)) AS 'Apr', SUM(IF(month = 'May', total, 0)) AS 'May', SUM(IF(month = 'Jun', total, 0)) AS 'Jun', SUM(IF(month = 'Jul', total, 0)) AS 'Jul', SUM(IF(month = 'Aug', total, 0)) AS 'Aug', SUM(IF(month = 'Sep', total, 0)) AS 'Sep', SUM(IF(month = 'Oct', total, 0)) AS 'Oct', SUM(IF(month = 'Nov', total, 0)) AS 'Nov', SUM(IF(month = 'Dec', total, 0)) AS 'Dec' FROM (SELECT DATE_FORMAT(todaydate, '%b') AS month, COUNT(checkinid) as total FROM checkindetails WHERE todaydate <= NOW() and todaydate >= Date_add(Now(),interval - 12 month) GROUP BY DATE_FORMAT(todaydate, '%m-%Y')) as sub");
        
        return $query->result();
        }
        else{
            $query=$this->db->query("SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', SUM(IF(month = 'Feb', total, 0)) AS 'Feb', SUM(IF(month = 'Mar', total, 0)) AS 'Mar', SUM(IF(month = 'Apr', total, 0)) AS 'Apr', SUM(IF(month = 'May', total, 0)) AS 'May', SUM(IF(month = 'Jun', total, 0)) AS 'Jun', SUM(IF(month = 'Jul', total, 0)) AS 'Jul', SUM(IF(month = 'Aug', total, 0)) AS 'Aug', SUM(IF(month = 'Sep', total, 0)) AS 'Sep', SUM(IF(month = 'Oct', total, 0)) AS 'Oct', SUM(IF(month = 'Nov', total, 0)) AS 'Nov', SUM(IF(month = 'Dec', total, 0)) AS 'Dec' FROM (SELECT DATE_FORMAT(todaydate, '%b') AS month, COUNT(checkinid) as total FROM checkindetails WHERE todaydate <= NOW() and todaydate >= Date_add(Now(),interval - 12 month) AND uname='".$uname."' GROUP BY DATE_FORMAT(todaydate, '%m-%Y')) as sub");
            
            return $query->result();
        }
    } */

    // Fetch all Details for Reporting

    /* public function get_all_report_data($vid){
        if(empty($vid)){
            $this->db->select('vd.uname,vd.name,pd.ip,pd.networktype,bd.date,bd.time_from,bd.time_to');
            $this->db->from('bookingdetails bd'); 
            $this->db->join('visitordetails vd', 'vd.uname=bd.uname', 'left');
            $this->db->join('pcdetails pd', 'pd.ip=bd.ip', 'left');       
            $query = $this->db->get(); 
        }
        else{
            $this->db->select('vd.uname,vd.name,pd.ip,pd.networktype,bd.date,bd.time_from,bd.time_to');
            $this->db->from('bookingdetails bd'); 
            $this->db->join('visitordetails vd', 'vd.uname=bd.uname', 'left');
            $this->db->join('pcdetails pd', 'pd.ip=bd.ip', 'left');
            $this->db->where('bd.uname',$vid);       
            $query = $this->db->get(); 
        }
        return $query->result();
    } */

    //Count and return number of rows available in a table
    public function count_rows($fields, $where, $table, $distinct)
    {
        //If distinct variable is not blank and variable has distinct value
        if($distinct != '' && $distinct == 'distinct')
        {
            $this->db->distinct();
            $this->db->select($fields);
        }
        else
        {
            $this->db->select($fields);
        }
        //If where variable is not blank
        if ($where != "") 
        {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return $query->num_rows();
        $query->free_result();
    }

    //Fetch & return data
    public function fill_data($fields, $table, $where, $limit)
    {
        $this->db->select($fields);
        $this->db->from($table);
        //If where variable is not blank
        if($where != "")
        {
           $this->db->where($where); 
        }
        //If limit variable is not blank 
        if ($limit != "") 
        {  
           $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query->result();
        $query->free_result();
    }

    public function fetch_all_by($tablename,$orderby){
        // fetch all details from Given Table and order by 
        $this->db->from($tablename);
        $this->db->order_by($orderby,"asc");
        $query= $this->db->get(); 
        
        return $query->result();
    }
	// Intern Model
	
	public function fetch_ilisari_dist($todaydate){
        // fetch all details from joined PC tables
        $this->db->select('cs.*,ts.dstName');
        $this->db->from('cvsari cs'); 
        $this->db->join('testdist ts', 'ts.dstId=cs.dstId', 'left');
        $this->db->where('cs.dtofRept',$todaydate);
        $query = $this->db->get();
        
        return $query->result();        
    }
    
    // 11 Points Report
    // Start
    
    public function point_one(){
        // Today Report
        $query=$this->db->query("SELECT csqc.csqcId,csqc.csqcName,essentialserviceqc.noBed,essentialserviceqc.nopIn,essentialserviceqc. nopCompleted,essentialserviceqc.dtofRept FROM csqc LEFT JOIN essentialserviceqc ON csqc.csqcId = essentialserviceqc.centId AND essentialserviceqc.dtofRept=CURRENT_DATE() ORDER BY csqc.csqcId ");
        
        return $query->result();
    }
    public function point_one_block(){
        // Today Report
        $query=$this->db->query("SELECT sum(noBedInstalled) as noBedInstalled ,sum(nopGovtQuarantine) as nopGovtQuarantine,sum(nopCompleteQrtn) as nopCompleteQrtn,sum(nopFromOtherCity) as nopFromOtherCity,sum(nopHomeQuarantine) as nopHomeQuarantine,sum(nopStamped) as nopStamped FROM `quarantinestatusblockwise` where dtofRept=CURRENT_DATE()");
        
        //return $query->result();
        return $query->row();
    }
    public function point_five(){
        // Last Updated
        $query=$this->db->query("SELECT * FROM rtndistribution ORDER BY dtofRept DESC LIMIT 1 ");
        //$query=$this->db->query("SELECT * FROM rtndistribution where dtofRept='2020-08-05'");
        return $query->row();
    }
    public function point_six(){
        // Last Updated
        $query=$this->db->query("SELECT * FROM scl_sec ORDER BY dtofRept DESC LIMIT 1");
        //$query=$this->db->query("SELECT * FROM rtndistribution where dtofRept='2020-08-05'");
        return $query->row();
    }
    public function point_eight(){
        // Updated
        $query=$this->db->query("SELECT isoCentreName,noBed FROM isolationcentre LEFT JOIN isolationfacilities ON isolationcentre.isoId  = isolationfacilities.isoId");
        //$query=$this->db->query("SELECT * FROM rtndistribution where dtofRept='2020-08-05'");
        return $query->result();
    }
    public function point_nine($todaydate){
        // Last Updated
        if($todaydate=="Yes"){
            // Today Record
            $query=$this->db->query("SELECT * FROM dctravail WHERE dtofRept=CURRENT_DATE()"); 
        }else{    
            // Last Updated
            $query=$this->db->query("SELECT * FROM dctravail ORDER BY dtofRept DESC LIMIT 1"); 
        }
        //$query=$this->db->query("SELECT * FROM rtndistribution where dtofRept='2020-08-05'");
        return $query->row();
    }
    public function point_ten(){
        // Today Report
        $query=$this->db->query("SELECT noN95MaskAvlbl,noTLMaskAvlbl,noPPEKitAvlbl,noVTMKitAvlbl FROM cvhealth WHERE dtofRept=CURRENT_DATE()");
        //$query=$this->db->query("SELECT * FROM rtndistribution where dtofRept='2020-08-05'");
        return $query->row();
    }
    public function point_ten_inventory(){
        // Today Report
        $query=$this->db->query("SELECT thermalScanner,gloves,sanitizer500ml,sanitizer600ml,sanitizer5L,sanitizer15L FROM inventory WHERE dtofRept=CURRENT_DATE()");
        //$query=$this->db->query("SELECT * FROM rtndistribution where dtofRept='2020-08-05'");
        return $query->row();
    }
    public function point_eleven(){
        // Today Report
        $query=$this->db->query("SELECT noCKOprtdByNGO FROM supply WHERE dtofRept=CURRENT_DATE()");
        //$query=$this->db->query("SELECT * FROM rtndistribution where dtofRept='2020-08-05'");
        return $query->row();
    }
    
    // 11 Points Report
    // End
	
    /* public function fetch_dist(){
        // fetch all details from joined PC tables        
        $this->db->select('dm.id, sm.name as state_name, dm.name');
        $this->db->from('districtmaster dm'); 
        $this->db->join('statemaster sm', 'sm.id=dm.state_id', 'left');
        $query = $this->db->get();
        
        return $query->result();        
    } */

    /* public function fetch_basicdetails(){
        // fetch all details from joined PC tables        
        $this->db->select('bd.uname, bd.name,bd.designation,bd.mobile,bd.address,bd.isemployee,dm.name as department');
        $this->db->from('basicdetails bd'); 
        $this->db->join('departmentmaster dm', 'dm.id=bd.department', 'left');
        $query = $this->db->get();
        
        return $query->result();        
    } */

    /* public function fetch_admindetails(){
        // fetch all details from joined PC tables        
        $this->db->select('ad.id,ad.uname, ad.name,ad.designation,ad.email,ad.mobile,ad.gender,ad.image,dm.name as department');
        $this->db->from('admindetails ad'); 
        $this->db->join('departmentmaster dm', 'dm.id=ad.department', 'left');
        $query = $this->db->get();
        
        return $query->result();        
    }
 */
    /* public function ForgotPassword($email,$usertype)
    {
        if($usertype=="Admin"){
            $this->db->select('email,uname');
            $this->db->from('admindetails');
            $this->db->where('email', $email);
            $query=$this->db->get();
            return $query->row_array();
        }
        if($usertype=="Visitor"){
            $this->db->select('email,uname');
            $this->db->from('visitordetails');
            $this->db->where('email', $email);
            $query=$this->db->get();
            return $query->row_array();
        }        
    } */

    /* public function sendpassword($data)
    {
        $email = $data['email'];
        $uname = $data['uname'];
        $query1=$this->db->query("SELECT *  from logindetails where uname = '".$uname."' ");
        $row=$query1->result_array();

        if ($query1->num_rows()>0){
            $passwordplain = "";
            $passwordplain  = rand(999999999,9999999999);
            $newpass['pwd'] = sha1($passwordplain);
            $this->db->where('uname', $uname);
            $this->db->update('logindetails', $newpass);

            //Mail Code
            $to = $email;
            $subject = "VMS Password Reset";
            $mail_message='Dear '.$row[0]['user_type'].','. "\r\n";
            $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
            $mail_message.='<br>Please Update your password.';
            $mail_message.='<br>Thanks & Regards';
            $mail_message.='<br>Visitor Management System';
            $headers = "From: abhishekkr11693@gmail.com";

            mail($to,$subject,$mail_message,$headers);
            echo "<script>alert('Password sent to your email!')</script>";
            redirect(base_url(),'refresh');
        }else{
            echo "<script>alert('msg','Email not found try again!')</script>";
            redirect(base_url(),'refresh');
        }
    } */

    
    /* public function load_department_wise_visit_model(){
        $sql="SELECT a.counter as counter,b.name as dept_name from (SELECT count(*) as counter,department FROM checkindetails where todaydate=CURDATE() group by department) as a inner join
        departmentmaster as b on a.department=b.id ORDER BY a.counter DESC LIMIT 5";
        $query=$this->db->query($sql);
        return $query->result_array();
    } */
    /* public function load_bar_chart_suspected_model(){
        // $sql="SELECT a.counter as counter,b.name as dept_name from (SELECT count(*) as counter,symptoms,department FROM `checkindetails` where todaydate=CURDATE() and symptoms>0 and temperature>=99 group by symptoms,department) as a inner join
        //departmentmaster as b on a.department=b.id ORDER BY a.counter DESC LIMIT 5"; 
        $sql="select c.counter as counter, c.dept_name as dept_name from (SELECT a.counter as counter,b.name as dept_name from (SELECT count(*) as counter,department FROM checkindetails where  todaydate=CURDATE() and symptoms>1 and temperature>=99 group by department) as a inner join
        departmentmaster as b on a.department=b.id ORDER BY a.counter DESC LIMIT 5) as c order by length(c.dept_name)";
        $query=$this->db->query($sql);
        return $query->result_array();
    }
    public function load_bar_chart_symptoms_model(){
        // $sql="SELECT a.counter as counter,b.name as dept_name from (SELECT count(*) as counter,symptoms,department FROM `checkindetails` where todaydate=CURDATE() and symptoms>0 and temperature>=99 group by symptoms,department) as a inner join
        //departmentmaster as b on a.department=b.id ORDER BY a.counter DESC LIMIT 5"; 
        $sql="SELECT d.counter_symptoms,d.name as dept_name,d.department as dept_id,e.symptom_name,e.id as symptom_id
        FROM ( SELECT b.counter_symptoms,c.name,b.department,b.symptoms FROM (
        SELECT COUNT(*) AS counter_symptoms,department,symptoms FROM checkindetails WHERE department IN( SELECT a.department
        FROM (SELECT COUNT(*) AS counter,department FROM checkindetails WHERE symptoms > 1
        GROUP BY department
        ORDER BY counter DESC LIMIT 5) AS a) AND symptoms > 1 GROUP BY department,symptoms ORDER BY department,symptoms) AS b
        INNER JOIN departmentmaster AS c
        ON b.department = c.id) AS d INNER JOIN symptoms_master AS e ON d.symptoms = e.id ORDER BY d.counter_symptoms DESC,
        dept_id DESC, symptom_id DESC";
        $query=$this->db->query($sql);
        return $query->result_array();
    } */
    
    // Start
    // Query Runner
        public function dqlquery_runner($setquery){
				// Query Start Withs SELECT 
				if(strtoupper(substr($setquery, 0, 7)) === "SELECT "){
					$query=$this->db->query($setquery);
					return $query->result();
				}else{
					
					echo "<script>alert('Please Write Valid SELECT Query Here...');</script>";
				}              
        }		
		public function dmlquery_runner($setquery){
				// Query Start Withs INSERT, DELETE or UPDATE 
				if(strtoupper(substr($setquery, 0, 7)) === "INSERT " || strtoupper(substr($setquery, 0, 7)) === "UPDATE " || strtoupper(substr($setquery, 0, 7)) === "DELETE "){
					$this->db->trans_start();
					$query=$this->db->query($setquery);
					$this->db->trans_complete();
					if ($this->db->trans_status() === FALSE) {
						return "Query Failed";
					} else {
						return "Query Success";
					}
				}else{					
					echo "<script>alert('Please Write Valid INSERT, UPDATE or DELETE Query Here...');</script>";
				} 
        }
		public function ddlquery_runner($setquery){
				// Query Start Withs ALTER, DROP, or CREATE 
				if(strtoupper(substr($setquery, 0, 6)) === "ALTER " || strtoupper(substr($setquery, 0, 5)) === "DROP " || strtoupper(substr($setquery, 0, 7)) === "CREATE "){
					$this->db->trans_start();
					$query=$this->db->query($setquery);
					$this->db->trans_complete();
					if ($this->db->trans_status() === FALSE) {
						return "Query Failed";
					} else {
						return "Query Success";
					}
				}else{					
					echo "<script>alert('Please Write Valid ALTER, DROP, or CREATE Query Here...');</script>";
				} 
        }
    // Query Runner
    // End
}

?>