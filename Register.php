<?php


class Register extends CI_Controller{

    public function registerUser(){
        $this->form_validation->set_rules('fristname', 'FirstName', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('lastname', 'LastName', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('address', 'Address', 'required|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('tp', 'TP', 'trim|required|min_length[9]|max_length[10]');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[30]|required|matches[repassword]');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'trim|required');
        $this->form_validation->set_rules('file', 'Profile Picture', 'required');
        

        if ($this->form_validation->run() == FALSE){

            $this->load->view('swim/home');

        }else{
            //Load user model and call loginUser function to retrieve data.
            $fname=$_POST['fristname'];
            $lname=$_POST['lastname'];
            $address=$_POST['address'];
            $email=$_POST['email'];
            $tp=$_POST['tp'];
            $pw=$_POST['password'];
            $nic=$_POST['NIC'];

            //create url
            $fileName=$_FILES['file']['name'];
            $fileext = explode('.', $fileName);
            $fileActExt = strtolower(end($fileext));
            $fileNewName=$nic.".".$fileActExt;
            $fileDes='/var/www/html/SwimmingAcademy-master/application/controllers/upload/'.$fileNewName;
            
            $data= array('NIC'=>$nic,'Fname'=>$fname,'Lname'=>$lname,'Address'=>$address,'Email'=>$email,'Tp'=>$tp,'Password'=>$pw,'URL'=>$fileDes );
            $this->load->model('Model_register');
            $this->Model_register->Register($data);

            //afterregister automatic login
            $data=array('username'=>$fname, 'password'=>$pw);
            $this->load->model('Model_login');
            $result =  $this->Model_user->loginUser($data);

            

             //Create dara array to get user Data
                $user_data = array(
                    'username'=>$result->username,
                    //to check logged in
                    'loggedin'=>TRUE);
            

             //Create Session to Adding Data. Get user details
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('welcomeMsg',"Welcome");
             //direct to userDashboard controller and call index function
                redirect('userDashboard/index');
            }

        }

    public    function email_check()
        {
             $this->load->model('Model_register');
             $email=$_POST['email'];
             $data= array('Email'=>$email);
             $error=$this->Model_register->Register($data);
             if($error!=null){
                return TRUE;
             }
             else{
                $this->form_validation->set_message('email_check', 'Email already exist');
                return false;
            }
        }

    public    function image_check()
        {
            $fileName=$_FILES['file']['name'];
            $fileTmpName=$_FILES['file']['tmp_name'];
            $filesize=$_FILES['file']['size'];
            $fileError=$_FILES['file']['error'];
            $filetype=$_FILES['file']['type'];

            $fileext = explode('.', $fileName);
            $fileActExt = strtolower(end($fileext));

            $allowed= array('jpg','jpeg','png');

            if (in_array($fileActExt, $allowed)) {
                if ($filesize<500000) {
                    $nic=$_POST['NIC'];
                    $fileNewName=$nic.".".$fileActExt;
        
                    move_uploaded_file($fileTmpName, $_SERVER['DOCUMENT_ROOT'] .'/SwimmingAcademy-master/assets/images/uploads/'.$fileNewName);
                    return true;
                }
                else{
                    $this->form_validation->set_message('image_check', 'Size is too large,Should be less than 5MB');
                    return false;
                }
            }
            else{
                $this->form_validation->set_message('image_check', 'Invalied input type for profile picture');
                return false;
            }


        }


    public function logoutUser(){

        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('loggedin');
        redirect('Welcome/index');
    }



} 