
<?php

    if(!$this->session->userdata('loggedin')) {

        redirect('Welcome/index');

    }
//   Welcome message

 if($this->session->flashdata('welcomeMsg')){

    echo "<p>".$this->session->flashdata('welcomeMsg')."</p>";
}



?>
