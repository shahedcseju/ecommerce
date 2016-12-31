<?php 
session_start();
if(isset($_SESSION['user_id'])){
    header("location:index.php");
}
include './dbconnect.php';
//set validation error flag as false
$error=false;
//check if form is submitted
if(isset($_POST['signup'])){
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $repassword = mysqli_real_escape_string($con, $_POST['repassword']);

    //name can contain only alpha characters and space
    if(!preg_match("/^[a-zA-Z]+$/",$name)){
       $error=true;
       $name_error="name should contain alphabetic character and space";

    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = true;
	$email_error = "Please Enter Valid Email ID";
    }{
    if(strlen($password)<6){
       	$error = true;
	$password_error = "Password must be minimum of 6 characters"; 
    }
    if($password!=$repassword){
        $error = true;
	$repassword_error = "Password and Confirm Password doesn't match"; 
    }
    if(!$error){
        if(mysqli_query($con, "INSERT INTO tbl_user(name,email,password)VALUES('".$name."','".$email."','".md5($password)."')")){
            $successmsg="successfully registered <a href='index.php'> login here</a>";
        }else{
            $errormsg="error in registered";
        }

    }
    }
}
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <title>registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Style Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href='//fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- animation-effect -->
        <link href="css/animate.min.css" rel="stylesheet">
        <script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <!-- //animation-effect -->
    </head>

    <body>
        <div class="header" id="ban">
            <div class="container">
                <div class="head-left wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
                    <div class="header-search">
                        <div class="search">
                            <input class="search_box" type="checkbox" id="search_box">
                            <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                            <div class="search_form">
                                <form action="#" method="post">
                                    <input type="text" name="Search" placeholder="Search...">
                                    <input type="submit" value="Send">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header_right wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                            <nav class="link-effect-7" id="link-effect-7">
                                <ul class="nav navbar-nav">
                                    <li class="active act"><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="features.php">Features</a></li>
                                    <li><a href="travel.php">Travel</a></li>
                                    <li><a href="fashion.php">Fashion</a></li>
                                    <li><a href="music.php">Music</a></li>
                                    <li><a href="codes.php">Codes</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="login.php">Log in</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
                <div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
                    <ul>
                        <li>
                            <a href="#"> </a>
                        </li>
                        <li>
                            <a href="#" class="pin"> </a>
                        </li>
                        <li>
                            <a href="#" class="in"> </a>
                        </li>
                        <li>
                            <a href="#" class="be"> </a>
                        </li>

                        <li>
                            <a href="#" class="vimeo"> </a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!--start-main-->
        <div class="header-bottom">
            <div class="container">
                <div class="logo wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                    <h2><a href="index.html">STYLE BLOG</a></h2>
                    <p>
                        <label class="of"></label>LET'S MAKE A PERFECT STYLE
                        <label class="on"></label>
                    </p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <!-- banner -->
       <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="" method="post" name="signupform">
				<fieldset>
					<legend>Sign Up</legend>

					<div class="form-group">
						<label for="name">Name</label>
                                                <input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name;?>" class="form-control" />
                                                <span class="text-danger"><?php if(isset($name_error)){echo $name_error;} ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="repassword" placeholder="reonfirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($repassword_error)) echo $repassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
                    <span class="text-success"><?php if(isset($successmsg)) {echo $successmsg ;}?></span>
		    <span class="text-danger"><?php if(isset($errormsg)) {echo $errormsg ;}?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>
</div>
        <!-- technology-left -->

        <div class="footer">
            <div class="container">
                <div class="col-md-4 footer-left wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                    <h4>About Me</h4>
                    <p>Consectetur adipisicing Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
                    <img src="images/t4.jpg" class="img-responsive" alt="">
                    <div class="bht1">
                        <a href="singlepage.html">Read More</a>
                    </div>
                </div>
                <div class="col-md-4 footer-middle wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                    <h4>Latest Tweet</h4>
                    <div class="mid-btm">
                        <p>Sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
                        <a href="https://w3layouts.com/">https://w3layouts.com/</a>
                    </div>

                    <p>Consectetur adipisicing Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
                    <a href="https://w3layouts.com/">https://w3layouts.com/</a>

                </div>
                <div class="col-md-4 footer-right wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                    <h4>Newsletter</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    <div class="name">
                        <form action="#" method="post">
                            <input type="text" placeholder="Your Name" required="">
                            <input type="text" placeholder="Your Email" required="">
                            <input type="submit" value="Subscribed Now">
                        </form>

                    </div>

                    <div class="clearfix"> </div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="copyright wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
            <div class="container">
                <p>© 2016 Style Blog. All rights reserved | Design by <a href="">Ramsitech</a></p>
            </div>
        </div>
    </body>

    </html>