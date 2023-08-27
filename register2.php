<?php
session_start();

if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
} else {
    header("Location: index.html");
    exit();
}

// the above code is for checking if the user is trying to access the file without login

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Registration</title>
  </head>
  <body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        //$desc = $_POST['desc'];
        $rollNo = $_POST['rollNo'];
        $pass = $_POST['password'];
        $department = $_POST['department'];
        $telNo = $_POST['telNo'];
        $cnicNo = $_POST['cnicNo'];
        $postalA = $_POST['postalA'];
        $mConditions = $_POST['mConditions'];
        $roomP = $_POST['roomP'];
        $bloodgroup = $_POST['bloodgroup'];
        $hostelName = $_POST['hostel-name'];
        $fees =      $_POST['hostel-exp'];


        $_SESSION['rollNo']="rollNo";
        $_SESSION['name']="name";

        $id = $_SESSION['id'];




        // Emergency Contacts

        $fname = $_POST['fname'];
        $phoneNo1 = $_POST['phoneNo1'];
        $phoneNo2 = $_POST['phoneNo2'];



        // Database connection
        $sname= "localhost";
        $unmae= "root";
        $password = "";

        $db_name = "test_db";

      $conn = mysqli_connect($sname, $unmae, $password, $db_name);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql1 = "INSERT INTO `students` (`name`, `email`,`rollNo`,`department`,`mobileNo`, `cnicNo`, `postalAddress`, `dt`,`warden_id`) VALUES ('$name', '$email', '$rollNo','$department','$telNo','$cnicNo','$postalA', current_timestamp(),'$id')";

        $sql2 = "INSERT INTO `emergency_contacts` (`rollNo`,`name`, `phone number1`, `phone number2`) VALUES ('$rollNo','$fname', '$phoneNo1', '$phoneNo2 ')";
        $sql3 = "INSERT INTO `students_login` (`rollNo`, `password`) VALUES ('$rollNo', '$pass')";
        $sql4 = "INSERT INTO `students_medical_info` (`rollNo`, `bloodGroup`, `medicalConditions`) VALUES ('$rollNo', '$bloodgroup', '$mConditions')";
        $sql5 = "INSERT INTO `hostel_info` (`rollNo`, `hostel_name`, `room_no`, `fees`) VALUES ('$rollNo', '$hostelName', '$roomP', '$fees')";

        $result = mysqli_query($conn, $sql1);
        $result2 = mysqli_query($conn, $sql2);
        $result3 = mysqli_query($conn, $sql3);
        $result4 = mysqli_query($conn, $sql4);
        $result5 = mysqli_query($conn, $sql5);
 
        if($result and $result2 and $result3 and $result4 and $result5){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

    }

    
?>

<div class="container mt-3">
<h1>Hostel Allocation Request</h1>
<!-- Data Input-->
    <form action="" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required> 
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>


    <div class="form-group">
        <label for="rollNo">Roll Number</label>
        <input type="text" name="rollNo" class="form-control" id="rollNo" aria-describedby="rollNoHelp" required> 
        <small id="rollNoHelp" class="form-text text-muted">Kindly write your university Roll No (22K-1234).</small>
    </div>


    <div class="form-group">
        <label for="rollNo">Password</label>
        <input type="Password" name="password" class="form-control" id="password" aria-describedby="rollNoHelp" required> 
        <small id="passwordHelp" class="form-text text-muted">Kindly write your password maximum length is 20.</small>
    </div>

    <div class="form-group">
        <label for="department">Department</label>
        <input type="text" name="department" class="form-control" id="department" aria-describedby="departmentHelp" required> 
    </div>

    <div class="form-group">
        <label for="telNo">Phone Number: </label>
        <br>
        <input id="telNo" name="telNo" type="tel" placeholder="12345678901" required />
    </div>

    <div class="form-group">
        <label for="cnicNo">CNIC Number: </label>
        <br>
        <input id="cnicNo" name="cnicNo" type="tel" placeholder="41203-1234567-1" required />
    </div>

    <div class="form-group">
        <label for="postalA">Postal Address:</label>
        <textarea class="form-control" name="postalA" id="postalA" cols="30" rows="2" required></textarea> 
    </div>


    <div class="form-group">
        <label for="bloodgroup">Blood Group: </label>
        <textarea class="form-control" name="bloodgroup" id="bloodgroup" cols="30" rows="1" required></textarea> 
        <small id="bloodgroupHelp" class="form-text text-muted">If Any, give Details along with Special Needs</small>
    </div>


    <div class="form-group">
        <label for="mConditions">Medical Conditions: </label>
        <textarea class="form-control" name="mConditions" id="mConditions" cols="30" rows="1" required></textarea> 
        <small id="rollNoHelp" class="form-text text-muted">If Any, give Details along with Special Needs</small>
    </div>




    
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">


     <h3>Hostel Information</h3>


         <div class="form-group">
        <label for="quantity">Room Preference Number:* </label>
        <input type="number" id="quantity" name="roomP" min="1" max="20" required>
        <small id="quantity" class="form-text text-muted">* Room preference will be only considered if student wants to join as roommate of students in an existing room, subject to
availability of bed.</small>
    </div>


    <div class="form-group">
        <h4 for="fname">Hostel Name</h4> <br>
          <input type="radio" id="html" name="hostel-name" value="Al-Mehran Boys Hostel">
          <label for="almehran-boys-hostel">Al-Mehran Boys Hostel</label><br>
          <input type="radio" id="css" name="hostel-name" value="Paradise Boys Hostel">
          <label for="paradise-boys-hostel">Paradise Boys Hostel</label><br>
          <input type="radio" id="united-boys-hostel" name="hostel-name" value="United Boys Hostel">
        <label for="united-boys-hostel">United Boys Hostel</label>
    </div>

    <div class="form-group">
        <h4 for="fname">Mess</h4> <br>
          <input type="radio" id="html" name="hostel-exp" value="20000">
          <label for="hostel-mess">With Mess - Rs-20,000</label><br>
          <input type="radio" id="css" name="hostel-exp" value="9000">
          <label for="hostel-mess">Without Mess - Rs-9000</label><br>

    </div>



    <h3>Emergency Contacts</h3>


    <div class="form-group">
        <label for="fname">Father/Guardian Name</label>
        <input type="text" name="fname" class="form-control" id="fname" aria-describedby="fnameHelp" required>
    </div>

    <div class="form-group">
        <label for="phoneNo1">Phone Number: </label>
        <br>
        <input id="phoneNo1" name="phoneNo1" type="tel" placeholder="12345678901" required />
    </div>

    <div class="form-group">
        <label for="phoneNo2">Alternative Phone Number: </label>
        <br>
        <input id="phoneNo2" name="phoneNo2" type="tel" placeholder="12345678901" required />
    </div>



    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>