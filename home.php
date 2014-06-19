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

      
	   
 </body>
</html>