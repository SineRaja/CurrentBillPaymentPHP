<?php 
ob_start();
?>

<html>

<head>
    <?php
session_start();
// $un = $_SESSION['sun'];
// include "navigationbar2.php";

?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel=stylesheet type=text/css
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <style>
    label {
        font-weight: bold
    }

    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Raleway, sans-serif;
    }

    body {
        background: linear-gradient(90deg, #C7C5F4, #776BCC);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
            Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }
    </style>
</head>

<body>




    <div class="container" style="margin-top : 30px; width: 90%; background: radial-gradient(#1fe4f5, #3fbafe);   padding: 20px;  border-radius: 10px;
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.2s;">
        <h2 class=text-center>Register Customer</h2>



        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" name="customername" class="form-control" required>



                <label>Contact</label>
                <input type="text" name="contact" class="form-control" required>



                <label>Email ID</label>
                <input type="text" name="email" class="form-control" required>

                <label>Password</label>
                <input type="password" name="password" class="form-control" required>

                <label>Address</label>
                <textarea name="address" class="form-control" required></textarea>

                <label>City</label>
                <input type="text" name="city" class="form-control" required>

                <label>State</label>
                <input type="text" name="state" class="form-control" required>

                <input type="submit" class="btn btn-primary" name="save" value="Save" />
            </div>
        </form>



    </div>

    <?php

include "dbconfigure.php" ;
if(isset($_POST["save"]))
{

$customername=$_POST['customername'];
$contact=$_POST['contact'];
$email=$_POST['email'];

$password=$_POST['password'];
$address=$_POST['address'];
$city=$_POST['city'];

$state=$_POST['state'];



$query="insert into customer(customername,contact,email,password,address,city,state) values('$customername','$contact','$email','$password','$address','$city','$state')";
$n = my_iud($query);
if($n==1)
{
echo '<script>alert("Record Saved Successfully");
window.location = "addconnection.php";
</script>';
}
else
{
echo '<script>alert("Something Went Wrong");</script>';
}
}

?>

    <?php  //include "bottom.php "?>
</body>

</html>