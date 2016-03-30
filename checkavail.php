<?php
include_once("vars.php");
if(isset($_POST["submit"]))
{
	
   	$email=$_POST["email"];
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("select * from signup where email=:email");
		$stmt->bindParam(':email',$email);
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows==1)
		{
		print "you have already signup!";
		}
		else
		{
	$uname=$_POST["username"];
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$confirmpass=$_POST["confirmpass"];
	
	try
	{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("insert into signup values (:uname,:email,:pass,:confirmpass)");
		$stmt->bindParam(':uname',$uname);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':pass',$pass);
		$stmt->bindParam(':confirmpass',$confirmpass);
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows==1)
		{
		print "you have signed up successully";
		}
		}
	catch(PDOException $e)
	{
		print "Error occured :" . $e->getMessage();
	}
	}
}
	?>