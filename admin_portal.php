<?php
session_start();

if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Portal</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<style>
		* {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px;
}
.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
  text-decoration: none;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;}

	</style>
</head>
<body>

<div class="header">
	<h2>Admin Home Page</h2>
</div>
<div class="content">
  
    	<p>Welcome  <?php echo $_SESSION['name']; ?></p>
		<p>

		<br></br>
      <a class="btn btn-primary" href="register2.php" role="button">Register New Student</a>
	  <br></br>
     	<a class="btn btn-primary" href="home.php" role="button">View Admitted Students</a>
    <br></br>
      <a class="btn btn-primary" href="students_hostel_info.php" role="button">View Students Hostel Info</a>
    <br></br>
      <a class="btn btn-primary" href="students_medical_info.php" role="button">View Students Medical Info</a>
	  <br></br>
	  <a class="btn btn-primary" href="delete.php" role="button">Delete Students</a>
	  <br></br>
	   	<a class="btn btn-primary" href="complaints.php" role="button">View Complaints</a>
	  <br></br>	 
    	<p> <a href="logout.php?logout='1'" style="color: red;">logout</a> </p>
</div>

</body>
</html>