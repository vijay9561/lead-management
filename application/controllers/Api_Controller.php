<?php
class Api_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        date_default_timezone_set('Asia/Kolkata');
    }
    public function generateByMicrotime()
    {
        $microtime = str_replace('.', '', microtime(true));
        return (substr($microtime, 0, 14));
    }
    public function registration_employee()
    {

        $full_name = trim($this->input->post('full_name'));
        $mobile_no = trim($this->input->post('mobile_no'));
        $email_address = trim($this->input->post('email_address'));
        $password = trim($this->input->post('password'));
        $location = trim($this->input->post('location'));
        $role = trim($this->input->post('role'));

        $table = 'tbl_registration';
        $field = 'id';
        $condition_username = "email_address='$email_address'";
        $duplicate_username = $this->GenericModel->get_record_with_condition($table, $field, $condition_username);
        $array = array();

        if (count($duplicate_username) >= 1) {
            $array = array('code' => 400, 'message' => 'This email id already register');
        } elseif (empty($full_name)) {
            $array = array('code' => 400, 'message' => 'Please enter full name');
        } elseif (empty($password)) {
            $array = array('code' => 400, 'message' => 'Please enter password');
        } elseif (empty($mobile_no)) {
            $array = array('code' => 400, 'message' => 'Please enter mobile number');
        } else {
            $insert_array = array('full_name' => $full_name, 'mobile_no' => $mobile_no, 'email_address' => $email_address, 'password' => md5($password), 'created_date' => date('Y-m-d H:i:s'), 'user_type' => 'Employee', 'status' => 'active', 'location' => $location, 'role' => $role);
            $con = $this->GenericModel->insert_generic_record($table, $insert_array);
            if ($con == 'Error') {
                $array = array('code' => 400, 'message' => 'Some thing went wrong');
            } else {
                $array = array('code' => 200, 'message' => 'Employee register successfully..');
                $this->session->set_userdata('success', 'Employee register successfully');
            }
        }
        echo json_encode($array);
    }
    public function change_status_employee()
    {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $status = '';
        if ($type == 1) {
            $status = 'inactive';
        } else {
            $status = 'active';
        }
        $query = $this->db->query("update  tbl_registration set status='$status' where id='$id'");
        if ($query == true) {
            $this->session->set_userdata('success', 'Status Changed Successfully');
            echo json_encode(array('message' => 'update successfull', 'code' => 200));
        } else {
            echo json_encode(array('message' => 'update unsccessfull', 'code' => 400));
        }
    }
    public function updates_employee()
    {
        $full_name = trim($this->input->post('full_name'));
        $mobile_no = trim($this->input->post('mobile_no'));
        $email_address = trim($this->input->post('email_address'));
        $location = trim($this->input->post('location'));
        $role = trim($this->input->post('role'));
        $id = trim($this->input->post('id'));
        $insert_array = array('full_name' => $full_name, 'mobile_no' => $mobile_no, 'email_address' => $email_address, 'location' => $location, 'role' => $role);
        $where = 'id=' . $id;
        $con = $this->GenericModel->update_generic_record('tbl_registration', $insert_array, $where);
        if ($con == 'Error') {
            $array = array('code' => 400, 'message' => 'Some thing went wrong');
            echo json_encode($array);
            exit;
        } else {
            $this->session->set_userdata('success', 'Employee information updated successfully..');
            $array = array('code' => 200, 'message' => 'Employee information updated successfully..');
        }
        echo json_encode($array);
    }

    public function lead_creation_process_employee()
    {

        $info = $this->input->post();
        $customer_name = trim($info['customer_name']);
        $company_name = trim($info['company_name']);
        $city = trim($info['city']);
        $mobile_no = trim($info['mobile_no']);
        $state = trim($info['state']);
        $description = trim($info['description']);
        $secondary_mobile_no = trim($info['secondary_mobile_no']);
        $email_id = trim($info['email_id']);
        $lead_source = trim($info['lead_source']);
        $requirement = trim($info['requirement']);
        $status = trim($info['status']);
        $lead_ids = time();

        $to_user = $this->GenericModel->get_record_with_condition("tbl_registration", "full_name,id", "user_type='Admin'");
        $from_userid = $this->session->userdata('ADMIN_ID');
        $to_userid = $to_user[0]->id;
        $from_username = $this->session->userdata('USERNAME');
        $to_username = $to_user[0]->full_name;

        $insert_array = array('customer_name' => $customer_name, 'company_name' => $company_name, 'city' => $city, 'mobile_no' => $mobile_no, 'state' => $state, 'secondary_mobile_no' => $secondary_mobile_no, 'lead_source' => $lead_source, 'email_id' => $email_id, 'requirement' => $requirement, 'description' => $description, 'status' => $status, 'userid' => $from_userid, 'created_date' => date('Y-m-d H:i:s'), 'lead_id' => $lead_ids, 'assigned_by' => $from_username, 'assigned_to' => $from_username);
        $con = $this->GenericModel->insert_generic_record('tbl_lead', $insert_array);
        if ($con == 'Error') {
            $array = array('code' => 400, 'message' => 'Some thing went wrong');
            echo json_encode($array);
            exit;
        } else {
            $lead_id = $con;
            $Notification_type = 'Lead';
            $message = '<b style="color:green">' . $from_username . '</b> This Employee Created New Lead';
            $notification = array('from_username' => $from_username, 'to_username' => $to_username, 'from_userid' => $from_userid, 'to_userid' => $to_userid, 'message' => $message, 'view' => '0', 'created_date' => date('Y-m-d H:i:s'), 'status' => 'active', 'lead_id' => $lead_id, 'Notification_type' => $Notification_type);
            $con = $this->GenericModel->insert_generic_record('tbl_notification', $notification);
            $this->session->set_userdata('success', 'Lead Created successfully..');
            $array = array('code' => 200, 'message' => 'Lead Created successfully..');
        }
        echo json_encode($array);
    }

    public function update_creation_process_employee()
    {

        $info = $this->input->post();
        $customer_name = trim($info['customer_name']);
        $company_name = trim($info['company_name']);
        $city = trim($info['city']);
        $mobile_no = trim($info['mobile_no']);
        $state = trim($info['state']);
        $description = trim($info['description']);
        $secondary_mobile_no = trim($info['secondary_mobile_no']);
        $email_id = trim($info['email_id']);
        $lead_source = trim($info['lead_source']);
        $requirement = trim($info['requirement']);
        $status = trim($info['status']);

        $to_user = $this->GenericModel->get_record_with_condition("tbl_registration", "full_name", "user_type='Admin'");
        $from_userid = $this->session->userdata('ADMIN_ID');
        $to_userid = $userid;
        $from_username = $this->session->userdata('USERNAME');
        $to_username = $to_user[0]->full_name;

        $lead_ids = time();
        $id = $info['id'];
        $insert_array = array('customer_name' => $customer_name, 'company_name' => $company_name, 'city' => $city, 'mobile_no' => $mobile_no, 'state' => $state, 'secondary_mobile_no' => $secondary_mobile_no, 'lead_source' => $lead_source, 'email_id' => $email_id, 'requirement' => $requirement, 'description' => $description, 'status' => $status, 'assigned_by' => $from_username, 'assigned_to' => $to_username);
        $where = 'id=' . $id;
        $con = $this->GenericModel->update_generic_record('tbl_lead', $insert_array, $where);
        if ($con == 'Error') {
            $array = array('code' => 400, 'message' => 'Some thing went wrong');
            echo json_encode($array);
            exit;
        } else {
            /* $lead_id=$id;
            $Notification_type='Lead';
            $to_user=$this->GenericModel->get_record_with_condition("tbl_registration","full_name","id='".$userid."'");
            $from_userid=$this->session->userdata('ADMIN_ID'); $to_userid=$userid;
            $from_username=$this->session->userdata('USERNAME'); $to_username=$to_user[0]->full_name;
            $message='<b style="color:green">'.$title.'</b> This Lead Updated By '.$from_username;
            $notification=array('from_username'=>$from_username,'to_username'=>$to_username,'from_userid'=>$from_userid,'to_userid'=>$to_userid,'message'=>$message,'view'=>'0','created_date'=>date('Y-m-d H:i:s'),'status'=>'active','lead_id'=>$lead_id,'Notification_type'=>$Notification_type);
            $con=$this->GenericModel->insert_generic_record('tbl_notification',$notification);*/
            $this->session->set_userdata('success', 'Lead Updated successfully..');
            $array = array('code' => 200, 'message' => 'Lead Updated successfully..');
        }
        echo json_encode($array);
    }

    public function lead_creation_process()
    {

        $info = $this->input->post();
        $customer_name = trim($info['customer_name']);
        $company_name = trim($info['company_name']);
        $city = trim($info['city']);
        $mobile_no = trim($info['mobile_no']);
        $state = trim($info['state']);
        $description = trim($info['description']);
        $secondary_mobile_no = trim($info['secondary_mobile_no']);
        $email_id = trim($info['email_id']);
        $lead_source = trim($info['lead_source']);
        $requirement = trim($info['requirement']);
        $status = trim($info['status']);
        $userid = trim($info['userid']);
        $lead_ids = time();

        $to_user = $this->GenericModel->get_record_with_condition("tbl_registration", "full_name", "id='" . $userid . "'");
        $from_userid = $this->session->userdata('ADMIN_ID');
        $to_userid = $userid;
        $from_username = $this->session->userdata('USERNAME');
        $to_username = $to_user[0]->full_name;

        $insert_array = array('customer_name' => $customer_name, 'company_name' => $company_name, 'city' => $city, 'mobile_no' => $mobile_no, 'state' => $state, 'secondary_mobile_no' => $secondary_mobile_no, 'lead_source' => $lead_source, 'email_id' => $email_id, 'requirement' => $requirement, 'description' => $description, 'status' => $status, 'userid' => $userid, 'created_date' => date('Y-m-d H:i:s'), 'lead_id' => $lead_ids, 'assigned_by' => $from_username, 'assigned_to' => $to_username);
        $con = $this->GenericModel->insert_generic_record('tbl_lead', $insert_array);
        if ($con == 'Error') {
            $array = array('code' => 400, 'message' => 'Some thing went wrong');
            echo json_encode($array);
            exit;
        } else {
            $lead_id = $con;
            $Notification_type = 'Lead';
            $message = '<b style="color:green">Lead ID ' . $lead_ids . '</b> This Lead Assign you';
            $notification = array('from_username' => $from_username, 'to_username' => $to_username, 'from_userid' => $from_userid, 'to_userid' => $to_userid, 'message' => $message, 'view' => '0', 'created_date' => date('Y-m-d H:i:s'), 'status' => 'active', 'lead_id' => $lead_id, 'Notification_type' => $Notification_type);
            $con = $this->GenericModel->insert_generic_record('tbl_notification', $notification);
            $this->session->set_userdata('success', 'Lead Created successfully..');
            $array = array('code' => 200, 'message' => 'Lead Created successfully..');
        }
        echo json_encode($array);
    }

    public function update_creation_process()
    {

        $info = $this->input->post();

        $customer_name = trim($info['customer_name']);
        $company_name = trim($info['company_name']);
        $city = trim($info['city']);
        $mobile_no = trim($info['mobile_no']);
        $state = trim($info['state']);
        $description = trim($info['description']);
        $secondary_mobile_no = trim($info['secondary_mobile_no']);
        $email_id = trim($info['email_id']);
        $lead_source = trim($info['lead_source']);
        $requirement = trim($info['requirement']);
        $status = trim($info['status']);
        $userid = trim($info['userid']);

        $to_user = $this->GenericModel->get_record_with_condition("tbl_registration", "full_name", "id='" . $userid . "'");
        $from_userid = $this->session->userdata('ADMIN_ID');
        $to_userid = $userid;
        $from_username = $this->session->userdata('USERNAME');
        $to_username = $to_user[0]->full_name;

        $lead_ids = time();
        $id = $info['id'];
        $insert_array = array('customer_name' => $customer_name, 'company_name' => $company_name, 'city' => $city, 'mobile_no' => $mobile_no, 'state' => $state, 'secondary_mobile_no' => $secondary_mobile_no, 'lead_source' => $lead_source, 'email_id' => $email_id, 'requirement' => $requirement, 'description' => $description, 'status' => $status, 'userid' => $userid, 'assigned_by' => $from_username, 'assigned_to' => $to_username);
        $where = 'id=' . $id;
        $con = $this->GenericModel->update_generic_record('tbl_lead', $insert_array, $where);
        if ($con == 'Error') {
            $array = array('code' => 400, 'message' => 'Some thing went wrong');
            echo json_encode($array);
            exit;
        } else {
            /* $lead_id=$id;
            $Notification_type='Lead';
            $to_user=$this->GenericModel->get_record_with_condition("tbl_registration","full_name","id='".$userid."'");
            $from_userid=$this->session->userdata('ADMIN_ID'); $to_userid=$userid;
            $from_username=$this->session->userdata('USERNAME'); $to_username=$to_user[0]->full_name;
            $message='<b style="color:green">'.$title.'</b> This Lead Updated By '.$from_username;
            $notification=array('from_username'=>$from_username,'to_username'=>$to_username,'from_userid'=>$from_userid,'to_userid'=>$to_userid,'message'=>$message,'view'=>'0','created_date'=>date('Y-m-d H:i:s'),'status'=>'active','lead_id'=>$lead_id,'Notification_type'=>$Notification_type);
            $con=$this->GenericModel->insert_generic_record('tbl_notification',$notification);*/
            $this->session->set_userdata('success', 'Lead Updated successfully..');
            $array = array('code' => 200, 'message' => 'Lead Updated successfully..');
        }
        echo json_encode($array);
    }
    public function submitted_your_commenting()
    {
        $array = array();
        $info = $this->input->post();
        $lead_id = trim($info['lead_id']);
        $lead_title = trim($info['lead_title']);
        $comment = trim($info['comment']);
        $lead_statuss = trim($info['lead_statuss']);
        $userid = trim($info['userid']);
        $lead_id_ID = trim($info['lead_id_ID']);
        $lead_getting = $this->GenericModel->get_record_with_condition("tbl_comment", "id", "lead_id='" . $lead_id . "'");
        $to_userid = '';
        $to_username = '';
        if ($this->session->userdata('USERTYPE') == 'Admin') {
            $to_user = $this->GenericModel->get_record_with_condition("tbl_registration", "full_name", "id='" . $userid . "'");
            $to_userid = $userid;
            $to_username = $to_user[0]->full_name;
        } else {
            $to_user = $this->GenericModel->get_record_with_condition("tbl_registration", "full_name,id", "user_type='Admin'");
            $to_userid = $to_user[0]->id;
            $to_username = $to_user[0]->full_name;
        }
        $from_username = $this->session->userdata('USERNAME');
        $from_userid = $this->session->userdata('ADMIN_ID');
        $Notification_type = 'Lead';
        $message = '<b style="color:green">ID ID' . $lead_id_ID . '</b> Commented';
        $notification = array('from_username' => $from_username, 'to_username' => $to_username, 'from_userid' => $from_userid, 'to_userid' => $to_userid, 'message' => $message, 'view' => '0', 'created_date' => date('Y-m-d H:i:s'), 'status' => 'active', 'lead_id' => $lead_id, 'Notification_type' => $Notification_type);
        $con = $this->GenericModel->insert_generic_record('tbl_notification', $notification);

        if (count($lead_getting) <= 100) {
            $from_username = $this->session->userdata('USERNAME');
            $from_userid = $this->session->userdata('ADMIN_ID');
            $comment_array = array('username' => $from_username, 'userid' => $from_userid, 'comment' => $comment, 'status' => $lead_statuss, 'created_date' => date('Y-m-d H:i:s'), 'lead_id' => $lead_id);
            $con = $this->GenericModel->insert_generic_record('tbl_comment', $comment_array);

            if ($con == 'Error') {
                $array = array('code' => 400, 'message' => 'Your submitted data is inconsistent. Please contact to globallianz');
            } else {
                $lead_array = array('status' => $lead_statuss);
                $where = 'id=' . $lead_id;
                $this->GenericModel->update_generic_record('tbl_lead', $lead_array, $where);
                $data['data'] = $this->GenericModel->get_record_with_condition("tbl_comment", "*", "lead_id='" . $lead_id . "' order by id desc");
                $datas = $this->load->view('admin/site/ajax_loan_comment', $data, true);
                $array = array('code' => 200, 'message' => 'Comment Submitted Successfully', 'comments' => $datas);
            }
        } else {
            $array = array('code' => 400, 'message' => 'Your are already 100 comment is reach');
        }
        echo json_encode($array);
    }
    public function get_notification_users()
    {
        $from_userid = $this->session->userdata('ADMIN_ID');
        $data['data'] = $this->GenericModel->get_record_with_condition("tbl_notification", "*", "to_userid='" . $from_userid . "' order by id desc limit 1,3");
        echo $this->load->view('admin/site/notification', $data, true);

    }
    public function update_notification_count()
    {
        $from_userid = $this->session->userdata('ADMIN_ID');
        $where = 'to_userid=' . $from_userid . ' and view=0';
        $insert_array = array('view' => 1);
        $con = $this->GenericModel->update_generic_record('tbl_notification', $insert_array, $where);
        if ($con == 'Error') {
            $array = array('code' => 400, 'message' => 'Your are already 100 comment is reach');
        } else {
            $array = array('code' => 200, 'message' => 'success');
        }
        echo json_encode($array);
    }

    public function backend_curl_execute()
    {

        // echo 'Hi'; exit;
        // exit;
        $start_time = date("d-M-Y H:i:m", strtotime('-8 day'));
        $end_time = date('d-M-Y H:i:m');
        $start_time = $start_time;
        $end_time = $end_time;
        $ch = curl_init();
//  $urls= "https://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/7507012305/GLUSR_MOBILE_KEY/MTU4NDAyNTY0OC4yNTM5IzIzMTE4MjY=/Start_Time/$start_time/End_Time/$end_time/";
        $urls = 'http://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/7507012305/GLUSR_MOBILE_KEY/MTU4NDAyNTY0OC4yNTM5IzIzMTE4MjY=/Start_Time/' . urlencode($start_time) . '/End_Time/' . urlencode($end_time) . '/';
        $headers = array('Accept: application/json', 'Content-Type: application/json');
        $url = $urls;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $return = curl_exec($ch);
        echo '<pre>';
        print_r($return);
        $array = json_decode($return);
        if (!empty($array[0]->Error_Message)) {
            echo $array[0]->Error_Message;
        } else {
            if (count($array) >= 1) {
                foreach ($array as $key => $value) {
                    $rn = $value->RN;
                    $QUERY_ID = $value->QUERY_ID;
                    $SUBJECT = $value->SUBJECT;
                    $DATE_TIME_RE = $value->DATE_TIME_RE;
                    $GLUSR_USR_COMPANYNAME = $value->GLUSR_USR_COMPANYNAME;
                    $PRODUCT_NAME = $value->PRODUCT_NAME;
                    $ENQ_CITY = $value->ENQ_CITY;
                    $ENQ_STATE = $value->ENQ_STATE;
                    $ENQ_ADDRESS = $value->ENQ_ADDRESS;
                    $ENQ_MESSAGE = $value->ENQ_MESSAGE;
                    $SENDERNAME = $value->SENDERNAME;
                    $MOB = $value->MOB;
                    $MOBILE_ALT = $value->MOBILE_ALT;
                    $SENDEREMAIL = $value->SENDEREMAIL;
                    $ENQ_MESSAGE = $value->ENQ_MESSAGE;
                    $address = $value->ENQ_ADDRESS;
                    $DATE_TIME_RE = date('Y-m-d H:i:s', strtotime($value->DATE_TIME_RE));
                    $tbl_leads = $this->GenericModel->get_record_with_condition("tbl_lead", "id", "lead_id='" . $QUERY_ID . "'");
                    $array = array();

                    if (count($tbl_leads) == 0) {
                        $tbl_registration = $this->GenericModel->get_record_with_condition("tbl_registration", "full_name,id", "user_type='Employee' ORDER BY rand() LIMIT 1");
                        $tbl_lead = array('lead_id' => $QUERY_ID, 'customer_name' => $SENDERNAME, 'company_name' => $GLUSR_USR_COMPANYNAME, 'city' => $ENQ_CITY, 'state' => $ENQ_STATE, 'mobile_no' => $MOB, 'secondary_mobile_no' => $MOBILE_ALT, 'email_id' => $SENDEREMAIL, 'requirement' => $SUBJECT, 'description' => $ENQ_MESSAGE, 'lead_source' => 'Indiamart', 'created_date' => $DATE_TIME_RE, 'status' => 'Not Contacted', 'address' => $address, 'userid' => $tbl_registration[0]->id, 'assigned_by' => 'India Mart', 'assigned_to' => $tbl_registration[0]->full_name);
                        $con = $this->GenericModel->insert_generic_record('tbl_lead', $tbl_lead);

                        $lead_id = $con;
                        $Notification_type = 'Lead';
                        $to_userid = $tbl_registration[0]->id;
                        $to_username = $tbl_registration[0]->full_name;
                        // Employeer Send notification
                        $message = '<b style="color:green">Lead ID ' . $QUERY_ID . '</b> India Mart Lead Assing You';
                        $notification = array('from_username' => 'Admin', 'to_username' => $to_username, 'from_userid' => 1, 'to_userid' => $to_userid, 'message' => $message, 'view' => '0', 'created_date' => date('Y-m-d H:i:s'), 'status' => 'active', 'lead_id' => $lead_id, 'Notification_type' => $Notification_type);
                        $con = $this->GenericModel->insert_generic_record('tbl_notification', $notification);
                        // Admin Send Notification
                        $message = '<b style="color:green">Lead ID ' . $QUERY_ID . '</b> India Mart Lead Assign To ' . $to_username . ' This Employee';
                        $notification = array('from_username' => 'India Mart', 'to_username' => 'Admin', 'from_userid' => 1, 'to_userid' => 1, 'message' => $message, 'view' => '0', 'created_date' => date('Y-m-d H:i:s'), 'status' => 'active', 'lead_id' => $lead_id, 'Notification_type' => $Notification_type);
                        $con = $this->GenericModel->insert_generic_record('tbl_notification', $notification);

                    }
                }
                echo 'success';
            }
        }
        curl_close($ch);
    }

    public function submit_leadwise_status()
    {
        $array = array();
        $info = $this->input->post();
        $lead_id = trim($info['lead_id']);
        $status_id=trim($info['status_id']);
        $lead_status = $this->GenericModel->get_record_with_condition("tbl_status", "id,status", "id='" . $status_id. "'");
        $tbl_lead = $this->GenericModel->get_record_with_condition("tbl_lead", "userid,lead_source", "id='" . $lead_id. "'");
       
        $lead_title = trim($info['lead_source']);
        $comment = trim($info['comment']);
        $lead_statuss = trim($lead_status[0]->status);
        $userid = $tbl_lead[0]->userid;
        $lead_id_ID = trim($info['lead_id']);
        $to_userid = '';
        $to_username = '';
        if ($this->session->userdata('USERTYPE') == 'Admin') {
            $to_user = $this->GenericModel->get_record_with_condition("tbl_registration", "full_name", "id='" . $userid . "'");
           
            $to_userid = $userid;
            $to_username = $to_user[0]->full_name;
        } else {
            $to_user = $this->GenericModel->get_record_with_condition("tbl_registration", "full_name,id", "user_type='Admin'");
            $to_userid = $to_user[0]->id;
            $to_username = $to_user[0]->full_name;
        }
        $from_username = $this->session->userdata('USERNAME');
        $from_userid = $this->session->userdata('ADMIN_ID');
        $Notification_type = 'Lead';
        $message = '<b style="color:green">ID ID' . $lead_id_ID . '</b> Commented';
        $notification = array('from_username' => $from_username, 'to_username' => $to_username, 'from_userid' => $from_userid, 'to_userid' => $to_userid, 'message' => $message, 'view' => '0', 'created_date' => date('Y-m-d H:i:s'), 'status' => 'active', 'lead_id' => $lead_id, 'Notification_type' => $Notification_type);
        $con = $this->GenericModel->insert_generic_record('tbl_notification', $notification);

        if (count($lead_getting) <= 100) {
            $from_username = $this->session->userdata('USERNAME');
            $from_userid = $this->session->userdata('ADMIN_ID');
            $comment_array = array('username' => $from_username, 'userid' => $from_userid, 'comment' => $comment, 'status' => $lead_statuss, 'created_date' => date('Y-m-d H:i:s'), 'lead_id' => $lead_id);
            $con = $this->GenericModel->insert_generic_record('tbl_comment', $comment_array);

            if ($con == 'Error') {
                $array = array('code' => 400, 'message' => 'Your submitted data is inconsistent. Please contact to globallianz');
            } else {
                $lead_array = array('status' => $lead_statuss);
                $where = 'id=' . $lead_id;
                $this->GenericModel->update_generic_record('tbl_lead', $lead_array, $where);
                $array = array('code' => 200, 'message' => 'Comment Submitted Successfully', 'comments' => $datas);
                $this->session->set_userdata('success', 'Lead status changed successfully..');
            }
        } else {
            $array = array('code' => 400, 'message' => 'Your are already 100 comment is reach');
        }
        echo json_encode($array);
    }

    public function view_get_lead_details(){
        $lead_id=$this->input->post('id');
        $data['data'] = $this->GenericModel->get_record_with_condition("tbl_comment", "*", "lead_id='" . $lead_id . "' order by id desc");
        echo $this->load->view('admin/site/ajax_loan_comment', $data, true); 
    }
}
