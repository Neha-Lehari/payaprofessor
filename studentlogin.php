<?php
include_once("vars.php");
if(isset($_POST["submit"]))
{
    $email=$_POST["email"];
    $password=$_POST["password"];
   
	try
	{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("select email,password from studentsignup where email=:email and password=:password union select email,password from professorresume where email=:email and password=:password");
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password);
		$stmt->execute();
		$rows=$stmt->rowCount();
		$x=$stmt->fetch(PDO::FETCH_BOTH); 
		if($rows>0 )
		{
		header("location:studentproject.php");	
		}
		else
		{
	   print "htft";															
		}
	
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
  <table width="100%" border="1">
    <tr>
      <td width="14%">STUDENT LOGIN</td>
      <td width="86%">&nbsp;</td>
    </tr>
    <tr>
      <td>EMAIL</td>
      <td><label for="email"></label>
      <input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <td>PASSWORD</td>
      <td><label for="password"></label>
      <input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>