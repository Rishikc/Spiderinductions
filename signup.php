<?php session_start(); 
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>sign up</title>
<script LANGUAGE="JavaScript">
var h=0;
function req(x,y,z){
if(x.value==0||x.value=='select'){
y.innerHTML="*"+z+" required";
h++;
}
else
{
y.innerHTML="";
h--;
}
}
function tex(x,y){
c=x.indexOf('1');
if(c==-1){
c=x.indexOf('2');
}
if(c==-1){
c=x.indexOf('3');
}
if(c==-1){
c=x.indexOf('4');
}
if(c==-1){
c=x.indexOf('5');
}
if(c==-1){
c=x.indexOf('6');
}
if(c==-1){
c=x.indexOf('7');
}
if(c==-1){
c=x.indexOf('8');
}
if(c==-1){
c=x.indexOf('9');
}
if(c==-1){
c=x.indexOf('0');
}
if(c!=-1)
{y.innerHTML="text only";
}
else
y.innerHTML="";
}
function toUpper(x,y)
{
var q=x.length;
x=x.substring(0,1).toUpperCase()+x.substring(1,q);
y.value=x;
}
function emailval(x,y){
var at=x.indexOf("@");
var dot=x.indexOf(".");
if(at<1||dot<at+2||dot+2>=x.length){
y.innerHTML="invalid email format-enter as text@server.com/org etc";
}
else y.innerHTML="";
}
function githubeval(x,y)
{
var a=-1,b=-1;
a=x.indexOf("http://github.com/");
b=x.indexOf("https://github.com/");
if(a==0||b==0)
y.innerHTML=""; 
else
y.innerHTML="invalid entry-enter in the format http://github.com/ or https://github.com/";
}
function passwordeval(x,y){
if(x.length==0)
y.innerHTML="password required";
else if(x.length<6)
{
y.innerHTML="password too short";
}
else
y.innerHTML="";
}
function passwordcheck()
{
if(retypepassword.value!=password.value)
retypepassword1.innerHTML="passwords does not match";
else
retypepassword1.innerHTML="";
}
</script>
</head>
<body>
<p>fill the form to sign up</p>
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table>
  <tr>
  <td><label for="firstname"><span style="color:red">*</span> First Name:</label></td>
  <td><input type="text"  onkeyup="tex(this.value,first)" onblur="toUpper(this.value,this)" id="firstname" name="firstname" /></td>
  </tr>
  <tr><td></td><td id="first" style="color:red" ></td></tr>
  <tr>
  <td><label for="lastname"> Last Name:</label></td>
  <td ><input type="text" onkeyup="tex(this.value,last)" onblur="toUpper(this.value,this)" onfocus="req(firstname,first,'firstname')"  id="lastname" name="lastname" /></td >
  </tr>
  <tr><td></td><td id="last" style="color:red" ></td></tr>
  <tr>
  <td><label for="username"><span style="color:red">*</span>username:</label></td>
  <td><input type="text" id="username" name="username" /></td>
  </tr><tr><td></td><td id="user" style="color:red" ></td></tr><tr>
  <td><label for="email"><span style="color:red">*</span>email address:</label></td>
  <td><input type="text" onblur="emailval(this.value,email_id)" onfocus="req(username,user,'username')" id="email" name="email" /></td>
  </tr><tr><td></td><td id="email_id" style="color:red" ></td></tr><tr>
  <td><label for="dob"><span style="color:red">*</span>Date of Birth:</label></td>
  <td><input type="date"  id="dob" name="dob" /></td>
  </tr><tr><td></td><td id="dob1" style="color:red" ></td></tr><tr>
  <td><label for="gender"><span style="color:red">*</span>gender:</label></td>
  <td><input id="gender" onfocus="req(dob,dob1,'date of birth')" name="gender" type="radio" value="male" />male
  <input id="gender" name="gender" type="radio" value="female" />female 
  <input id="gender" name="gender" type="radio" value="others" />others </td>
  </tr><tr><td></td><td id="g" style="color:red" ></td></tr><tr>
  <td><label for="password"><span style="color:red">*</span>Password:</label></td>
  <td><input type="password" onkeyup="passwordeval(this.value,password1)" onfocus="req(gender,g,'gender') " id="password" name="password" /></td>
  </tr><tr><td></td><td id="password1" style="color:red" ></td></tr><tr>
  <td><label for="retypepassword"><span style="color:red">*</span>Re enter password:</label></td>
  <td><input type="password" onkeyup="passwordcheck()" id="retypepassword" name="retypepassword" /></td>
  </tr><tr><td></td><td id="retypepassword1" style="color:red" ></td></tr><tr>
  <td><label for="github"> Github profile link:</label></td>
  <td><input type="text" onblur="githubeval(this.value,git)"  id="github" name="github" /></td>
  </tr><tr><td></td><td id="git" style="color:red" ></td></tr><tr>
  <td><label for="department"><span style="color:red">*</span>Department:</label></td>
  <td><select id="department" onfocus="req(retypepassword,retypepassword1,'re-enter password')" name="department">
  <option>select</option>
  <option >Civil</option>
  <option >Computer science</option>
  <option >Electrical and Electronics</option>
  <option >metallurgy</option>
  <option >Production</option>
  <option >Mechanical</option>
  <option >Electronics and Communication</option>
  <option >Instrumentation and communication</option>
  <option >Chemical</option>
  <option >Architecture</option>
  </select></td>
  </tr><tr><td></td><td id="depa" style="color:red" ></td></tr><tr>
  <td><label for="photo"> Profile Picture:</label></td>
  <td><input type="file"  onfocus="req(department,depa,'department')" id="userfile" name="userfile" /></td>
  </tr><tr><td></td><td id="filesize"></td></tr><tr>
  <td><label for="interests"> Interests:</label></td>
  <td><input type="text"  onfocus="req(department,depa,'department')" id="interests" name="interests" /><br /></td>
  </tr>
  <tr><td>
  <a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Show Another Image ]</a>
 </td>
 <td>
 <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
 </td>
 </tr>
 <tr>
 <td></td>
 <td>
 <input type="text" name="captcha_code" size="10" maxlength="6" />
 </td>
 </tr>
  </table>
  <input type="submit" value="submit" name="submit" /> 
  
  <?php  
 
  @$firstname = $_POST['firstname'];
  @$lastname = $_POST['lastname'];
  @$username = $_POST['username'];
  @$email = $_POST['email'];
  @$dob   = $_POST['dob'];
  @$gender = $_POST['gender'];
  @$password1 = $_POST['password'];
  @$password2 = $_POST['retypepassword'];
  @$github = $_POST['github'];
  @$department = $_POST['department'];

  @$interests = $_POST['interests'];
  $evaluator=0;
  $at=0;
  $dot=0;
  $git1=1;
  $git2=1;
  $maxsize = 204800;
  
