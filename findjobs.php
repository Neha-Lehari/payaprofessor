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
		$stmt=$conn->prepare("select * from studentproject");
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
		<h3>$x[2]</h3>
	     Fixed Price- $x[11]</br>
		 Desciption:$x[13]</br>
		 Document Type:$x[5]</br>
		 Citation Style:$x[6]</br>
		 Due By:$x[7]</br>
		 Sources:$x[8]</br>
		 Pages:$x[9]</br>
		 Words:$x[10]</br>
		 Attachments:$x[14]</br>
		 Proposals</br> 
		 <a href='submitproposal.php?pid=$x[0]'>Submit A Proposal</a></br>
		 <td>About the client:</br> $x[1]</br> Subject Area:$x[3] </br>Academic Level:$x[4]</td>
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
</body>
</html>