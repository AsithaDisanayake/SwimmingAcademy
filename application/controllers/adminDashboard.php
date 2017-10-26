<?php


class adminDashboard extends CI_Controller{

    public function index(){


        if(!$this->session->userdata('loggedin')){

            redirect('Welcome/index');

        }else {


            $this->load->view('swim/partials/pageHead');
            $this->load->view('swim/partials/adminMenu');
            $this->load->view('swim/partials/adminTop');
            $this->load->view('swim/adminDashboard');
            $this->load->view('swim/partials/adminBottom');
            $this->load->view('swim/partials/pageFooter');





        }
    }



    public function location(){

        $this->load->view('swim/adminDashboard');
        $this->load->view('swim/partials/pageHead');
        $this->load->view('swim/partials/userMenu');
        $this->load->view('swim/partials/pageFooter');

    }





}