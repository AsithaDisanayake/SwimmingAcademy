<?php 
   
require 'database.php';
$connection=Connect();

if(isset($_POST['send'])){
     $from = $connection->real_escape_string($_POST['semail']);
     $one = $connection->real_escape_string($_POST['remail']);
     $team = $connection->real_escape_string($_POST['ryear']);
     $message = $connection->real_escape_string($_POST['message']);
     date_default_timezone_set('Asia/Colombo');
     $c_date = date("Y.m.d");
     $c_time = date("h:i:sa");
     $c_day = date("l");
     
     if((!$one == "") && ($team == "")){
        $query1="SELECT email FROM student WHERE email = '".$one."'";
        $result1 = $connection-> query($query1); 
        if($result1 ->num_rows > 0){ 
              while($row = $result1->fetch_assoc()){
                  $email = $row["email"];
                  if($email != ""){
                       $query2 = "INSERT INTO private_sms (email,message,c_date,c_time,c_day)  VALUES ('".$one."','".$message."','$c_date','$c_time','$c_day')";
                       $result2 = $connection-> query($query2);
                       if(!$result2){ 
                           die("could not enter data ".$connection->error);
                       }else{
                           echo("message sent to ".$one);
                       }
                  }
              }
             
        }else{
              die("could not found the child ".$connection->error);
            
        }
     }else if(($one == "") && (!$team == "")){
        $query1="SELECT year FROM class WHERE year = '".$team."'";
        $result1 = $connection-> query($query1); 
        if($result1 ->num_rows > 0){ 
              while($row = $result1->fetch_assoc()){
                  $year = $row["year"];
                  if($year != ""){
                       $query2 = "INSERT INTO team_sms (year,message,c_date,c_time,c_day)  VALUES ('".$team."','".$message."','$c_date','$c_time','$c_day')";
                       $result2 = $connection-> query($query2);
                       if(!$result2){ 
                           die("could not enter data ".$connection->error);
                       }else{
                           echo("message sent to ".$team." group");
                       }
                  }
              }
             
        }else{
              die("could not found the team ".$connection->error);
            
        }

     }elseif((!$one == "") && (!$team == "")){
        die("you are unable to send a same message to a child and a team ".$connection->error);
      
     }else{
        die("please select a student or a group for send the message ".$connection->error);
     }      
}        
         
?>

