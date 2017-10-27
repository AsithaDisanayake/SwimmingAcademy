<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="awesome-bootstrap-checkbox.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>

  var sum = 0;

  function toggleCheckbox(element){
        var number = element.value.replace ( /[^\d.]/g, '' );
        if (element.checked)
            sum += Number(number);
        else
            sum -= Number(number);
        document.getElementById("test").innerHTML = sum;
  }
   
 </script>
  
</head>
<body>

<div class="col-lg-5 col-lg-offset-2">
  <h1>Payment For Packages</h1><br>

  <table class="table" style="width:100%">
  <tr>
    <th>Package</th>
    <th>Description</th> 
    <th>price</th>
  </tr>
  <tr class="active">
    <td>Package1</td>
    <td>Kids Pool for one kid ,2 hours</td> 
    <td>Rs.500/=</td>
  </tr>
  <tr>
    <td>Package2</td>
    <td>Main public Pool for one person, 2 hours </td> 
    <td>Rs.1000/=</td>
  </tr>
  <tr class="active">
    <td>Package3</td>
    <td>Main public Pool for two person, 2 hours </td> 
    <td>Rs.1500/=</td>
  </tr>
  <tr>
    <td>Package4</td>
    <td>Main Private Pool for Family, 2 hours </td> 
    <td>Rs.3000/=<td>
  </tr>
</table><br>

  <form method="POST" action="http://localhost/payment/index.php/payment_controller/sub">
  
  <label>
  
    <input  name="pckg1" value="500" type="checkbox" onchange="toggleCheckbox(this)">
              Package1   Rs.500/=
  </label><br>
  
  <label>
    <input name="pckg2" value="1000" type="checkbox" onchange="toggleCheckbox(this)">
                Package2   Rs.1000/=
  </label><br>
  <label>
    <input name="pckg3" value="1500" type="checkbox" onchange="toggleCheckbox(this)">
                Package3   Rs.1500/=
  </label><br>

  <label>
    <input name="pckg4" value="3000" type="checkbox" onchange="toggleCheckbox(this)">
                Package4   Rs.3000/=
  </label>

  <br> 
  Total Price Rs. <p id="test"></p>
  <br>

  
  <div class="form-group">
      <label for="exampleInputUsername">Student Name</label>
      <input class="form-control" type="text"  placeholder="Name" name="sname" required>
    </div>
  
    <div class="form-group">
      <label for="exampleInputLname">Student ID</label>
      <input class="form-control" type="number"  placeholder="StudentID" name="stid" required>
    </div>

    <div class="form-group">
       <input class="btn btn-info" type="reset" name="rst" value="Cancel" >
    
       <input class="btn btn-info" type="submit" name="sbmt" value="AddToPay" >
    </div>
  </form>
</div>

</body>
</html>




