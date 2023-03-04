<?php
/**
 * Coded by: Pritam Khan
 * CI:  3.1.13
 * Date: 21-07-22
 */

class Profile_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function profile() {
        $this->load->helper('form');
        $user_id = $this->session->user_id;
        $data['user_type'] = $this->session->usertype;
        $data['user'] = $this->db->get_where('users', array('user_id' => $user_id))->row();

        $data['title'] = 'User Profile';
        $data['menu'] = 'profile';

        return array('page'=>'profile_v', 'data'=>$data);
    }

    public function form_basic_info() {
        if($this->input->post('submit') == 'submit_basic_info') { //if basic info form submitted
            $user_id = $this->session->user_id;

            $data_update['full_name'] = $this->input->post('fullname');
            $data_update['email'] = $this->input->post('email');
            $data_update['phone'] = $this->input->post('phone');

            if ( ! empty($_FILES) ) {
                $config['upload_path'] = 'assets/uploads/profile_img/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 1024;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('profilepic')) { //if file upload unsuccessful
                    $data['type'] = 'error';
                    $data['title'] = 'Error!';
                    $data['msg'] = $this->upload->display_errors();
                    echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
                    exit();
                } else { //if file upload successful
                    $uploaded_data = $this->upload->data();
                    $data_update['profile_img'] = $uploaded_data['file_name'];
                    $data['profile_img'] = $uploaded_data['file_name'];

                    //deleting old file from server
                    $old_img_name = $this->db->get_where('users', array('user_id' => $user_id))->row()->profile_img;
                    if ($old_img_name) {
                        $this->load->helper("file");
                        $path = 'assets/uploads/profile_img/' . $old_img_name;
                        @unlink($path);
                    }
                }
            }

            //updating user details
            $this->db->where('user_id', $user_id);

            if($this->db->update('users', $data_update)){
                 $data['type'] = 'success';
                 $data['msg'] = 'Profile Updated!';
            }
            //updating lastname in session
            $row = $this->db->get_where('users', array('user_id' => $user_id))->row();
            $email = isset($row->email) ? $row->email : 'N/A';        

            $session_data = array(
                'user_id' => $row->user_id,
                'name' => $row->full_name,
                'username' => $row->user_name,
                'email' => $email,
                'phone' => $row->phone,
                'image' => $row->profile_img,
            );
            $this->session->set_userdata($session_data); //creating session



           
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
            exit();
        } else { //if basic info form not submitted
            redirect(base_url());
        }
    }

    public function form_change_pass() {
        if($this->input->post('submit') == 'submit_change_pass') { //if change pass form submitted
            $current_pass = $this->input->post('current_pass');
            $new_pass = $this->input->post('new_pass');
            $confirm_pass = $this->input->post('confirm_pass');
            $user_id = $this->session->user_id;

            if( $new_pass != $confirm_pass ) { //if new & confirm pass not matched
                $data['type'] = 'error';
                $data['title'] = 'Nope!';
                $data['msg'] = 'New password & Confirm password not matched.';
                echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
            } else { //if new & confirm pass matched
                $current_pass_encrypted = hash('sha256', $current_pass);
                $new_pass_encrypted = hash('sha256', $new_pass);

                //fetching current password from database
                $pass = $this->db->get_where('users', array('user_id' => $user_id))->row()->password;
                if($current_pass_encrypted != $pass) { //if current password not matched
                    $data['type'] = 'error';
                    $data['title'] = 'Nope!';
                    $data['msg'] = 'Current password not matched.';
                    echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
                } else { //if current password matched
                    $this->db->where('user_id', $user_id);
                    $this->db->update('users', array('password' => $new_pass_encrypted));

                    //send password changed mail
                    if($this->session->email != 'N/A' && 1==2) { //if email address exists
                        $website = WEBSITE_NAME;
                        $login_link = base_url("login");

                        $to = $this->session->email;
                        $msg = <<<EOD
                            Hi {$this->session->name},<br/>
                            <h1>Password Changed! =)</h1>
                            From now, you should use your new password to login into your account.<br/>
                            Password: <strong>***even-we-dont-know***</strong><br/>
                            <a href='$login_link' target='_blank'>Click here</a> to login into your account.<br/><br/>
                            Warm regards,<br/> System Bot<br/> $website
EOD;
                        $this->sendmail($to,$msg,'Password Changed');
                    }
                    // /.send password changed mail

                    $data['type'] = 'success';
                    $data['msg'] = 'Password Updated!';
                    echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
                    exit();
                }
            }
        } else { //if change pass form not submitted
            redirect(base_url());
        }
    }

    public function form_change_email() {
        if($this->input->post('submit') == 'submit_change_email') { //if change email form submitted
            $new_email = $this->input->post('new_email');
            $user_id = $this->session->user_id;

            $check_mail_exists = $this->db->get_where('users', array('email' => $new_email))->result_array();
            //if email address already exists
            if(count($check_mail_exists) != 0) {
                $current_email = $this->db->get_where('users', array('user_id' => $user_id))->row()->email;
                if($current_email == $new_email) { //if new email address and current email address is same
                    $data['type'] = 'error';
                    $data['title'] = 'Give Another Email Address!';
                    $data['msg'] = 'This email address is your current email address.';
                    echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
                } else { //if new email address and current email address is not same
                    $data['type'] = 'error';
                    $data['title'] = 'Email Exists!';
                    $data['msg'] = 'This email address is already registered with us, so you can not use it.';
                    echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
                }
            } else { //if email address does not exists
                $verification_key = strtoupper(uniqid('CM'));
                $insert_data = array(
                    'user_id' => $user_id,
                    'otp' => $verification_key,
                    'new_email' => $new_email,
                );
                $this->db->insert('user_change_mails', $insert_data);

                //send mail for change mail link
                $website = WEBSITE_NAME;
                $verification_link = base_url('admin/change_email/'.$verification_key);

                $to = $new_email;
                $msg = <<<EOD
                        Hi {$this->session->name},<br/>
                        <h1>Changing mail address is just one click away...</h1>
                        <a href='$verification_link' target='_blank'>Click here</a> to verify your new email address. =)<br/><br/>
                        Warm regards,<br/> System Bot<br/> $website
EOD;
                $this->sendmail($to,$msg,'Confirm New Email Address');
                // /.//send mail for change mail link

                $data['type'] = 'success';
                $data['title'] = 'Mail Sent!';
                $data['msg'] = 'Check your mail to verify new email address.';
                echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
                exit();
            }
        } else { //if change email form not submitted
            redirect(base_url());
        }
    }

    public function change_email($verification_key) {
        $rs = $this->db->get_where('user_change_mails', array('otp' => $verification_key));
        $row = $rs->row();
        //if no such verification key exists
        if($rs->num_rows() == 0) {
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Uh-oh!');
            $this->session->set_flashdata('msg', 'You are trying to verify an invalid email address.');
            if($this->session->usertype == null) { //if not logged-in
                redirect(base_url('login'));
            } else { //if logged-in
                redirect(base_url('admin/dashboard'));
            }
        }
        //if verification key exists
        else {
            //if verification token used
            if($row->used == 1) {
                $this->session->set_flashdata('type', 'info');
                $this->session->set_flashdata('title', 'Already Verified!');
                $this->session->set_flashdata('msg', 'You have already verified your new email address. :)');
                if($this->session->usertype == null) { //if not logged-in
                    redirect(base_url('login'));
                } else { //if logged-in
                    redirect(base_url('admin/dashboard'));
                }
            }
            //if verification token is not used
            else {
                $user_id = $row->user_id;
                $new_email = $row->new_email;
                $email_exists = $this->db->get_where('users', array('email' => $new_email));

                //if new email address is already registered with another account
                if($email_exists->num_rows() != 0) {
                    $this->session->set_flashdata('type', 'error');
                    $this->session->set_flashdata('title', 'Email Exists');
                    $this->session->set_flashdata('msg', 'This email address is already registered with us, so you can not use it.');
                    if($this->session->usertype == null) { //if not logged-in
                        redirect(base_url('login'));
                    } else { //if logged-in
                        redirect(base_url('admin/dashboard'));
                    }
                }
                //if new email address is not registered with another account
                else {
                    //if user logged-in but not the same user whose new email will be verified
                    if( ($this->session->usertype != null) && ($this->session->user_id != $user_id) ) {
                        $this->session->set_flashdata('type', 'error');
                        $this->session->set_flashdata('title', 'Verification Denied!');
                        $this->session->set_flashdata('msg', 'Your can not verify an email address of another account. To verify this email address, follow one of these - <br/>&bull; Log-out from this account. <br/>or <br/>&bull; Login to that account from which email change request sent.');
                        redirect(base_url('admin/dashboard'));
                    }
                    //if user not logged-in OR same logged-in user whose new email will be verified
                    else {
                        //updating new mail address
                        $this->db->where('user_id', $user_id);
                        $this->db->update('users', array('email' => $new_email));
                        //setting mail change token used
                        $this->db->where('otp', $verification_key);
                        $this->db->update('user_change_mails', array('used' => '1'));

                        //send new email verified mail
                        $website = WEBSITE_NAME;
                        $login_link = base_url("login");

                        $to = $new_email;
                        $msg = <<<EOD
                            Hi,<br/>
                            Your new email address is verified successfully. =)<br/>
                            From now, you should use your new email address to login into your account.<br/>
                            New email address: <strong>$new_email</strong><br/>
                            <a href='$login_link' target='_blank'>Click here</a> to login into your account.<br/><br/>
                            Warm regards,<br/> System Bot<br/> $website
EOD;
                        $this->sendmail($to,$msg,'Email Address Verified');
                        // /.send new email verified mail

                        $this->session->set_flashdata('type', 'success');
                        $this->session->set_flashdata('title', 'Congratulation!');
                        $this->session->set_flashdata('msg', 'Your new email address is verified successfully. =)');
                        if($this->session->usertype == null) { //if not logged-in
                            redirect(base_url('login'));
                        } else { //if logged-in
                            $this->session->email = $new_email;
                            redirect(base_url('admin/dashboard'));
                        }
                    }
                }
            }
        }
    }

    public function ajax_username_check() {
        $new_username = $this->input->get('new_username');
        $check_username = $this->db->get_where('users', array('user_name' => $new_username));
        if($check_username->num_rows() == 0) { //if username available
            echo json_encode('true', JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        } else { //if username not available
            if($new_username == $this->session->username) { //if new username and current username is same
                echo json_encode('This is your current username, try something new.', JSON_HEX_QUOT | JSON_HEX_TAG);
                exit();
            } else {
                echo json_encode('This username is not available because it is taken by someone else, try another one.', JSON_HEX_QUOT | JSON_HEX_TAG);
                exit();
            }
        }
    }

    public function form_change_username() {
        if($this->input->post('submit') == 'submit_change_username') { //if change username form submitted
            $user_id = $this->session->user_id;
            $new_username = $this->input->post('new_username');
            $check_username = $this->db->get_where('users', array('user_name' => $new_username));

            if( $check_username->num_rows() != 0 ) { //if username already exists
                if($new_username == $this->session->username) { //if new username and current username is same
                    $data['type'] = 'error';
                    $data['title'] = 'Same Username!';
                    $data['msg'] = 'This is your current username, try something new.';
                    echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
                    exit();
                } else {
                    $data['type'] = 'error';
                    $data['title'] = 'Username Taken!';
                    $data['msg'] = 'This username is not available because it is taken by someone else, try another one.';
                    echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
                    exit();
                }
            } else { //if username does not exists
                //updating username
                $this->db->where('user_id', $user_id);
                $this->db->update('users', array('user_name' => $new_username));
                //updating session value
                $this->session->username = $new_username;

                //send username changed mail
                if($this->session->email != 'N/A' && 1==2) { //if email address exists
                    $website = WEBSITE_NAME;
                    $login_link = base_url("login");

                    $to = $this->session->email;
                    $msg = <<<EOD
                            Hi {$this->session->name},<br/>
                            <h1>Username Changed! =)</h1>
                            From now, you should use your new username to login into your account.<br/>
                            New username: <strong>$new_username</strong><br/>
                            <a href='$login_link' target='_blank'>Click here</a> to login into your account.<br/><br/>
                            Warm regards,<br/> System Bot<br/> $website
EOD;
                    $this->sendmail($to,$msg,'Username Changed');
                }
                // /.send username changed mail

                $data['type'] = 'success';
                $data['msg'] = 'Username changed!';
                $data['new_username'] = $new_username;
                echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG); //returning multiple data in array
                exit();
            }
        } else { //if change username form not submitted
            redirect(base_url());
        }
    }

    public function sendmail($mail_to,$msg,$mail_sub='',$mail_from='',$attachments=array(),$mailer_name='',$smtp_host='',$smtp_port='',$smtp_user='',$smtp_pass='') {
        if($mail_from == '') $mail_from=default_mail_from; else $mail_from=$mail_from;
        if($mailer_name == '') $mailer_name=default_mailer_name; else $mailer_name=$mailer_name;
        if($mail_sub == '') $mail_sub=default_mail_sub; else $mail_sub=$mail_sub;
        if($smtp_host == '') $smtp_host=default_smtp_host; else $smtp_host=$smtp_host;
        if($smtp_port == '') $smtp_port=default_smtp_port; else $smtp_port=$smtp_port;
        if($smtp_user == '') $smtp_user=default_smtp_user; else $smtp_user=$smtp_user;
        if($smtp_pass == '') $smtp_pass=default_smtp_pass; else $smtp_pass=$smtp_pass;

        $config = Array(
            'smtp_host' => $smtp_host,
            'smtp_port' => $smtp_port,
            'smtp_user' => $smtp_user,
            'smtp_pass' => $smtp_pass,
            'protocol' => 'smtp',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);

        $this->email->clear(TRUE);
        $this->email->set_mailtype("html");
        $this->email->from($mail_from, $mailer_name);
        $this->email->reply_to($mail_from, $mailer_name);
        $this->email->to($mail_to);
        $this->email->subject($mail_sub);
        $this->email->message((string)$msg);
        //attaching files
        if(!empty($attachments)){
            foreach($attachments as $att) {
                $this->email->attach($att);
            }
        }
        
        //sending mail
        if($this->email->send()){
            return true;
        }else{
            show_error($this->email->print_debugger());
        }
    }


} // /.Profile_m model