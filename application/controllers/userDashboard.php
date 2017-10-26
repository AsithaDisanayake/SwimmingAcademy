<?php


class userDashboard extends CI_Controller{

    public function index(){


        if(!$this->session->userdata('loggedin')){

            redirect('Welcome/index');

        }else {



            $this->load->view('swim/contact');
            $this->load->view('swim/partials/pageHead');
            $this->load->view('swim/partials/userMenu');
            $this->load->view('swim/partials/pageFooter');
        }
    }






}