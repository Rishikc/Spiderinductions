<?php
include "file_constants.php";

  // Start the session
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
	$securimage = new Securimage();
if ($securimage->check(@$_POST['captcha_code']) == false) {
  // the code was incorrect
  // you should handle the error so that the form processor doesn't continue

  // or you can use the following code if there is no validation or you do not know how
echo "The security code entered was incorrect.<br /><br />";
echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
exit;
}
else
{
$dbc = mysqli_connect($host,$user,$pass,$db)
or die('error connecting to mysql server');

      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
        $query = "SELECT * FROM signup WHERE username = '$user_username' AND password = SHA('$user_password')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['username'];
          $_SESSION['password'] = $row['password'];
		  $_SESSION['firstname']= $row['firstname'];
          $_SESSION['lastname']= $row['lastname'];
		  
  @$remember=$_POST['remember'];
if($remember=='yes')
{
  setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
  setcookie('password', $row['password'], time() + (60 * 60 * 24 * 30)); 
  setcookie('firstname', $row['firstname'], time() + (60 * 60 * 24 * 30)); 	
} 
 }
       else {
          // The username/password are incorrect so set an error message
        echo 'Sorry, you must enter a valid username and password to log in.'.'<br>';
        }
      }
      else {
        // The username/password weren't entered so set an error message
echo  'Sorry, you must enter your username and password to log in.'.'<br>';
      }
    }
	}
  }
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Spider</title>
         <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link id="data-uikit-theme" rel="stylesheet" href="css/uikit.docs.min.css">
        <link rel="stylesheet" href="css/docs.css">
        <link rel="stylesheet" href="../vendor/highlight/highlight.css">
   
        <script src="vendor/jquery.js"></script>
        <script src="dist/js/uikit.min.js"></script>
        <script src="vendor/highlight/highlight.js"></script>
        <script src="js/docs.js"></script>

    </head>
	<body class="tm-background">
	 <nav class="tm-navbar uk-navbar uk-navbar-attached">
            <div class="uk-container uk-container-center">

                <center><a class="uk-navbar-brand uk-hidden-small" ><font color="white">SPIDER-R&D CLUB OF NITT</font></a></center>
 <div class="uk-grid">
    <div class="uk-width-medium-1-3"><a class="uk-navbar-brand uk-hidden-small"></a></div>
    <div class="uk-width-medium-1-3" ><a href="signup.php"><font color="white">Signup</a> /</font>
	<!-- This is an anchor toggling the modal -->
	<?php
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id'])) {
?> 
<a href="#my-id" data-uk-modal>Log In</a>
	<div id="my-id" class="uk-modal">
    <div class="uk-modal-dialog uk-modal-dialog-slide"> 
	
        <a class="uk-modal-close uk-close"></a>
	
	
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <CENTER>
	<fieldset>
	
      <div class="uk-width-medium-1-2 uk-container-center"><h2>Log In</h2></div>
      <label for="username">Username:</label>
      <input type="text" name="username"  /><br /><br/>
      <label for="password">Password:</label>
      <input type="password" name="password" /><br/>
	  <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
<input type="text" name="captcha_code" size="10" maxlength="6" />
<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Show Another Image ]</a>

    </fieldset>
	  <input type="submit" value="Log In" name="submit" />
	</CENTER>
<input type="checkbox"  name="remember" id="remember" value="yes">remember me</input>
  
  </form>
  <a href="signup.php">Signup</a>|
  <a href="forgot.php">Forgot Password</a>
<?php
}else
 { 
?>
<a href="#my-id" data-uk-modal>Log out</a>
<img src="file_display.php?lname=<?php echo"".$_SESSION['user_id']. ""?>" width=100 height=100>
<?php
 echo('<p class="login">Welcome '.$_SESSION['firstname'] .' '. $_SESSION['lastname']  . '.</p>');
 ?>
	<div id="my-id" class="uk-modal">
    <div class="uk-modal-dialog uk-modal-dialog-slide"> 
	
        <a class="uk-modal-close uk-close"></a>
		<form method="post" action="logout1.php">
		Are you sure you want to log out?
		<input type="submit" value="yes" name="submit" />
		</form>
<?php
}
?>
		
    </div>