if(isset($_POST['submit'])){
if(!$firstname){
echo "<br><span style='color:red'>*firstname required</span>";
$evaluator++;
}
 
if(!$username){
echo "<br><span style='color:red'>*username required";
$evaluator++;
}

if($dob==0){
echo "<br><span style='color:red'>*date of birth required";
$evaluator++;
}

if(!$gender){
echo "<br><span style='color:red'>*gender required";
$evaluator++;
}

if($department=='select'){
echo "<br><span style='color:red'>*department required";
$evaluator++;
}
if(strlen($password1)!=0)
{ if(strlen($password2)!=0)
{ 
if($password1==$password2){
	$password=$password1;
	if(strlen($password)<6)
	{echo "<br><span style='color:red'>*password too short";
	$evaluator++;
	}
}
else 
{
$evaluator++;
echo"<br><span style='color:red'>*passwords does not match";
}
}
else {echo"<br><span style='color:red'>*re-enter password required";$evaluator++;}
}
else {echo"<br><span style='color:red'>*password required";$evaluator++;}

if(strlen($email)!=0)
{$at=strpos($email,'@');
$dot=strpos($email,'.');
if($at<1||$dot<$at+2||$dot+2>=strlen($email))
{
echo "<br><span style='color:red'>*invalid email-id";
$evaluator++;
}
}
else
{echo "<br><span style='color:red'>*email-id required";
$evaluator++;
}

if(strlen($github)!=0){
$git1=substr("$github",0,18);
$git2=substr("$github",0,19);
if($git1!="http://github.com/")
if($git2!="https://github.com/")
{echo "<br>invalid github account";
$evaluator++;
}
}



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
//aftr all validation
if($evaluator==0)
{
if(isset($_FILES['userfile']))
{

   
    $maxsize = 204800;

  
            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {  
  
               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    

                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

                    // put the image in the db...
                    // our sql query
                    
					$dbc = mysqli_connect('localhost','root','qwerty','spider')
or die('error connecting to mysql server');
$query1="INSERT INTO signup(firstname,lastname,username,email,dob,gender,password,github,department,profilepicture,interest) values('$firstname','$lastname','$username','$email','$dob','$gender',SHA('$password'),'$github','$department','{$imgData}','$interests')";
$result=mysqli_query($dbc,$query1)
or die('error querying 1');
mysqli_close($dbc);
echo 'u have successfully signed up :) ';

                    // insert the image
                }
          
            }
}
else{
$dbc = mysqli_connect('localhost','root','qwerty','spider')
or die('error connecting to mysql server');
$query1="INSERT INTO signup(firstname,lastname,username,email,dob,gender,password,github,department,profilepicture,interest) values('$firstname','$lastname','$username','$email','$dob','$gender',SHA('$password'),'$github','$department','','$interests')";
$result=mysqli_query($dbc,$query1)
or die('error querying 1');
mysqli_close($dbc);
echo 'u have successfully signed up :) ';
}
}
}




 }  
?>

  
</body>
</html>  