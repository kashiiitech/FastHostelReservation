<?php
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "test_db";

$con =mysqli_connect($sname, $unmae, $password,$db_name);
if ($con -> connect_error) {
die("connection failed:".$conn->connect_error);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    html{
        /* background: linear-gradient(to right top, #0c008c, #002a8d, #003c82, #134971, #45535e) ; */

        max-height:768px;
        height:100%;
        color:black;
        /* background-image: linear-gradient(to bottom, #00132e, #27485a, #648085, #acbbb7, #f7f8f7); */
    }
     form{
         margin:10px auto;
         max-width:550px;
         width:100%;
         border:2px solid lightgrey;
         background: white;
        
       
         
         /* box-shadow: 1px 2px  1px 3px  lightgrey; */
         height:400px;
         border-radius: 10px;
         text-align:center;
         margin-bottom:0px;
     }
      form label{
         padding-left:5px;
         
         margin:13px auto ;
     }
     form input{
         padding:20px;
         border-radius: 5px;
         border:2.5px solid grey;
         border-radius: 5px;
         max-width:200px;
         margin:10px auto;
        margin-right:10px;
         
         
     
        
     }


.button {
  border-radius: 15px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 22px;
  margin: 4px 2px;
  cursor: pointer;

}

.button1 {background-color: RED;} /* Red */

</style>

     
</head>
<body>

<form action="delete.php" method="POST">
  <label for="fname"><h1>Roll No:</h1></label><br>      
  <input type="text" id="fname" name="rname" placeholder="20K-1234"><br>
</from>

  <button class="button button1">Delete</button>
     

<?php

// delete implementation

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $rname = $_POST['rname'];


$sql = "DELETE FROM `students` WHERE `students`.`rollNo` = '$rname'";
$result = mysqli_query($con, $sql);
$aff = mysqli_affected_rows($con);
echo "<br><br> <h3>Number of affected rows: $aff</h3>";

if($result){
    echo "<h2>Delete successfully</h2>";
}
else{
    $err = mysqli_error($con);
    echo "Not Delete successfully due to this error --> $err";
}

}









//    ?>
</body>
</html>