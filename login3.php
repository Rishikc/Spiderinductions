<?php


  // Start the session
  session_start();

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
$dbc = mysqli_connect('localhost','root','qwerty','spider')
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
		  
  
  setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
  setcookie('password', $row['password'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
  setcookie('firstname', $row['firstname'], time() + (60 * 60 * 24 * 30));  // expires in 30 days	
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
header('Location:home.php');
exit();
  ?>

