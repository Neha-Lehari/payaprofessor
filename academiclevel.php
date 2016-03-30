<?php 
session_start();
include_once("vars.php");

if(isset($_POST["submit"]))
{
	
	$lname=$_POST["levelname"];
	

	try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("insert into academiclevel(level) values(:level)");
		$stmt->bindParam(':level',$lname);
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows==1)
		{
		print "Level added successully";
		}
		else
		{
		print "Level not added ";
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
   <div>ADD ACADEMIC LEVEL</div>
     
      <div>LEVEL NAME
      <label for="levelname"></label>
      <input type="text" name="levelname" id="levelname" /></div><br/>
       <div><input type="submit" name="submit" id="submit" value="ADD LEVEL" /></div>
    
</form>
</body>
</html>