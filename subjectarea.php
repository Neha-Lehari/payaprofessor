<?php 
session_start();
include_once("vars.php");

if(isset($_POST["submit"]))
{
	
	$lname=$_POST["area"];
	

	try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("insert into subjectarea(subjectarea) values(:sub)");
		$stmt->bindParam(':sub',$lname);
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows==1)
		{
		print "Subject added successully";
		}
		else
		{
		print "Subject not added ";
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
   <div>ADD SUBJECT AREA</div>
     
      <div>SUBJECT AREA 
        <label for="area"></label>
  <input type="text" name="area" id="area" /></div><br/>
       <div><input type="submit" name="submit" id="submit" value="ADD SUBJECT" /></div>
    
</form>
</body>
</html>