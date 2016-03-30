<?php 
session_start();
include_once("vars.php");

if(isset($_POST["submit"]))
{
	
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$uname=$_POST["uname"];
	$pass=$_POST["password1"];
	$msg=$_POST["msg"];
	$_SESSION["fname"]=$fname;
	$_SESSION["lname"]=$lname;
	$_SESSION["email"]=$email;
	$_SESSION["phone"]=$phone;
	$_SESSION["msg"]=$msg;
	
	
	
	
	

	try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("insert into professorresume (fname,lname,email,phoneno,loginusername,password,msg)values(:fname,:lname,:email,:phone,:uname,:pass,:msg)");
		$stmt->bindParam(':fname',$fname);
		$stmt->bindParam(':lname',$lname);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':phone',$phone);
		$stmt->bindParam(':uname',$uname);
		$stmt->bindParam(':pass',$pass);
		$stmt->bindParam(':msg',$msg);
	    
		
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows==1)
		{
		print "Resume added successully";
		}
		else
		{
		print "Resume not added ";
		}
	}
	catch(PDOException $e)
	{
		print "Error occured :" . $e->getMessage();
	}
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="js/jquery-2.2.1.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link href="js/jquery-ui.theme.min.css" rel="stylesheet" />
<script src="tinymce/jquery.tinymce.min.js"></script>
<script src="tinymce/tinymce.min.js"></script>
<script src="tinymce/plugins/anchor/plugin.min.js"></script>
 <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0" cellspacing="0" cellpadding="00">
    <tr>
      <td width="18%">PROFESSOR RESUME</td>
      <td width="82%">&nbsp;</td>
    </tr>
    <tr>
      <td>FIRST NAME </td>
      <td><label for="fname"></label>
      <input type="text" name="fname" id="fname" /></td>
    </tr>
    <tr>
      <td>LAST NAME</td>
      <td><label for="lname"></label>
      <input type="text" name="lname" id="lname" /></td>
    </tr>
    <tr>
      <td>EMAIL</td>
      <td><label for="email">
        <input type="text" name="email" id="email" />
      </label></td>
    </tr>
    <tr>
      <td>PHONE NO</td>
      <td><label for="phone"></label>
      <input type="text" name="phone" id="phone" /></td>
    </tr>
    <tr>
      <td>USERNAME</td>
      <td><label for="uname"></label>
      <input type="text" name="uname" id="uname" /></td>
    </tr>
    <tr>
      <td>PASSWORD</td>
      <td><label for="password1"></label>
      <input type="text" name="password1" id="password1" /></td>
    </tr>
    <tr>
      <td>MESSAGE</td>
      <td><label for="msg"></label>
      <textarea name="msg" id="msg" cols="45" rows="5"></textarea></td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="register" /></td>
    </tr>
  </table>
</form>
</body>
</html>