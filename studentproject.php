<?php 
include_once("vars.php");
session_start();

	
if(isset($_POST["submit"]))
{
	$uname=$_POST["username"];
	$title=$_POST["title"];
	$subject=$_POST["subject"];
	$level=$_POST["level"];
	$type=$_POST["doctype"];
	$citation=$_POST["citation"];
	$sources=$_POST["sources"];
	$page=$_POST["page"];
	$date=$_POST["date"];
	$words=$_POST["words"];
	$budget=$_POST["budget"];
	$prof=$_POST["professor"];
	$description=$_POST["description"];
	$attachment=$_POST["attachment"];
	
	try
	{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("insert into studentproject(uname, title,subarea,acadlevel,doctype,cstyle,time,sources,pages,words,budget,prof,detail,attachment)values(:uname,:title,:subject,:level,:type,:citation,:date,:sources,:page,:words,:budget,:prof,:description,:attachment)");
		$stmt->bindParam(':uname',$uname);
		$stmt->bindParam(':title',$title);
		$stmt->bindParam(':subject',$subject);
		$stmt->bindParam(':level',$level);
		$stmt->bindParam(':type',$type);
		$stmt->bindParam(':citation',$citation);
		$stmt->bindParam(':date',$date);
		$stmt->bindParam(':sources',$sources);
		$stmt->bindParam(':page',$page);
		$stmt->bindParam(':words',$words);
		$stmt->bindParam(':budget',$budget);
		$stmt->bindParam(':prof',$prof);
		$stmt->bindParam(':description',$description);
		$stmt->bindParam(':attachment',$attachment);
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows==1)
		{
		print "Submited successully";
		}
		else
		{
		print "Form not submited";
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
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">

<script>
$(document).ready(function()
{
$(function() {
    $( "#dob" ).datepicker();
  });
});
</script>
</head>

<body>

                <div>Post A New Project</div>
                		 <form action="#" method="post" name="loginform">
            <div>UserName</div>
            	<div>
               	  <label for="username"></label>
               	  <input type="text" name="username" id="username"  / >
                 
                </div>
                <div>Project Title</div>
                <div>
               	  <label for="title"></label>
               	  <input type="text" name="title" id="title"  />
                  
                </div>
                <div>Subject Area</div>
                <div>
               	  <label for="userpass"></label>
               	  <select name="subject">
                   <?php
		  try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("select * from subjectarea");
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows>0)
		{
		while($x=$stmt->fetch(PDO::FETCH_BOTH))
		{
		print "<option value='$x[1]'>$x[1]</option>";
		}
		}
		else
		{
		print "<option>no subject area selected</option>";
		}
	}
	catch(PDOException $e)
	{
		print "Error occured :" . $e->getMessage();
	}
	 ?> </select>
                  
                </div>
                <div>Academic Level</div>
                 <div>
               	  <label for="userpass"></label>
               	  <select name="level">
                   <?php
		  try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("select * from academiclevel");
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows>0)
		{
		while($x=$stmt->fetch(PDO::FETCH_BOTH))
		{
		print "<option value='$x[1]'>$x[1]</option>";
		}
		}
		else
		{
		print "<option>no level selected</option>";
		}
	}
	catch(PDOException $e)
	{
		print "Error occured :" . $e->getMessage();
	}
	 ?> </select>
                  
                </div>
                <div>Document Type</div>
                 <div>
               	  <label for="userpass"></label>
               	  <select name="doctype">
                   <?php
		  try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("select * from adddocumentationstyle");
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows>0)
		{
		while($x=$stmt->fetch(PDO::FETCH_BOTH))
		{
		print "<option value='$x[1]'>$x[1]</option>";
		}
		}
		else
		{
		print "<option>no style selected</option>";
		}
	}
	catch(PDOException $e)
	{
		print "Error occured :" . $e->getMessage();
	}
	 ?> </select>
                  
                </div>
                <div>Citation Style</div>
                 <div>
               	  <label for="userpass"></label>
               	  <select name="citation">
                   <?php
		  try{
		$conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("select * from citation");
		$stmt->execute();
		$conn=null;
		$rows=$stmt->rowCount();
		if($rows>0)
		{
		while($x=$stmt->fetch(PDO::FETCH_BOTH))
		{
		print "<option value='$x[1]'>$x[1]</option>";
		}
		}
		else
		{
		print "<option>no citation style selected</option>";
		}
	}
	catch(PDOException $e)
	{
		print "Error occured :" . $e->getMessage();
	}
	 ?> </select>
                  
                </div>
                <div>I Need This Paper By: (MM/DD/YYYY)</div>
                 <div>
                 <label for="username"></label>
               	  <input type="text" name="date" id="dob" >
               	 
                </div>
                <div>No Of Sources</div>
                 <div >
                 <label for="username"></label>
               	  <input type="text" name="sources" id="sources">
               	 
                </div>
                <div>No Of Pages</div>
                 <div>
                 <label for="username"></label>
               	  <input type="text" name="page" id="pages">
               	 
                </div>
                <div>How Many Words?</div>
                 <div>
                 <label for="username"></label>
               	  <input type="text" name="words" id="words" >
               	 
                </div>
                <div>Estimated Budget</div>
                 <div>
                 <label for="username"></label>
               	  <input type="text" name="budget" id="budget" >
               	 
                </div>
                <div>Invite A Professor</div>
                 <div >
                 <label for="userpass"></label>
               	  <input type="text" name="professor" id="prof" >
                 
                </div>
                <div>Project Detail</div>
                 <div>
                 <label for="username"></label>
               	  <textarea name="description" id="description"></textarea></div>
                  <div>Add Attachment (optional)</div>
               <div><input name="attachment" type="file" /></div>
                             
                
               
               
                <div>
                	<input type="submit" value="SUBMIT" name="submit">
                    </div>
                    <br/>
                   
              </form>
            
          
</body>
</html>