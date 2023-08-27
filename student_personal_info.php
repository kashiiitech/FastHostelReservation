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
         max-width:350px;
         width:100%;
         border:2px solid lightgrey;
         background: white;
        
       
         
         /* box-shadow: 1px 2px  1px 3px  lightgrey; */
         height:300px;
         border-radius: 10px;
         text-align:center;
         margin-bottom:0px;
     }
     form div{
         height:50px;
         color: #002a8d;
         text-align:center;
         padding:10px ;
        
         margin-top:-10px !important;
         border-bottom: 2px solid transparent;
         border-bottom: 2px solid #002a8d;
         margin-bottom:10px;
          

     }
     form div h3{
         margin-top:50px;
         margin-bottom:0px;
        
     }
      form label{
         padding-left:5px;
         float:left;
         margin:13px auto ;
     }
     form input{
         padding:5px;
         border-radius: 5px;
         border:2.5px solid grey;
         border-radius: 5px;
         max-width:160px;
         margin:10px auto;
        margin-right:10px;
         
         float:right;
     
        
     }
     .submit{
         height:40px;
         font-size:16px;
         border: 2px solid transparent;
         border-radius: 5px;
         background: #002a8d;
         font-weight:bold; 
         color: white;
         margin-top:20px;
         margin-right:100px !important;
         width:120px;
     

     }
     table{
         max-width:1000px;
         width:80%;
         
         border: 2px solid black;
         margin-top:30px;
         text-align: center;
         padding:5px;
         background: white;
         color:black;
         border-collapse: collapse;
         margin:30px auto 0px;
         
        
     }
    table thead{

        font-size: 20px;
        font-weight: bold;
        border: 1px solid black;
        width:200px;
        color:black;
    }
    table  tr {
     border: 1px solid black;
     color:black;
    }
    table tr td{
color: black;
font-weight: bold;
border: 1px solid black;
    }
    h2{
        margin:30px auto 10px;
        width:200px;

    }
    h1{
        width:800px;
        margin:30px auto 0px;
        text-align:center;
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
     

   <h2 margin="0px auto" color="Black" >Wellcome</h2>
    <table   cellpadding="1" cellspacing="1">
       <tr> <thead><td>RollNo</td><td>Name</td><td>Email ID</td><td>Department</td><td>CNIC</td><td>Postal Address</td></thead></tr>
        
        <tr>
<?php
  session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc

if (isset($_SESSION['rollNo']) && !empty($_SESSION['rollNo'])) {
} else {
    header("Location: index.html");
    exit();
}

 $rname= $_SESSION['rollNo'];



$sql = "SELECT * from `students` WHERE `students`.`rollNo` = '$rname'";
$result = mysqli_query($con, $sql);
//if ($result->num_rows>0){
while ($rows=$result->fetch_assoc())
{
?>
            <td><?php echo $rows['rollNo'] ?></td>
            <td><?php echo $rows['name'] ?></td>
            <td><?php echo $rows['email'] ?></td>
            <td><?php echo $rows['department'] ?></td>
            <td><?php echo $rows['cnicNo'] ?></td>
            <td><?php echo $rows['postalAddress'] ?></td>
        

        </tr>
        <?php
        } ?>

    </table>






    <h2 margin="0px auto" color="Black" >Medical Information</h2>
    <table   cellpadding="1" cellspacing="1">
       <tr> <thead><td>Blood Group</td><td>Medical Conditions</td>        
        <tr>
<?php
   $rname= $_SESSION['rollNo'];



$sql = "SELECT * from `students_medical_info` WHERE `students_medical_info`.`rollNo` = '$rname'";
$result = mysqli_query($con, $sql);
//if ($result->num_rows>0){
while ($rows=$result->fetch_assoc())
{
?>
            <td><?php echo $rows['bloodGroup'] ?></td>
            <td><?php echo $rows['medicalConditions'] ?></td>

        </tr>
        <?php
        } ?>

    </table>



        <h2 margin="0px auto" color="Black" >Hoste Information</h2>
    <table   cellpadding="1" cellspacing="1">
       <tr> <thead><td>Hostel Name</td><td>Room No</td><td>Fees/Month</td>        
        <tr>
<?php
   $rname= $_SESSION['rollNo'];



$sql = "SELECT * FROM `hostel_info` WHERE `hostel_info`.`rollNo` = '$rname'";
$result = mysqli_query($con, $sql);
//if ($result->num_rows>0){
while ($rows=$result->fetch_assoc())
{
?>
            <td><?php echo $rows['hostel_name'] ?></td>
            <td><?php echo $rows['room_no'] ?></td>
            <td><?php echo $rows['fees'] ?></td>

        </tr>
        <?php
        } ?>

    </table>




<button onclick="window.location.href='add_complain.php'" class="button1 button">Add Complain</button> <br>
<button onclick="window.location.href='change_password.php'" class="button1 button">Change Password</button>
</body>
</html>