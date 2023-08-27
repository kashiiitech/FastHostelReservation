<!DOCTYPE html>
<html>
<head>
	<title>FAST || Hostel Reservation System</title>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN || Kashiiitech</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="Enter Your Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Enter Your Password"><br>

     	


     	<button type="submit">Login</button>
     </form>
</body>
</html>