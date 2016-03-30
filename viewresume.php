<?php 
session_start();
include_once("vars.php");

if(isset($_POST["submit"]))
{
		try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("update professorresume set status=:status where )");
		
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<table width="100%" border="0">
  <tr>
    <td><?php
	include_once("vars.php");
	
	try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("select * from professorresume");
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows>0)
		{
			print "";
			
		while($x=$stmt->fetch(PDO::FETCH_BOTH))
		{
		print "<tr>";
			
		print "<td>
	     First Name- $x[0]</br>
		 Last Name:$x[1]</br>
		 Email:$x[2]</br>
		 Phone No:$x[3]</br>
		 Username:$x[4]</br>
		 Mesaage:$x[5]</br>
		<input name='cb' type='checkbox' value='cb' />
		 </td>";

	}
	}
	}
	catch(PDOException $e)
	{
		print "Error occured :".$e->getMessage();
	}
	?></td>
  </tr>
  <tr>
    <td><input name="submit1" type="submit" value="APPROVE" /></br><input name="submit2" type="submit" value="DISAPPROVE" /></td>
  </tr>
</table>
</body>
</html>
<?php 
session_start();
include_once("vars.php");

if(isset($_POST["submit"]))
{
	$approve="approve";
	try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("update professorresume set status=:status  ");
		$stmt->bindParam(':status',$approve);
		
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows==1)
		{
		print "updated successully";
		}
		else
		{
		print "Not updated";
		}
	}
	catch(PDOException $e)
	{
		print "Error occured :" . $e->getMessage();
	}
}
if(isset($_POST["submit1"]))
{
	$disapprove="disapprove";
	try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("update professorresume set status=:status");
		$stmt->bindParam(':status',$disapprove);
		
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows==1)
		{
		print "updated successully";
		}
		else
		{
		print "Not updated";
		}
	}
	catch(PDOException $e)
	{
		print "Error occured :" . $e->getMessage();
	}
}




?>