</div>
	</div>
	
</div>
            </div>
        </nav>

<div class="tm-section tm-section-color-2 tm-section-colored" id="Spider" ">
            <div class="uk-container uk-container-center uk-text-center">

                <h1 class="uk-heading-large">Spider</h1>

<div class="uk-grid">
    <div class="uk-width-medium-1-1" >
<!--News1-->
	<article class="uk-article" align="left" style="color:#ffffff;" >
   			 <h1 class="uk-article-title"data-uk-scrollspy="{cls:'uk-animation-slide-left', repeat: true}"><center>The research and development club of NIT Trichy </center></h1>
   		
   				 <p class="uk-article-lead">
    				Spider, the research and development club of NIT Trichy was established in 2002. It is a platform for

interested students to do projects in interdisciplinary areas which include Electronics, App development,

image processing and Web development. The motive of the club is to improve the quality of the students'

engineering experience by making them practically implement what they learn and to also serve as an avenue

for the students with like thoughts to come together and pool their efforts to come up with innovative ideas

to challenging problems.
    
</div>

	<button onclick="<?php if (empty($_SESSION['user_id']))echo"alert('login to read more ;)');"?>" class="uk-button" data-uk-modal="{target:'#my-ar'}">Read more</button>
	
	<?php if (!empty($_SESSION['user_id'])) { ?>
<div id="my-ar" class="uk-modal">
    <div class="uk-modal-dialog uk-modal-dialog-slide">

	<a href="" class="uk-modal-close uk-close"></a>
<br>
<font color="black">
	
<center><u><h3><b>SPIDER</b></h3></u></center>
Sharing the knowledge gained by its members with the other fellow students of the college is another crucial

dimension of the club's role in the college. 'µ-Con'- the workshop for freshers is being conducted every year

towards this end. At the end of the workshop, the students are made to implement a project and take it back

with them. 'Accelerometer Controlled Bot', Human interface device for the Angry- birds game are examples

of such projects. Also, a new tradition of conducting free 'Tech Talk' which is open to all, is being followed for

the past two years by the club. Few topics which we touched were 'Smart Cane for the blind' based on RFID

technology and a Kinect based project which mimics the actions of the human arm.

Various assistive technologies has been developed so far which focuses on improving the quality of life,

some of which include 'Voice Controlled wheel Chair', 'Automatic road navigation' based on Raspberry

pi, 'Car Accident response system' as an immediate alert system in case of an accident, Sound and image

transmission through Li-fi technology and various robotic technologies.

We are also an active participant and winners of numerous contests. A national level contest organized by

Texas Instruments called 'TI Analog design contest' was won by the members of the club in the year 2013

based on the project title- 'Solar Power Based Intelligent Battery Charging System Compatible With Existing

Home Inverters'. 'Hybrid Solar electricity for the buses' and 'Eye ball controlled mouse' were the projects

which got the club the first place two consecutive times in the contest called 'Sangam'. In the same year the

third place was also won by 'Spider' based on the project 'Car Accident Response System'. Moreover, various

other competitions at the inter college level have also been actively participated by the members of the club.

Spider also has a separate section dedicated to coding, which is currently involved in web development and

app development for the android platform. Spider manages its own server from where it hosts a lot of useful

web apps. In the past quizzes and coding competitions were regularly conducted by Spider. This however was

discontinued and is in the process of being revived. In the meantime, we host hackathons where we have

tapped into cutting-edge web APIs such as WebRTC creating games. Apart from this applications such as a

facebook data harvester, a tool for analysis of academic results, an accelerometer control for audio apps on

android and a web markup language parser to create web presentations.

Apart from this the coding department of Spider also organizes annual workshops on web development and

the latest web technologies

Spider has recently made its foray into helping the college admin and to this end taken up the project to

develop the online portal for the new mess system  being implemented in out institute, the hostel allotment for UG, the nostalgia site and many other sites for international paper presentation conferences organised by our institute


</font>        
		
</div>
	<?php } ?>
		</article>
                


	</div>
   
	</div>
</div>
		
			</article>

	</div>
		
	   
 </body>
</html>