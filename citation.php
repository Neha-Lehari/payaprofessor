<?php 
session_start();
include_once("vars.php");

if(isset($_POST["submit"]))
{
	
	$lname=$_POST["citation"];
	

	try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("insert into citation(citation) values(:citation)");
		$stmt->bindParam(':citation',$lname);
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows==1)
		{
		print "Style added successully";
		}
		else
		{
		print "Style not added ";
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="34%">ADD CITATION STYLE</td>
      <td width="66%">&nbsp;</td>
    </tr>
    <tr>
      <td>STYLE NAME</td>
      <td><label for="levelname"></label>
      <input type="text" name="citation" id="citation" /></td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="ADD STYLE" /></td>
    </tr>
  </table>
</form>
</body>
</html>