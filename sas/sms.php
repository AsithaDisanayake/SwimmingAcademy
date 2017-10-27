
<?php

require 'database.php';
$connection=Connect();


if(isset($_POST['message'])){
    $one = $connection->real_escape_string($_POST['email']);
    $team = $connection->real_escape_string($_POST['year']);

    
    if((!$one == "") && (!$team == "")){
        $query1="SELECT email FROM student WHERE email = '".$one."'";
        $rslt1 = $connection-> query($query1); 
        if($rslt1 ->num_rows > 0){ 
              while($row = $rslt1->fetch_assoc()){
                  $email = $row["email"];
                  $query2="SELECT year FROM student WHERE email = '".$email."'";
                  $rslt2 = $connection-> query($query2);
                  if($rslt2 ->num_rows > 0){
                     while($row = $rslt2->fetch_assoc()){
                         $year = $row["year"];
                         if($team == $year){ 
                               $sql1 = "SELECT  message, c_date, c_time, c_day FROM private_sms WHERE email = '".$email."'"; 
                               $sql2 = "SELECT  message, c_date, c_time, c_day FROM team_sms WHERE year = ".$year.""; 
                               $result1 = $connection->query($sql1);
                               $result2 = $connection->query($sql2);

                               $a1 = array();
                               while ($row = $result1->fetch_assoc())
                               {
                                 $a1[] = array('mg' => $row['message'], 'dt' => $row['c_date'], 'dy' => $row['c_day'], 'tm'=> $row['c_time'] );
                               }

                               $a2 = array();
                               while ($row = $result2->fetch_assoc())
                               {
                                 $a2[] = array('mg' => $row['message'], 'dt' => $row['c_date'], 'dy' => $row['c_day'], 'tm'=> $row['c_time'] );
                               }
                         }else{
                               die("Invalid Year".$connection->error);
                         }        
                     }
                  }
                  
              }
             
        }else{
              die("Invalid Email".$connection->error);
        }       
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css"> 
</head>
<body>

<center><legend><h3>Inbox</h3></legend></center>  

<div class="tab">
  <button class="tablinks" onclick="message(event, 'Private')">Private</button>
  <button class="tablinks" onclick="message(event, 'Public')">Public</button>
  
</div>
<div id="Private" class="tabcontent">
  <h3>Private Messages From Your Teacher</h3>
            
            <div style="overflow-x:auto;">
            <table style="width:100%">
              <tr>
                <th>Message</th>
                <th>Date</th> 
                <th>Day</th>
                <th>Time</th>
              </tr>
      <?php 
           foreach ($a1 as $private){
               echo'<tr>'; 
               echo'<td>'. $private['mg']."</td>";
               echo'<td>'. $private['dt'].'</td>';
               echo'<td>'. $private['dy'].'</td>';
               echo'<td>'. $private['tm'].'</td>';
               echo'<tr>';
           }
      ?>
            </table>
            </div>

</div>

<div id="Public" class="tabcontent">
  <h3>Public Messages From Your Teacher</h3>
            
            <div style="overflow-x:auto;">
              <table style="width:100%">
                <tr>
                  <th>Message</th>
                  <th>Date</th> 
                  <th>Day</th>
                  <th>Time</th>
                </tr>
      <?php 
           foreach ($a2 as $public){
               echo'<tr>'; 
               echo'<td>'. $public['mg']."</td>";
               echo'<td>'. $public['dt'].'</td>';
               echo'<td>'. $public['dy'].'</td>';
               echo'<td>'. $public['tm'].'</td>';
               echo'<tr>';
           }
      ?>
              </table>
              </div>

</div>

<script>
function message(evt, type) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(type).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

</body>
</html> 
