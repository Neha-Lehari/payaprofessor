<?php
include_once("vars.php");
if(isset($_POST["submit"]))
{
	$fname=$_POST["username"];
	$email=$_POST["email"];
	$password1=$_POST["password"];
	$confirmpassword=$_POST["cpassword"];
	$country=$_POST["country"];
	$find=$_POST["find"];
	
	try
	{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("insert into studentsignup values (:fname,:email,:password,:country,:find)");
		$stmt->bindParam(':fname',$fname);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password1);
		$stmt->bindParam(':country',$country);
		$stmt->bindParam(':find',$find);
		$stmt->execute();
		$conn=null;
	
		}
	catch(PDOException $e)
	{
		print "Error occured :" . $e->getMessage();
	}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%">
    <tr>
      <td width="26%">STUDENT SIGN UP</td>
      <td width="74%">&nbsp;</td>
    </tr>
    <tr>
      <td>USERNAME</td>
      <td><label for="username"></label>
      <input type="text" name="username" id="username" /></td>
    </tr>
    <tr>
      <td>EMAIL</td>
      <td><label for="email"></label>
      <input type="email" name="email" id="email" /></td>
    </tr>
    <tr>
      <td>PASSWORD</td>
      <td><label for="password"></label>
      <input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>CONFIRM PASSWORD</td>
      <td><label for="cpassword"></label>
      <input type="password" name="cpassword" id="cpassword" /></td>
    </tr>
    <tr>
      <td>SELECT COUNTRY</td>
      <td><label for="country"></label>
        <select name="country" id="country">
          <option selected="selected">select</option>
          <option>india</option>
          <option>canada</option>
          <option>america</option>
          <option>china</option>
          <option>japan</option>
          <option>australia</option>
      </select></td>
    </tr>
    <tr>
      <td>HOW DID YOU FIND US?</td>
      <td><label for="find"></label>
        <select name="find" id="find">
          <option selected="selected">select</option>
          <option>google</option>
          <option>bing</option>
          <option>yahoo</option>
          <option>friend</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><p>
        <label>
          <input type="checkbox" name="tandc" value="checkbox" id="tandc_0" />
          I AGREE TO THE TERMS AND CONDITIONS
        </label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="SIGN UP" /></td>
    </tr>
  </table>
</form>
</body>
</html>