

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script type="text/javascript">  
     function myFunction() {
    alert("Data is submitted!");
}
  </script> -->
    <title>Contact Page</title>
    <style>

        body
        {
          background: #cdcf53d2;
        }

        .card
        {
            margin: 10px;
        background-color: #fff;
        border: 1px solid black;
         opacity: 0.8;
        }


      
        
    </style>
</head>
<body >
  
<div class="row">
<div class="col-lg-4"></div>
    <div class="col-lg-4 p-3">
        <div class="card border-0">
          <div class="card-body">
            <form method="post" action=" ">
                <h3>Contact Us.....</h3><br>
              <input type="text" placeholder="Full Name" name="full_name" class="form-control" style="background-color: #F5F5F5;" required><br>
              <input type="tel" placeholder="Phone Number" name="phone_number" class="form-control" style="background-color: #F5F5F5;" required><br>
              <input type="email" placeholder="Email" name="email" class="form-control" style="background-color: #F5F5F5;" required><br>
              <input type="text" placeholder="Subject" name="subject" class="form-control" style="background-color: #F5F5F5;" required><br>
              <textarea class="form-control" placeholder="Message" name="message" style="height: 150px;background-color: #F5F5F5;"></textarea><br>
              <button class="btn btn-primary"type="submit"  name="submit"  onclick="myFunction()">Submit</button>
            </form>
          </div>
        </div>
    </div>
    <div class="col-lg-4"></div>
    </div>
    
</body>
</html>










<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";
$ip=getenv("REMOTE_ADDR");
date_default_timezone_set('Asia/Kolkata');
$time=date("Y-m-d h:i:sa");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['submit']))
{
$name=$_POST['full_name'];
$contact=$_POST['phone_number'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];



  
if ((preg_match ("/^[a-zA-z]*$/", $name)) && (preg_match ("/^[0-9]*$/", $contact) ) && (preg_match ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)))   
{  
  $sql = "INSERT INTO enquiry_form( name,contact,email,subject,message,ip,time)VALUES ('$name','$contact','$email','$subject','$message','$ip','$time')";
  
  mysqli_query($conn, $sql);
/* echo $ip."<br>";
 echo "<br>".$time;
*/
  
  } 
  
} 



?>