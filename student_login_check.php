<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['rollno']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$rollno = validate($_POST['rollno']);
	$pass = validate($_POST['password']);

	if (empty($rollno)) {
		header("Location: student_login.php?error=Roll No is required");
	    exit();
	}else if(empty($pass)){
        header("Location: student_login.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM students_login WHERE rollNo='$rollno' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['rollNo'] === $rollno && $row['password'] === $pass) {
            	$_SESSION['rollNo'] = $row['rollNo'];
            	header("Location: student_personal_info.php");
		        exit();
            }else{
				header("Location: student_login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: student_login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: student_login.php");
	exit();
}