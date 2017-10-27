<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class Payment_controller extends CI_Controller { 

		public function index(){
			$this->load->view('payment_view');

			
		}
		public function sub() {
				
			//$this->form_validation->set_rules('sname','Sname','required');
				$sName=$_POST["sname"];
				$uid=(int)$_POST["stid"];
				//echo $sName;

				$cp1=filter_input(INPUT_POST, "pckg1");
    			$cp2=filter_input(INPUT_POST, "pckg2");
    		    $cp3=filter_input(INPUT_POST, "pckg3");
    			$cp4=filter_input(INPUT_POST, "pckg4");
				//if(isset($_POST['pckg']) && !empty($_POST['pckg'])) {
					//echo "fff";

					//foreach($_POST['pckg'] as $pckg) echo $pckg;
				//}
				/*$checkdata=array('id'=>$uid);
    				$this->load->model('Model_payment');
            		$y=$this->Model_payment->pay_money($checkdata);
				if($y==NULL){
					echo "Not registered User.. Check your Input";

				}*/
					//else{
			    $count=0;
				if($cp1!=NULL){
    				$data1=array('studentname'=>$sName, 'packagename'=>'package1','price'=>500);
    				$this->load->model('Model_payment');
            		$this->Model_payment->pay_money($data1);
    				$count++;
    			}
    			if($cp2!=NULL){
    				
    				$data2=array('studentname'=>$sName, 'packagename'=>'package2','price'=>1000);
    				$this->load->model('Model_payment');
            		$this->Model_payment->pay_money($data2);
    				$count++;
    			}
    			if($cp3!=NULL){
    				
    				$data3=array('studentname'=>$sName, 'packagename'=>'package3','price'=>1500);
    				$this->load->model('Model_payment');
            		$this->Model_payment->pay_money($data3);
    				$count++;
    			}
    			if($cp4!=NULL){
    				
    				$data4=array('studentname'=>$sName, 'packagename'=>'package3','price'=>3000);
    				$this->load->model('Model_payment');
            		$this->Model_payment->pay_money($data4);
    				$count++;
    			}
    			if($count==0){
    				echo "<h3>"." Select packages "."<h3>";
    			}
}


		}

	
?>