<?php
	
	Class Model_payment extends CI_Model {
		public function pay_money($data){

			/*if(sizeof($data)==1){
			$this->db->from('Users');
        	$this->db->where('NIC', $data['id']);
        	$query = $this->db->get();print_r($query);
        	if($query->num_rows()==1){
           		//if invalied return null
            	return null;
        		}
		}*/
		if(sizeof($data)!=1){
			$this->db->insert('payment', $data);
			echo "<h3>"."add to the payment.. Go for Paypal Payment"."</h3>";
		
		}

	}}

?>