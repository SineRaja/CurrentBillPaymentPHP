<?php
/*
on anonymous page, any one can visit
strangers(anonymous) are also allowed
*/
@session_start();
include "dbconfigure.php";
$msg="";
if(verifyuser())
{
$un=fetchusername();
$msg="Welcome $un , <br /><a href='signout.php'>Signout</a>";
}
else
{
$msg="Welcome Guest ,";
$msg.="<br/>Existing user <a href='signin.php'>Signin</a>";
$msg.="<br/>New user <a href='signup.php'>Signup</a>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php" ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
  @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}

body {
	background: linear-gradient(90deg, #C7C5F4, #776BCC);		
}

.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 80vh;
}

.screen {		
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 500px;
	width: 360px;	
	box-shadow: 0px 0px 24px #5C5696;
  padding: 25px;
  border-radius:20px;
}



    </style>

</head>

<body>
    <?php include "navigationbar1.php"; ?>

    <div class="container">
        <div class="screen">
            <div class="screen__content">

                <form method='post'>
                    <center>
                        <h1 style="font-family : 'Monotype Corsiva' ; color : purple ;"><b>Admin Login</b></h1>
                    </center>
                    <div class="form-group">
                        <label>UserName</label>

                        <input type="text" class="form-control" placeholder="User Name" name="username">


                        <label>Password</label>

                        <input type="password" class="form-control" placeholder="Password" name="pwd">

                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="rem" value='yes'>Remember Me
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" name="login" value="login" style="width : 200px">
                    </div>
                    <span> you want to use customer page, <a  style="color:white" href="../index.php">Login As Customer</a></span>
                </form>
            </div>
            <div class=col-sm-3>
            </div>
        </div>

    </div>
    </div>
    </div>

</body>

</html>



<?php
if(isset($_REQUEST['login']))
{
$username=$_REQUEST['username'];
$pwd=$_REQUEST['pwd'];
//syntax to fetch value of checkbox
if(isset($_REQUEST['rem']))
$remember='yes';
else
$remember='no';
//echo "<br/>$username,$pwd,$remember";

//1. check if user is valid or not
$query="select count(*) from admin where adminname='$username' and password='$pwd'";
include_once "dbconfigure.php";
$ans=my_one($query);
if($ans==1)
{
//2. save username and pwd to session variables
$_SESSION['sun']=$username;
$_SESSION['spwd']=$pwd;

//3. if remember is yes, save them to cookies too
if($remember=='yes')
{
setcookie('cun',$username,time()+60*60*24*7);
setcookie('cpwd',$pwd,time()+60*60*24*7);
}

header("Location:admin_home.php");

}
else
{
header("Location:loginerror.php");
}
}

?>