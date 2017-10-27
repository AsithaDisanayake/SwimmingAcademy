<?php


class Model_register extends CI_Model{

	public function Register($data){
		if(sizeof($data)==1){
			$this->db->from('Users');
        	$this->db->where('Email', $data['email']);
        	$query = $this->db->get();
        	if($query->num_rows()==1){
           		//if invalied return null
            	return null;
        		}
		}
		else{
			$this->db->insert('Users', $data);
			$data=array('username'=>$data['Fname'],'password'=>$data['Password']);
			$this->db->insert('User', $data);
	}
	}

}