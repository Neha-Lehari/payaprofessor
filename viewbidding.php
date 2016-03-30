<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="#" method="post" enctype="multipart/form-data" name="form1">
<table width="100%" border="0">
  <tr>
    <td><?php
	include_once("vars.php");
	
	try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("select * from viewbidding");
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows>0)
		{
			print "<table width='80%' align='center'>";
			
		while($x=$stmt->fetch(PDO::FETCH_BOTH))
		{
			
		print "<tr>";
			
		print "<td>
		Bidding Amount:$x[1]</br>
		Cover Letter:$x[3]</br>
		</td>";
		
		
		}
		print "</table>";
		}
		else
		{
		print "<option>no products available</option>";
		}
	}
	catch(PDOException $e)
	{
		print "Error occured :".$e->getMessage();
	}
	?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>