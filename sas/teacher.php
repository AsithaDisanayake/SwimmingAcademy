<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Send messages</title>
    <link rel="stylesheet" href="css/sm.css">	
</head>
<body>	
<div class="container">
    <h1>Send Message</h1>	
	<form action="query.php" method="post">
		<div class="form-input">
		<label for="from">From</label> 	  
	   	  	  <input type="email" name="semail"
	   	  	  placeholder="Enter your email" id="from" required> 	
	   	  	  <br>
	   	</div>
	   	<div class="form-input">
		<label for="toOne">Private messages</label> 
	   	  	  <input type="email" name="remail"
	   	  	  placeholder="Enter email of student" id="toOne"> 	
	   	  	  <br>
	   	</div>
	   	<div class="form-input">
		<label for="toTema">Public messages</label>
	   	  	  <input type="year" name="ryear"
	   	  	  placeholder="Enter the year of group" id="toTeam"> 	
	   	  	  <br>
	   	</div>
	   	<div class="form-input">
		<label for="message">Enter the message</label>
	   	  	  <center><textarea rows="6" cols="50" name="message" id="message" required></textarea></center>	
	   	  	  <br>
	   	</div>
	   	  	   
	   	<input type="submit" value="Send" name="send" class="btn-signup">
	   	  	
	</form>
	
</body>
</html>